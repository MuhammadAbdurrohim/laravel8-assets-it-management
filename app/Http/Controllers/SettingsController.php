<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Helpers\StorageHelper;
use App\Http\Requests\ImageUploadRequest;
use App\Http\Requests\SettingsSamlRequest;
use App\Http\Requests\SetupUserRequest;
use App\Models\CustomField;
use App\Models\Group;
use App\Models\Setting;
use App\Models\Asset;
use App\Models\User;
use App\Notifications\FirstAdminNotification;
use App\Notifications\MailTest;
use Auth;
use Crypt;
use DB;
use enshrined\svgSanitize\Sanitizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Image;
use Input;
use Redirect;
use Response;
use App\Http\Requests\SlackSettingsRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

/**
 * This controller handles all actions related to Settings for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class SettingsController extends Controller
{
    /**
     * Checks to see whether or not the database has a migrations table
     * and a user, otherwise display the setup view.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v3.0]
     *
     * @return View
     */
    public function getSetupIndex()
    {
        $start_settings['php_version_min'] = false;

        if (version_compare(PHP_VERSION, config('app.min_php'), '<')) {
            return response('<center><h1>This software requires PHP version '.config('app.min_php').' or greater. This server is running '.PHP_VERSION.'. </h1><h2>Please upgrade PHP on this server and try again. </h2></center>', 500);
        }

        try {
            $conn = DB::select('select 2 + 2');
            $start_settings['db_conn'] = true;
            $start_settings['db_name'] = DB::connection()->getDatabaseName();
            $start_settings['db_error'] = null;
        } catch (\PDOException $e) {
            $start_settings['db_conn'] = false;
            $start_settings['db_name'] = config('database.connections.mysql.database');
            $start_settings['db_error'] = $e->getMessage();
        }

        if (array_key_exists("HTTP_X_FORWARDED_PROTO", $_SERVER)) {
            $protocol = $_SERVER["HTTP_X_FORWARDED_PROTO"] . "://";
        } elseif (array_key_exists('HTTPS', $_SERVER) && ('on' == $_SERVER['HTTPS'])) {
            $protocol = "https://";
        } else {
            $protocol = "http://";
        }

        if (array_key_exists("HTTP_X_FORWARDED_HOST", $_SERVER)) {
            $host = $_SERVER["HTTP_X_FORWARDED_HOST"];
        } else {
            $host = array_key_exists('SERVER_NAME', $_SERVER) ? $_SERVER['SERVER_NAME'] : null;
            $port = array_key_exists('SERVER_PORT', $_SERVER) ? $_SERVER['SERVER_PORT'] : null;
            if (('http://' === $protocol && '80' != $port) || ('https://' === $protocol && '443' != $port)) {
                $host .= ':'.$port;
            }
        }
        $pageURL = $protocol.$host.$_SERVER['REQUEST_URI'];

        $start_settings['url_config'] = config('app.url').'/setup';
        $start_settings['url_valid'] = ($start_settings['url_config'] === $pageURL);
        $start_settings['real_url'] = $pageURL;
        $start_settings['php_version_min'] = true;

        // Curl the .env file to make sure it's not accessible via a browser
        $ch = curl_init($protocol.$host.'/.env');
        curl_setopt($ch, CURLOPT_HEADER, true);    // we want headers
        curl_setopt($ch, CURLOPT_NOBODY, true);    // we don't need body
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if (404 == $httpcode || 403 == $httpcode || 0 == $httpcode) {
            $start_settings['env_exposed'] = false;
        } else {
            $start_settings['env_exposed'] = true;
        }

        if (\App::Environment('production') && (true == config('app.debug'))) {
            $start_settings['debug_exposed'] = true;
        } else {
            $start_settings['debug_exposed'] = false;
        }

        $environment = app()->environment();
        if ('production' != $environment) {
            $start_settings['env'] = $environment;
            $start_settings['prod'] = false;
        } else {
            $start_settings['env'] = $environment;
            $start_settings['prod'] = true;
        }

        $start_settings['owner'] = '';

        if (function_exists('posix_getpwuid')) { // Probably Linux
            $owner = posix_getpwuid(fileowner($_SERVER['SCRIPT_FILENAME']));
            // This *should* be an array, but we've seen this return a bool in some chrooted environments
            if (is_array($owner)) {
                $start_settings['owner'] = $owner['name'];
            }
        }

        if (($start_settings['owner'] === 'root') || ($start_settings['owner'] === '0')) {
            $start_settings['owner_is_admin'] = true;
        } else {
            $start_settings['owner_is_admin'] = false;
        }

        if ((is_writable(storage_path()))
            && (is_writable(storage_path().'/framework'))
            && (is_writable(storage_path().'/framework/cache'))
            && (is_writable(storage_path().'/framework/sessions'))
            && (is_writable(storage_path().'/framework/views'))
            && (is_writable(storage_path().'/logs'))
        ) {
            $start_settings['writable'] = true;
        } else {
            $start_settings['writable'] = false;
        }

        $start_settings['gd'] = extension_loaded('gd');

        return view('setup/index')
            ->with('step', 1)
            ->with('start_settings', $start_settings)
            ->with('section', 'Pre-Flight Check');
    }

    /**
     * Save the first admin user from Setup.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v3.0]
     *
     * @return Redirect
     */
    public function postSaveFirstAdmin(SetupUserRequest $request)
    {
        $user = new User();
        $user->first_name = $data['first_name'] = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $data['email'] = $request->input('email');
        $user->activated = 1;
        $permissions = ['superuser' => 1];
        $user->permissions = json_encode($permissions);
        $user->username = $data['username'] = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $data['password'] = $request->input('password');

        $settings = new Setting();
        $settings->full_multiple_companies_support = $request->input('full_multiple_companies_support', 0);
        $settings->site_name = $request->input('site_name');
        $settings->alert_email = $request->input('email');
        $settings->alerts_enabled = 1;
        $settings->pwd_secure_min = 10;
        $settings->brand = 1;
        $settings->locale = $request->input('locale', 'en-US');
        $settings->default_currency = $request->input('default_currency', 'USD');
        $settings->user_id = 1;
        $settings->email_domain = $request->input('email_domain');
        $settings->email_format = $request->input('email_format');
        $settings->next_auto_tag_base = 1;
        $settings->auto_increment_assets = $request->input('auto_increment_assets', 0);
        $settings->auto_increment_prefix = $request->input('auto_increment_prefix');

        if ((! $user->isValid()) || (! $settings->isValid())) {
            return redirect()->back()->withInput()->withErrors($user->getErrors())->withErrors($settings->getErrors());
        } else {
            $user->save();
            Auth::login($user, true);
            $settings->save();

            if ($request->input('email_creds') == '1') {
                $data = [];
                $data['email'] = $user->email;
                $data['username'] = $user->username;
                $data['first_name'] = $user->first_name;
                $data['last_name'] = $user->last_name;
                $data['password'] = $request->input('password');
                $user->notify(new FirstAdminNotification($data));
            }

            return redirect()->route('setup.done');
        }
    }

    /**
     * Return the admin user creation form in Setup.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v3.0]
     *
     * @return View
     */
    public function getSetupUser()
    {
        return view('setup/user')
            ->with('step', 3)
            ->with('section', 'Create a User');
    }

    /**
     * Return the view that tells the user that the Setup is done.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v3.0]
     *
     * @return View
     */
    public function getSetupDone()
    {
        return view('setup/done')
            ->with('step', 4)
            ->with('section', 'Done!');
    }

    /**
     * Migrate the database tables, and return the output
     * to a view for Setup.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v3.0]
     *
     * @return View
     */
    public function getSetupMigrate()
    {
        Artisan::call('migrate', ['--force' => true]);
        if ((! file_exists(storage_path().'/oauth-private.key')) || (! file_exists(storage_path().'/oauth-public.key'))) {
            Artisan::call('migrate', ['--path' => 'vendor/laravel/passport/database/migrations', '--force' => true]);
            Artisan::call('passport:install');
        }

        return view('setup/migrate')
            ->with('output', 'Databases installed!')
            ->with('step', 2)
            ->with('section', 'Create Database Tables');
    }

    /**
     * Return a view that shows some of the key settings.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.0]
     *
     * @return View
     */
    public function index()
    {
        $settings = Setting::getSettings();

        return view('settings/index', compact('settings'));
    }

    /**
     * Return the admin settings page.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.0]
     *
     * @return View
     */
    public function getEdit()
    {
        $setting = Setting::getSettings();

        return view('settings/general', compact('setting'));
    }

    /**
     * Return a form to allow a super admin to update settings.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.0]
     *
     * @return View
     */
    public function getSettings()
    {
        $setting = Setting::getSettings();

        return view('settings/general', compact('setting'));
    }

    /**
     * Return a form to allow a super admin to update settings.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.0]
     *
     * @return View
     */
    public function postSettings(Request $request)
    {
        if (is_null($setting = Setting::getSettings())) {
            return redirect()->to('admin')->with('error', trans('admin/settings/message.update.error'));
        }

        $setting->modellist_displays = '';

        if (($request->filled('show_in_model_list')) && (count($request->input('show_in_model_list')) > 0)) {
            $setting->modellist_displays = implode(',', $request->input('show_in_model_list'));
        }

        $setting->full_multiple_companies_support = $request->input('full_multiple_companies_support', '0');
        $setting->unique_serial = $request->input('unique_serial', '0');
        $setting->show_images_in_email = $request->input('show_images_in_email', '0');
        $setting->show_archived_in_list = $request->input('show_archived_in_list', '0');
        $setting->dashboard_message = $request->input('dashboard_message');
        $setting->email_domain = $request->input('email_domain');
        $setting->email_format = $request->input('email_format');
        $setting->username_format = $request->input('username_format');
        $setting->require_accept_signature = $request->input('require_accept_signature');
        $setting->show_assigned_assets = $request->input('show_assigned_assets', '0');
        if (! config('app.lock_passwords')) {
            $setting->login_note = $request->input('login_note');
        }

        $setting->default_eula_text = $request->input('default_eula_text');
        $setting->load_remote = $request->input('load_remote', 0);
        $setting->thumbnail_max_h = $request->input('thumbnail_max_h');
        $setting->privacy_policy_link = $request->input('privacy_policy_link');

        $setting->depreciation_method = $request->input('depreciation_method');
        $setting->dash_chart_type = $request->input('dash_chart_type');

        if ($request->input('per_page') != '') {
            $setting->per_page = $request->input('per_page');
        } else {
            $setting->per_page = 200;
        }

        if ($setting->save()) {
            return redirect()->route('settings.index')
                ->with('success', trans('admin/settings/message.update.success'));
        }

        return redirect()->back()->withInput()->withErrors($setting->getErrors());
    }


    /**
     * Return a form to allow a super admin to update settings.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.0]
     *
     * @return View
     */
    public function getBranding()
    {
        $setting = Setting::getSettings();

        return view('settings.branding', compact('setting'));
    }

    /**
     * Return a form to allow a super admin to update settings.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.0]
     *
     * @return View
     */
    public function postBranding(ImageUploadRequest $request)
    {
        if (is_null($setting = Setting::getSettings())) {
            return redirect()->to('admin')->with('error', trans('admin/settings/message.update.error'));
        }

        $setting->brand = $request->input('brand', '1');
        $setting->header_color = $request->input('header_color');
        $setting->support_footer = $request->input('support_footer');
        $setting->version_footer = $request->input('version_footer');
        $setting->footer_text = $request->input('footer_text');
        $setting->skin = $request->input('skin');
        $setting->allow_user_skin = $request->input('allow_user_skin');
        $setting->show_url_in_emails = $request->input('show_url_in_emails', '0');
        $setting->logo_print_assets = $request->input('logo_print_assets', '0');

        // Only allow the site name and CSS to be changed if lock_passwords is false
        // Because public demos make people act like dicks

        if (! config('app.lock_passwords')) {
            $setting->site_name = $request->input('site_name');
            $setting->custom_css = $request->input('custom_css');
            $setting = $request->handleImages($setting, 600, 'logo', '', 'logo');

            if ('1' == $request->input('clear_logo')) {
                Storage::disk('public')->delete($setting->logo);
                $setting->logo = null;
                $setting->brand = 1;
            }


            $setting = $request->handleImages($setting, 600, 'email_logo', '', 'email_logo');


            if ('1' == $request->input('clear_email_logo')) {
                Storage::disk('public')->delete($setting->email_logo);
                $setting->email_logo = null;
                // If they are uploading an image, validate it and upload it
            }


            $setting = $request->handleImages($setting, 600, 'label_logo', '', 'label_logo');

            if ('1' == $request->input('clear_label_logo')) {
                Storage::disk('public')->delete($setting->label_logo);
                $setting->label_logo = null;
            }


            $setting = $request->handleImages($setting, 600, 'favicon', '', 'favicon');

            // If the user wants to clear the favicon...
            if ('1' == $request->input('clear_favicon')) {
                Storage::disk('public')->delete($setting->favicon);
                $setting->favicon = null;
            }

        }

        if ($setting->save()) {
            return redirect()->route('settings.index')
                ->with('success', trans('admin/settings/message.update.success'));
        }

        return redirect()->back()->withInput()->withErrors($setting->getErrors());
    }


    /**
     * Return a form to allow a super admin to update settings.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.0]
     *
     * @return View
     */
    public function getSecurity()
    {
        $setting = Setting::getSettings();

        return view('settings.security', compact('setting'));
    }

    /**
     * Return a form to allow a super admin to update settings.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.0]
     *
     * @return View
     */
    public function postSecurity(Request $request)
    {
        $this->validate($request, [
            'pwd_secure_complexity' => 'array',
            'pwd_secure_complexity.*' => [
                Rule::in([
                    'disallow_same_pwd_as_user_fields',
                    'letters',
                    'numbers',
                    'symbols',
                    'case_diff',
                ])
            ]
        ]);

        if (is_null($setting = Setting::getSettings())) {
            return redirect()->to('admin')->with('error', trans('admin/settings/message.update.error'));
        }
        if (! config('app.lock_passwords')) {
            if ('' == $request->input('two_factor_enabled')) {
                $setting->two_factor_enabled = null;
            } else {
                $setting->two_factor_enabled = $request->input('two_factor_enabled');
            }

            // remote user login
            $setting->login_remote_user_enabled = (int) $request->input('login_remote_user_enabled');
            $setting->login_common_disabled = (int) $request->input('login_common_disabled');
            $setting->login_remote_user_custom_logout_url = $request->input('login_remote_user_custom_logout_url');
            $setting->login_remote_user_header_name = $request->input('login_remote_user_header_name');
        }

        $setting->pwd_secure_uncommon = (int) $request->input('pwd_secure_uncommon');
        $setting->pwd_secure_min = (int) $request->input('pwd_secure_min');
        $setting->pwd_secure_complexity = '';


        if ($request->filled('pwd_secure_complexity')) {
            $setting->pwd_secure_complexity = implode('|', $request->input('pwd_secure_complexity'));
        }

        if ($setting->save()) {
            return redirect()->route('settings.index')
                ->with('success', trans('admin/settings/message.update.success'));
        }

        return redirect()->back()->withInput()->withErrors($setting->getErrors());
    }

    /**
     * Return a form to allow a super admin to update settings.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.0]
     *
     * @return View
     */
    public function getLocalization()
    {
        $setting = Setting::getSettings();

        return view('settings.localization', compact('setting'));
    }

    /**
     * Return a form to allow a super admin to update settings.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.0]
     *
     * @return View
     */
    public function postLocalization(Request $request)
    {
        if (is_null($setting = Setting::getSettings())) {
            return redirect()->to('admin')->with('error', trans('admin/settings/message.update.error'));
        }

        if (! config('app.lock_passwords')) {
            $setting->locale = $request->input('locale', 'en-US');
        }
        $setting->default_currency = $request->input('default_currency', '$');
        $setting->date_display_format = $request->input('date_display_format');
        $setting->time_display_format = $request->input('time_display_format');
        $setting->digit_separator = $request->input('digit_separator');
        $setting->name_display_format = $request->input('name_display_format');

        if ($setting->save()) {
            return redirect()->route('settings.index')
                ->with('success', trans('admin/settings/message.update.success'));
        }

        return redirect()->back()->withInput()->withErrors($setting->getErrors());
    }

    /**
     * Return a form to allow a super admin to update settings.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.0]
     *
     * @return View
     */
    public function getAlerts()
    {
        $setting = Setting::getSettings();

        return view('settings.alerts', compact('setting'));
    }

    /**
     * Return a form to allow a super admin to update settings.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.0]
     *
     * @return View
     */
    public function postAlerts(Request $request)
    {
        if (is_null($setting = Setting::getSettings())) {
            return redirect()->to('admin')->with('error', trans('admin/settings/message.update.error'));
        }

        // Check if the audit interval has changed - if it has, we want to update ALL of the assets audit dates
        if ($request->input('audit_interval') != $setting->audit_interval) {

            // This could be a negative number if the user is trying to set the audit interval to a lower number than it was before
            $audit_diff_months = ((int)$request->input('audit_interval') - (int)($setting->audit_interval));

            // Batch update the dates. We have to use this method to avoid time limit exceeded errors on very large datasets,
            // but it DOES mean this change doesn't get logged in the action logs, since it skips the observer.
            // @see https://stackoverflow.com/questions/54879160/laravel-observer-not-working-on-bulk-insert
            $affected = Asset::whereNotNull('next_audit_date')
                ->whereNull('deleted_at')
                ->update(
                    ['next_audit_date' => DB::raw('DATE_ADD(next_audit_date, INTERVAL '.$audit_diff_months.' MONTH)')]
            );

            \Log::debug($affected .' assets affected by audit interval update');

            
        }

        $alert_email = rtrim($request->input('alert_email'), ',');
        $alert_email = trim($alert_email);
        $admin_cc_email = rtrim($request->input('admin_cc_email'), ',');
        $admin_cc_email = trim($admin_cc_email);

        $setting->alert_email = $alert_email;
        $setting->admin_cc_email = $admin_cc_email;
        $setting->alerts_enabled = $request->input('alerts_enabled', '0');
        $setting->alert_interval = $request->input('alert_interval');
        $setting->alert_threshold = $request->input('alert_threshold');
        $setting->audit_interval = $request->input('audit_interval');
        $setting->audit_warning_days = $request->input('audit_warning_days');
        $setting->show_alerts_in_menu = $request->input('show_alerts_in_menu', '0');

        if ($setting->save()) {
            return redirect()->route('settings.index')
                ->with('success', trans('admin/settings/message.update.success'));
        }

        return redirect()->back()->withInput()->withErrors($setting->getErrors());
    }

    /**
     * Return a form to allow a super admin to update settings.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.0]
     *
     * @return View
     */
    public function getSlack()
    {
        $setting = Setting::getSettings();

        return view('settings.slack', compact('setting'));
    }

    /**
     * Return a form to allow a super admin to update settings.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.0]
     *
     * @return View
     */
    public function getAssetTags()
    {
        $setting = Setting::getSettings();

        return view('settings.asset_tags', compact('setting'));
    }

    /**
     * Saves settings from form.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.0]
     *
     * @return View
     */
    public function postAssetTags(Request $request)
    {
        if (is_null($setting = Setting::getSettings())) {
            return redirect()->to('admin')->with('error', trans('admin/settings/message.update.error'));
        }

        $setting->auto_increment_prefix = $request->input('auto_increment_prefix');
        $setting->auto_increment_assets = $request->input('auto_increment_assets', '0');
        $setting->zerofill_count = $request->input('zerofill_count');
        $setting->next_auto_tag_base = $request->input('next_auto_tag_base');

        if ($setting->save()) {
            return redirect()->route('settings.index')
                ->with('success', trans('admin/settings/message.update.success'));
        }

        return redirect()->back()->withInput()->withErrors($setting->getErrors());
    }

    /**
     * Return a form to allow a super admin to update settings.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.0]
     *
     * @return View
     */
    public function getBarcodes()
    {
        $setting = Setting::getSettings();
        $is_gd_installed = extension_loaded('gd');

        return view('settings.barcodes', compact('setting'))->with('is_gd_installed', $is_gd_installed);
    }

    /**
     * Saves settings from form.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.0]
     *
     * @return View
     */
    public function postBarcodes(Request $request)
    {
        if (is_null($setting = Setting::getSettings())) {
            return redirect()->to('admin')->with('error', trans('admin/settings/message.update.error'));
        }

        $setting->qr_code = $request->input('qr_code', '0');
        $setting->alt_barcode = $request->input('alt_barcode');
        $setting->alt_barcode_enabled = $request->input('alt_barcode_enabled', '0');
        $setting->barcode_type = $request->input('barcode_type');
        $setting->qr_text = $request->input('qr_text');

        if ($setting->save()) {
            return redirect()->route('settings.index')
                ->with('success', trans('admin/settings/message.update.success'));
        }

        return redirect()->back()->withInput()->withErrors($setting->getErrors());
    }

    /**
     * Return a form to allow a super admin to update settings.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v4.0]
     *
     * @return View
     */
    public function getPhpInfo()
    {
        if (config('app.debug') === true) {
            return view('settings.phpinfo');
        }

        return redirect()->route('settings.index')
            ->with('error', 'PHP syetem debugging information is only available when debug is enabled in your .env file.');
    }

    /**
     * Return a form to allow a super admin to update settings.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v4.0]
     *
     * @return View
     */
    public function getLabels()
    {
        return view('settings.labels', [
            'setting' => Setting::getSettings(),
            'customFields' => CustomField::all(),
        ]);
    }

    /**
     * Saves settings from form.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v4.0]
     *
     * @return View
     */
    public function postLabels(Request $request)
    {
        if (is_null($setting = Setting::getSettings())) {
            return redirect()->to('admin')->with('error', trans('admin/settings/message.update.error'));
        }
        $setting->label2_enable = $request->input('label2_enable');
        $setting->label2_template = $request->input('label2_template');
        $setting->label2_title = $request->input('label2_title');
        $setting->label2_asset_logo = $request->input('label2_asset_logo');
        $setting->label2_1d_type = $request->input('label2_1d_type');
        $setting->label2_2d_type = $request->input('label2_2d_type');
        $setting->label2_2d_target = $request->input('label2_2d_target');
        $setting->label2_fields = $request->input('label2_fields');
        $setting->labels_per_page = $request->input('labels_per_page');
        $setting->labels_width = $request->input('labels_width');
        $setting->labels_height = $request->input('labels_height');
        $setting->labels_pmargin_left = $request->input('labels_pmargin_left');
        $setting->labels_pmargin_right = $request->input('labels_pmargin_right');
        $setting->labels_pmargin_top = $request->input('labels_pmargin_top');
        $setting->labels_pmargin_bottom = $request->input('labels_pmargin_bottom');
        $setting->labels_display_bgutter = $request->input('labels_display_bgutter');
        $setting->labels_display_sgutter = $request->input('labels_display_sgutter');
        $setting->labels_fontsize = $request->input('labels_fontsize');
        $setting->labels_pagewidth = $request->input('labels_pagewidth');
        $setting->labels_pageheight = $request->input('labels_pageheight');
        $setting->labels_display_company_name = $request->input('labels_display_company_name', '0');
        $setting->labels_display_company_name = $request->input('labels_display_company_name', '0');



        if ($request->filled('labels_display_name')) {
            $setting->labels_display_name = 1;
        } else {
            $setting->labels_display_name = 0;
        }

        if ($request->filled('labels_display_serial')) {
            $setting->labels_display_serial = 1;
        } else {
            $setting->labels_display_serial = 0;
        }

        if ($request->filled('labels_display_tag')) {
            $setting->labels_display_tag = 1;
        } else {
            $setting->labels_display_tag = 0;
        }

        if ($request->filled('labels_display_tag')) {
            $setting->labels_display_tag = 1;
        } else {
            $setting->labels_display_tag = 0;
        }

        if ($request->filled('labels_display_model')) {
            $setting->labels_display_model = 1;
        } else {
            $setting->labels_display_model = 0;
        }

        if ($setting->save()) {
            return redirect()->route('settings.labels.index')
                ->with('success', trans('admin/settings/message.update.success'));
        }

        return redirect()->back()->withInput()->withErrors($setting->getErrors());
    }

    /**
     * Return a form to allow a super admin to update settings.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v4.0]
     *
     * @return View
     */
    public function getLdapSettings()
    {
        $setting = Setting::getSettings();
        $groups = Group::pluck('name', 'id');


        /**
         * This validator is only temporary (famous last words.) - @snipe
         */
        $messages = [
            'ldap_username_field.not_in' => '<code>sAMAccountName</code> (mixed case) will likely not work. You should use <code>samaccountname</code> (lowercase) instead. ',
            'ldap_auth_filter_query.not_in' => '<code>uid=samaccountname</code> is probably not a valid auth filter. You probably want <code>uid=</code> ',
            'ldap_filter.regex' => 'This value should probably not be wrapped in parentheses.',
        ];

        $validator = Validator::make($setting->toArray(), [
            'ldap_username_field' => 'not_in:sAMAccountName',
            'ldap_auth_filter_query' => 'not_in:uid=samaccountname|required_if:ldap_enabled,1',
            'ldap_filter' => 'nullable|regex:"^[^(]"|required_if:ldap_enabled,1',
        ],  $messages);



        return view('settings.ldap', compact('setting', 'groups'))->withErrors($validator);
    }

    /**
     * Saves settings from form.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v4.0]
     *
     * @return View
     */
    public function postLdapSettings(Request $request)
    {
        if (is_null($setting = Setting::getSettings())) {
            return redirect()->to('admin')->with('error', trans('admin/settings/message.update.error'));
        }

        if (! config('app.lock_passwords') === true) {
            $setting->ldap_enabled = $request->input('ldap_enabled', '0');
            $setting->ldap_server = $request->input('ldap_server');
            $setting->ldap_server_cert_ignore = $request->input('ldap_server_cert_ignore', false);
            $setting->ldap_uname = $request->input('ldap_uname');
            if ($request->filled('ldap_pword')) {
                $setting->ldap_pword = Crypt::encrypt($request->input('ldap_pword'));
            }
            $setting->ldap_basedn = $request->input('ldap_basedn');
            $setting->ldap_default_group = $request->input('ldap_default_group');
            $setting->ldap_filter = $request->input('ldap_filter');
            $setting->ldap_username_field = $request->input('ldap_username_field');
            $setting->ldap_lname_field = $request->input('ldap_lname_field');
            $setting->ldap_fname_field = $request->input('ldap_fname_field');
            $setting->ldap_auth_filter_query = $request->input('ldap_auth_filter_query');
            $setting->ldap_version = $request->input('ldap_version', 3);
            $setting->ldap_active_flag = $request->input('ldap_active_flag');
            $setting->ldap_emp_num = $request->input('ldap_emp_num');
            $setting->ldap_email = $request->input('ldap_email');
            $setting->ldap_manager = $request->input('ldap_manager');
            $setting->ad_domain = $request->input('ad_domain');
            $setting->is_ad = $request->input('is_ad', '0');
            $setting->ad_append_domain = $request->input('ad_append_domain', '0');
            $setting->ldap_tls = $request->input('ldap_tls', '0');
            $setting->ldap_pw_sync = $request->input('ldap_pw_sync', '0');
            $setting->custom_forgot_pass_url = $request->input('custom_forgot_pass_url');
            $setting->ldap_phone_field = $request->input('ldap_phone');
            $setting->ldap_jobtitle = $request->input('ldap_jobtitle');
            $setting->ldap_country = $request->input('ldap_country');
            $setting->ldap_location = $request->input('ldap_location');
            $setting->ldap_dept = $request->input('ldap_dept');
            $setting->ldap_client_tls_cert   = $request->input('ldap_client_tls_cert');
            $setting->ldap_client_tls_key    = $request->input('ldap_client_tls_key');


        }

        if ($setting->save()) {
            $setting->update_client_side_cert_files();
            return redirect()->route('settings.ldap.index')
                ->with('success', trans('admin/settings/message.update.success'));
        }

        return redirect()->back()->withInput()->withErrors($setting->getErrors());
    }

    /**
     * Return a form to allow a super admin to update settings.
     *
     * @author Johnson Yi <jyi.dev@outlook.com>
     *
     * @since v5.0.0
     *
     * @return View
     */
    public function getSamlSettings()
    {
        $setting = Setting::getSettings();

        return view('settings.saml', compact('setting'));
    }

    /**
     * Saves settings from form.
     *
     * @author Johnson Yi <jyi.dev@outlook.com>
     *
     * @since v5.0.0
     *
     * @return View
     */
    public function postSamlSettings(SettingsSamlRequest $request)
    {
        if (is_null($setting = Setting::getSettings())) {
            return redirect()->to('admin')->with('error', trans('admin/settings/message.update.error'));
        }

        $setting->saml_enabled = $request->input('saml_enabled', '0');
        $setting->saml_idp_metadata = $request->input('saml_idp_metadata');
        $setting->saml_attr_mapping_username = $request->input('saml_attr_mapping_username');
        $setting->saml_forcelogin = $request->input('saml_forcelogin', '0');
        $setting->saml_slo = $request->input('saml_slo', '0');
        if (! empty($request->input('saml_sp_privatekey'))) {
            $setting->saml_sp_x509cert = $request->input('saml_sp_x509cert');
            $setting->saml_sp_privatekey = $request->input('saml_sp_privatekey');
        }
        if (! empty($request->input('saml_sp_x509certNew'))) {
            $setting->saml_sp_x509certNew = $request->input('saml_sp_x509certNew');
        } else {
            $setting->saml_sp_x509certNew = '';
        }
        $setting->saml_custom_settings = $request->input('saml_custom_settings');

        if ($setting->save()) {
            return redirect()->route('settings.saml.index')
                ->with('success', trans('admin/settings/message.update.success'));
        }

        return redirect()->back()->withInput()->withErrors($setting->getErrors());
    }
    public static function getPDFBranding()
    {
        $pdf_branding= Setting::getSettings();

        return $pdf_branding;
    }


    /**
     * Show Google login settings form
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v6.1.1]
     * @return View
     */
    public function getGoogleLoginSettings()
    {
        $setting = Setting::getSettings();
        return view('settings.google', compact('setting'));
    }

    /**
     * ShSaveow Google login settings form
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v6.1.1]
     * @return View
     */
    public function postGoogleLoginSettings(Request $request)
    {
        if (!config('app.lock_passwords')) {
            $setting = Setting::getSettings();

            $setting->google_login = $request->input('google_login', 0);
            $setting->google_client_id = $request->input('google_client_id');
            $setting->google_client_secret = $request->input('google_client_secret');

            if ($setting->save()) {
                return redirect()->route('settings.index')
                    ->with('success', trans('admin/settings/message.update.success'));
            }

            return redirect()->back()->withInput()->withErrors($setting->getErrors());
        }

        return redirect()->back()->with('error', trans('general.feature_disabled'));
    }


    /**
     * Show the listing of backups.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.8]
     *
     * @return View
     */
    public function getBackups()
    {
        $settings = Setting::getSettings();
        $path = 'app/backups';
        $backup_files = Storage::files($path);
        $files_raw = [];

        if (count($backup_files) > 0) {
            for ($f = 0; $f < count($backup_files); $f++) {

                // Skip dotfiles like .gitignore and .DS_STORE
                if ((substr(basename($backup_files[$f]), 0, 1) != '.')) {
                    //$lastmodified = Carbon::parse(Storage::lastModified($backup_files[$f]))->toDatetimeString();
                    $file_timestamp = Storage::lastModified($backup_files[$f]);

                    $files_raw[] = [
                        'filename' => basename($backup_files[$f]),
                        'filesize' => Setting::fileSizeConvert(Storage::size($backup_files[$f])),
                        'modified_value' => $file_timestamp,
                        'modified_display' => date($settings->date_display_format.' '.$settings->time_display_format, $file_timestamp),
                        
                    ];
                }

               
            }
        }

        // Reverse the array so it lists oldest first
        $files = array_reverse($files_raw);

        return view('settings/backups', compact('path', 'files'));
    }

    /**
     * Process the backup.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.8]
     *
     * @return Redirect
     */
    public function postBackups()
    {
        if (! config('app.lock_passwords')) {
            Artisan::call('snipeit:backup', ['--filename' => 'manual-backup-'.date('Y-m-d-H-i-s')]);
            $output = Artisan::output();

            // Backup completed
            if (! preg_match('/failed/', $output)) {
                return redirect()->route('settings.backups.index')
                    ->with('success', trans('admin/settings/message.backup.generated'));
            }

            $formatted_output = str_replace('Backup completed!', '', $output);
            $output_split = explode('...', $formatted_output);

            if (array_key_exists(2, $output_split)) {
                return redirect()->route('settings.backups.index')->with('error', $output_split[2]);
            }

            return redirect()->route('settings.backups.index')->with('error', $formatted_output);
        }

        return redirect()->route('settings.backups.index')->with('error', trans('general.feature_disabled'));
    }

    /**
     * Download the backup file.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.8]
     *
     * @return Storage
     */
    public function downloadFile($filename = null)
    {
        $path = 'app/backups';

        if (! config('app.lock_passwords')) {
            if (Storage::exists($path.'/'.$filename)) {
                return StorageHelper::downloader($path.'/'.$filename);
            } else {
                // Redirect to the backup page
                return redirect()->route('settings.backups.index')->with('error', trans('admin/settings/message.backup.file_not_found'));
            }
        } else {
            // Redirect to the backup page
            return redirect()->route('settings.backups.index')->with('error', trans('general.feature_disabled'));
        }
    }

    /**
     * Delete the backup file.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v1.8]
     *
     * @return View
     */
    public function deleteFile($filename = null)
    {
        if (config('app.allow_backup_delete')=='true') {

            if (!config('app.lock_passwords')) {
                $path = 'app/backups';

                if (Storage::exists($path . '/' . $filename)) {

                    try {
                        Storage::delete($path . '/' . $filename);
                        return redirect()->route('settings.backups.index')->with('success', trans('admin/settings/message.backup.file_deleted'));
                    } catch (\Exception $e) {
                        \Log::debug($e);
                    }

                } else {
                    return redirect()->route('settings.backups.index')->with('error', trans('admin/settings/message.backup.file_not_found'));
                }
            }

            return redirect()->route('settings.backups.index')->with('error', trans('general.feature_disabled'));
        }

        // Hell to the no
        \Log::warning('User ID '.Auth::user()->id.' is attempting to delete backup file '.$filename.' and is not authorized to.');
        return redirect()->route('settings.backups.index')->with('error', trans('general.backup_delete_not_allowed'));
    }


    /**
     * Uploads a backup file
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v6.0]
     *
     * @return Redirect
     */

    public function postUploadBackup(Request $request) {

        if (! config('app.lock_passwords')) {
            if (!$request->hasFile('file')) {
                return redirect()->route('settings.backups.index')->with('error', 'No file uploaded');
            } else {

                $max_file_size = Helper::file_upload_max_size();
                $validator = Validator::make($request->all(), [
                    'file' => 'required|mimes:zip|max:'.$max_file_size,
                ]);

                if ($validator->passes()) {

                        $upload_filename = 'uploaded-'.date('U').'-'.Str::slug(pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME)).'.zip';

                        Storage::putFileAs('app/backups', $request->file('file'), $upload_filename);
            
                        return redirect()->route('settings.backups.index')->with('success', 'File uploaded');
                }

                return redirect()->route('settings.backups.index')->withErrors($validator);

            }

        } else {
            return redirect()->route('settings.backups.index')->with('error', trans('general.feature_disabled'));
        }    

        
        
    }

    /**
     * Restore the backup file.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v6.0]
     *
     * @return View
     */
    public function postRestore($filename = null)
    {
        
        if (! config('app.lock_passwords')) {
            $path = 'app/backups';

            if (Storage::exists($path.'/'.$filename)) {

                // grab the user's info so we can make sure they exist in the system
                $user = User::find(Auth::user()->id);

                // TODO: run a backup


                Artisan::call('db:wipe', [
                    '--force' => true,
                ]);

                \Log::debug('Attempting to restore from: '. storage_path($path).'/'.$filename);

                // run the restore command
                Artisan::call('snipeit:restore', 
                [
                    '--force' => true, 
                    '--no-progress' => true, 
                    'filename' => storage_path($path).'/'.$filename
                ]);

                // If it's greater than 300, it probably worked
                $output = Artisan::output();

                /* Run migrations */
                \Log::debug('Migrating database...');
                Artisan::call('migrate', ['--force' => true]);
                $migrate_output = Artisan::output();
                \Log::debug($migrate_output);

                $find_user = DB::table('users')->where('username', $user->username)->exists();
                
                if (!$find_user){
                    \Log::warning('Attempting to restore user: ' . $user->username);
                    $new_user = $user->replicate();
                    $new_user->push();
                } else {
                    \Log::debug('User: ' . $user->username .' already exists.');
                }

                \Log::debug('Logging all users out..');
                Artisan::call('snipeit:global-logout', ['--force' => true]);

                DB::table('users')->update(['remember_token' => null]);
                \Auth::logout();

                return redirect()->route('login')->with('success', 'Your system has been restored. Please login again.');
                
            } else {
                return redirect()->route('settings.backups.index')->with('error', trans('admin/settings/message.backup.file_not_found'));
            }
        } else {
            return redirect()->route('settings.backups.index')->with('error', trans('general.feature_disabled'));
        }
    }

    /**
     * Return a form to allow a super admin to update settings.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v4.0]
     *
     * @return View
     */
    public function getPurge()
    {

        \Log::warning('User '.Auth::user()->username.' (ID'.Auth::user()->id.') is attempting a PURGE');

        if (config('app.allow_purge')=='true') {
            return view('settings.purge-form');
        }

        return redirect()->route('settings.index')->with('error', trans('general.purge_not_allowed'));

    }

    /**
     * Purges soft-deletes.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v3.0]
     *
     * @return View
     */
    public function postPurge(Request $request)
    {
        \Log::warning('User '.Auth::user()->username.' (ID'.Auth::user()->id.') is attempting a PURGE');

        if (config('app.allow_purge')=='true') {
            \Log::debug('Purging is not allowed via the .env');

            if (!config('app.lock_passwords')) {

                if ($request->input('confirm_purge')=='DELETE') {

                    \Log::warning('User ID ' . Auth::user()->id . ' initiated a PURGE!');
                    // Run a backup immediately before processing
                    Artisan::call('backup:run');
                    Artisan::call('snipeit:purge', ['--force' => 'true', '--no-interaction' => true]);
                    $output = Artisan::output();

                    return redirect()->route('settings.index')
                        ->with('output', $output)->with('success', trans('admin/settings/message.purge.success'));

                } else {
                    return redirect()->route('settings.purge.index')
                        ->with('error', trans('admin/settings/message.purge.validation_failed'));
                }
            } else {
                return redirect()->route('settings.index')
                    ->with('error', trans('general.feature_disabled'));
            }
        }

        \Log::error('User '.Auth::user()->username.' (ID'.Auth::user()->id.') is attempting to purge deleted data and is not authorized to.');


        // Nope.
        return redirect()->route('settings.index')
            ->with('error', trans('general.purge_not_allowed'));
    }

    /**
     * Returns a page with the API token generation interface.
     *
     * We created a controller method for this because closures aren't allowed
     * in the routes file if you want to be able to cache the routes.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v4.0]
     *
     * @return View
     */
    public function api()
    {
        return view('settings.api');
    }

    /**
     * Test the email configuration.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     *
     * @since [v3.0]
     *
     * @return Redirect
     */
    public function ajaxTestEmail()
    {
        try {
            (new User())->forceFill([
                'name'  => config('mail.from.name'),
                'email' => config('mail.from.address'),
            ])->notify(new MailTest());

            return response()->json(Helper::formatStandardApiResponse('success', null, 'Maiol sent!'));
        } catch (Exception $e) {
            return response()->json(Helper::formatStandardApiResponse('success', null, $e->getMessage()));
        }
    }

    public function getLoginAttempts()
    {
        return view('settings.logins');
    }
}

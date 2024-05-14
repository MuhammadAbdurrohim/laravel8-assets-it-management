<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\ImageUploadRequest;
use App\Models\Actionlog;
use App\Models\Asset;
use App\Models\Manufacturer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;

/**
 * This controller handles all actions related to Manufacturers for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class ManufacturersController extends Controller
{
    /**
     * Returns a view that invokes the ajax tables which actually contains
     * the content for the manufacturers listing, which is generated in getDatatable.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @see Api\ManufacturersController::index() method that generates the JSON response
     * @since [v1.0]
     * @return \Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', Manufacturer::class);

        return view('manufacturers/index');
    }

    /**
     * Returns a view that displays a form to create a new manufacturer.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @see ManufacturersController::store()
     * @since [v1.0]
     * @return \Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Manufacturer::class);

        return view('manufacturers/edit')->with('item', new Manufacturer);
    }

    /**
     * Validates and stores the data for a new manufacturer.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @see ManufacturersController::create()
     * @since [v1.0]
     * @param ImageUploadRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(ImageUploadRequest $request)
    {
        $this->authorize('create', Manufacturer::class);
        $manufacturer = new Manufacturer;
        $manufacturer->name = $request->input('name');
        $manufacturer->user_id = Auth::id();
        $manufacturer->url = $request->input('url');
        $manufacturer->support_url = $request->input('support_url');
        $manufacturer->warranty_lookup_url = $request->input('warranty_lookup_url');
        $manufacturer->support_phone = $request->input('support_phone');
        $manufacturer->support_email = $request->input('support_email');
        $manufacturer = $request->handleImages($manufacturer);

        if ($manufacturer->save()) {
            return redirect()->route('manufacturers.index')->with('success', trans('admin/manufacturers/message.create.success'));
        }

        return redirect()->back()->withInput()->withErrors($manufacturer->getErrors());
    }

    /**
     * Returns a view that displays a form to edit a manufacturer.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @see ManufacturersController::update()
     * @param int $manufacturerId
     * @since [v1.0]
     * @return \Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($manufacturerId = null)
    {
        // Handles manufacturer checks and permissions.
        $this->authorize('update', Manufacturer::class);

        // Check if the manufacturer exists
        if (! $item = Manufacturer::find($manufacturerId)) {
            return redirect()->route('manufacturers.index')->with('error', trans('admin/manufacturers/message.does_not_exist'));
        }

        // Show the page
        return view('manufacturers/edit', compact('item'));
    }

    /**
     * Validates and stores the updated manufacturer data.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @see ManufacturersController::getEdit()
     * @param Request $request
     * @param int $manufacturerId
     * @return \Illuminate\Http\RedirectResponse
     * @since [v1.0]
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(ImageUploadRequest $request, $manufacturerId = null)
    {
        $this->authorize('update', Manufacturer::class);
        // Check if the manufacturer exists
        if (is_null($manufacturer = Manufacturer::find($manufacturerId))) {
            // Redirect to the manufacturer  page
            return redirect()->route('manufacturers.index')->with('error', trans('admin/manufacturers/message.does_not_exist'));
        }

        // Save the data
        $manufacturer->name = $request->input('name');
        $manufacturer->url = $request->input('url');
        $manufacturer->support_url = $request->input('support_url');
        $manufacturer->warranty_lookup_url = $request->input('warranty_lookup_url');
        $manufacturer->support_phone = $request->input('support_phone');
        $manufacturer->support_email = $request->input('support_email');

        // Set the model's image property to null if the image is being deleted
        if ($request->input('image_delete') == 1) {
            $manufacturer->image = null;
        }

        $manufacturer = $request->handleImages($manufacturer);

        if ($manufacturer->save()) {
            return redirect()->route('manufacturers.index')->with('success', trans('admin/manufacturers/message.update.success'));
        }

        return redirect()->back()->withInput()->withErrors($manufacturer->getErrors());
    }

    /**
     * Deletes a manufacturer.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @param int $manufacturerId
     * @since [v1.0]
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($manufacturerId)
    {
        $this->authorize('delete', Manufacturer::class);
        if (is_null($manufacturer = Manufacturer::withTrashed()->withCount('models as models_count')->find($manufacturerId))) {
            return redirect()->route('manufacturers.index')->with('error', trans('admin/manufacturers/message.not_found'));
        }

        if (! $manufacturer->isDeletable()) {
            return redirect()->route('manufacturers.index')->with('error', trans('admin/manufacturers/message.assoc_users'));
        }

        if ($manufacturer->image) {
            try {
                Storage::disk('public')->delete('manufacturers/'.$manufacturer->image);
            } catch (\Exception $e) {
                \Log::info($e);
            }
        }

        // Soft delete the manufacturer if active, permanent delete if is already deleted
        if ($manufacturer->deleted_at === null) {
            $manufacturer->delete();
        } else {
            $manufacturer->forceDelete();
        }
        // Redirect to the manufacturers management page
        return redirect()->route('manufacturers.index')->with('success', trans('admin/manufacturers/message.delete.success'));
    }

    /**
     * Returns a view that invokes the ajax tables which actually contains
     * the content for the manufacturers detail listing, which is generated via API.
     * This data contains a listing of all assets that belong to that manufacturer.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @param int $manufacturerId
     * @since [v1.0]
     * @return \Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($manufacturerId = null)
    {
        $this->authorize('view', Manufacturer::class);
        $manufacturer = Manufacturer::find($manufacturerId);

        if (isset($manufacturer->id)) {
            return view('manufacturers/view', compact('manufacturer'));
        }

        $error = trans('admin/manufacturers/message.does_not_exist');
        // Redirect to the user management page
        return redirect()->route('manufacturers.index')->with('error', $error);
    }

    /**
     * Restore a given Manufacturer (mark as un-deleted)
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v4.1.15]
     * @param int $manufacturers_id
     * @return Redirect
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function restore($id)
    {
        $this->authorize('delete', Manufacturer::class);

        if ($manufacturer = Manufacturer::withTrashed()->find($id)) {

            if ($manufacturer->deleted_at == '') {
                return redirect()->back()->with('error', trans('general.not_deleted', ['item_type' => trans('general.manufacturer')]));
            }

            if ($manufacturer->restore()) {
                $logaction = new Actionlog();
                $logaction->item_type = Manufacturer::class;
                $logaction->item_id = $manufacturer->id;
                $logaction->created_at = date('Y-m-d H:i:s');
                $logaction->user_id = Auth::user()->id;
                $logaction->logaction('restore');

                // Redirect them to the deleted page if there are more, otherwise the section index
                $deleted_manufacturers = Manufacturer::onlyTrashed()->count();
                if ($deleted_manufacturers > 0) {
                    return redirect()->back()->with('success', trans('admin/manufacturers/message.success.restored'));
                }
                return redirect()->route('manufacturers.index')->with('success', trans('admin/manufacturers/message.restore.success'));
            }

            // Check validation to make sure we're not restoring an asset with the same asset tag (or unique attribute) as an existing asset
            return redirect()->back()->with('error', trans('general.could_not_restore', ['item_type' => trans('general.manufacturer'), 'error' => $manufacturer->getErrors()->first()]));
        }

        return redirect()->route('manufacturers.index')->with('error', trans('admin/manufacturers/message.does_not_exist'));

    }
}

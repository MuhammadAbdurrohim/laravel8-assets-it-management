<?php

namespace App\Http\Controllers\Components;

use App\Helpers\StorageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\UploadFileRequest;
use App\Models\Actionlog;
use App\Models\Component;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\JsonResponse;

class ComponentsFilesController extends Controller
{
    /**
     * Validates and stores files associated with a component.
     *
     * @param UploadFileRequest $request
     * @param int $componentId
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *@author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v1.0]
     * @todo Switch to using the AssetFileRequest form request validator.
     */
    public function store(UploadFileRequest $request, $componentId = null)
    {

        if (config('app.lock_passwords')) {
            return redirect()->route('components.show', ['component'=>$componentId])->with('error', trans('general.feature_disabled'));
        }

        $component = Component::find($componentId);

        if (isset($component->id)) {
            $this->authorize('update', $component);

            if ($request->hasFile('file')) {
                if (! Storage::exists('private_uploads/components')) {
                    Storage::makeDirectory('private_uploads/components', 775);
                }

                foreach ($request->file('file') as $file) {
                    $file_name = $request->handleFile('private_uploads/components/','component-'.$component->id, $file);

                    //Log the upload to the log
                    $component->logUpload($file_name, e($request->input('notes')));
                }


                return redirect()->route('components.show', $component->id)->with('success', trans('general.file_upload_success'));

            }

            return redirect()->route('components.show', $component->id)->with('error', trans('general.no_files_uploaded'));
        }
        // Prepare the error message
        return redirect()->route('components.index')
            ->with('error', trans('general.file_does_not_exist'));
    }

    /**
     * Deletes the selected component file.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v1.0]
     * @param int $componentId
     * @param int $fileId
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($componentId = null, $fileId = null)
    {
        $component = Component::find($componentId);

        // the asset is valid
        if (isset($component->id)) {
            $this->authorize('update', $component);
            $log = Actionlog::find($fileId);

            // Remove the file if one exists
            if (Storage::exists('components/'.$log->filename)) {
                try {
                    Storage::delete('components/'.$log->filename);
                } catch (\Exception $e) {
                    \Log::debug($e);
                }
            }

            $log->delete();

            return redirect()->back()
                ->with('success', trans('admin/hardware/message.deletefile.success'));
        }

        // Redirect to the licence management page
        return redirect()->route('components.index')->with('error', trans('general.file_does_not_exist'));
    }

    /**
     * Allows the selected file to be viewed.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v1.4]
     * @param int $componentId
     * @param int $fileId
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($componentId = null, $fileId = null)
    {
        \Log::debug('Private filesystem is: '.config('filesystems.default'));
        $component = Component::find($componentId);

        // the component is valid
        if (isset($component->id)) {
            $this->authorize('view', $component);
            $this->authorize('components.files', $component);

            if (! $log = Actionlog::whereNotNull('filename')->where('item_id', $component->id)->find($fileId)) {
                return response('No matching record for that asset/file', 500)
                    ->header('Content-Type', 'text/plain');
            }

            $file = 'private_uploads/components/'.$log->filename;

            if (Storage::missing($file)) {
                \Log::debug('FILE DOES NOT EXISTS for '.$file);
                \Log::debug('URL should be '.Storage::url($file));

                return response('File '.$file.' ('.Storage::url($file).') not found on server', 404)
                    ->header('Content-Type', 'text/plain');
            } else {

                // Display the file inline
                if (request('inline') == 'true') {
                    $headers = [
                        'Content-Disposition' => 'inline',
                    ];
                    return Storage::download($file, $log->filename, $headers);
                }

                if (config('filesystems.default') == 'local') { // TODO - is there any way to fix this at the StorageHelper layer?
                    return StorageHelper::downloader($file);
                } 
            }
        }

        return redirect()->route('components.index')->with('error', trans('general.file_does_not_exist', ['id' => $fileId]));
    }
}

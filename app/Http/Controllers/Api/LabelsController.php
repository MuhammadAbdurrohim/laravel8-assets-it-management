<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Transformers\LabelsTransformer;
use App\Models\Labels\Label;
use Illuminate\Http\Request;
use Illuminate\Support\ItemNotFoundException;
use Auth;

class LabelsController extends Controller
{
    /**
     * Returns JSON listing of all labels.
     *
     * @author Grant Le Roux <grant.leroux+snipe-it@gmail.com>
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $this->authorize('view', Label::class);

        $labels = Label::find();

        if ($request->filled('search')) {
            $search = $request->get('search');
            $labels = $labels->filter(function ($label, $index) use ($search) {
                return stripos($label->getName(), $search) !== false;
            });
        }

        $total = $labels->count();

        $offset = $request->get('offset', 0);
        $offset = ($offset > $total) ? $total : $offset;

        $maxLimit = config('app.max_results');
        $limit = $request->get('limit', $maxLimit);
        $limit = ($limit > $maxLimit) ? $maxLimit : $limit;
        
        $labels = $labels->skip($offset)->take($limit);

        return (new LabelsTransformer)->transformLabels($labels, $total, $request);
    }

    /**
     * Returns JSON with information about a label for detail view.
     *
     * @author Grant Le Roux <grant.leroux+snipe-it@gmail.com>
     * @param  string  $labelName
     * @return JsonResponse
     */
    public function show(string $labelName)
    {
        $labelName = str_replace('/', '\\', $labelName);
        try {
            $label = Label::find($labelName);
        } catch(ItemNotFoundException $e) {
            return response()
                ->json(
                    Helper::formatStandardApiResponse('error', null, trans('admin/labels/message.does_not_exist')), 
                    404
                );
        }
        $this->authorize('view', $label);
        return (new LabelsTransformer)->transformLabel($label);
    }

}

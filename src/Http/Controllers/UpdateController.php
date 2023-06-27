<?php

namespace Tots\Page\Http\Controllers;

use Illuminate\Http\Request;
use Tots\Core\Helpers\StringHelper;
use Tots\Page\Models\TotsPage;

class UpdateController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($id, Request $request)
    {
        $item = TotsPage::where('id', $id)->first();
        if($item === null) {
            throw new \Exception('Item not exist');
        }
        // Process validations
        $this->validate($request, [
            'title' => 'required|min:3'
        ]);
        // Update values
        $item->language_id = $request->input('language_id');
        $item->title = $request->input('title');
        $item->slug = StringHelper::createSlug($request->input('title'));
        $item->type = $request->input('type');
        $item->content = $request->input('content');
        $item->data = $request->input('data');
        // Save new model
        $item->save();
        // Return data
        return $item;
    }
}
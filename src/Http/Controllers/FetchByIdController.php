<?php

namespace Tots\Page\Http\Controllers;

use Illuminate\Http\Request;
use Tots\Page\Models\TotsPage;

class FetchByIdController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($id, Request $request)
    {
        $item = TotsPage::where('id', $id)->first();
        if($item === null) {
            throw new \Exception('Item not exist');
        }
        return $item;
    }
}
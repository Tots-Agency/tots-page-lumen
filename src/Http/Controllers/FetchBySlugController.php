<?php

namespace Tots\Page\Http\Controllers;

use Illuminate\Http\Request;
use Tots\Page\Models\TotsPage;

class FetchBySlugController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($slug, Request $request)
    {
        $item = TotsPage::where('slug', $slug)->first();
        if($item === null) {
            throw new \Exception('Item not exist');
        }
        return $item;
    }
}
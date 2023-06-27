<?php

namespace Tots\Page\Http\Controllers;

use Illuminate\Http\Request;
use Tots\Page\Models\TotsPage;

class ListController extends \Laravel\Lumen\Routing\Controller
{
    public function handle(Request $request)
    {
        // Create query
        $elofilter = \Tots\EloFilter\Query::run(TotsPage::class, $request);
        // Custom filters
        //$elofilter->getQueryRequest()->addWhere('id', 2);
        // Execute query
        return $elofilter->execute();
    }
}
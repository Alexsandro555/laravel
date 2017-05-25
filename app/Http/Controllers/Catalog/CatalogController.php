<?php

namespace App\Http\Controllers\Catalog;

use App\Catalog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogController extends Controller
{
    /**
     *
     * Add Page
     *
     * @return \Illuminate\Http\Response
     */
    public function addCatalog()
    {
        $parent_catalog = Catalog::where('id','>',0)->select(['id'])->get();
        return view('catalog.add', compact('parent_catalog'));
    }

    /**
     *
     * Add Page Handler
     * @param Request $request
     * @return \Illuminate\Http\Redirect
     */
    public function addCatalogHandler(Request $request)
    {
        $catalog = new Catalog;
        $request = $request->all();
        $catalog->title = $request["name"];
        $catalog->url_key = $request["url_key"];
        $catalog->description = $request["description"];
        $catalog->sort = $request["sort"];
        $catalog->active = $request["active"];
        echo '<pre>';
        print_r($request["parent"]);
        echo '</pre>';
    }

}

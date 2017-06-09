<?php
namespace App\Http\Controllers\Product;

use App\Product;
use App\ProductPhoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;

class ProductController extends Controller
{
    public function add()
    {
        /**
         *
         * Add Product
         *
         * @return \Illuminate\Http\Response
         */
        return view('product.add');
    }

    /**
     *
     * Add Product Handler
     * @param StoreProductRequest $productRequest
     * @return \Illuminate\Http\Redirect
     */
    public function addHandler(StoreProductRequest $productRequest)
    {
        $request = $productRequest->all();
        $product = Product::create($request);
        /*$product = new Product;
        $product->title = $request->input("title");
        $product->url_key = $request->input("url_key");
        $product->price = $request->input("price");
        $product->qty = $request->input("qty");
        $product->active = ($request->has('warranty'))? true : false;
        $product->sort = ($request->has('sort')) ? true : false;
        $product->onsale = ($request)->has('onsale') ? true : false;
        $product->special = ($request)->has('special') ? true : false;
        $product->need_order = ($request)->has('need_order') ? true : false;
        $product->save();*/
        $id = $product->id;
        if($productRequest->session()->exists('images'))
        {
            $images = $productRequest->session()->get('images');
            foreach ($images["id"] as $image_id)
            {
                ProductPhoto::where('id', $image_id)->update(['product_id' => $id]);
            }
        }
        return redirect()->route('update-product',['id' => $id]);
    }


    /**
     *  Update Product
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        try
        {
            $id = (int)$id;
            $product = Product::where('id',$id)->firstOrFail();
            return view('product.add', compact('product'));
        }
        catch (ModelNotFoundException $e)
        {
            //dd(get_class_methods($e));
            //dd($e);
        }
    }
}
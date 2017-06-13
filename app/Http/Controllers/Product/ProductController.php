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
        $id = (int)$id;
        $product = Product::where('id',$id)->firstOrFail();
        return view('product.add', compact('product'));
    }

       /**
     *  Get Image
     * @param int $id
     * @return \Illuminate\Http\Response:json
     */
    public function getPhoto($id)
    {
        $id = (int)$id;
        $image = ProductPhoto::where('product_id',$id)->get();
        return response()->json($image,200);
    }
}
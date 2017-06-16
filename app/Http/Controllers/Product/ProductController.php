<?php
namespace App\Http\Controllers\Product;

use App\Product;
use App\ProductPhoto;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

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
        if(session("images"))
        {
            session(['images' => []]);
        }
        $category_all = Category::all()->pluck('title','id');
        return view('product.add', compact('category_all'));
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
            $productRequest->session()->forget('images');
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
        $category_all = Category::all()->pluck('title','id');
        return view('product.add', compact('product','category_all'));
    }

    /**
     *
     * Update Product Handl
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\Redirect
     */
    public function updateHandler($id, UpdateProductRequest $request)
    {
        $id = (int)$id;
        $productRequest = $request->except('_token');
        Product::where('id', $id)->update($productRequest);
        if($request->session()->exists('images'))
        {
            $images = $request->session()->get('images');
            foreach ($images["id"] as $image_id)
            {
                ProductPhoto::where('id', $image_id)->update(['product_id' => $id]);
            }
            $request->session()->forget('images');
        }
        return redirect()->route('wacker');
    }

    /**
     *
     * Delete Product
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
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

    /**
     *  Delete Image
     * @param int $id
     * @return \Illuminate\Http\Response:json
     */
    public function deletePhoto($id)
    {
        $id = (int)$id;
        $image = ProductPhoto::find($id);
        $image->delete();
        return response()->json([],200);
    }
}
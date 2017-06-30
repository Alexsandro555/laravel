<?php
namespace App\Http\Controllers\Product;

use App\Product;
use App\ProductPhoto;
use App\ProductAttribute;
use App\ProductAttributeValue;
use App\Category;
use App\TypeProduct;
use App\Producer;
use App\ProducerTypeProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Requests\Product\AttributeRequest;
use Mockery\Matcher\Type;

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
        $attributes = Product::find($id)->productAttributeValue;
        $category_all = Category::all()->pluck('title','id');
        return view('product.add', compact('product','category_all','attributes'));
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


    /**
     * Add Attribute
     */
    public function addAttribute()
    {
        return view('product.addAttribute');
    }

    /**
     *
     * Add Attribute Handler
     * @param AttributeRequest $attributeRequest
     * @return \Illuminate\Http\Redirect
     */
    public function addAttributeHandler(AttributeRequest $attributeRequest)
    {
        $request = $attributeRequest->all();
        $attribute = ProductAttribute::create($request);
        $id = $attribute->id;
        return redirect()->route('wacker');
    }


    /**
     * Get All Attributes
     * @return json
     */
    public function getAllAttributes()
    {
        $attributes = ProductAttribute::all();
        return $attributes->toJson();
    }


    /**
     * Add Atributes Value
     */
    public function addAttributeValue($data) {
        $productsAttrVal = new ProductAttributeValue();
        foreach ($data as $item)
        {
            $productsAttrVal->attribute_id = $item->id;
            $productsAttrVal->value = $item->value;
            $productsAttrVal->save();
        }
        //return redirect()->route('wacker');
    }


    /**
     * Get All Type Product
     */
    public function allTypeProduct() {
        $type_products = TypeProduct::all();
        return $type_products->toJson();
    }

    public function lines() {
        $arrTypeProducts = array();
        $arrProducers = array();
        $arrProducerTypeProducts_ = array();
        $type_products = TypeProduct::all()->sortBy("sort");
        foreach ($type_products as $type_product) {
            $arrTypeProducts[$type_product->id]["id"] = $type_product->id;
            $arrTypeProducts[$type_product->id]["title"] = $type_product->title;
            $arrTypeProducts[$type_product->id]["sort"] = $type_product->sort;
            foreach(TypeProduct::find($type_product->id)->producers()->orderBy('sort')->get() as $producer) {
                $arrProducers[$type_product->id][$producer->id]["id"] = $producer->id;
                $arrProducers[$type_product->id][$producer->id]["title"] = $producer->title;
                $arrProducers[$type_product->id][$producer->id]["sort"] = $producer->sort;
            }
            $prodTypeProds = ProducerTypeProduct::where('type_product_id',$type_product->id)->orderBy('sort')->get();
            foreach ($prodTypeProds as $prodTypeProd) {
                $arrProducerTypeProducts[$type_product->id][$prodTypeProd->id]["id"] = $prodTypeProd->id;
                $arrProducerTypeProducts[$type_product->id][$prodTypeProd->id]["title"] = $prodTypeProd->name_line;
                $arrProducerTypeProducts[$type_product->id][$prodTypeProd->id]["sort"] = $prodTypeProd->sort;
            }
        }

        return view('product.lines', compact('arrProducers','arrTypeProducts','arrProducerTypeProducts'));
    }

    public function line() {
        $arrTypeProducts = array();
        $arrProducers = array();
        $arrProducerTypeProducts_ = array();
        $type_products = TypeProduct::all();
        foreach ($type_products as $type_product) {
            $arrTypeProducts[$type_product->id] = $type_product->title;
            foreach(TypeProduct::find($type_product->id)->producers as $producer) {
                $arrProducers[$type_product->id][$producer->id]["title"] = $producer->title;
                $arrProducers[$type_product->id][$producer->id]["sort"] = $producer->sort;
            }
            $prodTypeProds = ProducerTypeProduct::where('type_product_id',$type_product->id)->get();
            foreach ($prodTypeProds as $prodTypeProd) {
                $arrProducerTypeProducts[$type_product->id][$prodTypeProd->id]["title"] = $prodTypeProd->name_line;
                $arrProducerTypeProducts[$type_product->id][$prodTypeProd->id]["sort"] = $prodTypeProd->sort;
            }
        }

        return view('product.line', compact('arrProducers','arrTypeProducts','arrProducerTypeProducts'));
    }

}
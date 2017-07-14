<?php
namespace App\Http\Controllers\Product;

use App\AttributeTypeProduct;
use App\Product;
use App\ProductPhoto;
use App\Attribute;
use App\ProductAttributeValue;
use App\Category;
use App\TypeProduct;
use App\Producer;
use App\File;
use App\ProducerTypeProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Requests\Product\CsvRequest;
use App\Http\Requests\Product\AttributeRequest;
use Mockery\Matcher\Type;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     *
     * Add Product
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $category_all = Category::all()->pluck('title','id');
        $typeProductAll = TypeProduct::all()->pluck('title','id');
        $typeProducts = TypeProduct::all();
        $productLine = array();
        foreach($typeProducts as $typeProduct) {
            foreach ($typeProduct->producers as $producer) {
                $tempArr = [];
                $tempArr['id'] = $producer->pivot->id;
                $tempArr['title'] = $producer->pivot->name_line;
                $productLine[] = $tempArr;
            }
        }
        $productLine = json_encode($productLine);
        return view('product.add', compact('category_all','productLine', 'typeProductAll'));
    }

    /**
     *
     * Add Product Handler
     * @param StoreProductRequest $productRequest
     * @return \Illuminate\Http\Redirect
     */
    public function addHandler(StoreProductRequest $productRequest)
    {
        $files_id = $productRequest->files_ids;
        $arr_id = json_decode($files_id);
        $model_name = $productRequest->model;
        $request = $productRequest->all();
        $product = Product::create($request);
        $id = $product->id;
        foreach ($arr_id as $item) {
             File::where('id', $item)->update(['fileable_id'=>$id, 'fileable_type'=>$model_name]);
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
        $type_product_id = Product::where('id',$id)->pluck('type_product_id')->first();
        if(!$type_product_id) {
            $prodTypeProd = Product::find($id);
            $type_product_id=$prodTypeProd->producer_type_product->type_product_id;
        }
        $attributes = TypeProduct::find($type_product_id)->attributes()->get();
        $category_all = Category::all()->pluck('title','id');
        $typeProducts = TypeProduct::all();
        $productLine = array();
        foreach($typeProducts as $typeProduct) {
            foreach ($typeProduct->producers as $producer) {
                $tempArr = [];
                $tempArr['id'] = $producer->pivot->id;
                $tempArr['title'] = $producer->pivot->name_line;
                $productLine[] = $tempArr;
            }
        }
        $typeProductAll = TypeProduct::all()->pluck('title','id');
        $productLine = json_encode($productLine);
        return view('product.add', compact('product','category_all','attributes','productLine','typeProductAll'));
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
     * Set Attributes
     */
    public function setAttributes()
    {
        $arrTypeProducts = array();
        $arrTypeProducts = TypeProduct::all()->sortBy("sort");
        $arrTypeProducts = $arrTypeProducts->toJson();
        return view('product.setAttributes', compact('arrTypeProducts'));
    }


    /**
     * Add Attribute
     */
    public function addAttribute()
    {
        $arrTypeProducts = array();
        $arrTypeProducts = TypeProduct::all()->sortBy("sort");
        $arrTypeProducts = $arrTypeProducts->toJson();
        return view('product.addAttribute', compact('arrTypeProducts'));
    }

    /**
     *
     * Add Attribute Handler
     * @param AttributeRequest $attributeRequest
     * @return \Illuminate\Http\Redirect
     */
    public function addAttributeHandler(AttributeRequest $attributeRequest)
    {
        /*$request = $attributeRequest->all();
        $attribute = ProductAttribute::create($request);
        $id = $attribute->id;
        return redirect()->route('wacker');*/
    }

    /**
     *
     * Update Attribute
     * @param Request $request
     * @return \Illuminate\Http\Redirect
     */
    public function updateAttribute(Request $request)
    {
        $product_id = $request->product_id;
        $attributes = $request->All();
        $product = Product::find($product_id);
        foreach ($attributes as $key=>$attribute)
        {
            if($key!=='_token' && $key!=='product_id')
            {
                $attribute_id = Attribute::where('alias',$key)->pluck('id')->first();
                $product->attributes()->attach($attribute_id,['value'=> $attribute]);
            }
        }
        return redirect()->route('update-product',['id' => $product_id]);
    }

    /**
     * Get All Attributes
     * @return json
     */
    public function getAllAttributes()
    {
        $attributes = Attribute::all();
        return $attributes->toJson();
    }

    /**
     * Get Attributes
     * @return json
     */
    public function getAttributes($id)
    {
        $attributes = AttributeTypeProduct::where('type_product_id',$id)->get();
        return $attributes->toJson();
    }


    /**
     * Add Atributes Value
     */
    public function addAttributeValue($data) {
        $attributes_values = json_decode($data,true);
        foreach ($attributes_values as $item)
        {
            $AttrTypeVal = new AttributeTypeProduct();
            $AttrTypeVal->attribute_id = $item["id"];
            $AttrTypeVal->value = $item["value"];
            $AttrTypeVal->type_product_id = $item["type_product_id"];
            $AttrTypeVal->save();
        }
        return response()->json([],200);
    }

    /**
 * Bind Attributes
 */
    public function bindAttributes($attributes) {
        $attributes = json_decode($attributes, true);
        foreach ($attributes as $item)
        {
            $AttrTypeVal = new AttributeTypeProduct;
            $AttrTypeVal->attribute_id = $item["attribute_id"];
            $AttrTypeVal->type_product_id = $item["type_product_id"];
            $AttrTypeVal->save();
        }
        return response()->json([],200);
    }

    /**
     * Bind Attributes Update
     */
    public function bindAttributesUpdate($attributes,$id) {
        $attributes = json_decode($attributes, true);
        $delRelations = AttributeTypeProduct::where('type_product_id',$id)->get();
        foreach ($delRelations as $delRelation)
        {
            $delRelation->delete();
        }
        foreach ($attributes as $item)
        {
            $AttrTypeVal = new AttributeTypeProduct;
            $AttrTypeVal->attribute_id = $item["attribute_id"];
            $AttrTypeVal->type_product_id = $item["type_product_id"];
            $AttrTypeVal->save();
        }
        return response()->json([],200);
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
        $arrProducerTypeProducts = array();
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


    /**
     * Upload TNVED csv
     */
    public function uploadCsv() {
        return view('product.uploadcsv');
    }

    /**
     * HandlerUploadCsv
     * @param Request $request
     */
    public function uploadCsvHandler(CsvRequest $request) {
        $file = $request->tnved;
        $uploadSuccess = $file->move( "../public/images/csv/", "tnved.csv" );
        $SqlStr = '';
        if (($handle = fopen("../public/images/csv/tnved.csv", "r")) !== FALSE)
        {
            while (($data = fgetcsv($handle, 5000, ";")) !== FALSE)
            {
                $tnved = DB::table('tnved')->insert(['title' => $data[0], 'service' => $data[1],'active' => $data[2]]);
            }
            echo "Успешно загружено";
            return;
        }
        echo "Загрузка не удалась, не найден файл";
        return;
    }


}
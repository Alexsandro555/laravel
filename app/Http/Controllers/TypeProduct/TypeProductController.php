<?php
namespace App\Http\Controllers\TypeProduct;

use App\Http\Controllers\Controller;
use App\Tnved;
use App\TypeProduct;
use App\FileHandler;
use App\Http\Requests\Product\StoreTypeProductRequest;
use App\Http\Requests\Product\UpdateTypeProductRequest;
use App\File;
use Illuminate\Http\Request;

class TypeProductController extends Controller
{
  /**
   *
   * Add TypeProduct
   */
  public function add()
  {
    $tnved = Tnved::all()->pluck('title','id');
    return view('product.typeProduct.add', compact('tnved'));
  }

  /**
   *
   * Add TypeProduct Handler
   * @param StoreTypeProductRequest $typeProductRequest
   * @return \Illuminate\Http\Redirect
   */
  public function addHandler(StoreTypeProductRequest $typeProductRequest)
  {
    $request = $typeProductRequest->except(['_token','file']);
    $typeProduct = TypeProduct::create($request);
    $id = $typeProduct->id;
    $file = $typeProductRequest->file('file');
    $fileHandler = new FileHandler();
    $fileHandler->upload($file, true, 'App\TypeProduct',$id, 72, 89);
    return redirect()->route('type-product-update',['id' => $id]);
  }

  /**
   *  Update TypeProduct
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function update($id)
  {
    $id = (int)$id;
    $tnved = Tnved::all()->pluck('title','id');
    $typeProduct = TypeProduct::find($id);
    $file = File::where('fileable_id',$id)->where('fileable_type','App\TypeProduct')->first();
    return view('product.typeProduct.add', compact('typeProduct', 'file', 'tnved'));
  }

  /**
   *
   * Update Type Product Handl
   * @param int $id
   * @param Request $request
   * @return \Illuminate\Http\Redirect
   */
  public function updateHandler($id, UpdateTypeProductRequest $request)
  {
    $file = $request->file;
    $id = (int)$id;
    $typeProductRequest = $request->except('_token','file');
    TypeProduct::where('id', $id)->update($typeProductRequest);
    if($file) {
      $currentFile = File::where('fileable_id',$id)->where('fileable_type','App\TypeProduct')->first();
      if($currentFile)
      {
        $currentFile->delete();
      }
      $fileHandler = new FileHandler();
      $fileHandler->upload($file, true, 'App\TypeProduct',$id, 72, 89);
    }
    return redirect()->route('list-categories',['id' => 1]);
  }


  /**
   * List Type Products
   * @return \Illuminate\Http\Response
   */
  public function showList() {
    $typeProducts = TypeProduct::All();
    return view('product.typeProduct.list',compact('typeProducts'));
  }
}
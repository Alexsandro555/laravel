<?php
namespace App\Http\Controllers;

use App\File;
use App\ProducerTypeProduct;
use App\TypeProduct;
use App\Product;

class WackerController extends Controller
{
    public function index() {
      $typeProducts = TypeProduct::with('files')->get();
      return view('wacker.index', compact('typeProducts'));
    }

    public function catalog($id) {
      $typeProduct = TypeProduct::find($id);
      $producerTypeProducts = ProducerTypeProduct::with('files')->where('type_product_id',$id)->get();
      $productLine = [];
      foreach ($producerTypeProducts as $producerTypeProduct)
      {
        $tempArr['products'] = Product::with('files')->where('producer_type_product_id',$producerTypeProduct->id)->get();
        if($tempArr['products']->first())
        {
          $tempArr['id'] = $producerTypeProduct->id;
          $tempArr['title']= $producerTypeProduct->name_line;
          $productLine[] = $tempArr;
        }
      }
      return view('wacker.catalog', compact('producerTypeProducts','productLine', 'typeProduct'));
    }

    public function detail() {
        return view('wacker.detail');
    }
}
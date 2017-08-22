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
      $producerTypeProducts = ProducerTypeProduct::with('files')->where('type_product_id',$id)->get();
      $productLine = [];
      foreach ($producerTypeProducts as $producerTypeProduct)
      {
        $productLine[] = Product::where('producer_type_product_id',$producerTypeProduct->type_product_id)->get();
      }
      return view('wacker.catalog', compact('producerTypeProducts','productLine'));
    }

    public function detail() {
        return view('wacker.detail');
    }
}
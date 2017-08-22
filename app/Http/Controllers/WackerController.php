<?php
namespace App\Http\Controllers;

use App\File;
use App\ProducerTypeProduct;
use App\TypeProduct;

class WackerController extends Controller
{
    public function index() {
      $typeProducts = TypeProduct::with('files')->get();
      return view('wacker.index', compact('typeProducts'));
    }

    public function catalog($id) {
      $producerTypeProducts = ProducerTypeProduct::with('files')->where('type_product_id',$id)->get();
      foreach ($producerTypeProducts as $producerTypeProduct)
      {

      }
      return view('wacker.catalog', compact('producerTypeProducts'));
    }

    public function detail() {
        return view('wacker.detail');
    }
}
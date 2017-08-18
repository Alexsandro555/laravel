<?php
namespace App\Http\Controllers;

use App\File;
use App\TypeProduct;

class WackerController extends Controller
{
    public function index() {
      $typeProducts = TypeProduct::with('files')->get();
      return view('wacker.index', compact('typeProducts'));
    }

    public function catalog() {
        return view('wacker.catalog');
    }

    public function detail() {
        return view('wacker.detail');
    }
}
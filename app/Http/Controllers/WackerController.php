<?php
namespace App\Http\Controllers;

class WackerController extends Controller
{
    public function index() {
        return view('wacker.index');
    }

    public function catalog() {
        return view('wacker.catalog');
    }

    public function detail() {
        return view('wacker.detail');
    }
}
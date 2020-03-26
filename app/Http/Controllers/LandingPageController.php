<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Service;
class LandingPageController extends Controller
{
    //get the products
    public function index() {
      $products=Product::latest()->take(6)->get();
      $services=Service::latest()->take(3)->get();
      return view('welcome',compact('products','services'));
    }
}

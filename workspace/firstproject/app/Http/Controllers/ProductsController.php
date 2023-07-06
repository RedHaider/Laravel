<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
      //  $title = "This is my title";
       // $description = 'Created by dary';
        
       // $data = [
       ///      'productOne' => 'iphone',
       //      'ProductTwo' => 'Samsung'
        // ];
        //compact method
       // return view('products.index', compact('title', 'description'));
      // return view('products.index')->with('data', $data);
      print_r(route('products'));
      return view('products.index');
    }
 
    public function about(){
        return "This is about";
    }

    public function show($name, $id){
        $data = [
            'iphone' => 'iphone',
            'samsung' => 'Samsung'
        ];
        return view('products.index',[
            'products'=> $data[$name] ?? 'product ' . $name .' '. $id . ' Does not exist' 
        ]);
    }

}

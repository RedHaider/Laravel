<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function index(){
    return view('index');
  }   

  public function about( ) {
    return view('about');
  }

//  public function blade(){
  //  $name = "Haider";
  //  return view ('blade')->with('name', $name);
 // }

 public function blade(){
  
  $names = ['John', 'Micheal', 'David', 'Jessica'];
  return view('blade',['names'=>$names]);
 }
}

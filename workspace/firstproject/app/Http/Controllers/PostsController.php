<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index() {
       
      // $posts = DB::select('select * from posts');
      //$posts = DB::select('select * from posts WHERE id = 1');

      //$posts = DB::select('select * from posts WHERE id = ?', [1]);
      //$posts = DB::select('select * from posts WHERE id = :id', ['id' =>1]);

      $id = 1;
      //$posts = DB::table('posts')->where('id',$id)->get();
      //$posts = DB::table('posts')->select('body','id','title')->get();
      //$posts = DB::table('posts')->where('created_at','>', now()->subDay())->orWhere('title', 'Prof')->get();
      //$posts = DB::table('posts')->whereBetween('id',[1,3])->get();
      //$posts = DB::table('posts')->whereNotNull('title')->get();
      //$posts = DB::table('posts')->select('title')->distinct()->get();
      //$posts = DB::table('posts')->orderBy('id','asc')->get();
      // $posts = DB::table('posts')->orderBy('created_at','asc')->first();
      //$posts = DB::table('posts')->find($id);
      //$posts = DB::table('posts')->insert(['title'=>'New post','body'=>'New body']);
      //$posts = DB::table('posts')->where('id','=',3)->update(['title'=>'New Title','body' => 'Updated body']);
      $posts = DB::table('posts')->where('id', '=',$id)->delete();
      dd($posts);
       
    }
}

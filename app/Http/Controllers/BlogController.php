<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Cache\RateLimiting\Limit;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

class BlogController extends Controller
{
   public function index(Request $request){
      // $categories = Category::select('id','categoryName')->get();
       $blogs = Blog::orderBy('id','desc')->with(['cat','user'])->select('id','title','post_excerpt','slug','user_id','featuredImage','created_at')->paginate(6);
       //return $blogs;
       return view('home')->with(['blogs'=>$blogs]);
   }
   public function blogIndex(Request $request){
      // $categories = Category::select('id','categoryName')->get();
       $blogs = Blog::orderBy('id','desc')->with(['cat','user'])->select('id','title','post_excerpt','slug','user_id','featuredImage','created_at')->paginate(6);
       //return $blogs;
       return view('blog')->with(['blogs'=>$blogs]);
   }
   public function blogSingle(Request $request, $slug){
    //$categories = Category::select('id','categoryName')->get();
    $blog = Blog::where('slug',$slug)->with(['cat','tag','user'])->first(['id','title','user_id','featuredImage','created_at','post','created_at']);
    $category_ids = [];
    foreach($blog->cat as $cat){
       array_push( $category_ids,$cat->id);
    }
    $relatedBlogs = Blog::with('user')->where('id','!=',$blog->id)->whereHas('cat', function($q) use($category_ids){
           $q->whereIn('category_id', $category_ids);
    })->limit(5)->orderBy('id','desc')->get(['id','title','post_excerpt','slug','user_id','featuredImage','created_at']);
    return view('blogsingle')->with(['blog'=>$blog,'relatedBlogs'=>$relatedBlogs]);
   }
   public function compose(View $view){
    $cat = Category::select('id','categoryName')->get(['id','categoryName']);
    $view->with('cat',$cat);
   }
   public function categoryIndex(Request $request, $categoryName, $id){

      $blogs = Blog::with('user')->whereHas('cat', function($q) use($id){
         $q->where('category_id',$id);
         })->orderBy('id','desc')->select('id','title','post_excerpt','slug','user_id','featuredImage','created_at')->paginate(3);
         return view('category')->with(['categoryName'=>$categoryName,'blogs'=>$blogs]);
         
     }
   public function tagIndex(Request $request, $tagName, $id){

      $blogs = Blog::with('user')->whereHas('tag', function($q) use($id){
         $q->where('tag_id',$id);
         })->orderBy('id','desc')->select('id','title','post_excerpt','slug','user_id','featuredImage','created_at')->paginate(3);
         return view('tag')->with(['tagName'=>$tagName,'blogs'=>$blogs]);
         
     }
   public function search(Request $request){
      $str = $request->str;
      $blogs = Blog::orderBy('id','desc')->with(['cat','user','tag'])->select('id','title','post_excerpt','slug','user_id','featuredImage','created_at');
      $blogs->when($str != '', function($q) use($str){
         $q->where('title', "ilike", "%".$str."%")
         ->orwhereHas('cat',function($q) use($str){
            $q->where('categoryName', "ilike", "%".($str)."%"); 
         });
         // ->orwhereHas('tag',function($q) use($str){
         //    $q->where('tagName', "ilike", "%".($str)."%");
         // });
      });
      
     
      $blogs = $blogs->paginate(3);
      $blogs->appends($request->all());
       
      
      return view('blog')->with(['blogs'=>$blogs]);
     
   }
}

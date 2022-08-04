<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;
class Blog extends Model
{
    use Searchable;
    protected $fillable = ['title','post','post_excerpt','slug','user_id','featuredImage','metaDescription','jsonData','views'];
    public function setSlugAttribute($title){
        $this->attributes['slug'] = $this->uniqueSlug($title);
    }
    private function uniqueSlug($title){
            
        $slug = Str::slug($title,'-');
        $count = Blog::where('slug','LIKE',"{$slug}%")->count();
        $newCount = $count > 0 ? ++$count : '';
        return $newCount > 0 ? "$slug-$newCount" : $slug;
    }
    public function cat(){
         return $this->belongsToMany('App\Models\Category','blogcategories');
    }
    public function tag(){
        return $this->belongsToMany('App\Models\Tag','blogtags');
    } 
    public function user(){
        return $this->belongsTo('App\Models\User')->select('id','fullName','email','photo');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";
    protected $fillable = ['name' , 'image' ,'img_path', 'category_id' , 'status','description'];

    public function child(){
        $this->hasMany(Category::class,'category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{    protected $fillable = ['name' , 'image' ,'img_path', 'category_id' , 'status','description'];
        public function uploadOne($file, $folder)
    {
        $path = $file->store($folder, 'public');
        return $path;
    }
    public function getImagePathAttribute()
    {
        return asset('categories/' . $this->image);
    }

    public function setImageAttribute($value) {
        if ( null != $value &&  is_file($value) ) {
            $this->attributes['image'] = $this->uploadOne($value, 'categories');
        }
    }

    public function child(){
        $this->hasMany(Category::class,'category_id');
    }
}

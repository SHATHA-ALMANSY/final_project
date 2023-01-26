<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' , 'slug' , 'parent_id' , 'image_path' ,
    ];

    // protected $guarded =[];  
    
    public function getImageUrlAttribute(){

        if($this->image_path){

            return asset('storage/' . $this->image_path);
        }

        return asset('images/default-image.jpg');

    }
    public function getNameAttribute($value){

        return Str::title($value);

    }

    public function setNameAttribute($value){
        $this->attributes['name'] = Str::upper($value);
    }

}

<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Commpany_info extends Model
{
    protected $table = "commpany_infos";
    protected $guarded = [];

    protected $appends = ['image_path'];

    function getImagePathAttribute(){

        return asset('uploads/img/' .$this->image);

    }
}

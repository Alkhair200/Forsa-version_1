<?php

namespace App\Models;

use App\Models\Commpany_info;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
class Job extends Model
{
    protected $table = "jobs";
    protected $guarded = [];

    public function commpany()
    {
        return $this->belongsTo(Commpany_info::class, 'commpany_id');
    }

    function scopeSelection($q)
    {
        $user_id = Auth::user()->id;
        return $q->where('user_id' , $user_id);
    }

    public function getTypeTime()
    {
        return $this->type_time == 1 ? 'دوام كامل' : 'دوام جزئى';
    }

    public function getTypeStatus()
    {
        return $this->status == 1 ? 'نشط' : 'غير نشط';
    }
}

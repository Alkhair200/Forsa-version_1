<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;

class EnteryJob extends Model
{
    protected $table = "entery_jobs";
    protected $guarded = [];


    public function Jobs()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
    
}

<?php

namespace App\Models;

use App\Traits\GetImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSave extends Model
{
    use HasFactory, GetImage;

    protected $fillable = [

        'user_id',
        'job_id',
        'job_type',
        'job_region',
        'feature_image',
        'title',
        'slug'
    ];
}

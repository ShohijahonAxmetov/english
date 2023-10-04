<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadedFile extends Model
{
    use HasFactory;

    protected $fillable = [
    	'model',
    	'model_id',
    	'name',
    	'ext',
    	'original_name',
    	'desc',
    ];
}

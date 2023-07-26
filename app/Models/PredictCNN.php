<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredictCNN extends Model
{
    protected $table = 'predict_result_cnn';
    protected $guarded = ['id'];
}

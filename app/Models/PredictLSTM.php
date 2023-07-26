<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredictLSTM extends Model
{
    protected $table = 'predict_result_lstm';
    protected $guarded = ['id'];
    
}


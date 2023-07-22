<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredictResultData extends Model
{
    protected $guarded = ['id'];
    protected $with = ['category'];

    public function usermenu_predict_url()
    {
        return 'predict-result';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function graph()
    {
        return $this->belongsTo(Category::class);
    }
    
}

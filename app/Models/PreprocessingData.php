<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreprocessingData extends Model
{
    protected $guarded = ['id'];

    protected $with = ['category'];

    public function usermenu_preprocessing_url()
    {
        return 'preprocessing-data';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

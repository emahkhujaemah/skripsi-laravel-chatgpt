<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestingData extends Model
{
    protected $guarded = ['id'];
    protected $with = ['category'];

    public function usermenu_predict_url()
    {
        return 'testing-data';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

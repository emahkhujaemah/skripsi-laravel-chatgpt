<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreprocessingData extends Model
{
    use HasFactory;

    protected $fillable = [
        'clean_text',
        'category',
    ];

    public function usermenu_preprocessing_url()
    {
        return 'preprocessing-data';
    }
}

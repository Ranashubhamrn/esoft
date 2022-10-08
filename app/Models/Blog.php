<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'category_id',
       'slug',
       'image',
       'status',
       'description',
    ];
    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}

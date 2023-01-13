<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['publisher'];

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function additionalBookinfo(){
        return $this->hasOne(additionalBookinfo::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'book_categories');
    }
}

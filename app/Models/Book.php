<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function categories(){
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
    public function authors(){
        return $this->belongsTo(Author::class, 'author_id');
    }
    public function publishers(){
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }
}

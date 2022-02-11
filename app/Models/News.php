<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['new_content' , 'new_title' , 'author'];

    public function author(){
        return $this->belongsTo(User::class);
    }
}

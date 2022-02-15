<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = ['level_desc'];

    protected $primaryKey = 'level_id';
    public $timestamps = false;

    public function user()
    {
        return $this->hasMany(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    use HasFactory;

    protected $fillable = ['establishment_name'];


    protected $primaryKey = 'establishment_id';

    public $timestamps = false;

    public function user()
    {
        return $this->hasMany(User::class);
    }
}

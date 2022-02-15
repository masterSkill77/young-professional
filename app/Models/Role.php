<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $table = 'roles';
    
    public $primaryKey = 'role_id';

    public $incrementing = true;

    protected $fillable = ['role_name'];

    public $timestamps = false;

    public function user()
    {
        return $this->hasMany(User::class);
    }
}

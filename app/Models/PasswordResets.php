<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResets extends Model
{
    use HasFactory;

    protected $table = 'password_resets';

    protected $fillable = ['email','token','created_at'];
    protected $primaryKey = 'email';
    public $timestamps = false;
}

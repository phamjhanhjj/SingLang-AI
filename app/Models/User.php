<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
   protected $table = 'user';
   protected $primaryKey = 'user_name';
   public $incrementing = false;
   protected $keyType = 'string';

   protected $fillable = [
      'user_name',
      'password',
   ];

   protected $hidden = [
      'password',
      'remember_token',
   ];
   public $timestamps = true;
}

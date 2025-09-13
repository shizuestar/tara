<?php

namespace App\Models;

 use Illuminate\Database\Eloquent\Model;
 
 class Settings extends Model
 {
     protected $fillable = ['platform_name', 'logo_path', 'favicon_path'];
 }
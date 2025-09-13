<?php
     namespace App\Models;

     use Illuminate\Database\Eloquent\Model;

     class NotificationSettings extends Model
     {
         protected $fillable = ['email_enabled', 'browser_enabled', 'sms_enabled', 'new_user_enabled', 'system_update_enabled'];

         protected $casts = [
             'email_enabled' => 'boolean',
             'browser_enabled' => 'boolean',
             'sms_enabled' => 'boolean',
             'new_user_enabled' => 'boolean',
             'system_update_enabled' => 'boolean',
         ];
     }

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Members extends Authenticatable
{
    use HasFactory, Notifiable;

//    protected $table='members';

    protected $fillable = [
        'member_name',
        'member_pwd',
        'member_rule',
        'member_email',
        'is_verify',
        'master_flag',
        'telegramid'
    ];
}

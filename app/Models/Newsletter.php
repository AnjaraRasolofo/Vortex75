<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Newsletter extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['email'];

    public function routeNotificationForMail() {
        
        return $this->email;

    }
}

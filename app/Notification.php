<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = [
        'sender_id', 'recipient_id', 'text',
        'system_notification', 'opened',
    ];

    public function odczyt_powiadomien() {
        return 1;
    }
}

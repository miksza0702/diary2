<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendEmail extends Model
{
    protected $guarded = [];
    public function meta(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(UserMeta::class);
    }
    public function user(): \Illuminate\Database\Eloquent\Relations\HasMany{
        return $this->hasMany(User::class);
    }
}

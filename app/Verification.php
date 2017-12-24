<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    public $timestamps = false;

    protected $fillable = [
    	'token', 'expires_at'
    ];

    protected $dates = [
    	'expires_at'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
    	return 'token';
    }

    public function hasExpired()
    {
    	return $this->freshTimestamp()->gt($this->expires_at);
    }
}

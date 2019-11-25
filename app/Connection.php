<?php

namespace App;

use App\User;
use App\Connection;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    protected $fillable = [
        'user_id', 'connection','is_checked','notice',
    ];
	public function user()
    {
        return $this->belongsTo('App\User');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $primaryKey = [
        'evaluation_id',
        'evaluationed_id'
    ];
    protected $fillable = [
        'evaluation_id',
        'evaluationed_id'
    ];
	public function user() {
        return $this->belongsTo('App\User');
    }
    public $timestamps = false;
    public $incrementing = false;
}

<?php

namespace App;

use App\User;
use App\Connection;
use App\Evaluation;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','rank','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function connections()
    {
        return $this->hasMany('App\Connection');
    }
    public function posts() {
        return $this->hasMany('App\Post');
    }
	public function ev() {
        return $this->hasMany('App\Evaluation');
    }
	public function messages() {
        return $this->hasMany('App\Message');
    }
	//フォロー機能
	 public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'followed_id', 'following_id');
    }

    public function follows()
    {
        return $this->belongsToMany(self::class, 'followers', 'following_id', 'followed_id');
    }
	public function follow(Int $user_id) 
    {
        return $this->follows()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing(Int $user_id) 
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->first(['id']);
    }

    // フォローされているか
    public function isFollowed(Int $user_id) 
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['id']);
    }
	
	//評価機能
	 public function evaluaters()
    {
        return $this->belongsToMany(self::class, 'evaluations', 'evaluationed_id', 'evaluation_id');
    }

    public function evaluations()
    {
        return $this->belongsToMany(self::class, 'evaluations', 'evaluation_id', 'evaluationed_id');
    }
	public function evaluation(Int $user_id) 
    {
        return $this->evaluations()->attach($user_id);
    }

    // フォロー解除する
    public function unevaluation(Int $user_id)
    {
        return $this->evaluations()->detach($user_id);
    }

    // フォローしているか
    public function isevaluation(Int $user_id) 
    {
        return (boolean) $this->evaluations()->where('evaluationed_id', $user_id)->first(['id']);
    }

    // フォローされているか
    public function isevaluationed(Int $user_id) 
    {
        return (boolean) $this->evaluaters()->where('evaluation_id', $user_id)->first(['id']);
    }	
}

<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Message extends Model {
 
    // conversationとの紐付け
    public function conversation() {
        return $this->belongsTo('App\Conversation');
    }
 
    // ユーザーとの紐付け
    public function user() {
        return $this->belongsTo('App\User');
    }
}
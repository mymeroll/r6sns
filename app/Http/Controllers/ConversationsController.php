<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Conversation;
use Validator;
use Auth;
 
class ConversationsController extends Controller
{
    public function index()
    {
        // ログインユーザーのidがsender_user_id又はrecipient_user_idに含まれるconversationを引っ張ってviewに渡す
 
        $current_user_id = Auth::user()->id;
        $conversations = Conversation::where('sender_user_id', $current_user_id)->orwhere('recipient_user_id', $current_user_id)->get();
        return view('conversations_index', ['conversations' => $conversations]);
    }
 
    public function store(Request $request)
    {
        // validationはRequestsで設定
        // sender_user_idとrecipient_user_idが重複していないかで条件分岐
        // 既にconversationが存在するならindexにリダイレクト、そうでなければ新規作成
 
        $c1 = Conversation::whereRaw('sender_user_id = ? and recipient_user_id = ?', array($request->sender_user_id, $request->recipient_user_id))->get();
        $c2 = Conversation::whereRaw('sender_user_id = ? and recipient_user_id = ?', array($request->recipient_user_id, $request->sender_user_id))->get();
 
        if (count($c1) === 0 && count($c2) === 0) {
            $conversation = new Conversation;
            $conversation->sender_user_id = $request->sender_user_id;
            $conversation->recipient_user_id = $request->recipient_user_id;
            $conversation->save();
        } else if (count($c1) !== 0) {
            $conversation = $c1[0];
        } else if (count($c2) !== 0) {
            $conversation = $c2[0];
        }
        return redirect()->action(
            'MessagesController@index',
            ['conversation' => $conversation]
        );
    }
}
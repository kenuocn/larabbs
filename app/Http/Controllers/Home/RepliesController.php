<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\Reply;
use App\Http\Requests\ReplyRequest;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(ReplyRequest $request, Reply $reply)
    {
        $reply->content = $request->get('content');
        $reply->user_id = Auth::id();
        $reply->topic_id = $request->get('topic_id');
        $reply->save();

        return redirect()->to($reply->topic->link())->with('sucess', '回复创建成功！');
    }

    public function destroy(Reply $reply)
    {
        $this->authorize('destroy', $reply);
        $reply->delete();

        return redirect()->to($reply->topic->link())->with('success', '成功删除回复！');
    }
}
<?php

namespace App\Http\Controllers;
use App\Models\BlogCategory;
use App\Models\Forum;
use App\Models\DicussionReply;

use Auth;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function discussion_form(){
        $topics = BlogCategory::all();
        return view('Website.add_discussion',compact('topics'));
    }

    public function create_discussion(Request $request){

       $forum =  new Forum();
       $forum->user_id = Auth::user()->id;
       $forum->title = $request->title;
       $forum->category = $request->category;
       $forum->descripption = $request->descripption;
       $forum->save();
       return redirect()->to('forum');

    }

    public function singleforum($id){
        $forum = Forum::find($id);
        $discussion = DicussionReply::join('users', 'users.id', '=', 'dicussion_replies.user_id')->where('dicussion_replies.forum_id',$id)->orderBy('dicussion_replies.id','DESC')->get();
        return view('Website.singleforum',compact('forum','discussion'));
    }

    public function replyDiscussion(Request $request){
        $reply = new DicussionReply;
        $reply->user_id = Auth::user()->id;
        $reply->forum_id = $request->forum_id;
        $reply->comment = $request->comment;
        $reply->save();
        return redirect()->to('forum');
    
    }

   
}

<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\comment;

class CommentController extends Controller
{
    public function handleComment(Request $request)
    {
        $input = [
            'users_id'=> session('sessionIdUser'),
            'posts_id'=>$request->id,
            'content_comment'=>$request->comment,
        ];
        
        $comment = comment::create($input);
        return view('clients/modal/comment',compact('comment'));
    }
    public function handleDelete(Request $request)
    {
        //cách 1
        // comment::destroy($request->id);

        //cách 2
        $comment = comment::find($request->id);
        $comment->delete();
        return response()->json();
    }
}

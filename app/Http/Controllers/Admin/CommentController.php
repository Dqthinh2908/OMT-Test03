<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\comment;
class CommentController extends Controller
{
    public function index()
    {   
        $dataComment = comment::with('posts','user')->orderBy('deleted_at','ASC')->paginate(6);
        // dd($dataComment);
        return view('admin/comment/index',compact('dataComment'));
        
    }
    public function showCommentTrash()
    {
        $dataCommentTrash = comment::with('posts','user')->onlyTrashed()->orderBy('deleted_at','desc')->get();
        // dd($dataCommentTrash);
        return view('admin/comment/showCommentTrash',compact('dataCommentTrash'));
    }
    public function handleRestoreComment($id)
    {
        $data= comment::withTrashed()->find($id);
        $data->restore();
        return redirect()->route('admin.showComment')->with('msg','Khôi phục bình luận thành công')->with('type','success');
    }
    public function handleForceComment($id)
    {
        $dataForce = comment::withTrashed()->find($id);
        $dataForce->forceDelete();
        return redirect()->route('admin.showCommentTrash')->with('msg','Bình luận đã được xóa vĩnh viễn')->with('type','success');
    }
}

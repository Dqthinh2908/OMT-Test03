<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categories as dataTypes;
use Illuminate\Http\Request;
use App\Http\Requests\PostAddNews as PostAdd;
use App\Models\posts;
use Illuminate\Support\Facades\Auth;
use App\Models\categories;
use Carbon\Carbon;
class NewsController extends Controller
{
    public function showAddNews(Request $request)
    {
        $dataTypes = categories::all();
        return view('admin/dashboard/addNews',
            [
                'dataTypes'=>$dataTypes,
            ]);
    }
    public function handleAddNews(Request $request)
    {
        $request->validate([
            'titleNews'=>'required|min:20',
            'shortDescription'=>'required|min:20',
            'contentNews'=>'required',
            'imageNews'=>'required|image|mimes:jpg,png,jpeg',
        ],[
            'titleNews.required'=> 'Tiêu đề không được để trống',
            'titleNews.min'=> 'Tiêu đề không được ít hơn :min kí tự',
            'shortDescription.required'=>'Miêu tả ngắn không được để trống',
            'shortDescription.min'=> 'Miêu tả ngắn không được ít hơn :min kí tự',
            'contentNews.required'=>'Nội dung không được để trống',
            'imageNews.required'=>'Ảnh tải lên không được để trống',
            'imageNews.required'=>'Tải lên phải là ảnh',
            'imageNews'=>'Tải lên phải là file :mimes'
        ]);
        $nameImage = $request->file('imageNews')->getClientOriginalName();
        $uploadFile = $request->file('imageNews')->move(public_path('admin/images'),$nameImage);
        $dataInsert = [
            'posts_category_id'=>$request->selectTypeNews,
            'title'=>$request->titleNews,
            'introText'=>$request->shortDescription,
            'description'=>$request->contentNews,
            'images'=>$nameImage,
            'user_id'=>Auth::id(),
            'created_at'=> Carbon::now(),
        ];
        $insert = posts::create($dataInsert);
        if($insert)
        {
            return redirect()->route('admin.dashboard')->with('msg','Thêm bài viết thành công')->with('type','success');
        }else{
            return back()->with('msg','Thêm dữ liệu thất bại')->with('type','danger');
        }
    }
    public function showUpdateNews(Request $request,$id)
    {
        $dataTypes = categories::all();
        if(!empty($id))
        {
            $request->session()->put('id',$id);
            $postsDetail = posts::find($id);
        }else{
            return redirect()->route('admin.dashboard')->with('msg','Liên kết không tồn tại')->with('type','danger');
        }
        return view('admin.dashboard.editNews',
        [
            'dataTypes'=>$dataTypes,
            'dataPostDetail'=>$postsDetail,
        ]);
    }
    public function handleUpdateNews(Request $request)
    {
        $request->validate([
            'titleNews'=>'required|min:20',
            'shortDescription'=>'required|min:20',
            'contentNews'=>'required',
            'imageNews'=>'image|mimes:jpg,png,jpeg',
        ],[
            'titleNews.required'=> 'Tiêu đề không được để trống',
            'titleNews.min'=> 'Tiêu đề không được ít hơn :min kí tự',
            'shortDescription.required'=>'Miêu tả ngắn không được để trống',
            'shortDescription.min'=> 'Miêu tả ngắn không được ít hơn :min kí tự',
            'contentNews.required'=>'Nội dung không được để trống',
            'imageNews.image'=>'Tải lên phải là file :mimes',
            'imageNews.image'=>'Tải lên phải là ảnh'
        ]);

        $id = session('id');
        $dataNews = posts::find($id);



        if(!empty($dataNews))
        {
            $title = $request->titleNews;

            $selectTypeNews = $request->selectTypeNews;

            $introText = $request->shortDescription;

            $description = $request->contentNews;
            $oldImage = $dataNews->images;
//            $checkUpload = null;
            $imagesExist = $request->file('imageNews');
            if(!empty($imagesExist))
            {
                $fileName = $request->file('imageNews')->getClientOriginalName();
                $newImage  = $request->file('imageNews')->move(public_path('admin/images'),$fileName);
            }else{
                $fileName = $oldImage;
            }
            $dataUpdate = [
                'posts_category_id'=>$selectTypeNews,
                'user_id'=>Auth::id(),
                'title'=>$title,
                'introText'=>$introText,
                'description'=>$description,
                'images'=>$fileName,
                'user_id'=>Auth::id(),
                'updated_at'=> Carbon::now(),
            ];
            $update = $this->data->updatePosts($dataUpdate,$id);
            if($update)
            {
                return redirect()->route('admin.dashboard')->with('msg','Update dữ liệu thành công')->with('type','success');
            }else
            {
                return back()->with('msg','Update dữ liệu thất bại')->with('type','danger');
            }

        }
    }
    public function handleDeleteNews(Request $request,$id = 0)
    {
        $deleteNews = posts::destroy($id);
        if($deleteNews)
        {
            return redirect()->route('admin.dashboard')->with('msg','Bài viết đã được chuyển vào thùng rác')->with('type','success');
        }else
        {
            return back()->with('msg','Xóa dữ liệu thất bại')->with('type','danger');
        }
    }
    public function showTrash()
    {
        $dataTrashed = posts::onlyTrashed()->get();
        return view('admin.dashboard.trash',compact('dataTrashed'));
    }
    public function newsRestore($id)
    {
        $data= posts::withTrashed()->find($id);
        $data->restore();
        return redirect()->route('admin.showTrash')->with('msg','Khôi phục bài viết thành công')->with('type','success');
    }
    public function handleNewsForce($id)
    {
        $dataForce = posts::withTrashed()->find($id);
        $dataForce->forceDelete();
        return redirect()->route('admin.dashboard')->with('msg','Bài viết đã được xóa vĩnh viễn')->with('type','success');
    }
}

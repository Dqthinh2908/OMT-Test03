@extends('admin.layout-admin')
@section('title','Comment')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9 col-xl-9 col-lg-9">
            <a href="{{route('admin.showComment')}}" class="btn btn-primary">Làm mới</a>
            <a href="{{route('admin.showCommentTrash')}}" class="btn btn-primary">Thùng rác</a>
        </div>

    </div>
    <div class="row mt-5">
        <div class="col">
            <?php if(!empty($messageSuccess)):?>
            <h6 class="alert alert-success" role="alert"><?= $messageSuccess ?></h6>
            <?php endif; ?>
            <?php if(!empty($messageError)):?>
            <h6 class="alert alert-danger" role="alert"><?= $messageError?></h6>
            <?php endif; ?>
            @if(session('msg'))
                <div class="alert alert-{{session('type')}}">
                    {{session('msg')}}
                </div>
            @endif
            <table class="table ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Người bình luận</th> 
                    <th>Tiêu đề</th>
                    <th>Nội dung bình luận</th>              
                    <th>Thời gian bình luận </th>
                    <th colspan="2" width="5%" class="text-center">Action</th>
                </tr>
                </thead>
                    <tbody>
                @foreach ($dataComment as $key => $value)                  
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value->user->name }}</td>
                        <td>{{ $value->posts->title }}</td>
                        <td>{{ $value->content_comment }}</td>
                        
                        <td>{{ $value->created_at }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{route('admin.handleRestoreComment',['id'=>$value->id]) }}">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href=" {{route('admin.handleForceComment',['id'=>$value->id])}}">Delete</a>
                        </td>
                    </tr>
                @endforeach   
                    </tbody>
            </table>
            <div>
                <span style="text-align: center" class="mt-3">{{ $dataComment->links()}}</span>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    .w-5
    {
        display:none;
    }
</style>
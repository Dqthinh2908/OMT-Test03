@extends('admin.layout-admin')
@section('title','Comment')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9 col-xl-9 col-lg-9">
            <a href="{{route('admin.showComment')}}" class="btn btn-primary">Quay lại</a>
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
                    <th>Thời gian xóa </th>
                    <th colspan="2" width="5%" class="text-center">Action</th>
                </tr>
                </thead>
                    <tbody>
                @foreach ($dataCommentTrash as $key => $value)                  
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value->user->name }}</td>
                        <td>{{ $value->posts->title }}</td>
                        <td>{{ $value->content_comment }}</td>
                        
                        <td>{{ $value->deleted_at }}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('admin.handleRestoreComment',['id'=>$value->id]) }}">Phục Hồi</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href=" {{route('admin.handleForceComment',['id'=>$value->id])}}">Xóa vĩnh viễn</a>
                        </td>
                    </tr>
                @endforeach   
                    </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
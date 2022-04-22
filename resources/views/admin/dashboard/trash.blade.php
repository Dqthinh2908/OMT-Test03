@extends('admin.layout-admin')
@section('title','Trash View')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9 col-xl-9 col-lg-9">
            <a class="btn btn-primary" href="{{route('admin.showAddNews')}}"> Thêm bài viết mới</a>
            <a href="{{route('admin.dashboard')}}" class="btn btn-primary">Làm mới</a>
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
                    <th>Tiêu đề</th>
                    <th>Tiêu đề phụ</th>
                    <th>Ảnh thumnail</th>
                    <th>Người viết bài</th>
                    <th>Ngày xóa bài</th>
                    <th colspan="2" width="5%" class="text-center">Action</th>
                </tr>
                </thead>
                    <tbody>
                    @foreach($dataTrashed as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->title}}</td>
                        <td>{{$value->introText}}</td>
                        <td><img src="{{asset('admin/images/' .$value->images)}}" width="45%" alt=""></td>
                        <td>{{$value->author}}</td>
                        <td>{{$value->deleted_at}}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('admin.handleRestore',['id'=>$value->id])}}">Phục Hồi</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{route('admin.handleForceNews',['id'=>$value->id])}} ">Xóa vĩnh viễn</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>
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

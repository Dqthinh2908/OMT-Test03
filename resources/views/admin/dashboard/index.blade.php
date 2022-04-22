{{--<h1>Session user: {{$user}}</h1>--}}
@extends('admin.layout-admin')
@section('title','Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-9 col-xl-9 col-lg-9">
                @can('post_add')
                <a class="btn btn-primary" href="{{route('admin.showAddNews')}}"> Thêm bài viết mới</a>
                @endcan
                <a href="{{route('admin.dashboard')}}" class="btn btn-primary">Làm mới</a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-xl-3 col-lg-3">
                @can('post_trash')
                <a href="{{route('admin.showTrash')}}" class="btn btn-primary">Thùng rác</a>
                @endcan
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
                        <th>Ảnh Thumbnail</th>
                        <th>Chuyên mục</th>
{{--                        <th>Nội dung</th>--}}
                        <th>Người viết bài</th>
                        <th>Ngày viết bài</th>
                        <th colspan="2" width="5%" class="text-center">Action</th>
                    </tr>
                    </thead>
                    @foreach($paginator as $key=>$value)
                    <tbody>
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value->title}}</td>
                            <td><img width="45%" src="{{asset('admin/images/' .$value->images)}}" alt=""></td>
                            <td>{{$value->categories->name}}</td>
{{--                            <td>{{$value->description}}</td>--}}
                            <td>{{$value->user->name}}</td>
                            <td>{{$value->created_at}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{route('admin.showUpdateNews',['id'=>$value->id])}}">Edit</a>
                            </td>
                            <td>
                                @can('post_delete')
                                <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{route('admin.handleDeleteNews',['id'=>$value->id])}} ">Delete</a>
                                @endcan()
                            </td>

                        </tr>
                    </tbody>
                    @endforeach




                </table>
                    <div>
                        <span style="text-align: center" class="mt-3">{{ $paginator->links()}}</span>
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

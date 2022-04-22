@extends('admin.layout-admin')
@section('title','Roles')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <p> This is Roles page !</p>
                <a class="btn btn-primary" href="{{route('admin.showAddRoles')}}"> Thêm vai trò mới</a>
                <a href="" class="btn btn-primary">Thùng rác</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
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
                        <th>Tên vai trò</th>
                        <th>Mô tả vai trò</th>
                        <th colspan="2" width="5%" class="text-center">Action</th>
                    </tr>
                    </thead>
                        <tbody>
                        @foreach($dataRoles as $key => $value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->description}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('admin.showEditRoles',['id'=>$value->id])}} }}">Edit</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{route('admin.handleDeleteRoles',['id'=>$value->id])}}">Delete</a>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection

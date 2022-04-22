@extends('admin.layout-admin')
@section('title','User')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <p> This is Users page !</p>
                <a class="btn btn-primary" href="{{route('admin.showAddUser')}}"> Thêm tài khoản mới</a>
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
                        <th colspan="2" width="5%" class="text-center">Action</th>
                        <th>Tên tài khoản</th>
                        <th>Email</th>
                        <th>Avatar</th>
                        <th colspan="3" class="text-center">Chức vụ</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $value)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('admin.showEditUser',['id'=>$value->id]) }}">Edit</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{route('admin.handleDeleteUser',['id'=>$value->id])}}">Delete</a>
                                </td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                
                                <td></td>
                                @foreach($value->roles as $item)
                                <td>{{$item->name}}</td>
                                @endforeach
                                
                        
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

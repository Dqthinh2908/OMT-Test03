@extends('admin.layout-admin')
@section('title','Categories')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href="{{route('admin.showAddCategory')}}"> Thêm chuyên mục mới</a>
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
                        <th>Tên chuyên mục</th>
                        <th>Ngày tạo</th>
                        <th colspan="2" width="5%" class="text-center">Action</th>
                    </tr>
                    </thead>
                    @foreach($data as $key=>$value)
                        <tbody>
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->created_at}}</td>
                            <td>
                                <a class="btn btn-warning" href="">Edit</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="">Delete</a>
                            </td>

                        </tr>
                        </tbody>
                    @endforeach

                </table>
                <div>

                </div>
            </div>
        </div>
    </div>
@endsection


@extends('admin.layout-admin')
@section('title','EditUser')
@section('css')
<style>
    .select2-selection__choice__display{
        background-color:#0c525d !important;
        color:#fff !important;
    }
</style>
@endsection
@push('scripts')
    <script>
        $('.select2_init').select2({
            'placeholder': 'Chọn vai trò'
        });
    </script>
@endpush
@section('content')
    <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <h1>Cập nhật tài khoản</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.handleUpdateUser',['id'=>$user->id]) }}" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="titleNews" class="form-label">Username</label>
                            <input type="text" value="{{ $user->name }}" name="username" class="form-control" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="titleNews" class="form-label">Họ và tên</label>
                            <input type="text" value="{{ $user->fullname }}"name="fullname" class="form-control" id="fullname">
                        </div>
                        <div class="mb-3">
                            <label for="contentNews" class="form-label">Email</label>
                            <input type="email" value="{{ $user->email }}" name="emailUser" class="form-control" id="emailUser">
                        </div>
                        <div class="mb-3">
                            <label for="titleNews" class="form-label">Mật khẩu</label>
                            <input type="password" value="{{ $user->password }}" placeholder="Nhập mật khẩu" name="password" class="form-control" id="password">
                        </div>
    
                        <div class="form-group">
                            <label>Chọn vai trò</label>
                            <select class="form-control select2_init" name="role_id[]" multiple>
                                <option ></option>
                                @foreach($roles as $role)
                                    <option {{ $rolesOfUser->contains('id',$role->id) ? 'selected' : ''}} value="{{ $role->id }}">{{$role->name  }}</option>
                                @endforeach
                              </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Sửa người dùng</button>
                    </form>
                    
                </div>
            </div>
        <!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection

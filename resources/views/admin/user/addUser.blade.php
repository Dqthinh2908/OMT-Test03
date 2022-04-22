@extends('admin.layout-admin')
@section('title','AddUser')
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
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <h1>Thêm tài khoản mới</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('admin.handleAddUser')}}" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="titleNews" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="titleNews" class="form-label">Họ và tên</label>
                            <input type="text" name="fullname" class="form-control" id="fullname">
                        </div>
                        <div class="mb-3">
                            <label for="contentNews" class="form-label">Email</label>
                            <input type="email" name="emailUser" class="form-control" id="emailUser">
                        </div>
                        <div class="mb-3">
                            <label for="titleNews" class="form-label">Mật khẩu</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="contentNews" class="form-label">Nhập lại mật khẩu</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                        </div>
    
                        <div class="form-group">
                            <label>Chọn vai trò</label>
                            <select class="form-control select2_init" name="role_id[]" multiple>
                                <option ></option>
                                @foreach($dataRoles as $role)
                                    <option value="{{ $role->id }}" >{{$role->name  }}</option>
                                @endforeach
                              </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm người dùng</button>
                    </form>
                    
                </div>
            </div>
        <!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection

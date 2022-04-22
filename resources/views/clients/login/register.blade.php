@extends('clients.layout-home')
@section('title','Đăng ký')
@section('content')
    <div class="container">
        <div class="modal__bodys">
            <div class="auth-form">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    @if(session('msg'))
                        <div class="alert alert-{{session('type')}}">
                            {{session('msg')}}
                        </div>
                    @endif
                    <form action="{{route('client.handleRegister')}}" method="POST" class="">
                        @csrf
                        <div class="auth-form-header">
                            <h3 class="auth-form-heading">Đăng kí</h3>
                        </div>
                        <div class="auth-form-body-list">
                            <div class="auth-form-body-item">
                                <input type="text" name="fullname" class="auth-form-body-item-input username" placeholder="Họ và tên">
                            </div>
                            <div class="auth-form-body-item">
                                <input type="text" name="name" class="auth-form-body-item-input username" placeholder="Nhập tên tài khoản">
                            </div>
                            <div class="auth-form-body-item">
                                <input type="text" name="email" class="auth-form-body-item-input username" placeholder="Email">
                            </div>
                            <div class="auth-form-body-item">
                                <input type="password"  name="password" class="auth-form-body-item-input password" placeholder="Mật khẩu">
                            </div>
                            <div class="auth-form-body-item">
                                <input type="password" name="repassword" class="auth-form-body-item-input password" placeholder="Nhập lại mật khẩu">
                            </div>
                        </div>
                        <div class="auth-form-aside">
                            <a href="" class="auth-form-helper">Bằng cách đăng ký tài khoản, bạn cũng đồng thời chấp nhận mọi điều kiện về qui định và chính sách của Dân trí
                            </a>
                        </div>
                        <div class="auth-form__controls">
                            <button type="submit" class="auth-form__controls-btn-login ">ĐĂNG KÝ</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

@endsection

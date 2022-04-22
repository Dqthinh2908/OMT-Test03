@extends('clients.layout-home')
@section('title','Đăng nhập')
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

                {{-- thong bao loi ko ton tai tai khoan --}}
                @if(session('msg'))
                    <div class="alert alert-danger">{{ session('msg') }}</div>
                @endif
                <form action="{{route('client.handleLogin')}}" method="POST" class="login-form">
                    @csrf

                    <div class="auth-form-header">
                        <h3 class="auth-form-heading">Đăng nhập</h3>
                    </div>
                    <div class="auth-form-body-list">
                        <div class="auth-form-body-item">
                            <input type="text" name="usernane" class="auth-form-body-item-input username" placeholder="Tên tài khoản">
                        </div>
                        <div class="auth-form-body-item">
                            <input type="password" name="password" class="auth-form-body-item-input password" placeholder="Mật khẩu">
                        </div>
                    </div>
                    <div class="auth-form-aside">
                        <a href="" class="auth-form-forget active">Quên mật khẩu</a>
                        <span class="auth-form__help-separate"></span>
                        <a href="" class="auth-form-helper">Cần trợ giúp</a>
                    </div>
                    <div class="auth-form__controls">
                        <button class="auth-form__controls-btn-login btn-submit-js ">ĐĂNG NHẬP</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

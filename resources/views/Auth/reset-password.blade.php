@extends('Auth.LinkAuth')
@section('content')
    <body class="w-100 d-flex flex-column justify-content-center align-items-center">
    <img src="{{asset('assets/images/Logo.png')}}" alt="Logo" style="position: fixed;top: 0px;right: 10px">
    <div class="context">
        <div class="session">
            <img class="left" src="{{asset('assets/images/Forgot.jpg')}}" alt="Register">
            <div class="No1">
                {{html()->form('POST',route('password.update', ['token' => $token]))->class('log-in')->open()}}
                @csrf
                <h4 class="text-right w-100">بازیابی رمز عبور</h4>
                <p class="w-100 text-right p-0">رمز عبور جدید خود را وارد کنید</p>
                <div class="floating-label">
                    <input placeholder="ایمیل" type="text" name="email" id="email" autocomplete="off" class="pr-2"
                           value="{{old('email')}}">
                    <label for="email" class="pr-2">ایمیل:</label>
                </div>
                <div class="floating-label">
                    <input placeholder="رمز عبور" type="password" name="password" id="password" autocomplete="off"
                           class="pr-2">
                    <label for="password" class="pr-2">رمز عبور:</label>
                </div>
                <div class="floating-label">
                    <input placeholder="تکرار رمز عبور" type="password" name="password_confirmation" id="password_confirmation" autocomplete="off"
                           class="pr-2">
                    <label for="password_confirmation" class="pr-2">تکرار رمز عبور:</label>
                </div>
                <span class="d-flex row justify-content-between align-items-center w-100 mr-0">
                <button type="submit" class="btn btn-success">بازنشانی</button>
                <a href="{{route('login')}}" class="btn btn-danger">بازگشت</a>
            </span>
                <span class="No2"></span>
                {{html()->form()->close()}}
            </div>
            @error('email')
            <span class="alert alert-danger">{{ $message }}</span>
            @enderror
            @error('password')
            <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="area">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    </body>
@endsection

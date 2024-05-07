@extends('Auth.LinkAuth')
@section('content')
    <body>
    <img src="{{asset('assets/images/Logo.png')}}" alt="Logo" style="position: fixed;top: 0px;right: 10px">
    <div class="context">
        <div class="session">
            <img class="left" src="{{asset('assets/images/Login.jpg')}}" alt="Register">
            <div class="No1">
                <form action="{{route('login')}}" method="POST" enctype="multipart/form-data" class="log-in">
                    @csrf
                    <h4 class="text-right w-100">صفحه ورود</h4>
                    <p class="w-100 text-right p-0">جهت ورود به وب اپ فرم زیر را تکمیل کنید</p>
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
                    <span class="d-flex row justify-content-between align-items-center w-100 mr-0">
                <button type="submit" class="btn btn-success">ورود</button>
                <a href="{{route('password.request')}}" class="text-decoration-none discrete mt-2" target="_blank">فراموش رمز عبور</a>
                <a href="{{route('Home.index')}}" class="btn btn-danger">بازگشت</a>
            </span>
                    <span class="No2"><a href="{{route('signup.view')}}" class="text-decoration-none discrete "
                                         target="_blank">اکانت ندارید؟ ثبت نام کنید</a></span>
                </form>
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

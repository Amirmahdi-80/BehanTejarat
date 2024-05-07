@extends('Auth.LinkAuth')
@section('content')
    <body>
    <img src="{{asset('assets/images/Logo.png')}}" alt="Logo" style="position: fixed;top: 0px;right: 10px">

    <div class="context">
        <div class="session">
            <img class="left" src="{{asset('assets/images/Forgot.jpg')}}" alt="Register">
            <div class="No1">
                <form action="{{route('password.email')}}" method="POST" enctype="multipart/form-data" class="log-in">
                    @csrf
                    <h4 class="text-right w-100">صفحه بازیابی رمز عبور</h4>
                    <p class="w-100 text-right p-0">برای بازیابی رمز عبور فرم را تکمیل کنید</p>
                    <div class="floating-label">
                        <input placeholder="ایمیل" type="text" name="email" id="email" autocomplete="off" class="pr-2"
                               value="{{old('email')}}">
                        <label for="email" class="pr-2">ایمیل:</label>
                    </div>
                    <span class="d-flex row justify-content-between align-items-center w-100 mr-0">
                <button type="submit" class="btn btn-success">بازنشانی</button>
                <a href="{{route('login')}}" class="btn btn-danger">بازگشت</a>
            </span>
                    <span class="No2">
                        @error('status')
            <span class="alert alert-success" style="font-size: 12px" dir="rtl">{{ $message }}</span>
            @enderror
                        @error('email')
            <span class="alert alert-danger" style="font-size: 12px">{{ $message }}</span>
            @enderror<a href="{{route('signup.view')}}" class="text-decoration-none discrete " target="_blank">اکانت ندارید؟ ثبت نام کنید</a></span>
                </form>
            </div>
        </div>
    </div>


    <div class="area" >
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
    </div >
    </body>
@endsection

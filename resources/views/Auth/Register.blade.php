@extends('Auth.LinkAuth')
@section('content')
    <body>
    <img src="{{asset('assets/images/Logo.png')}}" alt="Logo" style="position: fixed;top: 0px;right: 10px">
    <div class="context">
        <div class="session">
            <img class="left" src="{{asset('assets/images/Register.jpg')}}" alt="Register">
            <div class="No1" dir="ltr">
                <form action="{{route('signup.register')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h4 class="text-right w-100">فرم ثبت نام</h4>
                    <p class="w-100 text-right p-0">جهت ثبت نام در سایت فرم زیر را تکمیل کنید</p>
                    <div class="floating-label">
                        <input placeholder="نام" type="text" name="Firstname" id="Firstname" class="pr-2"
                               value="{{old('Firstname')}}">
                        <label for="Firstname" class="pr-2">نام:</label>
                        @error('Firstname')
                        <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="floating-label">
                        <input placeholder="نام خانوادگی" type="text" name="Lastname" id="Lastname" class="pr-2"
                               value="{{old('Lastname')}}">
                        <label for="Lastname" class="pr-2">نام خانوادگی:</label>
                        @error('Lastname')
                        <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="floating-label">
                        <input placeholder="ایمیل" type="text" name="email" id="email" class="pr-2"
                               value="{{old('email')}}">
                        <label for="email" class="pr-2">ایمیل:</label>
                        @error('email')
                        <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="floating-label">
                        <input placeholder="رمز عبور" type="password" name="password" id="password" class="pr-2"
                               value="">
                        <label for="password" class="pr-2">رمز عبور:</label>
                        @error('password')
                        <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="floating-label">
                        <input placeholder="تکرار رمز عبور" type="password" name="password_confirmation"
                               id="password_confirmation" class="pr-2">
                        <label for="password" class="pr-2">تکرار رمز عبور:</label>
                        @error('password')
                        <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="floating-label">
                        <input type="file" name="avatar" id="avatar" class="hidden" style="visibility: hidden">
                        <label for="avatar" class="form-control"
                               style="border: 1px solid gainsboro;background-color: #fff">عکس پروفایل</label>
                        @error('avatar')
                        <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                        @enderror
                    </div>
                    <span class="d-flex row justify-content-between align-items-center w-100 mr-0">
                <button type="submit" class="btn btn-success">ثبت نام</button>
                <a href="{{route('Home.index')}}" class="btn btn-danger">بازگشت</a>
            </span>
                    <span class="No2"><a href="{{route('login')}}" class="text-decoration-none discrete text-right m-2"
                                         target="_blank">اکانت دارید؟ ورود کنید</a></span>
                </form>
            </div>
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

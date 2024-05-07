@extends('Auth.LinkAuth')
@section('content')
        <body>
        <img src="{{asset('assets/images/Logo.png')}}" alt="Logo" style="position: fixed;top: 0px;right: 10px">
        <div class="context">
        <div class="session">
            <img class="left" src="{{asset('assets/images/Email.jpg')}}" alt="Register">
            <div class="No1">
                <form action="{{route('signup.register')}}" method="POST" enctype="multipart/form-data" class="w-100">
                    @csrf
                    <h4 class="text-center w-100">تایید ایمیل</h4>
                    <p class="w-100 text-center">کاربر {{auth()->user()->Firstname}} {{auth()->user()->Lastname}} جهت ورود به اکانت خود ایمیل ارسال شده به آدرس ایمیل خود را تایید کنید</p>
                    <span class="d-flex row justify-content-center align-items-center w-100 mr-0" style="gap: 5px">
                <a href="{{route('login')}}" class="btn btn-success">بررسی ورود</a>
                <a href="{{route('logout')}}"  class="btn btn-danger">خروج</a>
            </span>
                </form>
                <span class="No2">
                    @if (session('status') == 'verification-link-sent')
                        <span class="mb-3 alert  alert-success" style="font-size: 12px">
                                        ایمیل جدید ارسال شد، لطفا مجددا بررسی کنید.
                                    </span>
                    @endif
                <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button class="btn btn-sm btn-dark m-2" type="submit">ایمیلی دریافت نکردید؟ برای دریافت مجدد اینجا کلیک کنید.</button></form></span>
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

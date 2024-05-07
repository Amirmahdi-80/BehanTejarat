@extends('Home')
@section($title,'title')
@section('content2')
    <div class="d-flex flex-column justify-content-center align-items-center w-75">
        <img src="{{asset('assets/images/Tick.png')}}" alt="Successful" class="img2">
        <h4>سفارش شما با موفقیت ثبت شد</h4>
        <p>جهت پیگیری وضعیت سفارش خود از پنل کاربری خودتان در قسمت مدیریت سفارشات،سفارش خود را پیگیری کنید</p>
        <a href="{{route('Home.index')}}" class="btn btn-block btn-outline-success">بازگشت به صفحه اصلی</a>
    </div>
@endsection

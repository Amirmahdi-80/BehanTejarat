    @extends('Admin.Panel')
@section($title,'title')
@section('ZPanel')
        <div class="d-flex flex-column justify-content-center align-items-center pt-5" style="gap: 20px">
        <img src="{{asset('assets/images/Welcome.jpg')}}" alt="Welcome" class="img">
            <h4 class="pt-3 lod">{{auth()->user()->Firstname}} به پنل کاربری خودت خوش اومدی!</h4>
        <table class="table text-center w-50" dir="rtl">
            <thead>
            <tr>
                <th scope="col" colspan="2" class="bg-info text-light">در جدول زیر ما برخی اطلاعات از شما را نمایش میدهیم</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>مشخصات سیستم عامل:</td>
                <td id="os"></td>
            </tr>
            <tr>
                <td>آی پی شما:</td>
                <td>{{$ip}}</td>
            </tr>
            <tr>
                <td>تاریخ آخرین بازدید پنل:</td>
                <td>{{jdate()}}</td>
            </tr>
            <tr>
                <td>نام شما:</td>
                <td>{{auth()->user()->Firstname}} {{auth()->user()->Lastname}}</td>
            </tr>
            <tr>
                <td>ایمیل شما:</td>
                <td>{{auth()->user()->email}}</td>
            </tr>
            <tr>
                <td>سِمَت شما:</td>
                <td>@if(auth()->user()->Role == "")
                        سمت شما تعیین نشده
                    @else
                        {{auth()->user()->Role}}
                @endif</td>
            </tr>
            </tbody>
        </table>
        </div>
@endsection

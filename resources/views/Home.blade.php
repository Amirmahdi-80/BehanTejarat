@extends('LinkHome')
@section('title', $title)

@section('content')
    <body class="w-100">
    <!-- head of site -->
    <div class="head d-flex row justify-content-around align-items-center" dir="rtl">
        <span class="w-25 d-flex justify-content-center align-items-center"><a href="{{route('Home.index')}}" class="d-flex justify-content-center align-items-center flex-column A2"><img src="{{asset('assets/images/Logo.png')}}" alt="Brand"></a></span>

        <ul class="Items row justify-content-center align-items-center w-50">
            @if(\Illuminate\Support\Facades\Auth::check())
            @can('edit-cars')
            <a href="{{route('Admin.Cars.index')}}" style="border-left: 1px solid gainsboro;padding-left: 20px">
                <li>واحد کنترل خودرو</li>
            </a>
            @endcan
            @can('edit-cost')
            <a href="{{route('Admin.cost.index')}}" style="border-left: 1px solid gainsboro;padding-left: 20px">
                <li>مدیریت هزینه ها</li>
            </a>
                @endcan
                @can('edit-products')
            <a href="{{route('Admin.Products.index')}}" style="border-left: 1px solid gainsboro;padding-left: 20px">
                <li>مدیریت محصولات</li>
            </a>
                @endcan
            @can('edit-users')
            <a href="{{route('Admin.Editusers.index')}}">
                <li>مدیریت کاربران</li>
            </a>
                @endcan
                @else
                <a href="#Cars" style="border-left: 1px solid gainsboro;padding-left: 20px">
                    <li>خودرو ها</li>
                </a>
                <a href="#Drivers" style="border-left: 1px solid gainsboro;padding-left: 20px">
                    <li>رانندگان</li>
                </a>
        <a href="#Products">
            <li>محصولات</li>
        </a>
            @endif
        </ul>


        @if(\Illuminate\Support\Facades\Auth::check())
            <span class="w-25 d-flex row justify-content-center align-items-center A1">
                @if(auth()->user()->avatar  == "")
                    <img src="{{asset('assets/images/Sign-up.png')}}" alt="عکس پروفایل">
                @else
                    <img src="{{ auth()->user()->avatar ? route('showAvatar', [auth()->user()->avatar]) : '' }}"
                         alt="ProfilePic" style="width: 60px;height: 60px;border-radius: 50px">
                @endif<a
                    href="{{route('Admin.dashboard')}}">{{ auth()->user()->Firstname }} {{ auth()->user()->Lastname }}</a>
            @else
                    <span class="w-25 row justify-content-center align-items-center"><a href="{{route('signup.view')}}" class="btn btn-outline-info">ورود/ثبت نام</a></span>
            </span>
        @endif
    </div>
    <!-- head of site -->

    <!-- body of site -->
    <div class="body">
        {{-- Bottom Menu --}}
        <ul class="Items2 row justify-content-center align-items-center w-50">
            @if(\Illuminate\Support\Facades\Auth::check())
                @can('edit-cars')
                    <a href="{{route('Admin.Cars.index')}}">
                        <li><i class="material-icons">airport_shuttle</i>واحد کنترل خودرو</li>
                    </a>
                @endcan
                @can('edit-cost')
                    <a href="{{route('Admin.cost.index')}}">
                        <li><i class="material-icons">attach_money</i>مدیریت هزینه ها</li>
                    </a>
                @endcan
                @can('edit-products')
                    <a href="{{route('Admin.Products.index')}}">
                        <li><i class="material-icons">apps</i>مدیریت محصولات</li>
                    </a>
                @endcan
                @can('edit-users')
                    <a href="{{route('Admin.Editusers.index')}}">
                        <li><i class="material-icons">contacts</i>مدیریت کاربران</li>
                    </a>
                @endcan
            @else
                <a href="#Cars">
                    <li><i class="material-icons">airport_shuttle</i>خودرو ها</li>
                </a>
                <a href="#Drivers">
                    <li><i class="material-icons">contacts</i>رانندگان</li>
                </a>
                <a href="#Products">
                    <li><i class="material-icons">apps</i>محصولات</li>
                </a>
            @endif
        </ul>
        {{-- Bottom Menu --}}
        @yield('content2')
    </div>
    <!-- body of site -->

    <!-- footer of site -->
    <div class="footer text-center">
        <div class="footer2 w-100" dir="rtl">
            <span class="Aks"><img src="{{asset('assets/images/Namad.jpg')}}" alt="Namad"></span>
            <div class="d-flex flex-column justify-content-center align-items-center Tozih">
                <h4 class="border-bottom border-secondary pb-2">بهان تجارت آفرین</h4>
                <p>شرکت بهان تجارت آفرین با فعالیت در زمینه رستوران داری، دارای چندین شعبه در محدوده شمال تهران به مدیریت دکتر امیر حسین فلاحی می
                    باشد</p>
            </div>
            <div class="about d-flex flex-column justify-content-center align-items-center">
                <h4 class="border-bottom border-secondary pb-2">درباره ما</h4>
                <p>0933-653-3433</p>
                <p>021-2687-8016</p>
                <p>آدرس:تهران،اندرزگو،خیابان وطن پور شمالی،پلاک 1/4</p>
                <p>Amirmahdi-Asadi@behantejaratco.ir</p>
            </div>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center" dir="rtl">
            <p style="font-size: 10px;margin-bottom: 80px" class="mt-5">طراحی و توسعه توسط <a href="{{route('AmirmahdiAsadi.index')}}">امیرمهدی اسدی</a></p>
            <p style="font-size: 10px;margin-bottom: 10px" class="mt-0 pey">تمامی حقوق مادی و معنوی این اپلیکیشن متعلق به شرکت بهان تجارت آفرین بوده و هرگونه کپی برداری بدون ذکر منبع پیگرد قانونی را در پی خواهد داشت.</p>
{{--            <ul class="row justify-content-center align-items-center No3">--}}
{{--                <a href="#">--}}
{{--                    <li>آیتم 1</li>--}}
{{--                </a>--}}
{{--                <a href="#">--}}
{{--                    <li>آیتم 2</li>--}}
{{--                </a>--}}
{{--                <a href="#">--}}
{{--                    <li>آیتم 3</li>--}}
{{--                </a>--}}
{{--                <a href="#">--}}
{{--                    <li>آیتم 4</li>--}}
{{--                </a>--}}
{{--            </ul>--}}
        </div>
    </div>
    <!-- footer of site -->
    </body>

@endsection

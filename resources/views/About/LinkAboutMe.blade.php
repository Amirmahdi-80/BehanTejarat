<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="امیرمهدی اسدی،طراح و توسعه دهنده فول استک برنامه نویسی،دانشجوی کارشناسی مهندسی کامپیوتر،شاغل در شرکت بهان تجارت آفرین.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="امیرمهدی اسدی،مهندسی کامپیوتر،بهان تجارت آفرین،برنامه نویسی،فول استک،دانشجو،طراح،توسعه دهنده">
    <meta name="copyright" content="امیرمهدی اسدی">
    <meta name="robots" content="index, follow" />
    <meta name="Classification" content="بیزینس" />
    <meta name="author" content="Amirmahdi Asadi, pgamirmahdi@gmail.com" />
    <meta name="designer" content="امیرمهدی اسدی" />
    <meta name="owner" content="امیرمهدی اسدی" />
    <meta property="og:type" content="website">
    <meta property="og:title" content="درباره امیرمهدی اسدی">
    <meta property="og:site_name" content="امیرمهدی اسدی">
    <meta property="og:description" content="امیرمهدی اسدی،طراح و توسعه دهنده فول استک برنامه نویسی،دانشجوی کارشناسی مهندسی کامپیوتر،شاغل در شرکت بهان تجارت آفرین">
    <meta property="og:image" content=”{{asset('assets/images/Amirmahdi.jpg')}}” />
    <meta property="og:locale" content="fa_IR">
    <meta property="og:url" content="https://behantejaratco.ir/AmirmahdiAsadi">
    <meta name="theme-color" content="#0ebfff">
    <meta name="google-site-verification" content="ZctxTrSondLmcLgfS3t9GIP4J8M1DSt0cJYl41xlwJg" />
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/Home.css?v=version2')}}">
    <link rel="stylesheet" href="{{asset('assets/css/AboutMe.css?v=version2')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    {{--    IPhone Support   --}}
    <link rel="manifest" href="{{asset('assets/manifest.json')}}" />
    <link rel="apple-touch-icon" href="{{asset('assets/images/Logo.png')}}" />
    <link rel="apple-touch-icon" href="{{asset('assets/images/Logo72.png')}}" />
    <link rel="apple-touch-icon" href="{{asset('assets/images/Logo144.png')}}" />
    <link rel="apple-touch-icon" href="{{asset('assets/images/Logo196.png')}}" />
    <link rel="canonical" href="https://behantejaratco.ir/َAmirmahdiAsadi">
    <meta name="apple-mobile-web-app-status-bar" content="#aa7700">
    <script src="{{asset('assets/js/app3.js')}}" defer></script>
    <script src="{{asset('assets/js/Amirmahdi.js')}}" defer></script>
    <script src="{{asset('assets/js/bootstrap.js')}}" defer></script>
    <script src="{{asset('assets/js/jquery-3.4.1.slim.min.js')}}" defer></script>
    <script src="{{asset('assets/js/popper.min.js')}}" defer></script>
{{--    <script defer>if ("serviceWorker" in navigator) {--}}
{{--            navigator.serviceWorker--}}
{{--                .register("{{asset('assets/serviceWorker.js')}}")--}}
{{--                .then(reg => {--}}
{{--                    console.log("Service worker registred successfully", reg);--}}
{{--                })--}}
{{--                .catch(err => {--}}
{{--                    console.log("service worker not registred !!", err);--}}
{{--                });--}}
{{--        }--}}
{{--    </script>--}}
</head>
<body onload="load()" id="body" class="no-gutters w-100 body2 no-gutters">
<div class="loade text-light" dir="rtl" id="loade"><div class="loader mb-3"></div>در حال بارگذاری...</div>
<!-- head of site -->
<div class="head d-flex row justify-content-around align-items-center" dir="rtl">
    <span class="w-25 d-flex justify-content-center align-items-center"><a href="{{route('Home.index')}}" class="d-flex justify-content-center align-items-center flex-column A2"><img src="{{asset('assets/images/Logo.png')}}" alt="Brand"></a></span>
    <ul class="Items row justify-content-center align-items-center w-50">
        @if(\Illuminate\Support\Facades\Auth::check())
            @can('edit-aboutme')
                <a href="{{route('Admin.AboutMe.index')}}">
                    <li class="o"><i class="material-icons">event_note</i>مدیریت اطلاعات من</li>
                </a>
            @endcan
            @can('edit-favorite')
                    <a href="{{route('Admin.Favorite.index')}}">
                        <li class="o"><i class="material-icons">favorite_border</i>مدیریت علاقه مندی های من</li>
                    </a>
            @endcan
        @else
            <a href="{{route('Home.index')}}">
                <li class="o">رفتن به اپلیکیشن شرکت<i class="material-icons">airplay</i></li>
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
            @can('edit-favorite')
                <a href="{{route('Admin.Products.index')}}">
                    <li class="o"><i class="material-icons">favorite_border</i>مدیریت علاقه مندی هام</li>
                </a>
            @endcan
            @can('edit-aboutme')
                <a href="{{route('Admin.Editusers.index')}}">
                    <li class="o"><i class="material-icons">event_note</i>مدیریت اطلاعات من</li>
                </a>
            @endcan
        @else
            <a href="{{route('Home.index')}}">
                <li class="o">رفتن به اپلیکیشن شرکت<i class="material-icons">airplay</i></li>
            </a>
        @endif
    </ul>
    {{-- Bottom Menu --}}
    @yield('Amirmahdi')
</div>
<!-- body of site -->

<!-- footer of site -->
<div class="footer text-center">
    <div class="footer2 w-100" dir="rtl">
        <span class="Aks"><img src="{{asset('assets/images/Namad.jpg')}}" alt="Namad"></span>
        <div class="d-flex flex-column justify-content-center align-items-center Tozih">
            <h4 class="border-bottom border-secondary pb-2">امیرمهدی اسدی</h4>
            <p>چکیده خلاصه ای درباره من در این صفحه به شما نمایش داده شده است.</p>
        </div>
        <div class="about d-flex flex-column justify-content-center align-items-center">
            <h4 class="border-bottom border-secondary pb-2">درباره من</h4>
            <p>0933-653-3433</p>
            <p>021-2687-8016</p>
            <p>آدرس:کرج،فردیس،فلکه اول،خیابان امام حسن،بن بست شهید زکایی</p>
            <p>ایمیل من:Amirmahdi-Asadi@behantejaratco.ir</p>
        </div>
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center" dir="rtl">
        <p style="font-size: 10px;margin-bottom: 80px" class="mt-5">طراحی و توسعه توسط امیرمهدی اسدی</p>
        <p style="font-size: 10px;margin-bottom: 10px" class="mt-0 copyright">تمامی حقوق مادی و معنوی این اپلیکیشن متعلق به شرکت بهان تجارت آفرین بوده و هرگونه کپی برداری بدون ذکر منبع پیگرد قانونی را در پی خواهد داشت.</p>
    </div>
</div>
<!-- footer of site -->
</body>
<!-- Designed and Engineered by Amirmahdi Asadi :D -->
</html>

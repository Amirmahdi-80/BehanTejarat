@if(\Illuminate\Support\Facades\Auth::check())
    <!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="description"
          content="وب اپلیکیشن ,شرکت, بهان تجارت,شرکت بهان تجارت , در , زمینه رستوران , داری به مدیریت امیر حسین فلاحی فعالیت دارد،طراحی و توسعه یافته توسط ,امیرمهدی اسدی">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="امیر حسین فلاحی,امیرمهدی اسدی , وب اپلیکیشن ,بهان تجارت ,رستوران,شرکت">
    <meta name="copyright" content="امیرمهدی اسدی | امیر حسین فلاحی">
    <meta name="robots" content="index, follow"/>
    <meta name="Classification" content="بیزینس"/>
    <meta name="author" content="Amirmahdi Asadi, pgamirmahdi@gmail.com"/>
    <meta name="designer" content="امیرمهدی اسدی"/>
    <meta name="owner" content="امیر حسین فلاحی | امیرمهدی اسدی"/>
    <meta name="rating" content="General"/>
    <meta property="og:type" content="website">
    <meta property="og:title" content="وب اپلیکیشن بهان تجارت">
    <meta property="og:description"
          content="وب اپلیکیشن شرکت بهان تجارت,شرکت بهان تجارت  در  زمینه رستوران  داری به مدیریت امیر حسین فلاحی فعالیت دارد،طراحی و توسعه یافته توسط امیرمهدی اسدی">
    <meta property="og:site_name" content="وب اپلیکیشن بهان تجارت آفرین">
    <meta property="og:image" content=”{{asset('assets/images/screenshots/Screenshot3.png')}}”/>
    <meta property="og:locale" content="fa_IR">
    <meta name="theme-color" content="#0ebfff">
    <meta property="og:url" content="https://behantejaratco.ir">
    <meta name="google-site-verification" content="ZctxTrSondLmcLgfS3t9GIP4J8M1DSt0cJYl41xlwJg"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/Home.css?v=version2')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    {{--    IPhone Support   --}}
    <link rel="manifest" href="{{asset('assets/manifest.json')}}"/>
    <link rel="apple-touch-icon" href="{{asset('assets/images/Logo.png')}}"/>
    <link rel="apple-touch-icon" href="{{asset('assets/images/Logo72.png')}}"/>
    <link rel="apple-touch-icon" href="{{asset('assets/images/Logo144.png')}}"/>
    <link rel="apple-touch-icon" href="{{asset('assets/images/Logo196.png')}}"/>
    <link rel="canonical" href="https://behantejaratco.ir/">
    <meta name="apple-mobile-web-app-status-bar" content="#aa7700">
    <script src="{{asset('assets/js/appl2.js')}}" defer></script>
    <script src="{{asset('assets/js/bootstrap.js')}}" defer></script>
    <script src="{{asset('assets/js/jquery-3.4.1.slim.min.js')}}" defer></script>
    <script src="{{asset('assets/js/popper.min.js')}}" defer></script>
    <script defer>if ("serviceWorker" in navigator) {
            navigator.serviceWorker
                .register("{{asset('assets/serviceWorker.js')}}")
                .then(reg => {
                    console.log("Service worker registred successfully", reg);
                })
                .catch(err => {
                    console.log("service worker not registred !!", err);
                });
        }
    </script>
    <script type="application/ld+json" defer>
{
  "@context": "http://schema.org",
  "@type": "LocalBusiness",
  "name": "بهان تجارت آفرین",
  "image": "https://behantejaratco.ir/assets/images/Logo.png",
  "telephone": "09336533433",
  "email": "",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "خیابان وطن پور شمالی",
    "addressLocality": "تهران"
  }
}


    </script>

</head>
<body onload="load()" id="body" class="no-gutters overflow-x-hidden">
<div class="loade text-light" dir="rtl" id="loade">
    <div class="loader mb-3"></div>
    در حال بارگذاری...
</div>

<div class="head2 d-flex justify-content-between align-items-center row" style="height: 60px !important;" dir="rtl">
    <span class="d-flex justify-content-center align-items-center" style="height: 60px;width: fit-content"><a
            href="{{route('Home.index')}}"
            class="d-flex justify-content-center align-items-center flex-column A2 w-100"><img
                src="{{asset('assets/images/Logo.png')}}" alt="Brand" class="No8"></a></span>
    {{--        <div class="d-flex flex-column justify-content-center align-items-center" style="width: fit-content;">--}}
    {{--            <div id="MyClockDisplay" class="clock" onload="showTime()"></div>--}}
    {{--        </div>--}}
    @if(\Illuminate\Support\Facades\Auth::check())
        <span class="d-flex row justify-content-center align-items-center A1 h-100"
              style="width: fit-content !important;gap: 10px;margin-left: 5px !important;">
                @if(auth()->user()->avatar  == "")
                <img src="{{asset('assets/images/Report.png')}}" alt="گزارش" class="No8"
                     onclick="window.open('tel:09336533433');">
                <a href="{{route('Admin.dashboard')}}" class="p-0 m-0"><img src="{{asset('assets/images/Sign-up.png')}}"
                                                                            alt="عکس پروفایل" class="No8"></a>
            @else
                <img src="{{asset('assets/images/Report.png')}}" alt="گزارش" class="No8"
                     onclick="window.open('tel:09336533433');">
                <a href="{{route('Admin.dashboard')}}" class="p-0 m-0"><img
                        src="{{ auth()->user()->avatar ? route('showAvatar', [auth()->user()->avatar]) : '' }}"
                        alt="ProfilePic" style="border-radius: 50px" class="No8"></a>
            @endif
            @else
                <span class="row justify-content-center align-items-center m-2" style="width: fit-content;height: 60px"><a
                        href="{{route('signup.view')}}" class="btn btn-outline-info">ورود/ثبت نام</a></span>
            </span>
    @endif
</div>
<div class="head3">
    <ul class="w-100 d-flex row justify-content-around align-items-center m-0 p-0 h-100 w-100" style="gap: 10px">
        <a href="{{route('HomeApp')}}">
            <li id="li">
                <i class="material-icons">business</i>
                <span>خانه</span>
            </li>
        </a>
        <a href="{{route('Home.index')}}">
            <li>
                <i class="material-icons">add_to_queue</i>
                <span>سایت</span>
            </li>
        </a>
        <a href="{{route('Admin.dashboard')}}">
            <li>
                <i class="material-icons">laptop</i>
                <span>پنل</span>
            </li>
        </a>
    </ul>
</div>

<div class="body bs">
    <div style="width: 85%;margin: 10px 0px" class="lo1"><img src="{{asset('assets/images/Banner.jpg')}}"
                                                              alt="رمضان مبارک" class="w-100"
                                                              style="border-radius: 15px"></div>

    <ul class="ITem my-4">
        @can('edit-products')
        <a href="{{route('Admin.Initialize.index')}}">
        <li>
            <img src="{{asset('assets/images/Vahed.png')}}" alt="واحد ها">
            <span>واحد ها</span>
        </li>
        </a>
        @endcan
            @can('edit-products')
        <a href="{{route('Admin.Sort.index')}}">
        <li>
            <img src="{{asset('assets/images/Sort.png')}}" alt="دسته بندی ها">
            <span>دسته بندی ها</span>
        </li>
        </a>
            @endcan
            @can('edit-products')
        <a href="{{route("Admin.Tamin.index")}}">
        <li>
            <img src="{{asset('assets/images/Tamin.png')}}" alt="تامین کنندگان">
            <span>تامین کنندگان</span>
        </li>
        </a>
            @endcan
            @can('edit-products')
        <a href="{{route("Admin.Vorud.index")}}">
            <li>
                <img src="{{asset('assets/images/Provider.png')}}" alt="ورودی ها">
                <span>ورودی ها</span>
            </li>
        </a>
            @endcan
            @can('edit-products')
                <a href="{{route("Admin.Out.index")}}">
                    <li>
                        <img src="{{asset('assets/images/Out.png')}}" alt="حواله ها">
                        <span>حواله ها</span>
                    </li>
                </a>
            @endcan
            @can('edit-products')
        <a href="{{route("Admin.Links.index")}}">
            <li>
                <img src="{{asset('assets/images/Links.png')}}" alt="تشکیل ساختار">
                <span>تشکیل ساختار</span>
            </li>
        </a>
            @endcan
            @can('edit-products')
        <a href="{{route("Admin.Indicator.index")}}">
            <li>
                <img src="{{asset('assets/images/Indicator.png')}}" alt="َشاخص سازی">
                <span>شاخص  سازی</span>
            </li>
        </a>
            @endcan
            @can('Cars')
        <a href="{{route("Admin.Driver.index")}}">
            <li>
                <img src="{{asset('assets/images/Driver.png')}}" alt="راننده ها">
                <span>راننده ها</span>
            </li>
        </a>
            @endcan
            @can('edit-cost')
        <a href="{{route("Admin.cost.index")}}">
            <li>
                <img src="{{asset('assets/images/Cost.png')}}" alt="هزینه ها">
                <span>هزینه ها</span>
            </li>
        </a>
            @endcan
            @can('edit-cost')
        <a href="{{route("Admin.costSort.index")}}">
            <li>
                <img src="{{asset('assets/images/SortCost.png')}}" alt="دسته هزینه">
                <span>دسته هزینه</span>
            </li>
        </a>
            @endcan
            @can('Soal')
        <a href="{{route("Admin.Soal.index")}}">
            <li>
                <img src="{{asset('assets/images/Soal.png')}}" alt="سوالات متداول">
                <span>سوالات متداول</span>
            </li>
        </a>
            @endcan
            @can('TrueLock')
        <a href="{{route("Admin.Favorite.index")}}">
            <li>
                <img src="{{asset('assets/images/Favorite.png')}}" alt="علاقه مندی هام">
                <span>علاقه مندی هام</span>
            </li>
        </a>
            @endcan
            @can('edit-orders')
        <a href="{{route("Admin.Orders.index")}}">
            <li>
                <img src="{{asset('assets/images/Orders.png')}}" alt="سفارشات">
                <span>سفارشات</span>
            </li>
        </a>
            @endcan
    </ul>
    <div class="mune">
        <ul>
            <a href="{{route('Admin.Products.index')}}">
                <li>
                    <img src="{{asset('assets/images/EditUsers.png')}}" alt="محصولات">
                    <span>محصولات</span>
                </li>
            </a>
            <a href="{{route("Admin.Cars.index")}}">
                <li>
                    <img src="{{asset('assets/images/Cars.png')}}" alt="خودروها">
                    <span>خودرو ها</span>
                </li>
            </a>
            <a href="{{route("Admin.Editusers.index")}}">
                <li>
                    <img src="{{asset('assets/images/EditUser.png')}}" alt="کاربران">
                    <span>کاربران</span>
                </li>
            </a>
            <a href="{{route("Admin.Slider.index")}}">
                <li>
                    <img src="{{asset('assets/images/Slider.png')}}" alt="اسلایدشو">
                    <span>اسلایدشو</span>
                </li>
            </a>
        </ul>
    </div>
    <div id="carouselExampleAutoplaying" class="carousel slide mt-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('assets/images/App.jpg')}}" class="d-block w-100" alt="بهان تجارت" title="بهان تجارت">
            </div>
            @foreach($slides as $slide)
                @if(!$slide->image=='')
                    <div class="carousel-item">
                        <img src="{{ route("files.show", $slide->image) }}" class="d-block w-100 ak"
                             alt="{{$slide->SlideTozih}}" title="{{$slide->SlideTozih}}">
                    </div>
                @endif
            @endforeach
        </div>
        <button class="carousel-control-prev slide2" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">قبلی</span>
        </button>
        <button class="carousel-control-next slide2" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">بعدی</span>
        </button>
    </div>
</div>
<!-- Designed and Engineered by Amirmahdi Asadi :D -->
</body>
</html>
@else
    <script>
        setTimeout(() => {
            location.href = "/login";
        }, 0);
    </script>
@endif

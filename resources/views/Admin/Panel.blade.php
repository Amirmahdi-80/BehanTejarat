<html lang="fa">

<head>
    <meta name="description" content="پنل کاربری شرکت بهان تجارت برای کنترل قسمت ها مختلف">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{asset('assets/css/Panel.css?v=version2')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css?v=version2')}}">
    <link rel="stylesheet" href="{{asset('assets/node_modules/persian-datepicker/dist/css/persian-datepicker.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    {{--    IPhone Support   --}}
    <link rel="manifest" href="{{asset('assets/manifest.json')}}"/>
    <link rel="apple-touch-icon" href="{{asset('assets/images/Logo.png')}}"/>
    <link rel="apple-touch-icon" href="{{asset('assets/images/Logo72.png')}}"/>
    <link rel="apple-touch-icon" href="{{asset('assets/images/Logo144.png')}}"/>
    <link rel="apple-touch-icon" href="{{asset('assets/images/Logo196.png')}}"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous" defer></script>
    <meta name="apple-mobile-web-app-status-bar" content="#aa7700">
    <script src="{{asset('assets/js/Panel.js?v=version2')}}" defer></script>
    <script src="{{asset('assets/js/bootstrap.js?v=version2')}}" defer></script>
    <script src="{{asset('assets/node_modules/persian-datepicker/dist/js/persian-datepicker.js')}}" defer></script>
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
{{-- for activing animation add class (bubbles) to body --}}
<body class="row justify-content-center align-items-start h-100 no-gutters overflow-hidden" dir="rtl" onload="load()"
      id="body">
<div class="loading">
    <div class="lds-roller">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    در حال بارگذاری
</div>
<div class="h-100 right pl-0" id="right">
    <div class="row justify-content-center align-items-center Profile mb-4"><img
            src="{{asset('assets/images/Logo.png')}}" alt="BrandPic" height="70px">
        <h4>شرکت بهان تجارت</h4>
    </div>
    <div class="w-100 d-flex flex-column justify-content-start align-items-center overflow-auto">
        <ul class="d-flex flex-column justify-content-start align-items-center M">
            <a href="{{route('Admin.dashboard')}}">
                <li>صفحه اصلی<i class="material-icons">home</i></li>
            </a>
            @can('edit-products')
                <span class="w-100" onclick="rotate2()" id="Men2">
                            <button class="w-100" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample2"
                                    aria-expanded="false" aria-controls="collapseExample2">
                                واحد برنامه ریزی محصولات
                                <i class="material-icons" id="rotate2">arrow_drop_down_circle</i>
                            </button>
                            <div class="collapse" id="collapseExample2">
                                <ul>
                                    <a href="{{route("Admin.Products.index")}}"><li>مدیریت محصولات<i
                                                class="material-icons">dashboard</i></li></a>
                                    <a href="{{route("Admin.Initialize.index")}}"><li>واحد ها<i
                                                class="material-icons">assessment</i></li></a>
                                    <a href="{{route("Admin.Sort.index")}}"><li>دسته بندی  ها<i
                                                class="material-icons">dehaze</i></li></a>
                                    <a href="{{route("Admin.Tamin.index")}}"><li>تامین کنندگان<i
                                                class="material-icons">view_agenda</i></li></a>
                                    <a href="{{route("Admin.Vorud.index")}}"><li>ورودی ها<i
                                                class="material-icons">account_balance_wallet</i></li></a>
                                    <a href="{{route("Admin.Out.index")}}"><li>حواله ها(خروجی)<i
                                                class="material-icons">call_split</i></li></a>
                                    <span class="w-100" onclick="rotate6()" id="Men6">
                            <button class="w-100" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse6"
                                    aria-expanded="false" aria-controls="collapse6">
                                شاخص ها
                                <i class="material-icons" id="rotate6">arrow_drop_down_circle</i>
                            </button>
                            <div class="collapse" id="collapse6">
                                <ul>
                                    <a href="{{route("Admin.Links.index")}}"><li>مرحله اول تشکیل ساختار<i
                                                class="material-icons">attachment</i></li></a>
                                    <a href="{{route("Admin.Indicator.index")}}"><li>مرحله دوم شاخص سازی<i
                                                class="material-icons">add_to_photos</i></li></a>
                                    <a href="{{route("Admin.Indicators.index")}}"><li>دریافت گزارش شاخص ها<i
                                                class="material-icons">assignment</i></li></a>
                                </ul>
                            </div>
                        </span>
                                </ul>
                            </div>
                        </span>
            @endcan
            @can('Cars')
                <span class="w-100" onclick="rotate()" id="Men1">
                            <button class="w-100" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample"
                                    aria-expanded="false" aria-controls="collapseExample">
                                واحد کنترل خودرو
                                <i class="material-icons" id="rotate">arrow_drop_down_circle</i>
                            </button>
                            <div class="collapse" id="collapseExample">
                                <ul>
                                    <a href="{{route("Admin.Cars.index")}}"><li>کنترل خودرو ها<i class="material-icons">airport_shuttle</i></li></a>
                                    <a href="{{route("Admin.Driver.index")}}"><li>کنترل راننده ها<i
                                                class="material-icons">drive_eta</i></li></a>
                                    <a href="{{route("Admin.CarsTransfer.index")}}"><li>کنترل ورود و خروج ها<i
                                                class="material-icons">av_timer</i></li></a>
                                </ul>
                            </div>
                        </span>
            @endcan
            @can('edit-cost')
                <span class="w-100" onclick="rotate3()" id="Men3">
                            <button class="w-100" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample3"
                                    aria-expanded="false" aria-controls="collapseExample3">
                                واحد کنترل هزینه ها
                                <i class="material-icons" id="rotate3">arrow_drop_down_circle</i>
                            </button>
                            <div class="collapse" id="collapseExample3">
                                <ul>
                                    <a href="{{route("Admin.cost.index")}}"><li>کنترل هزینه ها<i class="material-icons">assignment</i></li></a>
                                    <a href="{{route("Admin.costSort.index")}}"><li>کنترل دسته هزینه ها<i
                                                class="material-icons">assignment_returned</i></li></a>
                                </ul>
                            </div>
                        </span>
            @endcan
            <span class="w-100" onclick="rotate4()" id="Men4">
                            <button class="w-100" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample4"
                                    aria-expanded="false" aria-controls="collapseExample4">
                                مدیریت صفحه اصلی اپ
                                <i class="material-icons" id="rotate4">arrow_drop_down_circle</i>
                            </button>
                            <div class="collapse" id="collapseExample4">
                                <ul>
                                    @can('Soal')
                                        <a href="{{route('Admin.Soal.index')}}">
                                            <li>مدیریت سوالات متداول<i class="material-icons">chat</i></li>
                                        </a>
                                    @endcan
                                    @can('edit-slides')
                                        <a href="{{route('Admin.Slider.index')}}">
                                            <li>مدیریت اسلایدشو<i class="material-icons">add_to_queue</i></li>
                                        </a>
                                    @endcan
                                </ul>
                            </div>
                        </span>
            @can('TrueLock')
                <span class="w-100" onclick="rotate5()" id="Men5">
                            <button class="w-100" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample5"
                                    aria-expanded="false" aria-controls="collapseExample5">
                                مدیریت اطلاعات من
                                <i class="material-icons" id="rotate5">arrow_drop_down_circle</i>
                            </button>
                            <div class="collapse" id="collapseExample5">
                                <ul>
                                    @can('edit-aboutme')
                                        <a href="{{route('Admin.AboutMe.index')}}">
                                            <li>مدیریت مشخصات من<i class="material-icons">event_note</i></li>
                                        </a>
                                    @endcan
                                    @can('edit-favorite')
                                        <a href="{{route('Admin.Favorite.index')}}">
                                            <li>مدیریت علاقه مندی های من<i
                                                    class="material-icons">favorite_border</i></li>
                                        </a>
                                    @endcan
                                </ul>
                            </div>
                        </span>
            @endcan
            @can('edit-orders')
                <a href="{{route("Admin.Orders.index")}}">
                    <li>مدیریت سفارشات<i class="material-icons">add_shopping_cart</i></li>
                </a>
            @endcan
            @can('edit-users')
                <a href="{{route('Admin.Editusers.index')}}">
                    <li>مدیریت کاربران<i class="material-icons">folder_shared</i></li>
                </a>
            @endcan
                <a href="{{route("Admin.RegUp.index")}}">
                    <li>ویرایش اطلاعات کاربری<i class="material-icons">build</i></li>
                </a>
            <a href="{{route('Home.index')}}">
                <li>بازگشت به سایت<i class="material-icons">exit_to_app</i></li>
            </a>
        </ul>
    </div>
    <button type="button"
            class="btn btn-danger btn-lg flex-column justify-content-center align-items-center"
            onclick="Menu2()" id="Dokme2"><i class="material-icons">close</i>بستن
    </button>
    <div class="d-flex flex-column justify-content-between align-items-center changes p-2" onmouseenter="change1()"
         onclick="change1()" id="change" onmouseleave="change1()">
        <span>آخرین تغییرات</span>
        <ul class="text-right mt-3 w-100 pr-3">
            <li>رفع باگ فرم انتخابی</li>
            <li>بهینه سازی صفحات و سرعت اپ</li>
            <li>رفع باگ های جزئی</li>
            <li>افزودن صفحه ادیت شاخص ها</li>
            <li>افزودن صفحه مشاهده شاخص ها</li>
            <li>اضافه شدن انیمیشن های جدید</li>
            <li>اضافه شدن شاخص ها</li>
            <li>مرتب سازی اعداد و اضافه شدن ریال به آنها</li>
            <li>مرتب سازی کیلومتر خودرو ها</li>
            <li>اضافه شدن هوش تشخیص نقطه سفارش انبار</li>
            <li>تکمیل صفحه ورود محصولات</li>
            <li>اضافه شدن اعلان به اپ</li>
            <li>به روز رسانی صفحه اصلی و افزوده شدن مشخصات کاربر</li>
        </ul>
        <p class="">ورژن اپ: 2.0.0</p>
    </div>
</div>

<div class="h-100 d-flex flex-column justify-content-start align-items-start Disp p-0">
    <div class="bar text-right d-flex flex-column justify-content-center align-items-center"
         dir="rtl">
        <div class="row justify-content-around align-items-center w-100">
            <div class="row justify-content-start align-items-center Prof">
                @if(auth()->user()->avatar  == "")
                    <img src="{{asset('assets/images/Sign-up.png')}}" alt="عکس پروفایل">
                @else
                    <img src="{{ auth()->user()->avatar ? route('showAvatar', [auth()->user()->avatar]) : '' }}"
                         alt="ProfilePic" style="width: 60px;height: 60px;border-radius: 50px">
                @endif
                <div class="d-flex flex-column justify-content-center align-items-center">
                            <span>
                                {{ auth()->user()->Firstname }} {{ auth()->user()->Lastname }}
                            </span>
                    @can('Role')
                        <span
                            style="font-size:11px;margin-top:5px;border-top:1px solid #fff;padding-top:5px;margin-bottom: 0px !important;">{{ auth()->user()->Role}}</span>
                    @endcan
                </div>
            </div>
            <span class="row justify-content-center align-items-center Bate" style="gap: 10px;margin-bottom: 0px !important;">
            <button type="button"
                    class="btn btn-dark flex-column justify-content-center align-items-center"
                    onclick="Menu()" id="Dokme"><i class="material-icons">dehaze</i>منو</button>
            <a href="{{route('logout')}}"
               class="btn btn btn-danger d-flex flex-column justify-content-center align-items-center"><i
                    class="material-icons">exit_to_app</i>خروج</a>
            </span>
        </div>
    </div>
    <div class="wel d-flex flex-column align-items-center overflow-auto">
        @yield('ZPanel')
    </div>
    <div class="notif" id="notif" onclick="notif()"><i class="material-icons">alarm_on</i><span id="badge" class="badge"></span></div>
    <div class="noti" id="noti">
        <h6 class="mt-2">اعلانها</h6>
        <ul>
            @foreach($Products as $product)
                @if($product->Storage <= $product->OrderDot & !$product->Storage=="")
                    <a href="{{route('Admin.Products.index')}}" class="co">
                        <li>
                            محصول {{$product->ProductComment}}  به نقطه سفارش رسیده است
                        </li>
                    </a>
                @endif
            @endforeach
            <span id="elan">در حال حاضر هیچ اعلانی برای نمایش وجود ندارد.</span>
        </ul>
    </div>
</div>
{{--    <div class="bubble"></div>--}}
{{--    <div class="bubble"></div>--}}
{{--    <div class="bubble"></div>--}}
{{--    <div class="bubble"></div>--}}
{{--    <div class="bubble"></div>--}}
{{--    <div class="bubble"></div>--}}
{{--    <div class="bubble"></div>--}}
<script src="{{asset('assets/node_modules/persian-date/dist/persian-date.js')}}" type="text/javascript" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
{{--<script src="{{asset('assets/node_modules/jquery/dist/jquery.js')}}" type="text/javascript"></script>--}}
<script type="text/javascript">``

    function PrintDiv() {
        var divContents = document.getElementById("printdivcontent").innerHTML;
        var printWindow = window.open('', '', 'height=500,width=400');
        printWindow.document.write('<head><link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css?v=version2')}}"><link rel="stylesheet" href="{{asset('assets/css/print.css?v=version2')}}"><link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><title>Print</title>');
        printWindow.document.write('</head>');
        printWindow.document.write(divContents);
        printWindow.document.close();
        printWindow.print();
    }
</script>
<script>
    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
    });
</script>
<!-- Designed and Engineered by Amirmahdi Asadi :D -->
</body>
</html>

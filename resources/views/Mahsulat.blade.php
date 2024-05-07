@extends('Home')

@section('content2')
    {{--    @foreach($items as $item)--}}
    {{--        <div class="card text-right m-3" style="width: 18rem;" dir="rtl">--}}
    {{--            <!-- <img src="..." class="card-img-top" alt="محصول 1"> -->--}}
    {{--            <div class="card-body">--}}
    {{--                <h5 class="card-title">نام محصول:</h5>--}}
    {{--                <h4>{{$item->ProductComment}}</h4>--}}
    {{--            </div>--}}
    {{--            <ul class="list-group list-group-flush">--}}
    {{--                <li class="list-group-item"><span>شناسه محصول:</span><span>{{$item->ProductId}}</span></li>--}}
    {{--                <li class="list-group-item"><span>دسته محصول:</span><span>{{$item->Sort}}</span></li>--}}
    {{--                <li class="list-group-item"><span>توضیحات محصول:</span><span>{{$item->Details2}}</span></li>--}}
    {{--                <li class="list-group-item"><span>امکان ارسال:</span><span>@if($item->Send)--}}
    {{--                            <td><i class="text-success material-icons">done</i></td>--}}
    {{--                        @else--}}
    {{--                            <td><i class="text-danger material-icons">close</i></td>--}}
    {{--                        @endif</span></li>--}}
    {{--                <li class="list-group-item"><span>مقدار وزن موجود:</span><span>{{$item->ProductNo}} {{$item -> Vahed}}</span></li>--}}
    {{--            </ul>--}}
    {{--            <div class="card-body row justify-content-around align-items-center">--}}
    {{--                @if($item->Send)--}}
    {{--                <a href="{{ route('Home.edit', $item->id) }}" class="btn btn-block btn-outline-success">مشاهده و ثبت--}}
    {{--                    سفارش</a>--}}
    {{--                @else--}}
    {{--                    <a href="{{ route('Home.edit', $item->id) }}" class="btn btn-block btn-outline-success disabled">مشاهده و ثبت--}}
    {{--                        سفارش</a>--}}
    {{--                    <span style="font-size: 10px" class="mt-2">به دلیل عدم امکان ارسال،قادر به ثبت سفارش نیستید</span>--}}
    {{--                @endif--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    @endforeach--}}
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
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
    <ul class="w-100 d-flex justify-content-around align-items-center row No6" style="margin-bottom: 100px">
        <a class="l" href="{{route('Admin.Driver.index')}}">
            <li><img src="{{asset('assets/images/Cars2.png')}}" alt="رانندگان" class="" title="رانندگان">رانندگان
            </li>
        </a>
        <a class="l" href="{{route('Admin.Initialize.index')}}">
            <li><img src="{{asset('assets/images/VahedHome.png')}}" alt="واحد ها" class="" title="واحد ها">واحد ها</li>
        </a>
        <a class="l" href="{{route('Admin.Slider.index')}}">
            <li><img src="{{asset('assets/images/SliderHome.png')}}" alt="اسلایدر" class="" title="اسلایدر">اسلایدر</li>
        </a>
        <a class="l" href="{{route('Admin.cost.index')}}">
            <li><img src="{{asset('assets/images/PriceHome.png')}}" alt="دسته هزینه ها" class="" title="دسته هزینه ها">دسته
                هزینه ها
            </li>
        </a>
        <a class="l" href="{{route('Admin.Tamin.index')}}">
            <li><img src="{{asset('assets/images/Provider.png')}}" alt="تامین کنندگان" class="" title="تامین کنندگان">تامین
                کنندگان
            </li>
        </a>
    </ul>

    <span class="d-flex flex-column justify-content-center align-items-center"><h1
            class="m-0 mb-4">بهان تجارت آفرین</h1>
    <p class="m-0">به اپلیکیشن تحت وب شرکت بهان تجارت خوش آمدید،</p>
    <p style="margin-bottom: 75px" class="w-75 text-center" id="Cars">بهان تجارت شرکتی فعال در حوزه رستوران داری می باشد که دارای
        برندهای مختلفی مثل کساب،
        گشنیز، چیکولند،جوسی برگر و آزومی می باشد. این شرکت در حال حاضر حدود 15 شعبه فعال در سطح شهر تهران را دارا بوده و
        بیش از 300 نفر پرسنل در آن مشغول به کار می باشند. پرسنل این شرکت جزء سرمایه های معنوی بوده و ارتقاء کمی و کیفی
        آنها جزء اهداف اصلی مدیران شرکت می باشد.</p></span>
    <div class="No5 lo1" oncontextmenu="return false;" onmousedown='return false;'
         onselectstart='return false;'>
        <h5>خودرو های شرکت</h5>
        @cannot('edit-cars')
            <div class="lock">شما به این صفحه دسترسی ندارید<i class="material-icons">enhanced_encryption</i></div>
        @endcannot
        <div class="outer">
            <div>@if($Cars->isnotempty())
                    @foreach($Cars as $car)
                        <div class="card text-center p-0" style="width: 18rem;" dir="rtl">
                            <div class="card-body pt-1 pb-0 w-100">
                                <h5 class="w-100">{{$car->CarName}}</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                    <span class="d-flex justify-content-center align-items-center flex-column">
                    @if(!$car->image=="")
                            <img
                                class="avatar img-circle"
                                src="{{ route("files.show", $car->image) }}" alt="{{$car->CarName}}"
                                title="{{$car->CarName}}"
                                style="border-radius: 5px">
                        @else
                            <img src="{{asset('assets/images/Car.png')}}" alt="عکس ندارد">
                        @endif
                        </span>
                                <span class="text-center pt-2"
                                      style="border-bottom: 1px solid #0ebfff;font-size: 16px">مشخصات</span>
                                <li class="list-group-item"><span>نام خودرو:</span><span>{{$car->CarName}}</span></li>
                                <li class="list-group-item"><span>کیلومتر کارکرد:</span><span>{{number_format($car->Kilometer,0,".",",")}}Km</span>
                                </li>
                                @can('edit-cars')
                                    <li class="list-group-item"><span>شماره پلاک:</span><span>{{$car->CarPlate}}</span>
                                    </li>
                                    <li class="list-group-item"><span>بیمه شخص ثالث:</span><span>@if(!$car->BimeSales == "")
                                                <i class="text-success material-icons">done</i>
                                            @else
                                                <i class="text-danger material-icons">close</i>
                                            @endif</span></li>
                                    <li class="list-group-item"><span>کارت خودرو:</span><span>@if(!$car->CarCard == "")
                                                <i class="text-success material-icons">done</i>
                                            @else
                                                <i class="text-danger material-icons">close</i>
                                            @endif</span></li>
                                    <li class="list-group-item"><span>بیمه بدنه:</span><span>@if(!$car->Badane == "")
                                                <i class="text-success material-icons">done</i>
                                            @else
                                                <i class="text-danger material-icons">close</i>
                                            @endif</span></li>
                                @endcan
                            </ul>
                        </div>
                    @endforeach
                @else
                    <span class="m-5">هنوز هیچ خودرویی بارگذاری نشده</span>
                @endif</div>
        </div>

        @if(\Illuminate\Support\Facades\Auth::check())
            @can('edit-cars')
                <a href="{{route('Admin.Cars.index')}}"
                   class="btn btn-outline-secondary row justify-content-center align-items-center"><i
                        class="pl-2 material-icons">directions_car</i>مدیریت خودرو ها</a>
            @endcan
        @else
            <a href="{{route('Admin.Cars.index')}}"
               class="btn btn-outline-secondary disabled d-flex row justify-content-center align-items-center"><i
                    class="pl-2 material-icons">directions_car</i>مدیریت خودرو ها</a>
            <span class="mt-1 text-secondary" style="font-size: 8px;">شما به این قسمت دسترسی ندارید!</span>
        @endif
    </div>
    <ul class="w-100 d-flex justify-content-around align-items-center row No6 lo1" style="margin-top: 100px">
        <li class="l2"><img src="{{asset('assets/images/Proving.png')}}" alt="در حال توسعه" class=""
                            title="درحال توسعه">در حال توسعه
        </li>
        <li class="l2"><img src="{{asset('assets/images/InternalDomain.png')}}" alt="دامنه داخلی ir" class=""
                            title="دامنه داخل ir">دامنه داخلی ir
        </li>
        <li class="l2"><img src="{{asset('assets/images/AntiDDOS.png')}}" alt="Anti DDOS" class="" title="Anti DDOS">Anti
            DDOS
        </li>
        <li class="l2"><img src="{{asset('assets/images/https.png')}}" alt="پروتکل https" class="" title="پروتکل https">پروتکل
            https
        </li>
        <li class="l2"><img src="{{asset('assets/images/Bcrypt.png')}}" alt="رمز نگاری bcrypt" class=""
                            title="رمزنگاری bcrypt">رمزنگاری
            bcrypt
        </li>
    </ul>
    <div class="No7 lo1 mt-5" oncontextmenu="return false;" onmousedown='return false;'
         onselectstart='return false;'>
        @cannot('edit-cars')
            <div class="lock">شما به این صفحه دسترسی ندارید<i class="material-icons">enhanced_encryption</i></div>
        @endcannot
        <h5 class="text-light w-50">ورود خروج خودرو های شرکت</h5>
        <div class="outer">
                @if($CarT->isnotempty())
                    @foreach($CarT as $cart)
                        <div class="cart" style="width: 20%"><ul
                                class="d-flex flex-column justify-content-around align-items-center p-0 kh">
                    <span class="d-flex justify-content-center align-items-center flex-column prof">
                        @foreach($Cars as $car)
                            @if($cart->car_id == $car->CarName)
                                @if(!$car->image == "")
                                    <img
                                        class="avatar3 img-circle"
                                        src="{{ route("files.show", $car->image) }}" alt="{{$car->CarName}}"
                                        title="{{$car->CarName}}"
                                        style="border-radius: 5px;width: 100% !important;">
                                @else
                                    <img src="{{asset('assets/images/Car.png')}}" alt="عکس ندارد" style="width: 100% !important;">
                                @endif
                            @endif
                        @endforeach
                        </span>
                                <span class="d-flex flex-column w-100 justify-content-center align-items-center">
                    <li class="list-group-item"
                        style="border-top: 1px solid gainsboro"><span>نام خودرو:</span><span>{{$cart->car_id}}</span></li>
                    <li class="list-group-item"><span>تاریخ ثبت:</span><span>{{$cart->date}}</span></li>
                                    <li class="list-group-item"><span>کیلومتر پیموده:</span><span>{{number_format($cart->Kilometer,0,".",",")}}Km</span></li>
                                    <li class="list-group-item"><span>توضیحات:</span><span>{{$cart->Tozih}}</span></li>
                                    </span>
                            </ul>
                            <ul class="d-flex flex-column justify-content-between align-items-center p-0 kh border-0">
                            <span class="d-flex justify-content-center align-items-center flex-column prof">
                                @foreach($Driver as $driver)
                                    @if($cart->driver_id == $driver->DriverName)
                                        @if(!$driver->image =='')
                                            <img
                                                class="avatar2 img-circle"
                                                src="{{ route("files.show", $driver->image) }}"
                                                alt="{{$driver->DriverName}}"
                                                title="{{$driver->DriverName}}"
                                                style="border-radius: 5px;width: 100% !important;">
                                        @else
                                            <img src="{{asset('assets/images/Car.png')}}" alt="عکس ندارد" style="width: 100% !important;">
                                        @endif
                                    @endif
                                @endforeach
                            </span>
                            <span class="d-flex flex-column w-100 justify-content-center align-items-center">
                                    @foreach($Driver as $driver)
                                    @if($cart->driver_id == $driver->DriverName)
                                        <li class="list-group-item"
                                            style="border-top: 1px solid gainsboro"><span>نام راننده:</span><span>{{$cart->driver_id}}</span></li>
                                        <li class="list-group-item"><span>شماره تماس:</span><span>{{$driver->DriverNumber}}</span></li>
                                        <li class="list-group-item"><span>شماره ملی:</span><span>{{$driver->MeliCode}}</span></li>
                                        <li class="list-group-item"><span>گواهینامه رانندگی:</span><span>@if(!$driver->DriverLicence == "")
                                                    <i class="text-success material-icons">done</i>
                                                @else
                                                    <i class="text-danger material-icons">close</i>
                                                @endif</span></li>
                                    @endif
                                @endforeach
                            </span>
                        </ul>
                            </div>
                    @endforeach
                @else
                    <span class="m-5">هنوز هیچ ورود خروجی ثبت نشده</span>
                @endif
        </div>
        <a href="{{route('Admin.CarsTransfer.index')}}"
           class="btn btn-outline-light row justify-content-center align-items-center mt-4"><i
                class="pl-2 material-icons">directions_car</i>مدیریت ورود خروج ها</a>
    </div>
    <div style="width: 85%;margin: 80px 0px" class="lo1"><img src="{{asset('assets/images/Banner.jpg')}}"
                                                              alt="رمضان مبارک" class="w-100"
                                                              style="border-radius: 15px"></div>
    <div class="Doks w-75 lo1">
        <h2>سوالات متداول <i class="material-icons">announcement</i></h2>
        @foreach($Soal as $soal)
            <div id="accordion" class="d-flex flex-column justify-content-center align-items-center w-100 mb-3">
                <button class="Dok" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$soal->id}}"
                        aria-expanded="false" aria-controls="collapse{{$soal->id}}">
                    <span>{{$soal->Question}}</span><i class="material-icons">add</i>
                </button>
                <div class="collapse w-100" id="collapse{{$soal->id}}">
                    <div class="card card-body">
                        {{$soal->Answer}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@extends('About.LinkAboutMe')
@section('Amirmahdi')
    <div class="w-100 profile" oncontextmenu="return false;" onmousedown='return false;' onselectstart='return false;'>
        <img src="{{asset('assets/images/Amirmahdi.jpg')}}" alt="امیرمهدی اسدی" title="امیرمهدی اسدی">
        @foreach($aboutme as $about)
            <h1 class="mt-5">{{$about->Name}}</h1>
            <h2>{{$about->Known}}</h2>
        @endforeach
        <div class="Toz lo">
            <span>توضیحی مختصر درباره من<i class="material-icons">fingerprint</i></span>
            <div class="To">سلام،امیرمهدی اسدی هستم 21 سال دارم از شهر کرج، متولد 18 آبان 1380، در حال حاضر دانشجوی
                رشته مهندسی کامپیوتر دانشگاه آزاد کرج واحد گوهردشت هستم.
                همچنین من در حال حاضر در شرکت بهان تجارت آفرین با سمت شغلی برنامه نویس ارشد مشغول به کار هستم و در زمینه برنامه نویسی در هر دو سمت بک اند و فرانت اند یا همان فول استک
                مشغول به کار هستم.
                دوره های برنامه نویسیم رو در مجتمع فنی تهران واحد کرج/آزادگان گذروندم  که دوره های بسیاری کاملی بودند و به من در زمنیه برنامه نویسی و یادگیری آن بسیاری کمک نمودند،من پس از پایان دوره بک اند و فرانت اند در مجموع 6 مدرک برنامه نویسی در این زمینه کسب کردم که
                این مدارک در کشور های دیگر نیز قابل ترجمه بوده و از اعتبار بالایی برخوردار هستش. از طرف دیگر من دوره زبان
                انگلیسیم رو در جهاد دانشگاهی گذروندم که حدودا 3 سال زمان برد تا بتونم مدرک دیپلم زبان انگلیسی رو از این
                مجموعه کسب کنم. رشته تحصیلی من در زمان تحصیل در مدرسه ریاضی فیزیک بود که تونستم با معدل 17 مدرک دیپلم
                ریاضی فیزیک رو به دست بیارم.چنانچه علاقه داشتید میتونید رزومه من رو از باکس زیر دریافت کنید و اون رو
                مطالعه کنید.یکی از چالش های بزرگی که با اون مواجه شدم گرفتن کار و پروژه بزرگ توی شرکت بهان تجارت آفرین
                بود
                @can('TrueLock')
                    یکی از مهم ترین عواملی که باعث شد من این چالش بزرگ رو قبول کنم و انگیزه های بسیاری بهم داد و دائما
                    حامی من بود در این شرایط همدم من محدثه یزدانی بود که همه جوره بهم این اعتماد و اطمینان رو داد که
                    خودم رو باور داشته باشم و سراغ این چالش برم،اون نقشه به سزایی در انتخاب این مسیر و قدم برداشتن من تو این مسیر داشت و بخاطر انگیزه ها و حمایت های اون بود که من این چالش رو گرفتم
                    و تونستم با موفقیت این چالش بزرگ رو پشت سر بزارم و در این کار موفق بشم تا هم رزومم پر بار تر بشه و
                    هم تجربه های زیادی در این کار و در این زمینه کسب کنم،ازت ممنونم بخاطر همه ی حمایتات عزیزم،بهترین حامی من!
                @endcan
                خداروشکر میکنم که حامی های من باعث شدن تا من به خودم باور داشته باشم و این چالش رو با موفقیت پشت سر
                بزارم و در این زمینه و کار تجربه های بسیار جدید و با ارزشی رو کسب کنم.
                همیشه به خودتون و توانایی هاتون باور داشته باشید،اگر چیزی به ذهن شما خطور میکنه که میتونیدموفق بودن توش رو تصور کنید
                مطمئن باشید شما توانایی انجام اون کار رو خواهید داشت،چون اگر توانایی هاشو نداشتید هیچوقت خدا این فکر رو
                در ذهن و فکر شما قرار نمیداد.
                <p class="text-center mt-5 font-italic font-weight-bolder d-flex flex-column justify-content-center align-items-center w-100"
                   style="font-size: 20px" dir="ltr">Believe that dreams come true whenever your thoughts meet by your
                    actions!</p>
            </div>
        </div>

        @foreach($aboutme as $about)
            <div class="Resume lo">
                <div class="Resume-detail">
                    <h4>رزومه من</h4>
                    <span>شما میتوانید با کلیک بر روی دکمه روبرو رزومه من رو دانلود کنید.</span>
                </div>
                <div class="Resume-downloadbox">
                    @if(!$about->Resume=="")
                        <a href="{{ route("files.show", $about->Resume) }}" title="رزومه امیرمهدی اسدی" class="Res"><img
                                src="{{asset('assets/images/Resume.png')}}" alt="رزومه"
                                style="width: 50px;height: fit-content"></a>
                    @else
                        <span>خالی</span>
                    @endif
                </div>
            </div>
        @endforeach
        <div class="Toz mb-5 lo">
            <span>زبان های برنامه نویسی که با آنها کار کرده ام<i class="material-icons">book</i></span>
            <div class="To2">
                <span class="badge text-bg-warning border-0 d-inline">HTML</span>
                <span class="badge text-bg-primary border-0 d-inline">CSS</span>
                <span class="badge text-bg-warning border-0 d-inline">JavaScript</span>
                <span class="badge text-bg-info border-0 d-inline">Bootstrap</span>
                <span class="badge text-bg-danger border-0 d-inline">Sass</span>
                <span class="badge text-bg-danger border-0 d-inline">Scss</span>
                <span class="badge text-bg-danger border-0 d-inline">Less</span>
                <span class="badge text-bg-info border-0 d-inline">PHP</span>
                <span class="badge text-bg-danger border-0 d-inline">Laravel</span>
                <span class="badge text-bg-primary border-0 d-inline">MySQL</span>
                <span class="badge text-bg-secondary border-0 d-inline">Apachee</span>
                <span class="badge text-bg-light border-0 d-inline">MariaDB</span>
                <span class="badge text-bg-primary border-0 d-inline">Python</span>
                <span class="badge text-bg-light border-0 d-inline">C++</span>
                <span class="badge text-bg-warning border-0 d-inline">Ajax</span>
                <span class="badge text-bg-warning border-0 d-inline">JQuery</span>
            </div>
        </div>


        <div class="No7 mt-5 mb-5 back lo" id="Cars">
            <h5 class="w-50 text-light">علاقه مندی های من</h5>
            <span class="d-flex row justify-content-center align-items-center wrapper" style="gap: 10px">
                @if($favorite->isnotempty())
                    @foreach($favorite as $fav)
                        <div class="fav">
                            @cannot('TrueLock')
                                <div class="lock">شما به این قسمت دسترسی ندارید<i class="material-icons">enhanced_encryption</i></div>
                            @endcannot
                            <img src="{{ route("files.show", $fav->Pic) }}" class="fav-pic" oncontextmenu="return false;">
                                <div class="info">
                                    <h4>{{$fav->Name}}</h4>
                                    <p>{{$fav->Tozih}}</p>
                                </div>
                        </div>
                    @endforeach
                @else
                    <span class="m-5">هنوز هیچ علاقه مندی ثبت نشده</span>
                @endif
        </span>
        </div>
        <div class="Emza lo">
            <p>امیرمهدی اسدی بیگزاد محله</p>
            <img src="{{asset('assets/images/Emza.png')}}" alt="امضا" oncontextmenu="return false;">
        </div>
    </div>
@endsection

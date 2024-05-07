<!DOCTYPE html>
<html lang="fa">

<head>
    <meta http-equiv="pragma" content="no-cache" />
    <meta charset="UTF-8">
    <meta name="description" content="وب اپلیکیشن ,شرکت, بهان تجارت,شرکت بهان تجارت , در , زمینه رستوران , داری به مدیریت امیر حسین فلاحی فعالیت دارد،طراحی و توسعه یافته توسط ,امیرمهدی اسدی">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="امیر حسین فلاحی,امیرمهدی اسدی , وب اپلیکیشن ,بهان تجارت ,رستوران,شرکت">
    <meta name="copyright" content="امیرمهدی اسدی | امیر حسین فلاحی">
    <meta name="robots" content="index, follow" />
    <meta name="Classification" content="بیزینس" />
    <meta name="author" content="Amirmahdi Asadi, pgamirmahdi@gmail.com" />
    <meta name="designer" content="امیرمهدی اسدی" />
    <meta name="owner" content="امیر حسین فلاحی | امیرمهدی اسدی" />
    <meta name="rating" content="General" />
    <meta property="og:type" content="website">
    <meta property="og:title" content="وب اپلیکیشن بهان تجارت">
    <meta property="og:description" content="وب اپلیکیشن شرکت بهان تجارت,شرکت بهان تجارت  در  زمینه رستوران  داری به مدیریت امیر حسین فلاحی فعالیت دارد،طراحی و توسعه یافته توسط امیرمهدی اسدی">
    <meta property="og:site_name" content="وب اپلیکیشن بهان تجارت آفرین">
    <meta property="og:image" content=”{{asset('assets/images/screenshots/Screenshot3.png')}}” />
    <meta property="og:locale" content="fa_IR">
    <meta name="theme-color" content="#0ebfff">
    <meta property="og:url" content="https://behantejaratco.ir">
    <meta name="google-site-verification" content="ZctxTrSondLmcLgfS3t9GIP4J8M1DSt0cJYl41xlwJg" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/Home.css?v=version2')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    {{--    IPhone Support   --}}
    <link rel="manifest" href="{{asset('assets/manifest.json')}}" />
    <link rel="apple-touch-icon" href="{{asset('assets/images/Logo.png')}}" />
    <link rel="apple-touch-icon" href="{{asset('assets/images/Logo72.png')}}" />
    <link rel="apple-touch-icon" href="{{asset('assets/images/Logo144.png')}}" />
    <link rel="apple-touch-icon" href="{{asset('assets/images/Logo196.png')}}" />
    <link rel="canonical" href="https://behantejaratco.ir/">
    <meta name="apple-mobile-web-app-status-bar" content="#aa7700">
    <script src="{{asset('assets/js/app3.js')}}" defer></script>
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
<body onload="load()" id="body" class="no-gutters">
<div class="loade text-light" dir="rtl" id="loade"><div class="loader mb-3"></div>در حال بارگذاری...</div>
@yield('content')
<!-- Designed and Engineered by Amirmahdi Asadi :D -->
</body>
</html>

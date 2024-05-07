@extends('Home')
@section($title,'title')
@section('content2')
    <div class="d-flex flex-column justify-content-center align-items-center no-gutters">
        <div class="card text-right m-3" style="width: 28rem;" dir="rtl">
            <!-- <img src="..." class="card-img-top" alt="محصول 1"> -->
            {{html()->model($items)->form('POST',route('Home.store',$items->id))->open()}}

            <div class="card-body">
                <h5 class="text-center border-bottom border-light-subtle pb-3">اطلاعات سفارش شما</h5>
                <p class="text-center" style="font-size: 10px">لطفا اطلاعات را به دقت بررسی و به جهت ثبت نهایی سفارش
                    اطلاعات باقی مانده را تکمیل کنید.</p>
                <p class="card-text">
                    <span>نام محصول:</span>{{html()->text('ProductComment')->id('ProductComment')->name('ProductComment')->isReadonly()->class('col-6 text-center')}}
                </p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <span>شناسه محصول:</span>{{html()->text('ProductId')->name('ProductId')->id('ProductId')->isReadonly()->class('col-6 text-center')}}
                </li>
                <li class="list-group-item">
                    <span>دسته محصول:</span>{{html()->text('Sort')->name('Sort')->id('Sort')->isReadonly()->class('col-6 text-center')}}
                </li>
                <li class="list-group-item">
                    <span>توضیحات:</span>{{html()->text('Details2')->id('Details2')->name('Details2')->isReadonly()->class('col-6 text-center')}}
                </li>
                <li class="list-group-item">
                    <span>نام شما:</span>{{html()->text()->name('Firstname')->id('Firstname')->value(auth()->user()->Firstname)->isReadonly()->class('col-6 text-center')}}
                </li>
                <li class="list-group-item">
                    <span>نام خانوادگی شما:</span>{{html()->text()->name('Lastname')->id('Lastname')->value(auth()->user()->Lastname)->isReadonly()->class('col-6 text-center')}}
                </li>
                <li class="list-group-item">
                    <span>ایمیل شما:</span>{{html()->text()->name('email')->id('email')->value(auth()->user()->email)->isReadonly()->class('col-6 text-center')}}
                </li>
                <li class="list-group-item">
                    <span>موجودی انبار:</span>{{html()->text('ProductNo')->name('ProductNo')->id('ProductNo')->isReadonly()->class('col-6 text-center')}}
                </li>
                <li class="list-group-item">
                    <span>واحد اندازه گیری:</span>{{html()->text('Vahed')->name('Vahed')->id('Vahed')->isReadonly()->class('col-6 text-center')}}
                </li>
                <li class="list-group-item">
                    <span>آدرس:</span>{{html()->text()->placeholder('آدرس')->id('Address')->name('Address')->value(old('Address'))->class('col-6 text-center')}}
                </li>
                <li class="list-group-item">
                    <span>شماره تلفن:</span><span>{{html()->text()->placeholder('شماره تلفن')->id('PhoneNumber')->name('PhoneNumber')->value(old("PhoneNumber"))->class('col-12 text-center')}}</span>
                </li>
            </ul>
            <div class="card-body flex-column d-flex justify-content-center align-items-center" style="gap: 10px">
                <div>
                    <label for="تعداد">تعداد:</label>
                    {{html()->number()->id('Count')->placeholder('تعداد')->name('Count')->attribute('max=12')->attribute('onchange=calculate()')}}
                </div>
                <li class="list-group-item">
                    <span>موجودی پس از سفارش:</span>{{html()->text('Storage')->name('Storage')->id('Storage')->isReadonly()->class('col-6 text-center')}}
                </li>
{{--                <div>--}}
{{--                    <label for="قیمت">قیمت:</label>--}}
{{--                    <span id="Price">{{$items->Price}}</span>--}}
{{--                    <img src="{{asset('assets/images/Price.png')}}" alt="Price" class="img3">--}}
{{--                </div>--}}
{{--                {{html()->number()->id('Price2')->placeholder('قیمت کل')->name('Price2')->isReadonly()}}--}}
{{--                <img src="{{asset('assets/images/Price.png')}}" alt="Price" class="img3">--}}
                <button type="submit"
                        class="btn btn-outline-success d-flex row justify-content-center align-items-center w-100"
                        style="gap: 10px"><i class="material-icons">done_all</i>ثبت نهایی خرید
                </button>
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif
                <a href="{{route('Home.index')}}" class="w-100 d-flex flex-column justify-content-center align-items-center">
                    <button type="button"
                            class="btn btn-outline-danger d-flex row justify-content-center align-items-center w-100"
                            style="gap: 10px"><i class="material-icons">clear</i>بازگشت
                    </button>
                </a>
                @error('PhoneNumber')
                <span class="text-danger text-center m-2">{{ $message }}</span>
                @enderror</td>
                @error('Address')
                <span class="text-danger text-center m-2">{{ $message }}</span>
                @enderror</td>

            </div>
            {{html()->form()->close()}}
        </div>
    </div>
@endsection

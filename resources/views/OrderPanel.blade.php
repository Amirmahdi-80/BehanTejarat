@extends('Admin.Panel')
@section($title,'title')
@can('edit-orders')
    @section('ZPanel')
        <div class="row overflow-auto col-12">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix mb-4 d-flex flex-column justify-content-center align-items-center">
                        <img src="{{asset('assets/images/Orders.png')}}" alt="ویرایش کاربران" class="img2">
                        <h1 class="panel-title text-dark text-center mb-5 mt-2">{{ $title }}</h1>
                    </div>

                    <!-- panel body -->
                    <div class="panel-body d-flex flex-column justify-content-center align-items-center col-12">
                            <table class="table text-right" dir="rtl">
                                <h4 style="width: 100%;text-align: right;padding-bottom: 10px;border-bottom: 1px solid gainsboro; margin-bottom: 20px;">سفارشات در انتظار تایید</h4>
                                <thead>
                                <tr>
{{--                                    <th scope="col">#</th>--}}
                                    <th scope="col">شماره محصول</th>
                                    <th scope="col">نام محصول</th>
                                    <th scope="col">دسته محصول</th>
                                    <th scope="col">شناسه محصول</th>
                                    <th scope="col">واحد محصول</th>
                                    <th scope="col">مشخصه دوم</th>
                                    <th scope="col">نام</th>
                                    <th scope="col">نام خانوادگی</th>
                                    <th scope="col">ایمیل</th>
                                    <th scope="col">آدرس</th>
                                    <th scope="col">شماره تلفن</th>
                                    <th scope="col">تعداد درخواستی</th>
                                    <th scope="col">قیمت کل درخواستی</th>
                                    <th scope="col">وضعیت سفارش</th>
                                </tr>
                                </thead>
                                <tbody>
                            @foreach($items as $item)
                                @if($item->Vaziat=="در انتظار تایید")
                                <tr>
{{--                                    <td>{{$item -> id}}</td>--}}
                                    <td>{{$item -> ProductNo}}</td>
                                    <td>{{$item -> ProductComment}}</td>
                                    <td>{{$item -> Sort}}</td>
                                    <td>{{$item -> ProductId}}</td>
                                    <td>{{$item -> Vahed}}</td>
                                    <td>{{$item -> Details2}}</td>
                                    <td>{{$item -> Firstname}}</td>
                                    <td>{{$item -> Lastname}}</td>
                                    <td>{{$item -> email}}</td>
                                    <td>{{$item -> Address}}</td>
                                    <td>{{$item -> PhoneNumber}}</td>
                                    <td>{{$item -> Count}}</td>
                                    <td>{{$item -> Vaziat}}</td>
                                    <td><a href="{{ route('Admin.Orders.edit', $item->id) }}" class="btn btn-success">
                                            <i class="material-icons">check</i>
                                        </a></td>
                                    <td>
                                        {{ html()->form('DELETE', route('Admin.Orders.destroy', $item->id))->open() }}
                                        <button class="btn btn-danger">
                                            <i class="material-icons">clear</i>
                                        </button>
                                        {{ html()->form()->close() }}
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                            {{ $items->links() }}
                        </table>
                            <h4 style="width: 100%;text-align: right;padding-bottom: 10px;border-bottom: 1px solid gainsboro; margin-bottom: 20px">سفارشات در حال پردازش</h4>
                            <table class="table text-right" dir="rtl">
                                <thead>
                                <tr>
                                    <th scope="col">شماره محصول</th>
                                    <th scope="col">نام محصول</th>
                                    <th scope="col">دسته محصول</th>
                                    <th scope="col">شناسه محصول</th>
                                    <th scope="col">واحد محصول</th>
                                    <th scope="col">مشخصه دوم</th>
                                    <th scope="col">نام</th>
                                    <th scope="col">نام خانوادگی</th>
                                    <th scope="col">ایمیل</th>
                                    <th scope="col">آدرس</th>
                                    <th scope="col">شماره تلفن</th>
                                    <th scope="col">تعداد درخواستی</th>
                                    <th scope="col">قیمت کل درخواستی</th>
                                    <th scope="col">وضعیت سفارش</th>

                                    <th scope="col">حذف</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    @if($item->Vaziat=="تایید شده")
                                    <tr>
                                        <td>{{$item -> ProductNo}}</td>
                                        <td>{{$item -> ProductComment}}</td>
                                        <td>{{$item -> Sort}}</td>
                                        <td>{{$item -> ProductId}}</td>
                                        <td>{{$item -> Vahed}}</td>
                                        <td>{{$item -> Details2}}</td>
                                        <td>{{$item -> Firstname}}</td>
                                        <td>{{$item -> Lastname}}</td>
                                        <td>{{$item -> email}}</td>
                                        <td>{{$item -> Address}}</td>
                                        <td>{{$item -> PhoneNumber}}</td>
                                        <td>{{$item -> Count}}</td>
                                        <td>{{$item -> Vaziat}}</td>
                                        <td><a href="{{ route('Admin.Orders.edit', $item->id) }}" class="btn btn-success">
                                                <i class="material-icons">check</i>
                                            </a></td>
                                        <td>
                                            {{ html()->form('DELETE', route('Admin.Orders.destroy', $item->id))->open() }}
                                            <button class="btn btn-danger">
                                                <i class="material-icons">clear</i>
                                            </button>
                                            {{ html()->form()->close() }}
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                                {{ $items->links() }}
                            </table>
                            <h4 style="width: 100%;text-align: right;padding-bottom: 10px;border-bottom: 1px solid gainsboro; margin-bottom: 20px">سفارشات انجام شده</h4>
                            <table class="table text-right" dir="rtl">
                                <thead>
                                <tr>
                                    <th scope="col">شماره محصول</th>
                                    <th scope="col">نام محصول</th>
                                    <th scope="col">دسته محصول</th>
                                    <th scope="col">شناسه محصول</th>
                                    <th scope="col">واحد محصول</th>
                                    <th scope="col">مشخصه دوم</th>
                                    <th scope="col">نام</th>
                                    <th scope="col">نام خانوادگی</th>
                                    <th scope="col">ایمیل</th>
                                    <th scope="col">آدرس</th>
                                    <th scope="col">شماره تلفن</th>
                                    <th scope="col">تعداد درخواستی</th>
                                    <th scope="col">قیمت کل درخواستی</th>
                                    <th scope="col">وضعیت سفارش</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    @if($item->Vaziat=="انجام شده")
                                    <tr>
                                        <td>{{$item -> ProductNo}}</td>
                                        <td>{{$item -> ProductComment}}</td>
                                        <td>{{$item -> Sort}}</td>
                                        <td>{{$item -> ProductId}}</td>
                                        <td>{{$item -> Vahed}}</td>
                                        <td>{{$item -> Details2}}</td>
                                        <td>{{$item -> Firstname}}</td>
                                        <td>{{$item -> Lastname}}</td>
                                        <td>{{$item -> email}}</td>
                                        <td>{{$item -> Address}}</td>
                                        <td>{{$item -> PhoneNumber}}</td>
                                        <td>{{$item -> Count}}</td>
                                        <td>{{$item -> Vaziat}}</td>
                                            {{ html()->form('DELETE', route('Admin.Orders.destroy', $item->id))->open() }}
                                            <td><button class="btn btn-danger">
                                                <i class="material-icons">clear</i>
                                            </button>
                                            {{ html()->form()->close() }}
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan

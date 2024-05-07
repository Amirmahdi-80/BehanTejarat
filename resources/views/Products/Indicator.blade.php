@extends('Admin.Panel')
@section($title,'title')
@can('edit-products')
    @section('ZPanel')
        <div class="row no-gutters w-100">
            <div class="w-100">
                <div class="panel panel-primary w-100">
                    <div
                        class="panel-heading clearfix mb-4 d-flex flex-column justify-content-center align-items-center">
                        <img src="{{asset('assets/images/Indicator.png')}}" alt="ویرایش شاخص ها" class="img2">
                        <h1 class="panel-title text-dark text-center mb-5 mt-2">{{ $title }}</h1>
                        <p>شما در این صفحه میتوانید شاخص ها را حذف،ویرایش و اضافه کنید. بدین منظور از دکمه های درون جدول
                            استفاده کنید.</p>
                    </div>
                    <span class="d-flex flex-column justify-content-center align-items-center">
                        <button type="button" onclick="PrintDiv();" value="Print" class="btn btn-info m-2"><i class="material-icons">print</i></button>
                    <form action="{{ route('Admin.searchIndicator') }}" method="GET"
                          class="text-dark d-flex row justify-content-center align-items-center mb-4 search no-gutters">
                        <input type="text" name="search" class="text-dark date1" placeholder="جست و جو کنید">
                        <button type="submit"><i class="material-icons">search</i></button>
                    </form>
                        </span>
                    <!-- panel body -->
                    <div class="panel-body d-flex flex-column justify-content-center align-items-center" id="printdivcontent">
                        <table class="table text-center overflow-auto w-100" dir="rtl">
                            <thead>
                            <a href="{{route('Admin.Links.create')}}" class="btn btn-block btn-info">لینک سازی جدید<i
                                    class="material-icons">add_circle_outline</i></a>
                            @if($items->isNotEmpty())
                            <tr>
                                <th scope="col">نام محصول</th>
                                <th scope="col">تاریخ ورودی</th>
                                <th scope="col">جزئیات لینک شده</th>
                                <th scope="col">شاخص سازی</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr class="text-center">
                                    <td>{{$item -> PName}}</td>
                                    <td>{{$item -> date}}</td>
                                    <td><a href="{{ route('Admin.Links.show', $item->id) }}" class="btn btn-info">
                                            <i class="material-icons">visibility</i>
                                        </a></td>
                                    <td><a href="{{ route('Admin.Indicator.edit', $item->id) }}" class="btn btn-success">
                                            <i class="material-icons">clear_all</i>
                                        </a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            @else
                                <td>موردی یافت نشد</td>
                            @endif
                        </table>
                        <span dir="ltr"><a href="{{$items->previousPageUrl()}}" class="btn btn-light"><i
                                    class="material-icons text-dark">arrow_back</i>
                            </a>
                            @for($i=1;$i<=$items->lastPage();$i++)<a href="{{$items->url($i)}}" class="btn btn-light page-item">{{$i}}</a>
                            @endfor
                            <a href="{{$items->nextPageUrl()}}" class="btn btn-light">
                                <i class="material-icons text-dark">arrow_forward</i>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan

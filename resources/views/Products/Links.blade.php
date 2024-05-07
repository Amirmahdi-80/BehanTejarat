@extends('Admin.Panel')
@section($title,'title')
@can('edit-products')
    @section('ZPanel')
        <div class="row no-gutters w-100">
            <div class="w-100">
                <div class="panel panel-primary w-100">
                    <div
                        class="panel-heading clearfix mb-4 d-flex flex-column justify-content-center align-items-center">
                        <img src="{{asset('assets/images/Links.png')}}" alt="ویرایش لینک ها" class="img2">
                        <h1 class="panel-title text-dark text-center mb-5 mt-2">{{ $title }}</h1>
                        <p>شما در این صفحه میتوانید محصولات را لینک سازی و یا لینک آنهارا حذف کنید. بدین منظور از دکمه های درون جدول
                            استفاده کنید.</p>
                    </div>
                    <span class="d-flex flex-column justify-content-center align-items-center">
                    <label style="border-bottom: 2px dashed gray;width: 30%;color: #333" class="text-center pb-2">فیلتر بر اساس جست و جو</label>
                    <form action="{{ route('Admin.searchLink') }}" method="GET"
                          class="text-dark d-flex row justify-content-center align-items-center mb-4 search no-gutters">
                        <input type="text" name="search" class="text-dark" placeholder="جست و جو کنید">
                        <button type="submit"><i class="material-icons">search</i></button>
                    </form>
                    </span>
                    <!-- panel body -->
                    <div class="panel-body d-flex flex-column justify-content-center align-items-center">
                        <table class="table text-center overflow-auto w-100" dir="rtl">
                            <thead>
                            <a href="{{route('Admin.Links.create')}}" class="btn btn-block btn-info">لینک سازی<i
                                    class="material-icons">add_circle_outline</i></a>
                            <tr>
                                <th scope="col">تاریخ ثبت</th>
                                <th scope="col">نام محصول</th>
                                <th scope="col">زیر مجموعه اول</th>
                                <th scope="col">زیر مجموعه دوم</th>
                                <th scope="col">زیر مجموعه سوم</th>
                                <th scope="col">بیشتر</th>
                                <th scope="col">ویرایش</th>
                                <th scope="col">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr class="text-center">
                                    <td>{{$item -> date}}</td>
                                    <td>{{$item -> PName}}</td>
                                    <td>{{$item -> ProName1}}</td>
                                    <td>@if(!$item -> ProName2== "")
                                            {{$item -> ProName2}}
                                        @else
                                            خالی
                                        @endif</td>
                                    <td>@if(!$item -> ProName3== "")
                                            {{$item -> ProName3}}
                                        @else
                                            خالی
                                        @endif</td>
                                    <td><a href="{{ route('Admin.Links.show', $item->id) }}" class="btn btn-info">
                                            <i class="material-icons">visibility</i>
                                        </a></td>
                                    <td><a href="{{ route('Admin.Links.edit', $item->id) }}" class="btn btn-warning">
                                            <i class="material-icons">edit</i>
                                        </a></td>
                                    <td>
                                        {{ html()->form('DELETE', route('Admin.Links.destroy', $item->id))->open() }}
                                        <button class="btn btn-danger @if($item->Storage <= $item->OrderDot & !$item->Storage=="") btn-dark @endif">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        {{ html()->form()->close() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
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

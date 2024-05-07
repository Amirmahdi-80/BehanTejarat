@extends('Admin.Panel')
@section($title,'title')
@section($about,'about')
@can('edit-products')
    @section('ZPanel')
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div
                        class="panel-heading clearfix mb-4 d-flex flex-column justify-content-center align-items-center">
                        <img src="{{asset('assets/images/Out.png')}}" alt="خروجی های محصول(حواله)" class="img2">
                        <h1 class="panel-title text-dark text-center mb-5 mt-2">{{ $title }}</h1>
                        <p>{{$about}}</p>
                    </div>
                    <!-- panel body -->
                    <div class="panel-body d-flex flex-column justify-content-center align-items-center col-12">
                        <span class="d-flex row justify-content-center align-items-center">
                            <button type="button" onclick="PrintDiv();" value="Print" class="btn btn-info m-2"><i
                                    class="material-icons">print</i></button>
                            <a href="{{route('Admin.searchOut')}}" class="btn btn-info">جست و جو</a>
                        </span>
                        <span id="printdivcontent">
                        <table class="table text-center" dir="rtl">
                            <thead>
                            <a href="{{route('Admin.Out.create')}}"
                               class="btn btn-block btn-info">افزودن خروجی محصول(حواله)<i
                                    class="material-icons">add_circle_outline</i></a>
                            <tr>
                                <th scope="col">تاریخ ثبت</th>
                                <th scope="col">نام محصول</th>
                                <th scope="col">نام تامین کننده</th>
                                <th scope="col">تاریخ خروج</th>
                                <th scope="col">قیمت خروجی</th>
                                <th scope="col">مقدار خروجی</th>
                                <th scope="col">قیمت کل خروجی</th>
                                <th scope="col">جزئیات</th>
                                <th scope="col">ویرایش</th>
                                <th scope="col">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr class="text-center">
                                    <td>{{$item -> TS}}</td>
                                    <td>{{$item -> PName}}</td>
                                    <td>{{$item -> TName}}</td>
                                    <td>{{$item -> date}}</td>
                                    @if($item -> exitPrice == "")
                                        <td class="text-danger">نیازمند ویرایش</td>
                                    @else
                                        <td dir="rtl">{{number_format($item -> exitPrice,0,".",",")}} ريال </td>
                                    @endif
                                    @if($item -> Count == "")
                                        <td class="text-danger">نیازمند ویرایش</td>
                                    @else
                                        <td dir="rtl">{{number_format($item -> Count,0,".",",")}}</td>
                                    @endif
                                    @if($item -> TotalPrice == "")
                                        <td class="text-danger">نیازمند ویرایش</td>
                                    @else
                                        <td dir="rtl">{{number_format($item -> TotalPrice,0,".",",")}} ريال </td>
                                    @endif
                                    <td><a href="{{ route('Admin.Out.show', $item->id) }}" class="btn btn-info">
                                            <i class="material-icons">remove_red_eye</i>
                                        </a></td>
                                    <td><a href="{{ route('Admin.Out.edit', $item->id) }}" class="btn btn-warning">
                                            <i class="material-icons">edit</i>
                                        </a></td>
                                    <td>
                                        {{ html()->form('DELETE', route('Admin.Out.destroy', $item->id))->open() }}
                                        <button class="btn btn-danger">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        {{ html()->form()->close() }}
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                            </span>
                        <span dir="ltr"><a href="{{$items->previousPageUrl()}}" class="btn btn-light"><i
                                    class="material-icons text-dark">arrow_back</i>
                                </a>
                                @for($i=1;$i<=$items->lastPage();$i++)
                                <a href="{{$items->url($i)}}" class="btn btn-light page-item">{{$i}}</a>
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

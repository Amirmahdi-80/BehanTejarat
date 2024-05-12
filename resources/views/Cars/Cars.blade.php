@extends('Admin.Panel')
@section($title,'title')
@section($about,'about')
@can('Cars')
    @section('ZPanel')
        <div class="container-fluid p-0">
            <div class="panel panel-primary">
                <div
                    class="panel-heading clearfix mb-4 d-flex flex-column justify-content-center align-items-center">
                    <img src="{{asset('assets/images/Cars.png')}}" alt="خودروها" class="img2">
                    <h1 class="panel-title text-dark text-center mb-5 mt-2">{{ $title }}</h1>
                    <p>{{$about}}</p>
                    <button type="button" onclick="PrintDiv();" value="Print" class="btn btn-info m-2"><i
                            class="material-icons">print</i></button>
                </div>
                <!-- panel body -->
                <div class="panel-body d-flex flex-column justify-content-center align-items-center col-12">
                    <div class="table-responsive" id="printdivcontent">
                        <table class="table text-center table-responsive" dir="rtl">
                            <thead>
                            <a href="{{route('Admin.Cars.create')}}" class="btn btn-block btn-info">افزودن خودرو<i
                                    class="material-icons">add_circle_outline</i></a>
                            <tr>
                                <th scope="col">نام خودرو</th>
                                <th scope="col" class="text-right">شماره پلاک</th>
                                <th scope="col">رنگ خودرو</th>
                                <th scope="col">کارکرد</th>
                                <th scope="col">بیمه شخص ثالث</th>
                                <th scope="col">کارت خودرو</th>
                                <th scope="col">برگه سبز</th>
                                <th scope="col">بیمه بدنه</th>
                                <th scope="col">عکس خودرو</th>
                                <th scope="col">ویرایش</th>
                                <th scope="col">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr class="text-center">
                                    <td>{{$item -> CarName}}</td>
                                    <td>{{$item -> CarPlate}}</td>
                                    <td>{{$item -> CarColor}}</td>
                                    <td dir="ltr">{{number_format($item -> Kilometer,0,".",",")}} Km</td>
                                    <td data-toggle="tooltip" data-placement="bottom"
                                        title="برای دانلود عکس کلیک کنید">@if(!$item->BimeSales=="")
                                            <a href="{{ route("files.show", $item->BimeSales) }}"><img
                                                    class="avatar img-circle"
                                                    src="{{ route("files.show", $item->BimeSales) }}"
                                                    alt="عکس بیمه شخص ثالث" title="عکس بیمه شخص ثالث"
                                                    style="border-radius: 5px;width: 50px;
                                                               height: 50px;"></a>
                                        @else
                                            <span>خالی</span>
                                        @endif</td>
                                    <td data-toggle="tooltip" data-placement="bottom"
                                        title="برای دانلود عکس کلیک کنید">@if(!$item->CarCard=="")
                                            <a href="{{ route("files.show", $item->CarCard) }}"><img
                                                    class="avatar img-circle"
                                                    src="{{ route("files.show", $item->CarCard) }}"
                                                    alt="عکس کارت خودرو" title="عکس کارت خودرو"
                                                    style="border-radius: 5px;width: 50px;
                                                               height: 50px;"></a>
                                        @else
                                            <span>خالی</span>
                                        @endif</td>
                                    <td data-toggle="tooltip" data-placement="bottom"
                                        title="برای دانلود عکس کلیک کنید">@if(!$item->BargSabz=="")
                                            <a href="{{ route("files.show", $item->BargSabz) }}"><img
                                                    class="avatar img-circle"
                                                    src="{{ route("files.show", $item->BargSabz) }}"
                                                    alt="عکس برگ سبز خودرو" title="عکس برگ سبز خودرو"
                                                    style="border-radius: 5px;width: 50px;
                                                               height: 50px;"></a>
                                        @else
                                            <span>خالی</span>
                                        @endif</td>
                                    <td data-toggle="tooltip" data-placement="bottom"
                                        title="برای دانلود عکس کلیک کنید">@if(!$item->Badane=="")
                                            <a href="{{ route("files.show", $item->Badane) }}"><img
                                                    class="avatar img-circle"
                                                    src="{{ route("files.show", $item->Badane) }}"
                                                    alt="عکس بیمه بدنه خودرو" title="عکس بیمه بدنه خودرو"
                                                    style="border-radius: 5px;width: 50px;
                                                               height: 50px;"></a>
                                        @else
                                            <span>خالی</span>
                                        @endif</td>
                                    <td data-toggle="tooltip" data-placement="bottom"
                                        title="برای دانلود عکس کلیک کنید">
                                        @if(!$item->image=="")
                                            <a href="{{ route("files.show", $item->image) }}"><img
                                                    class="avatar img-circle"
                                                    src="{{ route("files.show", $item->image) }}"
                                                    alt="عکس خودرو" title="عکس  خودرو"
                                                    style="border-radius: 5px;width: 50px;
                                                               height: 50px;"></a>
                                        @else
                                            <span>خالی</span>
                                        @endif
                                    </td>
                                    <td><a href="{{ route('Admin.Cars.edit', $item->id) }}" class="btn btn-warning">
                                            <i class="material-icons">edit</i>
                                        </a></td>
                                    <td>
                                        {{ html()->form('DELETE', route('Admin.Cars.destroy', $item->id))->open() }}
                                        <button class="btn btn-danger">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        {{ html()->form()->close() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <span dir="ltr" class="w-100 d-flex row justify-content-center align-items-center" style="gap: 10px"><a
                    href="{{$items->previousPageUrl()}}" class="btn btn-light"><i class="material-icons text-dark">arrow_back</i>
                                </a>
                                @for($i=1;$i<=$items->lastPage();$i++)
                    <a href="{{$items->url($i)}}" class="btn btn-light page-item">{{$i}}</a>
                @endfor
                                <a href="{{$items->nextPageUrl()}}" class="btn btn-light">
                                    <i class="material-icons text-dark">arrow_forward</i>
                                </a>
                            </span>
        </div>
    @endsection
@endcan

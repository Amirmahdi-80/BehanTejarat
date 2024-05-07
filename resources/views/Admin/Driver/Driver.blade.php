@extends('Admin.Panel')
@section($title,'title')
@section($about,'about')
@can('Cars')
    @section('ZPanel')
        <div class="row overflow-auto w-100">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div
                        class="panel-heading clearfix mb-4 d-flex flex-column justify-content-center align-items-center">
                        <img src="{{asset('assets/images/Driver.png')}}" alt="خودروها" class="img2">
                        <h1 class="panel-title text-dark text-center mb-5 mt-2">{{ $title }}</h1>
                        <p>{{$about}}</p>
                        <button type="button" onclick="PrintDiv();" value="Print" class="btn btn-info m-2"><i
                                class="material-icons">print</i></button>
                    </div>
                    <!-- panel body -->
                    <div class="panel-body d-flex flex-column justify-content-center align-items-center col-12" id="printdivcontent">
                        <table class="table text-right" dir="rtl">
                            <thead>
                            <a href="{{route('Admin.Driver.create')}}" class="btn btn-block btn-info">افزودن راننده<i
                                    class="material-icons">add_circle_outline</i></a>
                            <tr>
                                <th scope="col" class="text-center">نام راننده</th>
                                <th scope="col" class="text-center">شماره ملی راننده</th>
                                <th scope="col" class="text-center">شماره تماس راننده</th>
                                <th scope="col" class="text-center">عکس گواهینامه راننده</th>
                                <th scope="col" class="text-center">مشاهده عکس پروفایل</th>
                                <th scope="col" class="text-center">ویرایش</th>
                                <th scope="col" class="text-center">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr class="text-center">
                                    <td>{{$item -> DriverName}}</td>
                                    <td>{{$item -> MeliCode}}</td>
                                    <td>{{$item -> DriverNumber}}</td>
                                    <td>
                                        @if(!$item->DriverLicence=="")
                                        <a href="{{ route("files.show", $item->DriverLicence) }}"><img
                                                class="avatar img-circle"
                                                src="{{ route("files.show", $item->DriverLicence) }}"
                                                alt="عکس گواهینامه" title="عکس گواهینامه"
                                                style="border-radius: 5px"></a>
                                        @else
                                            <span>خالی</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$item->image=="")
                                            <a href="{{ route("files.show", $item->image) }}"><img class="avatar img-circle"
                                                                                                   src="{{ route("files.show", $item->image) }}"
                                                                                                   alt="{{$item -> DriverName}}" title="{{$item -> DriverName}}"
                                                                                                   style="border-radius: 50%"></a>
                                        @else
                                            <span>خالی</span>
                                        @endif
                                    </td>
                                    <td><a href="{{ route('Admin.Driver.edit', $item->id) }}" class="btn btn-warning">
                                            <i class="material-icons">edit</i>
                                        </a></td>
                                    <td>
                                        {{ html()->form('DELETE', route('Admin.Driver.destroy', $item->id))->open() }}
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
                    <span dir="ltr" class="w-100 d-flex row justify-content-center align-items-center" style="gap: 10px"><a href="{{$items->previousPageUrl()}}" class="btn btn-light"><i class="material-icons text-dark">arrow_back</i>
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
    @endsection
@endcan

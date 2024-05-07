@extends('Admin.Panel')
@section($title,'title')
@section($about,'about')
@can('edit-aboutme')
    @section('ZPanel')
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div
                        class="panel-heading clearfix mb-4 d-flex flex-column justify-content-center align-items-center">
                        <img src="{{asset('assets/images/Slider.jpg')}}" alt="اطلاعات من" class="img2" style="border-radius: 50%">
                        <h1 class="panel-title text-dark text-center mb-5 mt-2">{{ $title }}</h1>
                        <p>{{$about}}</p>
                    </div>
                    <!-- panel body -->
                    <div class="panel-body d-flex flex-column justify-content-center align-items-center col-12">
                        <table class="table text-center" dir="rtl">
                            <thead>
                            <a href="{{route('Admin.AboutMe.create')}}" class="btn btn-block btn-info">افزودن اطلاعات<i
                                    class="material-icons">add_circle_outline</i></a>
                            <tr>
                                <th scope="col">نام</th>
                                <th scope="col">نقش</th>
                                <th scope="col">رزومه</th>
                                <th scope="col">ویرایش</th>
                                <th scope="col">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr class="text-center">
                                    <td>{{$item -> Name}}</td>
                                    <td>{{$item -> Known}}</td>
                                    <td data-toggle="tooltip" data-placement="bottom"
                                        title="برای دانلود فایل کلیک کنید">@if(!$item->Resume=="")
                                            <a href="{{ route("files.show", $item->Resume) }}" title="رزومه من"><img
                                                    src="{{asset('assets/images/Resume.png')}}" alt="رزومه" style="width: 50px;height: fit-content"></a>
                                        @else
                                            <span>خالی</span>
                                        @endif</td>
                                    <td><a href="{{ route('Admin.AboutMe.edit', $item->id) }}" class="btn btn-warning">
                                            <i class="material-icons">edit</i>
                                        </a></td>
                                    <td>
                                        {{ html()->form('DELETE', route('Admin.AboutMe.destroy', $item->id))->open() }}
                                        <button class="btn btn-danger">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        {{ html()->form()->close() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <span dir="ltr"><a href="{{$items->previousPageUrl()}}" class="btn btn-light"><i class="material-icons text-dark">arrow_back</i>
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

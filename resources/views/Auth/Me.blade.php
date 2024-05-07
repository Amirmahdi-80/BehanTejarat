@extends('Admin.Panel')
@section($title,'title')
@section('ZPanel')
    <div class="row no-gutters">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <!-- panel body -->
                <div class="panel-body d-flex flex-column justify-content-center align-items-center col-12 mt-5">
                    <div class="panel-heading clearfix mb-4 d-flex flex-column justify-content-center align-items-center">
                        <img src="{{asset('assets/images/EditUser.png')}}" alt="ویرایش اطلاعات" class="img2">
                        <h1 class="panel-title text-dark text-center mb-5 mt-2">{{ $title }}</h1>
                        <p>شما میتوانید اطلاعات حساب کاربری خود را از طریق جدول زیر ویرایش کنید</p>
                    </div>
                    <span></span>
                        <div class="d-flex flex-column justify-content-center align-items-center w-100">
                            @foreach($items as $item)
                                @if($item->Firstname == auth()->user()->Firstname )
                            <table class="table text-center w-100" dir="rtl">
                                <thead>
                                <tr>
                                    <th scope="col" colspan="2" class="bg-info text-light">در جدول زیر ما برخی اطلاعات از شما را نمایش میدهیم</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        عکس پروفایل:
                                    </td>
                                    <td>
                                        @if(auth()->user()->avatar  == "")
                                            <img src="{{asset('assets/images/Sign-up.png')}}"
                                                 alt="{{$item->Firstname . ' ' . $item->Lastname }}"
                                                 title="{{$item->Firstname . ' ' . $item->Lastname }}">
                                        @else
                                            <img src="{{ $item->avatar ? route('showAvatar', [$item->avatar]) : '' }}"
                                                 alt="{{$item->Firstname . ' ' . $item->Lastname }}"
                                                 style="width: 75px;height: 75px;border-radius: 50px"
                                                 title="{{$item->Firstname . ' ' . $item->Lastname }}">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>نام شما:</td>
                                    <td>{{$item->Firstname}}</td>
                                </tr>
                                <tr>
                                    <td>نام خانوادگی شما:</td>
                                    <td>{{$item->Lastname}}</td>
                                </tr>
                                <tr>
                                    <td>ایمیل شما:</td>
                                    <td>{{$item->email}}</td>
                                </tr>
                                <tr>
                                    <td>سِمَت شما:</td>
                                    <td>@if($item->Role == "")
                                            سمت شما تعیین نشده
                                        @else
                                            {{$item->Role}}
                                        @endif</td>
                                </tr>
                                <tr>
                                    <td>ویرایش اطلاعات:</td>
                                    <td><a href="{{route('Admin.RegUp.edit',$item->id)}}" class="btn btn-warning"><i class="material-icons">edit</i></a></td>
                                </tr>
                                <tr>
                                    <td>حذف حساب کاربری:</td>
                                    <td>{{ html()->form('DELETE', route('Admin.RegUp.destroy', $item->id))->open() }}
                                        <button class="btn btn-danger">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        {{ html()->form()->close() }}</a></td>
                                </tr>
                                </tbody>
                            </table>
                                @endif
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

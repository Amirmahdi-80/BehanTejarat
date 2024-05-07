@extends('Admin.Panel')
@section($title,'title')
@section($about,'about')
@can('edit-cost')
    @section('ZPanel')
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div
                        class="panel-heading clearfix mb-4 d-flex flex-column justify-content-center align-items-center">
                        <img src="{{asset('assets/images/Cost.png')}}" alt="هزینه های خودروها" class="img2">
                        <h1 class="panel-title text-dark text-center mb-5 mt-2">{{ $title }}</h1>
                        <p>{{$about}}</p>
                    </div>
                    <!-- panel body -->
                    <div class="panel-body d-flex flex-column justify-content-center align-items-center col-12">
                        <span class="d-flex row justify-content-center align-items-center">
                            <button type="button" onclick="PrintDiv();" value="Print" class="btn btn-info m-2"><i
                                    class="material-icons">print</i></button>
                            <a href="{{route('Admin.searchcost')}}" class="btn btn-info">جست و جو</a>
                        </span>
                        <span id="printdivcontent">
                        <table class="table text-center" dir="rtl">
                            <thead>
                            <a href="{{route('Admin.cost.create')}}" class="btn btn-block btn-info">افزودن هزینه<i
                                    class="material-icons">add_circle_outline</i></a>
                            <tr>
                                <th scope="col">دسته هزینه</th>
                                <th scope="col">نام هزینه</th>
                                <th scope="col">تاریخ ثبت</th>
                                <th scope="col">قیمت کل</th>
                                <th scope="col">ویرایش</th>
                                <th scope="col">مشاهده جزئیات</th>
                                <th scope="col">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr class="text-center">
                                    <td>{{$item -> Group}}</td>
                                    @if(!($item->CarNam==null))
                                        <td>{{$item -> CarNam}}</td>
                                    @else
                                        <td>{{$item -> HaNam}}</td>
                                    @endif
                                    <td>{{$item -> date}}</td>
                                    <td dir="rtl">{{number_format($item -> PriceKol,0,".",",")}} ريال </td>
                                    <td><a href="{{ route('Admin.cost.edit', $item->id) }}" class="btn btn-warning">
                                            <i class="material-icons">edit</i>
                                        </a></td>
                                    <td><a href="{{route('Admin.cost.show', $item->id) }}"
                                           class="btn btn-sm btn-info"><i
                                                class="material-icons">remove_red_eye</i></a></td>
                                    <td>
                                        {{ html()->form('DELETE', route('Admin.cost.destroy', $item->id))->open() }}
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

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
                        <p>شما در این صفحه میتوانید شاخص ها را حذف و ویرایش کنید. بدین منظور از دکمه های درون جدول
                            استفاده کنید.</p>
                    </div>
                    <span class="d-flex flex-column justify-content-center align-items-center">
                        <button type="button" onclick="PrintDiv();" value="Print" class="btn btn-info m-2"><i class="material-icons">print</i></button>
                        <label style="border-bottom: 2px dashed gray;width: 30%;color: #333" class="text-center pb-2">فیلتر بر اساس جست و جو</label>
                    <form action="{{ route('Admin.Indicators.index') }}" method="GET"
                          class="text-dark d-flex row justify-content-center align-items-center mb-4 search no-gutters">
                        <input type="text" name="search" class="text-dark date1" placeholder="جست و جو کنید" autocomplete="off" >
                        <button type="submit"><i class="material-icons">search</i></button>
                    </form>
                        </span>
                    <!-- panel body -->
                    <div class="panel-body d-flex flex-column justify-content-center align-items-center" id="printdivcontent">
                        <table class="table text-center overflow-auto w-100" dir="rtl">
                            <thead>
                            @if($items->isNotEmpty())
                                <tr>
                                    <th scope="col">نام محصول</th>
                                    <th scope="col">تاریخ ثبت</th>
                                    <th scope="col">تامین کننده</th>
                                    <th scope="col">وزن کل</th>
                                    <th scope="col">جزئیات شاخص شده</th>
                                    <th scope="col">ویرایش</th>
                                    <th scope="col">حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr class="text-center">
                                    <td>{{$item -> Product}}</td>
                                    <td>{{$item -> date}}</td>
                                    <td>{{$item -> Tamin}}</td>
                                    <td>{{$item -> VaznKol}} @foreach($Products as $Product) @if($item->Product == $Product->ProductComment) {{$Product->Vahed}}@endif @endforeach</td>
                                    <td><a href="{{ route('Admin.Indicators.show', $item->id) }}" class="btn btn-info">
                                            <i class="material-icons">visibility</i>
                                        </a></td>
                                    <td><a href="{{ route('Admin.Indicators.edit', $item->id) }}" class="btn btn-warning">
                                            <i class="material-icons">edit</i>
                                        </a></td>
                                    <td>
                                        {{ html()->form('DELETE', route('Admin.Indicators.destroy', $item->id))->open() }}
                                        <button class="btn btn-danger">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        {{ html()->form()->close() }}
                                    </td>
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

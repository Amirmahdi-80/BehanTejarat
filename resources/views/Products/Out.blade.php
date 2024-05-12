@extends('Admin.Panel')

{{-- Section for setting the title --}}
@section($title, 'title')

{{-- Section for setting the about information --}}
@section($about, 'about')

{{-- Checking user's permission to edit products --}}
@can('edit-products')
    {{-- Section for displaying the panel content --}}
    @section('ZPanel')
        <div class="container-fluid p-0">
            <div class="panel panel-primary">
                {{-- Panel heading --}}
                <div class="panel-heading clearfix mb-4 d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('assets/images/Out.png') }}" alt="خروجی های محصول(حواله)" class="img2">
                    <h1 class="panel-title text-dark text-center mb-5 mt-2">{{ $title }}</h1>
                    <p>{{ $about }}</p>
                </div>
                {{-- Panel body --}}
                <div class="panel-body d-flex flex-column justify-content-center align-items-center col-12">
                    {{-- Button group for actions --}}
                    <span class="d-flex row justify-content-center align-items-center">
                        <button type="button" onclick="PrintDiv();" value="Print" class="btn btn-info m-2">
                            <i class="material-icons">print</i>
                        </button>
                        <a href="{{ route('Admin.searchOut') }}" class="btn btn-info">جست و جو</a>
                    </span>
                    {{-- Button for adding a new output --}}
                    <a href="{{ route('Admin.Out.create') }}" class="btn btn-block btn-info">افزودن خروجی محصول(حواله)<i
                            class="material-icons">add_circle_outline</i></a>
                    {{-- Table to display outputs --}}
                    <div class="table-responsive" id="printdivcontent">
                        <table class="table text-center" dir="rtl">
                            <thead>
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
                            {{-- Loop through output items --}}
                            @foreach($items as $item)
                                <tr class="text-center">
                                    <td>{{ $item->TS }}</td>
                                    <td>{{ $item->PName }}</td>
                                    <td>{{ $item->TName }}</td>
                                    <td>{{ $item->date }}</td>
                                    {{-- Handling empty values --}}
                                    <td dir="rtl">
                                        @if($item->exitPrice == "")
                                            <span class="text-danger">نیازمند ویرایش</span>
                                        @else
                                            {{ number_format($item->exitPrice, 0, ".", ",") }} ريال
                                        @endif
                                    </td>
                                    <td dir="rtl">
                                        @if($item->Count == "")
                                            <span class="text-danger">نیازمند ویرایش</span>
                                        @else
                                            {{ number_format($item->Count, 0, ".", ",") }}
                                        @endif
                                    </td>
                                    <td dir="rtl">
                                        @if($item->TotalPrice == "")
                                            <span class="text-danger">نیازمند ویرایش</span>
                                        @else
                                            {{ number_format($item->TotalPrice, 0, ".", ",") }} ريال
                                        @endif
                                    </td>
                                    {{-- Action buttons --}}
                                    <td>
                                        <a href="{{ route('Admin.Out.show', $item->id) }}" class="btn btn-info">
                                            <i class="material-icons">remove_red_eye</i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('Admin.Out.edit', $item->id) }}" class="btn btn-warning">
                                            <i class="material-icons">edit</i>
                                        </a>
                                    </td>
                                    <td>
                                        {{-- Form for delete action --}}
                                        {{ html()->form('DELETE', route('Admin.Out.destroy', $item->id))->open() }}
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
                    {{-- Pagination --}}
                    <span dir="ltr">
                        <a href="{{ $items->previousPageUrl() }}" class="btn btn-light">
                            <i class="material-icons text-dark">arrow_back</i>
                        </a>
                        @for($i=1; $i<=$items->lastPage(); $i++)
                            <a href="{{ $items->url($i) }}" class="btn btn-light page-item">{{ $i }}</a>
                        @endfor
                        <a href="{{ $items->nextPageUrl() }}" class="btn btn-light">
                            <i class="material-icons text-dark">arrow_forward</i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    @endsection
@endcan

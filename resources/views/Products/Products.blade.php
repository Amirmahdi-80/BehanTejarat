@extends('Admin.Panel')
@section($title,'title')
@can('edit-products')
    @section('ZPanel')
        <div class="row no-gutters w-100">
            <div class="w-100">
                <div class="panel panel-primary w-100">
                    <div
                        class="panel-heading clearfix mb-4 d-flex flex-column justify-content-center align-items-center">
                        <img src="{{asset('assets/images/EditUsers.png')}}" alt="ویرایش محصولات" class="img2">
                        <h1 class="panel-title text-dark text-center mb-5 mt-2">{{ $title }}</h1>
                        <p>شما در این صفحه میتوانید محصولات را حذف،ویرایش و اضافه کنید. بدین منظور از دکمه های درون جدول
                            استفاده کنید.</p>
                    </div>
                    <!-- panel body -->
                    <div class="panel-body d-flex flex-column justify-content-center align-items-center">
                        <button type="button" onclick="PrintDiv();" value="Print" class="btn btn-info m-2"><i
                                class="material-icons">print</i></button>
                        <span class="d-flex flex-column justify-content-center align-items-center">
                    <form action="{{ route('Admin.Products.index') }}" method="GET"
                          class="text-dark d-flex row justify-content-center align-items-center mb-4 search no-gutters">
                        <input type="text" name="search" class="text-dark" placeholder="جست و جو کنید">
                        <button type="submit"><i class="material-icons">search</i></button>
                    </form>
                    </span>
                        <span id="printdivcontent">
                        <table class="table text-center overflow-auto w-100" dir="rtl">
                            <thead>
                            <a href="{{route('Admin.Products.create')}}" class="btn btn-block btn-info" id="crate">افزودن محصول<i
                                    class="material-icons">add_circle_outline</i></a>
                            <tr>
                                <th scope="col">دسته محصول</th>
                                <th scope="col">نام محصول</th>
                                <th scope="col">شناسه محصول</th>
                                <th scope="col">واحد</th>
                                <th scope="col">شاخص</th>
                                <th scope="col">نقطه سفارش کالا</th>
                                <th scope="col">موجودی کل</th>
                                <th scope="col">جزئیات تامین</th>
                                <th scope="col">ویرایش</th>
                                <th scope="col">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($items->isnotempty())
                                @foreach($items as $item)
                                    <tr class="text-center @if($item->Storage <= $item->OrderDot & !$item->Storage=="") bg-danger @endif">
                                    <td>{{$item -> Sort}}</td>
                                    <td>{{$item -> ProductComment}}</td>
                                    <td>{{$item -> ProductId}}</td>
                                    <td>{{$item -> Vahed}}</td>
                                    <td>{{$item -> Indicate}}</td>
                                    <td>{{$item -> OrderDot}}</td>
                                    <td>{{$item -> Storage}}</td>
                                    <td><a href="{{ route('Admin.Products.show', $item->id) }}" class="btn btn-info">
                                            <i class="material-icons">visibility</i>
                                        </a></td>
                                    <td><a href="{{ route('Admin.Products.edit', $item->id) }}" class="btn btn-warning">
                                            <i class="material-icons">edit</i>
                                        </a></td>
                                    <td>
                                        {{ html()->form('DELETE', route('Admin.Products.destroy', $item->id))->open() }}
                                        <button
                                            class="btn btn-danger @if($item->Storage <= $item->OrderDot & !$item->Storage=="") btn-dark @endif">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        {{ html()->form()->close() }}
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <td colspan="10">موردی یافت نشد</td>
                            @endif
                            </tbody>
                        </table>
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
                            </span>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan

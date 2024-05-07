@extends('Admin.Panel')
@section($title,'title')
@can('edit-products')
    @section('ZPanel')
        <div class="d-flex row justify-content-center align-items-center no-gutters w-100">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <!-- panel body -->
                    <div class="panel-body">
                        @csrf
                        @if(isset($item))
                            {{ html()->model($item)->form('PATCH', route('Admin.Products.update', $item->id))->attribute('enctype="multipart/form-data"')->open() }}
                        @else
                            {{ html()->form('POST', route('Admin.Products.store'))->attribute('enctype="multipart/form-data"')->open() }}
                        @endif
                        <table class="table text-right mt-5" dir="rtl">
                            <thead>
                            <tr>
                                <th scope="col">دسته بندی</th>

                                <td>
                                    @if($Sorts->isnotempty())
                                    {{html()->select('Sort')->class('form-select')->open()}}
                                    @if(isset($item))
                                            {{html()->option($item->Sort)->value($item->Sort)->selected()}}
                                        @else
                                        {{html()->option()->value('انتخاب کنید')}}
                                        @endif
                                    @foreach($Sorts as $Sort)
                                        {{html()->option($Sort->SortName)->value($Sort->SortName)}}
                                    @endforeach
                                    {{html()->select()->close()}}
                                    @else
                                        {{html()->text()->disabled()->class('form-control border-danger text-danger')->value('لطفا ابتدا دسته بندی اضافه کنید')}}
                                    @endif
                                    @error('Sort')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror</td>
                            </tr>
                            <tr>
                                <th scope="col">نام محصول</th>
                                <td>{{ html()->text('ProductComment')->class('form-control')->id('ProductComment')->placeholder('نام محصول') }}
                                    @error('ProductComment')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror</td>
                            </tr>
                            <tr>
                                <th scope="col">شناسه محصول</th>
                                <td>{{ html()->text('ProductId')->class('form-control')->id('ProductId')->placeholder('شناسه محصول') }}
                                    @error('ProductId')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror</td>
                            </tr>
                            <tr>
                                <th scope="col">قیمت محصول</th>
                                <td>{{ html()->text('Price')->class('form-control')->id('Price')->placeholder('قیمت محصول') }}
                                    @error('Price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror</td>
                            </tr>
                            <tr>
                                <th scope="col">واحد</th>
                                <td>
                                    @if($Vaheds->isnotempty())
                                    {{html()->select('Vahed')->class('form-select')->open()}}
                                        @foreach($Vaheds as $Vah)
                                            {{html()->option($Vah->VahedName2)->value($Vah->VahedName2)}}
                                        @endforeach
                                    {{html()->select()->close()}}
                                    @else
                                        {{html()->text()->value('ابتدا واحد اضافه کنید')->class('form-control border-danger text-danger')->disabled()}}
                                    @endif
                                    @error('Vahed')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror</td>

                            </tr>
                            <tr>
                                <th scope="col">توضیحات</th>
                                <td>{{ html()->textarea('Details2')->class('form-control')->id('Details2')->placeholder('توضیحات')->style('resize:none;') }}
                                    @error('Details2')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror</td>
                            </tr>
                            <tr>
                                <th scope="col">نقطه سفارش کالا</th>
                                <td>{{ html()->text('OrderDot')->class('form-control')->id('OrderDot')->placeholder('نقطه سفارش کالا')}}
                                    @error('OrderDot')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror</td>
                            </tr>
                            <tr>
                                <th scope="col">عکس محصول</th>
                                <td>{{html()->file('ProductImage')->name('ProductImage')->id('ProductImage')->class('form-control-file')}}
                                    @error('ProductImage')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror</td>
                            </tr>
                            <tr>
                                <th scope="col">درصد شاخص</th>
                                <td>{{ html()->text('Indicate')->class('form-control')->id("Indicate")->placeholder('درصد شاخص')}}
                                    @error('Indicate')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror</td>
                            </tr>
                            <tr>
                                <td>
                                    @if($Sorts->isnotempty() && $Vaheds->isnotempty() )
                                    <button type="submit" class="btn btn-success">اعمال</button>
                                    @else
                                        <button type="button" class="btn btn-success disabled">لطفا ابتدا مقادیر خواسته شده را اضافه کنید</button>
                                    @endif
                                    <a href="{{route('Admin.Products.index')}}" class="btn btn-danger">بازگشت</a></td>
                            </tr>
                            </thead>
                        </table>
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan

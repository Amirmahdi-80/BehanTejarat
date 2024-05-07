@extends('Admin.Panel')
@section($title,'title')
@can('edit-orders')
    @section('ZPanel')
        <div class="row overflow-auto">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <!-- panel body -->
                    <div class="panel-body">
                        @csrf
                        @if(isset($item))
                            {{ html()->model($item)->form('PATCH', route('Admin.Orders.update', $item->id))->open() }}
                        @else
                            {{ html()->form('POST', route('Admin.Orders.store'))->open() }}
                        @endif
                        <table class="table text-right table-borderless" dir="rtl">
                            <tbody>
                            <tr>
                                <th scope="col">#</th>
                                <td>{{ html()->text('id')->class('form-control')->id('ProductComment')->isReadonly()}}</td>
                            </tr>
                            <tr>
                                <th scope="col">نام محصول</th>
                                <td>{{ html()->text('ProductComment')->class('form-control')->id('ProductComment')->isReadonly()}}</td>
                            </tr>
                            <tr>
                                <th scope="col">شناسه محصول</th>
                                <td>{{ html()->text('ProductId')->class('form-control')->id('ProductId')->isReadonly()}}</td>
                            </tr>
                            <tr>
                                <th scope="col">واحد اندازه گیری:</th>
                                <td>{{ html()->text('Vahed')->class('form-control')->id('Vahed')->isReadonly()}}</td>
                            </tr>
                            <tr>
                                <th scope="col">مشخصه دوم</th>
                                <td>{{ html()->text('Details2')->class('form-control')->id('Details2')->isReadonly()}}</td>
                            </tr>
                            <tr>
                                <th scope="col">نام</th>
                                <td>{{ html()->text('Firstname')->class('form-control')->id('Firstname')->isReadonly()}}</td>
                            </tr>
                            <tr>
                                <th scope="col">نام خانوادگی</th>
                                <td>{{ html()->text('Lastname')->class('form-control')->id('Lastname')->isReadonly()}}</td>
                            </tr>
                            <tr>
                                <th scope="col">ایمیل</th>
                                <td>{{ html()->text('email')->class('form-control')->id('email')->isReadonly()}}</td>
                            </tr>
                            <tr>
                                <th scope="col">آدرس</th>
                                <td>{{ html()->text('Address')->class('form-control')->id('Address')->isReadonly()}}</td>
                            </tr>
                            <tr>
                                <th scope="col">شماره تلفن</th>
                                <td>{{ html()->text('PhoneNumber')->class('form-control')->id('PhoneNumber')->isReadonly()}}</td>
                            </tr>
                            <tr>
                                <th scope="col">تعداد درخواستی</th>
                                <td>{{ html()->text('Count')->class('form-control')->id('Count')->isReadonly()}}</td>
                            </tr>
                            <tr>
                                <th scope="col">تعداد موجود در انبار</th>
                                <td>{{ html()->text('Storage')->class('form-control')->id('Storage')->isReadonly()}}</td>
                            </tr>
                            <tr>
                                <th scope="col">موجودی کل پس از تایید سفارش</th>
                                <td>{{ html()->text('Storage2')->class('form-control')->id('Storage2')->isReadonly()}}</td>
                            </tr>
                            <tr>
                                <th scope="col">مبلغ کل درخواستی</th>
                                <td>{{ html()->text('Price2')->class('form-control')->id('Price2')->isReadonly()}}</td>
                            </tr>
                            <tr>
                                <th scope="col">مبلغ کل کالاهای موجود در انبار</th>
                                <td>{{ html()->text('PriceKol2')->class('form-control')->id('PriceKol2')->isReadonly()}}</td>
                            </tr>
                            <tr>
                                <th scope="col">مبلغ کل کالاها پس از تایید سفارش</th>
                                <td>{{ html()->text('PriceKol3')->class('form-control')->id('PriceKol3')->isReadonly()}}</td>
                            </tr>
                            <tr>
                                <th scope="col">وضعیت سفارش</th>
                                <td>
                                <label for="در انتظار تایید">در انتظار تایید</label>
                                {{html()->radio()->name('Vaziat')->value("در انتظار تایید")->checked()}}
                                <label for="تایید شده">تایید شده</label>
                                {{html()->radio()->name('Vaziat')->value("تایید شده")}}
                                <label for="انجام شده">انجام شده</label>
                                {{html()->radio()->name('Vaziat')->value("انجام شده")}}
                                </td>
                            </tr>
                            <tr>
                                <td><button type="button" class="btn btn-primary" id="Dok1" onclick="Cal()">محاسبه انبار</button><button type="submit" class="btn btn-success" id="Dok2">تایید سفارش</button></td>
                                <td>
                                    <a href="{{route('Admin.Orders.index')}}" class="btn btn-danger">بازگشت</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan

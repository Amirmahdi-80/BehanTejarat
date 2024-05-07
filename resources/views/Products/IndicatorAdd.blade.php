@extends('Admin.Panel')
@section($title,'title')
@can('edit-products')
    @section('ZPanel')
        <div class="flex-column d-flex overflow-auto mt-5 w-100">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <!-- panel body -->
                    <div class="panel-body">
                        @csrf
                            {{ html()->model($item)->form('POST', route('Admin.Indicator.store', $item->id))->open() }}
                        <div class="d-flex flex-column justify-content-center align-items-center w-100">
                            <table class="table text-right w-50" dir="rtl">
                                <tbody>
                                <tr>
                                    <th scope="col">نام محصول</th>
                                    <td>
                                        {{html()->text('Product')->class('form-control')->value($item->PName)->isReadonly()}}
                                    </td>
                                    @error('Tamin')
                                    <td>
                                        <span class="text-danger">{{$message}}</span>
                                    </td>
                                    @enderror
                                </tr>
                                <tr>
                                    <th scope="col">تاریخ ثبت</th>
                                    <td>{{ html()->text('date')->class('form-control date1')->id('date')->placeholder('تاریخ ثبت')->attribute('autocomplete="off"')}}</td>
                                    @error('date')
                                    <td>
                                        <span class="text-danger">{{$message}}</span>
                                    </td>
                                    @enderror
                                </tr>
                                <tr>
                                    <th scope="col">تامین کننده</th>
                                    <td>
                                        {{html()->select('Tamin')->class('form-control')->open()}}
                                        {{html()->option('-')->value('-')}}
                                        @foreach($Tamin as $tamin)
                                            {{html()->option($tamin->TaminName)->value($tamin->TaminName)}}
                                        @endforeach
                                        {{html()->select()->close()}}
                                    </td>
                                    @error('Tamin')
                                    <td>
                                        <span class="text-danger">{{$message}}</span>
                                    </td>
                                    @enderror
                                </tr>
                                <tr>
                                    <th scope="col">وزن کلی</th>
                                    <td>{{ html()->text('VaznKol')->class('form-control')->id('VaznKol')->placeholder('وزن کلی')->attribute('autocomplete="off"')}}</td>
                                    @error('VaznKol')
                                    <td>
                                        <span class="text-danger">{{$message}}</span>
                                    </td>
                                    @enderror
                                </tr>
                                </tbody>
                            </table>
                            <table class="table text-right table-borderless" dir="rtl">
                                <tbody>
                                <tr class="bg-info text-center">
                                    <th scope="col" class="text-light">ردیف</th>
                                    <th scope="col" class="text-light">نام محصول</th>
                                    <th scope="col" class="text-light">شناسه محصول</th>
                                    <th scope="col" class="text-light">تولید واقعی</th>
                                    <th scope="col" class="text-light">واحد</th>
                                    <th scope="col" class="text-light">شاخص(درصد)</th>
                                    <th scope="col" class="text-light">درصدآنالیز</th>
                                    <th scope="col" class="text-light">انحراف</th>
                                </tr>
                                <tr class="text-center">
                                    {{--ردیف--}}
                                    <td scope="col">1</td>
                                    {{--سلکت--}}
                                    <td scope="col">
                                        {{html()->text('Product1')->class('form-control')->value($item->ProName1)->isReadonly()}}
                                    </td>
                                    {{--مقدار شاخص--}}
                                    <td scope="col">
                                        @foreach($Products as $Product)
                                        @if($item->ProName1 == $Product->ProductComment)
                                            @if(!$Product->ProductId== "")
                                                    {{$Product->ProductId}}
                                                @else
                                                0
                                                @endif

                                        @endif
                                        @endforeach
                                    </td>
                                    <td scope="col">{{html()->text('Tol1')->class('form-control')->placeholder('تولید واقعی')->id('Tol1')->attribute('oninput="calculateAndPerformUpdates(1)"')->attribute('autocomplete="off"')}}</td>
                                    <td scope="col">@foreach($Products as $Product)
                                            @if($item->ProName1 == $Product->ProductComment)
                                                @if(!$Product->Vahed == "")
                                                    {{$Product->Vahed}}
                                                @else
                                                    0
                                                @endif
                                            @endif
                                        @endforeach</td>
                                    <td scope="col">
                                        @foreach($Products as $Product)
                                            @if($item->ProName1 == $Product->ProductComment)
                                                @if(!$Product->Indicate == "")
                                                    {{html()->text()->class('form-control')->placeholder('شاخص')->id('Ind1')->isReadonly()->value($Product->Indicate)}}
                                                @else
                                                    {{html()->text()->class('form-control')->placeholder('شاخص')->id('Ind1')->isReadonly()->value(0)}}
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td scope="col">{{html()->text('Analyse1')->class('form-control')->placeholder('درصد آنالیز')->id('Anz1')->isReadonly()->value('')}}</td>
                                    <td scope="col">{{html()->text('Deviation1')->class('form-control')->placeholder('درصد انحراف')->id('Dev1')->isReadonly()->value('')}}</td>
                                </tr>
                                @for($i = 2; $i <= 20; $i++)
                                    @if(!$item->{"ProName$i"} == "")
                                        <tr class="text-center">
                                            {{--ردیف--}}
                                            <td scope="col">{{$i}}</td>
                                            {{--سلکت--}}
                                            <td scope="col">
                                                {{html()->text("Product$i")->class('form-control')->value($item->{"ProName$i"})->isReadonly()}}
                                            </td>
                                            {{--مقدار شاخص--}}
                                            <td scope="col">
                                                @foreach($Products as $Product)
                                                    @if($item->{"ProName$i"} == $Product->ProductComment)
                                                        @if(!$Product->ProductId== "")
                                                            {{$Product->ProductId}}
                                                        @else
                                                            0
                                                        @endif

                                                    @endif
                                                @endforeach
                                            </td>
                                            <td scope="col">{{html()->text("Tol$i")->class('form-control')->placeholder('تولید واقعی')->id("Tol$i")->attribute("oninput='calculateAndPerformUpdates($i)'")->attribute('autocomplete="off"')}}</td>
                                            <td scope="col">@foreach($Products as $Product)
                                                    @if($item->{"ProName$i"} == $Product->ProductComment)
                                                        @if(!$Product->Vahed == "")
                                                            {{$Product->Vahed}}
                                                        @else
                                                            0
                                                        @endif
                                                    @endif
                                                @endforeach</td>
                                            <td scope="col">
                                                @foreach($Products as $Product)
                                                    @if($item->{"ProName$i"} == $Product->ProductComment)
                                                        @if(!$Product->Indicate == "")
                                                            {{html()->text()->class('form-control')->placeholder('شاخص')->id("Ind$i")->isReadonly()->value($Product->Indicate)}}
                                                        @else
                                                            {{html()->text()->class('form-control')->placeholder('شاخص')->id("Ind$i")->isReadonly()->value(0)}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td scope="col">{{html()->text("Analyse$i")->class('form-control')->placeholder('درصد آنالیز')->id("Anz$i")->isReadonly()->value('')}}</td>
                                            <td scope="col">{{html()->text("Deviation$i")->class('form-control')->placeholder('درصد انحراف')->id("Dev$i")->isReadonly()->value('')}}</td>
                                        </tr>
                                    @endif
                                @endfor
                                    <tr class="text-center">
                                        {{--ردیف--}}
                                        <td scope="col" colspan="3">مجموع:</td>
                                        {{--سلکت--}}
                                        <td scope="col">
                                            {{html()->text('TolKol')->class('form-control')->value("")->placeholder("مجموع تولید واقعی")->id("TolKol")->isReadonly()}}
                                        </td>
                                        {{--مقدار شاخص--}}
                                        <td scope="col">
                                            -
                                        </td>
                                        <td scope="col">{{html()->text('ShKol')->class('form-control')->placeholder('مجموع شاخص')->id('ShKol')->isReadonly()}}</td>
                                        <td scope="col">{{html()->text('AnzKol')->class('form-control')->placeholder('مجموع آنالیز')->id('AnzKol')->isReadonly()}}</td>
                                        <td scope="col">
                                            {{html()->text('EnherafKol')->class('form-control')->placeholder('مجموع انحراف')->id('EnherafKol')->isReadonly()}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <span class="d-flex row justify-content-center align-items-center" style="gap: 20px">
                                <button type="submit" class="btn btn-success">ثبت</button>
                                <a href="{{url()->previous()}}" class="btn btn-danger">بازگشت</a>
                            </span>
                        </div>
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan

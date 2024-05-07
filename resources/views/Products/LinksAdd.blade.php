@extends('Admin.Panel')
@section($title,'title')
@can('edit-products')
    @section('ZPanel')
        <div class="d-flex justify-content-center align-items-center no-gutters w-100">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <!-- panel body -->
                    <div class="panel-body">
                        @csrf
                        @if(isset($item))
                            {{ html()->model($item)->form('PATCH', route('Admin.Links.update', $item->id))->attribute('enctype="multipart/form-data"')->open() }}
                        @else
                            {{ html()->form('POST', route('Admin.Links.store'))->attribute('enctype="multipart/form-data"')->open() }}
                        @endif
                        <table class="table text-right mt-5 w-100" dir="rtl">
                            <tbody>
                            <tr>
                                <th scope="col">نام محصول</th>
                                <td>{{html()->select('PName')->open()}}
                                    @if(isset($item)){{html()->option($item->PName)->value($item->PName)}} @endif
                                    @foreach($Products as $Product)
                                        {{html()->option($Product->ProductComment)->value($Product->ProductComment)}}
                                    @endforeach
                                    {{html()->select()->close()}}
                                    @error('PName')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror</td>
                            </tr>
                            <tr style="border-bottom: 3px dashed #333 !important;">
                                <th scope="col">تاریخ ثبت محصول</th>
                                <td>{{html()->text('date')->class('form-control date1')->attribute('autocomplete="off"')}}
                                    @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror</td>
                            </tr>
                            <tr>
                                <th scope="col">زیر مجموعه اول</th>
                                <td>{{html()->select('ProName1')->open()}}
                                    @if(isset($item))
                                        {{html()->option($item->ProName1)->value($item->ProName1)->selected()}}
                                    @else
                                        {{html()->option("انتخاب کنید")->value(null)->selected()->disabled()}}
                                    @endif
                                    @foreach($Products as $Product)
                                        {{html()->option($Product->ProductComment)->value($Product->ProductComment)}}
                                    @endforeach
                                    {{html()->select()->close()}}
                                    @error('ProName1')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror</td>
                            </tr>
                            @for($i = 2; $i <= 20; $i++)
                                <tr>
                                    <th scope="col">زیر مجموعه {{$i}}</th>
                                    <td>{{html()->select("ProName$i")->open()}}
                                        @if(isset($item))
                                            {{html()->option($item->{"ProName$i"})->value($item->{"ProName$i"})->selected()}}
                                        @else
                                            {{html()->option("انتخاب کنید")->value(null)->selected()->disabled()}}
                                        @endif
                                        @foreach($Products as $Product)
                                            {{html()->option($Product->ProductComment)->value($Product->ProductComment)}}
                                        @endforeach
                                        {{html()->select()->close()}}
                                        @error("ProName$i")
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror</td>
                                </tr>
                            @endfor
                            <tr>
                                <td><button type="submit" class="btn btn-success">اعمال</button>
                                    <a href="{{url()->previous()}}" class="btn btn-danger">بازگشت</a></td>
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

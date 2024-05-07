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
                            {{ html()->model($item)->form('PATCH', route('Admin.Tamin.update', $item->id))->open() }}
                        @else
                            {{ html()->form('POST', route('Admin.Tamin.store'))->open() }}
                        @endif
                        <table class="table text-right mt-5" dir="rtl">
                            <thead>
                            <tr>
                                <th scope="col">نام تامین کننده</th>
                                <td>{{ html()->text('TaminName')->class('form-control')->id('TaminName')->placeholder('نام تامین کننده') }}
                                    @error('TaminName')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror</td>
                            </tr>
                            <tr>
                                <th scope="col">کد تامین کننده</th>
                                <td>{{ html()->text('TaminCode')->class('form-control')->id('TaminCode')->placeholder('کد تامین کننده')}}
                                    @error('TaminCode')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror</td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" class="btn btn-success">اعمال</button>
                                    <a href="{{route('Admin.Tamin.index')}}" class="btn btn-danger">بازگشت</a></td>
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

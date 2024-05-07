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
                            {{ html()->model($item)->form('PATCH', route('Admin.Initialize.update', $item->id))->open() }}
                        @else
                            {{ html()->form('POST', route('Admin.Initialize.store'))->open() }}
                        @endif
                        <table class="table text-right mt-5" dir="rtl">
                            <thead>
                            <tr>
                                <th scope="col">نام واحد</th>
                                <td>{{ html()->text('VahedName')->class('form-control')->id('VahedName')->placeholder('نام واحد') }}
                                    @error('VahedName')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror</td>
                            </tr>
                            <tr>
                                <th scope="col">نام مخفف واحد</th>
                                <td>{{ html()->text('VahedName2')->class('form-control')->id('VahedName2')->placeholder('نام مخفف واحد') }}
                                    @error('VahedName2')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror</td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" class="btn btn-success">اعمال</button>
                                    <a href="{{route('Admin.Initialize.index')}}" class="btn btn-danger">بازگشت</a></td>
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

@extends('Admin.Panel')
@section($title,'title')
@can('edit-cost')
    @section('ZPanel')
        <div class="d-flex row justify-content-center align-items-center no-gutters w-100">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <!-- panel body -->
                    <div class="panel-body">
                        @csrf
                        @if(isset($item))
                            {{ html()->model($item)->form('PATCH', route('Admin.costSort.update', $item->id))->open() }}
                        @else
                            {{ html()->form('POST', route('Admin.costSort.store'))->open() }}
                        @endif
                        <table class="table text-right mt-5" dir="rtl">
                            <thead>
                            <tr>
                                <th scope="col">شناسه گروه هزینه</th>
                                <td>{{ html()->text('Sort')->class('form-control')->id('Sort')->placeholder('شناسه هزینه')->attribute('autocomplete="off"') }}
                                    @error('Sort')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror</td>
                            </tr>
                            <tr>
                                <th scope="col">نام گروه هزینه</th>
                                <td>{{ html()->text('SortName')->class('form-control')->id('SortName')->placeholder('نام هزینه')->attribute('autocomplete="off"') }}
                                    @error('SortName')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror</td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" class="btn btn-success">اعمال</button>
                                    <a href="{{route('Admin.costSort.index')}}" class="btn btn-danger">بازگشت</a></td>
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

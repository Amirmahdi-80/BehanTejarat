@extends('Admin.Panel')

@can('edit-users')
    @section($title, 'title')
    @section('ZPanel')
        <div class="container-fluid p-0">
            <div class="panel panel-primary">
                <div class="panel-heading clearfix mb-4 d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('assets/images/EditUser.png') }}" alt="ویرایش کاربران" class="img2">
                    <h1 class="panel-title text-dark text-center mb-5 mt-2">{{ $title }}</h1>
                    <p>
                        از طریق این صفحه می‌توانید تعداد کاربران موجود در سایت را حذف و یا اضافه کنید، همچنین می‌توانید
                        مشخصات آن‌ها را نیز تغییر دهید. لطفاً در نظر داشته باشید برای تغییر بر روی دکمه مداد کلیک کنید و
                        برای حذف بر روی دکمه سطل آشغال کلیک کنید.
                    </p>
                </div>

                <!-- panel body -->
                <div class="panel-body d-flex flex-column justify-content-center align-items-center">
                    <div class="table-responsive">
                        <table class="table text-center table-responsive" dir="rtl">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام</th>
                                <th scope="col">نام خانوادگی</th>
                                <th scope="col">ایمیل</th>
                                <th scope="col">سِمَت:</th>
                                <th scope="col">تاریخ ساخت</th>
                                <th scope="col">تاریخ آخرین به روزرسانی</th>
                                <th scope="col">ویرایش</th>
                                <th scope="col">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->Firstname }}</td>
                                    <td>{{ $item->Lastname }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if($item->Role !== null)
                                            {{ $item->Role }}
                                        @else
                                            تعیین نشده
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('Admin.Editusers.edit', $item->id) }}" class="btn btn-warning">
                                            <i class="material-icons">edit</i>
                                        </a>
                                    </td>
                                    <td>
                                        {{ html()->form('DELETE', route('Admin.Editusers.destroy', $item->id))->open() }}
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

                    <!-- Pagination -->
                    <span dir="ltr">
                        <a href="{{ $items->previousPageUrl() }}" class="btn btn-light">
                            <i class="material-icons text-dark">arrow_back</i>
                        </a>
                        @for($i = 1; $i <= $items->lastPage(); $i++)
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

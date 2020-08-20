@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>
                <small>{{ $orders->total() }} الورديات </small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i>الرئاسية</a></li>
                <li class="active">الورديات</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                <div class="col-md-8">

                    <div class="box box-primary">

                        <div class="box-header">
                     

                            <h3 class="box-title" style="margin-bottom: 10px">الورديات</h3>

                            <form action="{{ route('dashboard.shaft.index') }}" method="get">

                                <div class="row">

                                <div class="col-md-4">
                                <input type="date" name="search" class="form-control" placeholder="بحث" value="{{ request()->search }}">
                            </div>

                                   



                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> بحث</button>
                                        @if (auth()->user()->hasPermission('create_shafts'))

                                        <a href="{{ route('dashboard.shaft.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة عملية</a>
                                        @endif


                                    </div>




                                </div><!-- end of row -->

                            </form><!-- end of form -->
                           
                        </div><!-- end of box header -->
                    

                        @if ($orders->count() > 0)

                            <div class="box-body table-responsive">

                                <table class="table table-hover">
                                    <tr>
                                        <th>اسم المشرف</th>
                                        <th>التاريخ</th>
                                        <th>المتوقع انتاجه</th>
                                        <th>المنتج</th>

                                        <th>المغقود</th>
                                        <th>ملاحظات</th>


                                        <th>الاوارمر</th>
                                    </tr>

                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->employe->name }}</td>
                                            <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                            <td>{{ number_format($order->expect, 2) }}</td>


                                            <td>{{ number_format($order->genter, 2) }}</td>

                                            <td>{{ number_format($order->lost, 2) }}</td>
                                            <td>{{ $order->description }}</td>


                                            <td>
                                                <button class="btn btn-primary btn-sm order-shafts"
                                                        data-url="{{ route('dashboard.shafts.materials', $order->id) }}"
                                                        data-method="get"
                                                >
                                                    <i class="fa fa-list"></i>
مشاهدة الوردية                                              </button>
                                                @if (auth()->user()->hasPermission('update_shafts'))
                                                    <a href="{{ route('dashboard.shaft.edit', $order->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> معاينة</a>
                                                @else
                                                    <a href="#" disabled class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> تعديل الاوردر</a>
                                                @endif

                                                @if (auth()->user()->hasPermission('delete_shafts'))
                                                    <form action="{{ route('dashboard.shaft.destroy', $order->id) }}" method="post" style="display: inline-block;">
                                                        {{ csrf_field() }}
                                                        {{ method_field('delete') }}
                                                        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>حذف الوردية</button>
                                                    </form>

                                                @else
                                                    <a href="#" class="btn btn-danger btn-sm" disabled><i class="fa fa-trash"></i>حذف الوردية</a>
                                                @endif

                                            </td>

                                        </tr>

                                    @endforeach

                                </table><!-- end of table -->

                                {{ $orders->appends(request()->query())->links() }}

                            </div>

                        @else

                            <div class="box-body">
                                <h3>@lang('site.no_records')</h3>
                            </div>

                        @endif

                    </div><!-- end of box -->

                </div><!-- end of col -->

                <div class="col-md-4">

                    <div class="box box-primary">

                        <div class="box-header">
                            <h3 class="box-title" style="margin-bottom: 10px">تفاصيل الوردية</h3>
                        </div><!-- end of box header -->

                        <div class="box-body">

                            <div style="display: none; flex-direction: column; align-items: center;" id="load">
                                <div class="loader"></div>
                                <p style="margin-top: 10px">تحميل</p>
                            </div>

                            <div id="order-shaft-list">

                            </div><!-- end of order product list -->

                        </div><!-- end of box body -->

                    </div><!-- end of box -->

                </div><!-- end of col -->

            </div><!-- end of row -->

        </section><!-- end of content section -->

    </div><!-- end of content wrapper -->

@endsection

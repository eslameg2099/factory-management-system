@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>الاوردرات
                <small>{{ $orders->total() }} الاوردرات</small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i>الرئاسية</a></li>
                <li class="active">@lang('site.orders')</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                <div class="col-md-8">

                    <div class="box box-primary">

                        <div class="box-header">

                            <h3 class="box-title" style="margin-bottom: 10px">الاوردرات</h3>

                            <form action="{{ route('dashboard.orders.index') }}" method="get">

                                <div class="row">

                                    <div class="col-md-8">
                                        <input type="text" name="search" class="form-control" placeholder="اسم العميل" value="{{ request()->search }}">
                                    </div>

                                   



                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> بحث</button>
                                    </div>

                                </div><!-- end of row -->

                            </form><!-- end of form -->

                        </div><!-- end of box header -->

                        @if ($orders->count() > 0)

                            <div class="box-body table-responsive">

                                <table class="table table-hover">
                                    <tr>
                                        <th>اسم العميل</th>
                                        <th>المبلغ</th>
                                        <th>الخصم</th>
                                        <th>المطلوب</th>

                                        <th>تاريخ الانشاء</th>
                                        <th>تاريخ التحديث</th>

                                        <th>الاوارمر</th>
                                    </tr>

                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->client->name }}</td>
                                            <td>{{ number_format($order->total_price, 2) }}</td>
                                            <td>{{ number_format($order->des, 2) }}</td>
                                            <td>{{ number_format($order->finprice, 2) }}</td>


                                           
                                            <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                            <td>{{ $order->updated_at->toFormattedDateString() }}</td>

                                            <td>
                                                <button class="btn btn-primary btn-sm order-products"
                                                        data-url="{{ route('dashboard.orders.products', $order->id) }}"
                                                        data-method="get"
                                                >
                                                    <i class="fa fa-list"></i>
مشاهدة الاوردر                                                </button>
                                                @if (auth()->user()->hasPermission('update_orders'))
                                                    <a href="{{ route('dashboard.orders.edit', ['client' => $order->client->id, 'order' => $order->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> تعديل الاوردر</a>
                                                @else
                                                    <a href="#" disabled class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> تعديل الاوردر</a>
                                                @endif

                                                @if (auth()->user()->hasPermission('delete_orders'))
                                                    <form action="{{ route('dashboard.orders.destroy', $order->id) }}" method="post" style="display: inline-block;">
                                                        {{ csrf_field() }}
                                                        {{ method_field('delete') }}
                                                        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> حذف الاوردر</button>
                                                    </form>

                                                @else
                                                    <a href="#" class="btn btn-danger btn-sm" disabled><i class="fa fa-trash"></i> حذف الاوردر</a>
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
                            <h3 class="box-title" style="margin-bottom: 10px">تفاصيل الفاتورة</h3>
                        </div><!-- end of box header -->

                        <div class="box-body">

                            <div style="display: none; flex-direction: column; align-items: center;" id="loading">
                                <div class="loader"></div>
                                <p style="margin-top: 10px">تحميل</p>
                            </div>

                            <div id="order-product-list">

                            </div><!-- end of order product list -->

                        </div><!-- end of box body -->

                    </div><!-- end of box -->

                </div><!-- end of col -->

            </div><!-- end of row -->

        </section><!-- end of content section -->

    </div><!-- end of content wrapper -->

@endsection

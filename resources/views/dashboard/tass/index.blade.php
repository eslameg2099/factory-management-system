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

                <div class="col-md-12">

                    <div class="box box-primary">

                        <div class="box-header">

                            <h3 class="box-title" style="margin-bottom: 10px">الاوردرات</h3>

                            <form action="{{ route('dashboard.tass.index') }}" method="get">

                                <div class="row">

                                    <div class="col-md-8">
                                    <label>اسم العميل </label>

                                        <input type="text" name="search" class="form-control" placeholder="اسم العميل" value="{{ request()->search }}">
                                    </div>

                                   



                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-block btn-primary "><i class="fa fa-search"></i> بحث</button>
                                    </div>
                                    <br>
                                    

                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-block btn-success sreach-btn"><i class="fa fa-search"></i> احسب الاجمالي</button>
                                    </div>

                                </div><!-- end of row -->

                            </form><!-- end of form -->

                        </div><!-- end of box header -->

                        @if ($orders->count() > 0)

                            <div class="box-body table-responsive">
                            <div id="exampleTableContainer">


                                <table class="table table-hover"id="table" >
                                <thead>

                                    <tr>
                                    <th>ل</th>

                                        <th>اسم العميل</th>
                                        <th>المبلغ المطلوب</th>
                                        <th>المدفوع</th>
                                        <th>الباقي</th>
                                        <th>اجمالي قبل الخصم</th>
                                        <th>الخصم</th>


                                        <th>تاريخ الانشاء</th>
                                        <th>تاريخ التحديث</th>

                                        <th>الاوارمر</th>
                                    </tr>
                                    </thead>
                                    <tbody  class="order-lis" >



                                    @foreach ($orders as $order)
                                        <tr>
                                        <td>{{ $order->id }}</td>

                                            <td>{{ $order->client->name }}</td>
                                            <td class="amount" >{{ number_format($order->finprice, 2) }}</td>
                                            <td class="payment">{{ number_format($order->payment, 2) }}</td>
                                            <td class="rest" >{{ number_format($order->rest, 2) }}</td>
                                            <td  >{{ number_format($order->total_price, 2) }}</td>
                                            <td  >{{ number_format($order->des, 2) }}</td>



                                            <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                            <td>{{ $order->updated_at->toFormattedDateString() }}</td>

                                            <td>

                                                @if (auth()->user()->hasPermission('update_orders'))
                                                    <a href="{{ route('dashboard.tass.edit', $order->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> تعديل الاوردر</a>
                                                @else
                                                    <a href="#" disabled class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> تعديل الاوردر</a>
                                                @endif

                                               

                                            </td>

                                        </tr>

                                    @endforeach

                                    </tbody>


                                </table><!-- end of table -->

                                <br>
                                <div style="display: inline-block;">
                                <br>
                                <h4> اجمالي المطلوب : <span class="total-pric"> {{$finprice}} </span></h4>
                                <br>
                                <h4> المدفوع: <span class="total-pri">{{$payment}}</span></h4>
                                <br>
                                <h4>الباقي: <span class="total-pr">{{$rest}}</span></h4>
                                </div>





                            </div>

                            {{ $orders->appends(request()->query())->links() }}


                        @else

                            <div class="box-body">
                                <h3>لا يوجد اي الاوردرات لتسديد</h3>
                            </div>

                        @endif

                    </div><!-- end of box -->

                </div><!-- end of col -->

               

            </div><!-- end of row -->

        </section><!-- end of content section -->

    </div><!-- end of content wrapper -->

@endsection

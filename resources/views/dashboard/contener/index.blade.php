@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>العمليات
                <small>{{ $orders->total() }} العمليات</small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i>الرئاسية</a></li>
                <li class="active">العملية</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                <div class="col-md-12">

                    <div class="box box-primary">

                        <div class="box-header">

                            <h3 class="box-title" style="margin-bottom: 10px">العمليات</h3>

                            <form action="" method="get">

                                <div class="row">

                                    <div class="col-md-8">
                                    <label>اسم العميل </label>

                                        <input type="text" name="search" class="form-control" placeholder="اسم العميل" value="{{ request()->search }}">
                                    </div>

                                   
                                    <div class="col-md-4">
                                    @if (auth()->user()->hasPermission('create_conteners'))

                                    <a href="{{ route('dashboard.Contener.create') }}" class="btn btn-block  btn-warning"><i class="fa fa-plus"></i>اضافة عملية جديدة</a>
                                    @endif

                                    </div>
                                    <br>
                                    <br>


                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-block btn-primary "><i class="fa fa-search"></i> بحث</button>
                                    </div>
                                    

                                    <div class="col-md-2">
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
                                        <th>المبلغ</th>
                                        <th>المدفوع</th>
                                        <th>الباقي</th>

                                        <th>تاريخ الانشاء</th>
                                        <th>تاريخ التحديث</th>

                                        <th>الاوارمر</th>
                                    </tr>
                                    </thead>
                                    <tbody  class="order-lis" >



                                    @foreach ($orders as $order)
                                        <tr>
                                        <td>{{ $order->id }}</td>

                                            <td>{{ $order->Qclii->name }}</td>
                                            <td class="amount" >{{ number_format($order->commit, 2) }}</td>
                                            <td class="payment">{{ number_format($order->payment, 2) }}</td>
                                            <td class="rest" >{{ number_format($order->rest, 2) }}</td>

                                            <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                            <td>{{ $order->updated_at->toFormattedDateString() }}</td>
                                          

                                            <td>

                                                @if (auth()->user()->hasPermission('update_conteners'))
                                                    <a href="{{ route('dashboard.Contener.edit', $order->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i>تعديل العملية</a>
                                                @else
                                                    <a href="#" disabled class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>تعديل العملية</a>
                                                @endif

                                                @if (auth()->user()->hasPermission('delete_conteners'))
                                            <form action="{{ route('dashboard.Contener.destroy', $order->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>  حذف العملية</button>
                                            </form><!-- end of form -->
                                        @else
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> حذف</button>
                                        @endif

                                               

                                            </td>

                                        </tr>

                                    @endforeach

                                    </tbody>


                                </table><!-- end of table -->

                                <br>
                                <div style="display: inline-block;">
                                <br>
                                <h4> اجمالي المطلوب : <span class="total-pric">0</span></h4>
                                <br>
                                <h4> المدفوع: <span class="total-pri">0</span></h4>
                                <br>
                                <h4>الباقي: <span class="total-pr">0</span></h4>
                                </div>




                                {{ $orders->appends(request()->query())->links() }}

                            </div>

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

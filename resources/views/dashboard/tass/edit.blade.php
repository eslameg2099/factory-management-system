@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>المنتجات</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> الرئاسية</a></li>
                <li><a href="{{ route('dashboard.tass.index') }}"> المنتجات</a></li>
                <li class="active">تعديل</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">تعديل</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div id="print-area">


                        

                            <div class="form-group">
                                <label>رقم العملية</label>
                                <input type="text" name="id" class="form-control" value="{{ $order->id }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>اسم العميل</label>
                                <input type="text" name="name" class="form-control" value="{{ $order->client->name }}"   readonly>
                            </div>


                        

                        <div class="form-group">
                            <label>السعر للعملية</label>
                            <input type="text" name="total_price tol "  class="form-control " value="{{ $order->finprice }}"  id="tol" readonly>
                        </div>

                       

                        <div class="form-group">
                            <label>المدفوع</label>
                            <input type="text" name="payment" class="form-control pay " value="{{ number_format($order->payment, 2) }}"  id="pay" readonly  >
                        </div>

                        <div class="form-group">
                            <label>المدفوع الان</label>
                            <input type="text" name="stock" class="form-control now "  value="{{ number_format(0.00) }}" id="now" >
                        </div>

                        <div class="form-group">
                            <label>المتبقي</label>
                            <input type="text" name="rest" step="0.01" class="form-control res" value="{{ number_format($order->rest, 2) }}" id="res" readonly >
                        </div>

                       

                        <div class="form-group">
                            <label>تاريخ انشاء العملية</label>
                            <input type="text" name="stock" class="form-control" value="{{ $order->created_at}}" readonly>
                        </div>

                        </div>

                        <div class="form-group">
                            <button type="submit" id="ok" class="btn btn-primary" disabled><i class="fa fa-plus"></i> تعديل</button>
                        </div>




                    </form><!-- end of form -->

                    <button class="btn btn-block btn-primary print-btn"><i class="fa fa-print"  ></i> @lang('site.print')</button>


                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection

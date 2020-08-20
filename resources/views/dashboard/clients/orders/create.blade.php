@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>اضافة اوردر</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
                <li><a href="{{ route('dashboard.clients.index') }}">العملاء</a></li>
                <li class="active">اضافة اوردر</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                <div class="col-md-6">

                    <div class="box box-primary">

                        <div class="box-header">

                            <h3 class="box-title" style="margin-bottom: 10px">الاصناف</h3>

                        </div><!-- end of box header -->

                        <div class="box-body">

                            @foreach ($categories as $category)
                                
                                <div class="panel-group">

                                    <div class="panel panel-info">

                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" href="#{{ str_replace(' ', '-', $category->name) }}">{{ $category->name }}</a>
                                            </h4>
                                        </div>

                                        <div id="{{ str_replace(' ', '-', $category->name) }}" class="panel-collapse collapse">

                                            <div class="panel-body">

                                                @if ($category->products->count() > 0)

                                                    <table class="table table-hover">
                                                        <tr>
                                                            <th>اسم المنتج</th>
                                                            <th>الوزن الموجود</th>
                                                            <th>السعر</th>
                                                            <th>اضافة</th>
                                                        </tr>

                                                        @foreach ($category->products as $product)
                                                            <tr>
                                                                <td>{{ $product->name }}</td>
                                                                <td>{{ $product->stock }}</td>
                                                                <td>{{ number_format($product->price, 2) }}</td>
                                                                <td>
                                                                    <a href=""
                                                                       id="product-{{ $product->id }}"
                                                                       data-name="{{ $product->name }}"
                                                                       data-id="{{ $product->id }}"
                                                                       data-price="{{ $product->price }}"
                                                                       class="btn btn-success btn-sm add-product-btn">
                                                                        <i class="fa fa-plus"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </table><!-- end of table -->

                                                @else
                                                    <h5>لا يوجد منتجات</h5>
                                                @endif

                                            </div><!-- end of panel body -->

                                        </div><!-- end of panel collapse -->

                                    </div><!-- end of panel primary -->

                                </div><!-- end of panel group -->

                            @endforeach

                        </div><!-- end of box body -->

                    </div><!-- end of box -->

                </div><!-- end of col -->

                <div class="col-md-6">

                    <div class="box box-primary">

                        <div class="box-header">

                            <h3 class="box-title">الاوردر</h3>

                        </div><!-- end of box header -->

                        <div class="box-body">

                            <form action="{{ route('dashboard.clients.orders.store', $client->id) }}" method="post">

                                {{ csrf_field() }}
                                {{ method_field('post') }}

                                @include('partials._errors')

                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>المنتج</th>
                                        <th>الوزن</th>
                                        <th>السعر</th>
                                    </tr>
                                    </thead>

                                    <tbody class="order-list">


                                    </tbody>

                                </table><!-- end of table -->

                                <h4>المطلوب : <span class="total-price" value="{{ number_format(0, 2) }}"   id="stt" ></span></h4>

                                <h4>الخصم بالنسبة % : <input type="text" name="des"  class="form-control total-pric" value="{{ number_format(0, 2) }}"   id="tx"></h4>

                                <h4>الاجمالي : <span class="total-p" name="fin"  value="{{ number_format(0, 2) }}"  id="finn"  ></span></h4>



                                <button class="btn btn-primary btn-block disabled" id="add-order-form-btn"><i class="fa fa-plus"></i> اضافة الطلب </button>

                            </form>

                        </div><!-- end of box body -->

                    </div><!-- end of box -->

                    

                </div><!-- end of col -->

            </div><!-- end of row -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection

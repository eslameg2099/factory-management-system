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

                                                @if ($category->materials->count() > 0)

                                                    <table class="table table-hover">
                                                        <tr>
                                                            <th>اسم المنتج</th>
                                                            <th>الوزن الموجود</th>
                                                            <th>السعر</th>
                                                            <th>اضافة</th>
                                                        </tr>

                                                        @foreach ($category->materials as $product)
                                                            <tr>
                                                                <td>{{ $product->name }}</td>
                                                                <td>{{ $product->stock }}</td>
                                                                <td>{{ number_format($product->price, 2) }}</td>
                                                                <td>
                                                                    <a href=""
                                                                       id="product-{{ $product->id }}"
                                                                       data-name="{{ $product->name }}"
                                                                       data-id="{{ $product->id }}"
                                                                       class="btn btn-success btn-sm add-matrail-btn">
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

                            <form action="{{ route('dashboard.shaft.store') }}" method="post">

                                {{ csrf_field() }}
                                {{ method_field('post') }}

                                @include('partials._errors')
                                <div class="form-group">
                            <label>المشرفين</label>
                            <select name="employe_id" class="form-control">
                                <option value="">المشرفين</option>
                                @foreach ($emp as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>المنتج</th>
                                        <th>الوزن</th>
                                    </tr>
                                    </thead>

                                    <tbody class="order-lis">


                                    </tbody>

                                </table><!-- end of table -->


                                <h4>الانتاج المتوفع : <input type="text" name="expect"  class="form-control total-pric" value="{{ number_format(0, 2) }}"   id="tx"></h4>




                                <button class="btn btn-primary btn-block disabled" id="add-order-form-btn"><i class="fa fa-plus"></i> اضافة الطلب </button>

                            </form>

                        </div><!-- end of box body -->

                    </div><!-- end of box -->

                    

                </div><!-- end of col -->

            </div><!-- end of row -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection

@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>النثريات</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> لوحة التحكم </a></li>
                <li><a href="{{ route('dashboard.employe.index') }}">النثريات</a></li>
                <li class="active">اضافة عملية</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">اضافة</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.extra.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                       

                        
                            <div class="form-group">
                                <label>الامر بالصرف</label>
                                <input type="text" name="name_order" class="form-control" >
                            </div>


                            <div class="form-group">
                            <label>الصارف</label>
                            <input type="text" name="person_order" step="0.01" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label>تاريخ العملية</label>
                            <input type="date" name="date_salary" step="0.01" class="form-control" >
                        </div>

                          

                       

                      

                        <div class="form-group">
                            <label>المبلغ</label>
                            <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price') }}">
                        </div>

                        

                        <div class="form-group">
                            <label>السبب</label>
                            <input type="text" name="reson" class="form-control" value="{{ old('reson') }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة </button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection

@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>العملاء</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> الرئاسية</a></li>
                <li><a href="{{ route('dashboard.qqqcli.index') }}">العملاء</a></li>
                <li class="active">اضافة عميل</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">اضافة عميل</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.qqqcli.store') }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        
                        <div class="form-group">
                            <label>اسم العميل </label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>

                            <div class="form-group">
                                <label>رقم الهاتف</label>
                                <input type="text" name="phone" class="form-control">
                            </div>

                        <div class="form-group">
                            <label>العنوان</label>
                            <textarea name="address" class="form-control">{{ old('address') }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة العميل</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection

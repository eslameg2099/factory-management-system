@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>تعديل</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i>لوحة التحكم</a></li>
                <li><a href="{{ route('dashboard.categories.index') }}">الاصناف</a></li>
                <li class="active"></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">تعديل الصنف</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.categories.update', $category->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                            <div class="form-group">
                                <label>اسم الصنف</label>
                                <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                            </div>

                            <div class="form-group">
                                <label>نوع الخامة</label>
                                <input type="text" name="type" class="form-control" value="{{ $category->type }}">
                            </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> تعديل</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection

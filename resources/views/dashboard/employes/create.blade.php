@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>الموظفين</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> لوحة التحكم </a></li>
                <li><a href="{{ route('dashboard.employe.index') }}">الموظفين</a></li>
                <li class="active">اضافة موظف</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">اضافة</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.employe.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <div class="form-group">
                            <label>النوع</label>
                            <select name="type_id" class="form-control">
                                <option value="">النوع</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        

                        
                            <div class="form-group">
                                <label>اسم الموظف</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            </div>


                            <div class="form-group">
                            <label>العنوان</label>
                            <input type="text" name="address" step="0.01" class="form-control" value="{{ old('address') }}">
                        </div>

                          

                       

                      

                        <div class="form-group">
                            <label>رقم الهاتف</label>
                            <input type="number" name="phone" step="0.01" class="form-control" value="{{ old('price') }}">
                        </div>

                        

                        <div class="form-group">
                            <label>المرتب</label>
                            <input type="number" name="price" class="form-control" value="{{ old('stock') }}">
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

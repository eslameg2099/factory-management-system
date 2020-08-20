@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>العملاء</h1>

            <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> لوحة التحكم </a></li>
                <li><a href="{{ route('dashboard.employe.index') }}">الموظفين</a></li>
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

                    <form action="{{ route('dashboard.employe.update', $emp->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>النوع</label>
                            <select name="type_id" class="form-control">
                                <option value="">النوع</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $emp->type_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        

                        
                            <div class="form-group">
                                <label>اسم الموظف</label>
                                <input type="text" name="name" class="form-control" value="{{ $emp->name }}">
                            </div>


                            <div class="form-group">
                            <label>العنوان</label>
                            <input type="text" name="address" step="0.01" class="form-control" value="{{ $emp->address }}">
                        </div>

                          

                       

                      

                        <div class="form-group">
                            <label>رقم الهاتف</label>
                            <input type="number" name="phone" step="0.01" class="form-control" value="{{ $emp->phone }}">
                        </div>

                        

                        <div class="form-group">
                            <label>المرتب</label>
                            <input type="number" name="price" class="form-control" value="{{ $emp->price }}">
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

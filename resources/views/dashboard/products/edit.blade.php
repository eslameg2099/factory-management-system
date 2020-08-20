@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>المنتجات</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> الرئاسية</a></li>
                <li><a href="{{ route('dashboard.products.index') }}"> المنتجات</a></li>
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

                    <form action="{{ route('dashboard.products.update', $product->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>الاصناف</label>
                            <select name="category_id" class="form-control">
                                <option value="">الاصناف</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                            <div class="form-group">
                                <label>اسم المنتج</label>
                                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                            </div>

                            <div class="form-group">
                                <label>الوصف</label>
                                <textarea name="description" class="form-control ckeditor">{{ $product->description }}</textarea>
                            </div>


                        <div class="form-group">
                            <label>الصورة</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="/uploads/product_images/{{ $product->image }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <label>سعر المنتج</label>
                            <input type="number" name="price" step="0.01" class="form-control" value="{{ $product->price }}">
                        </div>

                       

                        <div class="form-group">
                            <label>الوزن الموجود</label>
                            <input type="number" name="stock" class="form-control" value="{{ $product->stock}}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> تعديل</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection

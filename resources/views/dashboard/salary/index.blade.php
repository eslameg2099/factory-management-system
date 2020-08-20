@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>المنتجات</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i>الرئاسية</a></li>
                <li class="active">المنتجات</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">عدد المنتجات <small>{{ $saralays->total() }}</small></h3>
                    <label>يجب البحث بالاسم وتاريخ الشهر</label>

                    <form action="{{ route('dashboard.salary.index') }}" method="get">

                        <div class="row">


                           

                            <div class="col-md-4">
                                <select name="{{ request()->searchemp }}" class="form-control">
                                    <option value="{{ request()->searchemp }}">الموظفين</option>
                                    @foreach ($emp as $category)
                                        <option value="{{ $category->id }}" {{ request()->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="month" name="search"   data-date-format="MMMM YYYY"  class="form-control" placeholder="بحث" value="{{ request()->searchdate }}">
                            </div>


                            
                            <div class="col-md-4">
                                <button type="submit" class="btn  btn-success"><i class="fa fa-search"></i> بحث</button>
                                @if (auth()->user()->hasPermission('create_products'))
                                    <a href="{{ route('dashboard.salary.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>اضافة منتج</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> اضافة منتج</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($saralays->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الموظف</th>
                                <th>الشهر</th>
                                <th> المرتب الشهري</th>
                                <th> مرتب الشهر</th>

                                <th>المدفوع</th>
                                <th>الباقي</th>
                                <th>الاوامر</th>
                            </tr>
                            </thead>

                          
                            
                            <tbody>
                            @foreach ($saralays as $index=>$product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $product->employe->name }}</td>
                                    <td>{{ $product->date }}</td>
                                    <td>{{ $product->employe->price }}</td> 
                                    <td>{{ number_format($product->price, 2) }}</td>
  
                                    <td>{{ number_format($product->payment, 2) }}</td>
                                    <td> {{ number_format($product->rest, 2) }}</td>
                                    

                                    

                                    <td>
                                        @if (auth()->user()->hasPermission('update_products'))
                                            <a href="{{ route('dashboard.salary.edit', $product->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> تعديل</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('delete_products'))
                                            <form action="{{ route('dashboard.salary.destroy', $product->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> حذف</button>
                                            </form><!-- end of form -->
                                        @else
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> حذف</button>
                                        @endif
                                    </td>
                                </tr>
                            
                            @endforeach
                            </tbody>

                        </table><!-- end of table -->
                        
                        {{ $saralays->appends(request()->query())->links() }}
                        
                    @else
                        
                        <h2>لا يوجد منتجات</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection

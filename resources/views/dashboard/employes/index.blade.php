@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>الموظفين</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
                <li class="active">الموظفين</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">الموظفين <small>{{ $emps->total() }}</small></h3>

                    <form action="{{ route('dashboard.employe.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="بحث" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>بحث بلاسم او الهاتف</button>
                                    <a href="{{ route('dashboard.employe.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>اضافة موظف</a>
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($emps->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم</th>
                                <th>المهنة</th>

                                <th>الهاتف</th>
                                <th>العنوان</th>
                                <th>المرتب</th>
                                <th></th>

                                <th>الاوامر</th>
                            </tr>
                            </thead>
                           
                            
                            <tbody>
                            @foreach ($emps as $index=>$client)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->type->name }}</td>

                                    <td>{{ $client->phone }}</td>
                                    <td>{{ $client->address }}</td>
                                    <td>{{ $client->price }}</td>
                                    <td> 
                                    @if (auth()->user()->hasPermission('create_shafts))

                                       <a href="{{ route('dashboard.shaft.create') }}" class="btn btn-primary btn-sm">اضافة اوردر</a>
                                       @endif

 <td>

                                   
                                    <td>
                                        @if (auth()->user()->hasPermission('update_employes))
                                            <a href="{{ route('dashboard.employe.edit', $client->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> تعديل</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('delete_employes'))
                                            <form action="{{ route('dashboard.employe.destroy', $client->id) }}" method="post" style="display: inline-block">
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
                        
                        {{ $emps->appends(request()->query())->links() }}
                        
                    @else
                        
                        <h2>لا يوجد موظفين</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection

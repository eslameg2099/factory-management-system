@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>النثريات</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
                <li class="active">النثريات</li>
            </ol>
        </section>
        
        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">النثريات <small>{{ $emps->total() }}</small></h3>

                    <form action="{{ route('dashboard.extra.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="date" name="search" class="form-control" placeholder="بحث" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>بحث</button>
                                @if (auth()->user()->hasPermission('create_extras'))

                                    <a href="{{ route('dashboard.extra.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>اضافة عملية</a>
                                    @endif

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
                                <th>تاريخ العملية</th>

                                <th>المبلغ</th>
                                <th>الامر بالصرف</th>
                                <th>الصارف</th>
                                <th>السبب</th>

                                <th>الاوامر</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($emps as $index=>$client)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $client->date_salary }}</td>
                                    <td>{{ $client->price }}</td>

                                    <td>{{ $client->name_order}}</td>
                                    <td>{{ $client->person_order }}</td>
                                    <td>{{ $client->reson }}</td>


                                   
                                    <td>
                                        @if (auth()->user()->hasPermission('update_extras'))
                                            <a href="{{ route('dashboard.extra.edit', $client->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> تعديل</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('delete_extras'))
                                            <form action="{{ route('dashboard.extra.destroy', $client->id) }}" method="post" style="display: inline-block">
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

                        <br>
                                <h4>اجمالي اليوم المحدد: <span class="total-pr">{{$price}}</span></h4>
                        
                        {{ $emps->appends(request()->query())->links() }}
                        
                    @else
                        
                        <h2>لا يوجد موظفين</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection

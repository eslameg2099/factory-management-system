@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>المنتجات</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> الرئاسية</a></li>
                <li><a href=""> المنتجات</a></li>
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

                    <form action="{{ route('dashboard.shaft.update', $shaft->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div id="print-area">


                        

                            <div class="form-group">
                                <label>رقم العملية</label>
                                <input type="text" name="id" class="form-control" value="{{ $shaft->id }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>اسم الموظف</label>
                                <input type="text" name="name" class="form-control" value="{{ $shaft->employe->name }}"   readonly>
                            </div>

                            <div class="form-group">
                            <label>تاريخ</label>
                            <input type="text" name="stock" class="form-control" value="{{ $shaft->created_at->toFormattedDateString() }}" readonly>
                        </div>


                        

                        <div class="form-group">
                            <label>الانتاج المتوفع</label>
                            <input type="text" name="total_price tol "  class="form-control " value="{{ $shaft->expect }}"  id="tol" readonly>
                        </div>

                       

                        <div class="form-group">
                            <label>المنتج الفعالي</label>
                            <input type="text" name="genter" class="form-control pay " value="{{ $shaft->genter }}"  id="pay"   >
                        </div>

                        <div class="form-group">
                            <label>المفقود</label>
                            <input type="text" name="lost" class="form-control pay " value="{{ $shaft->lost }}"  id="pay"   >
                        </div>

                        <div class="form-group">
                            <label>ملاحظات</label>
                            <input type="text" name="description" class="form-control pay " value="{{ $shaft->description }}"  id="pay"   >
                        </div>



                       

                       

                        

                      
                       

                       


                        <div class="form-group">
                            <button type="submit"  class="btn btn-primary" ><i class="fa fa-plus"></i> تعديل</button>
                        </div>




                    </form><!-- end of form -->



                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection

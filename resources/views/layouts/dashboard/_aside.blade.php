<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="/uploads/user_images/images.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> {{ Auth::user()->name  }} </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-th"></i><span>الصفحة الرئاسية</span></a></li>
             

            @if (auth()->user()->hasPermission('read_categories'))
                <li><a href="{{ route('dashboard.categories.index') }}"><i class="fa fa-th"></i><span>الاصناف</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('read_products'))
                <li><a href="{{ route('dashboard.products.index') }}"><i class="fa fa-th"></i><span>المنتجات</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('read_clients'))
                <li><a href="{{ route('dashboard.clients.index') }}"><i class="fa fa-th"></i><span>العملاء</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('read_orders'))
                <li><a href="{{ route('dashboard.orders.index') }}"><i class="fa fa-th"></i><span>الاوردارت</span></a></li>
            @endif


            @if (auth()->user()->hasPermission('read_clients'))
                <li><a href="{{ route('dashboard.tass.index') }}"><i class="fa fa-th"></i><span>تسديد</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('read_users'))
                <li><a href="{{ route('dashboard.users.index') }}"><i class="fa fa-th"></i><span>المستخدمين</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('read_qclis'))

            <li><a href="{{ route('dashboard.qqqcli.index') }}"><i class="fa fa-th"></i><span>عملاء كونتانيرات</span></a></li>
            @endif

            

            @if (auth()->user()->hasPermission('read_conteners'))

            <li><a href="{{ route('dashboard.Contener.index') }}"><i class="fa fa-th"></i><span>كونتانيرات</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('read_shafts'))


            <li><a href="{{ route('dashboard.shaft.index') }}"><i class="fa fa-th"></i><span>ورديات</span></a></li>

            @endif

            @if (auth()->user()->hasPermission('read_employes'))


            <li><a href="{{ route('dashboard.employe.index') }}"><i class="fa fa-th"></i><span>موظفين</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('read_salaries'))


            <li><a href="{{ route('dashboard.sal.index') }}"><i class="fa fa-th"></i><span>المرتبات</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('read_extras'))


            <li><a href="{{ route('dashboard.extra.index') }}"><i class="fa fa-th"></i><span>النثريات</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('read_materials'))


            <li><a href="{{ route('dashboard.material.index') }}"><i class="fa fa-th"></i><span>المواد الخام</span></a></li>

            @endif

            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-pie-chart"></i>--}}
            {{--<span>الخرائط</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li>--}}
            {{--<a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
        </ul>

    </section>

</aside>


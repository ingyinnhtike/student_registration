<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <span class="fa fa-id-card"></span>
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN MENU</li>
            @can('admin.acceptance.index')
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Forms</span>
                    </a>
                    <ul class="treeview-menu">

                        <li><a href="{{route('admin.acceptance.index',['accept_type'=>'approve','status'=>0])}}"><i
                                    class="fa fa-circle-o"></i> Pending</a></li>

                        <li><a href="{{route('admin.acceptance.index',['accept_type'=>'approve','status'=>1])}}"><i
                                    class="fa fa-circle-o"></i> Approved</a></li>

                        <li><a href="{{route('admin.acceptance.index',['accept_type'=>'approve','status'=>2])}}"><i
                                    class="fa fa-circle-o"></i> Rejected</a></li>
                    </ul>
                </li>
            @endcan

            @can('admin.payment_receive.index')
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-money"></i>
                        <span>Payments</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.payment_receive.index',['accept_type'=>'payment','status'=>0])}}"><i
                                    class="fa fa-circle-o"></i> Pending</a></li>
                        <li><a href="{{route('admin.payment_receive.index',['accept_type'=>'payment','status'=>1])}}"><i
                                    class="fa fa-circle-o"></i> Payment Received</a></li>
                    </ul>
                </li>
            @endcan

            @can('admin.course.index')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-certificate"></i>
                        <span>Course</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.course.index')}}"><i
                                    class="fa fa-circle-o"></i> သင်တန်းများ</a></li>
                        <li><a href="{{route('admin.major.index')}}"><i
                                    class="fa fa-circle-o"></i> အဓိကဘာသာများ</a></li>
                        <li><a href="{{route('admin.year.index')}}"><i
                                    class="fa fa-circle-o"></i> သင်တန်းနှစ်များ</a></li>
                        <li><a href="{{route('admin.fee.index')}}"><i
                                    class="fa fa-circle-o"></i> သင်တန်းကြေးများ</a></li>
                    </ul>
                </li>
            @endcan
            @can('admin.role.change.show')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-shield"></i>
                        <span>Roles and Permissions</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.role.change.show')}}"><i
                                    class="fa fa-circle-o"></i> Users with roles</a></li>
                        <li><a href="{{route('admin.permission.change.show')}}"><i
                                    class="fa fa-circle-o"></i> Roles with permissions</a></li>
                        <li><a href="{{route('admin.permission.index')}}"><i
                                    class="fa fa-circle-o"></i> Permissions</a></li>
                    </ul>
                </li>
            @endcan

            @can('admin.chart')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-line-chart"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.chart',['type'=>'byState'])}}"><i
                                    class="fa fa-circle-o"></i> By State</a></li>
                        <li><a href="{{route('admin.chart',['type'=>'byMajor'])}}"><i
                                    class="fa fa-circle-o"></i> By Major</a></li>
                        <li><a href="{{route('admin.chart',['type'=>'byYear'])}}"><i
                                    class="fa fa-circle-o"></i> By Year</a></li>
                    </ul>
                </li>
            @endcan

            @can('admin.report.index')
                <a href="{{route('admin.report.index')}}">
                    <i class="fa fa-table"></i>
                    <span>Custom Reports</span>
                </a>
            @endcan


            @can('admin.invoices.index')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-table"></i>
                        <span>Invoices</span>

                    </a>
                    <ul class="treeview-menu">
                        @foreach(\App\Models\FormType::all() as $formType)
                            <li><a href="{{route('admin.invoices.index',['form_type'=>$formType->id])}}"><i
                                        class="fa fa-circle-o"></i> {{$formType->name}}</a></li>
                        @endforeach
                    </ul>
                </li>


            @endcan


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

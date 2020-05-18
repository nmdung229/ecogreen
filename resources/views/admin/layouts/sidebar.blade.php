<aside class="main-sidebar">
 <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if(Auth::user()->avatar)
                    <img src="{{ asset(Auth::user()->avatar) }}" class="user-image" alt="User Image">
                @else
                    <img src="https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/p960x960/91861377_10213062701282248_9196926355550240768_o.jpg?_nc_cat=105&_nc_sid=110474&_nc_ohc=bRQrkwaRUakAX8KtRlB&_nc_ht=scontent.fhan2-4.fna&_nc_tp=6&oh=350d218be3ce2f8a2c528663e9888bb9&oe=5EB89630" class="user-image" alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
{{--                <p>{{ Auth::user()->name }}</p>--}}
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-calendar"></i> <span>Bảng điều khiển</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    <span>Danh mục</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.category.index') }}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="active"><a href="{{ route('admin.category.create') }}"><i class="fa fa-circle-o"></i> Thêm</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Sản phẩm</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.product.index') }}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="active"><a href="{{ route('admin.product.create') }}"><i class="fa fa-circle-o"></i> Thêm</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.post.index') }}">
                    <i class="fa fa-user"></i> <span>QL Blog</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.banner.index') }}">
                    <i class="fa fa-th"></i> <span>QL Banner</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.brand.index') }}">
                    <i class="fa fa-pie-chart"></i> <span>QL Brand</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.vendor.index') }}">
                    <i class="fa fa-folder"></i> <span>QL Vendor</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.user.index') }}">
                    <i class="fa fa-user"></i> <span>QL User</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li>
                <a href="{{ route('contact.show', [ 'id' => '0']) }}">
                {{-- id = 0 đưa vào ở đây chỉ mang tính tượng trưng --}}
                    <i class="fa fa-folder"></i> <span>Thông tin liên hệ khách hàng</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>


        </ul>
    </section>



<!-- Content Wrapper. Contains page content -->
</aside>

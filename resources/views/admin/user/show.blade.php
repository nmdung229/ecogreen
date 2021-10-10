@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Thông tin user <a href="{{route('admin.user.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh sách user</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <div class="box box-primary">
                    <!-- form start -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td><b>Tên :</b></td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Email :</b></td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td><b>Địa chỉ :</b></td>
                                <td>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <td><b>Số điện thoại :</b></td>
                                <td>{{ ($user->phone != null) ? $user->phone : 'Không có' }}</td>
                            </tr>
                            <tr>
                                <td><b>Hình ảnh:</b></td>
                                <td><img src="{{ asset($user->avatar) }}" width="250"></td>
                            </tr>
                            <tr>
                                <td><b>Chức vụ</b></td>
                                <td>{{ ($user->role_id == 1) ? 'Administrator' : 'Customer' }}</td>
                            </tr>
                            <tr>
                                <td><b>Trạng thái</b></td>
                                <td>{{ ($user->is_active == 1) ? 'Hiển thị' : 'Ẩn'  }}</td>
                            </tr>

                            </tbody></table>
                    </div>
                </div>

                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection

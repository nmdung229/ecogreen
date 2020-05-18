@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Chi Tiết vendor <a href="{{route('admin.vendor.index')}}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Danh sách vendor</a>
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
                                <td>{{ $data->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Email :</b></td>
                                <td>{{ $data->email }}</td>
                            </tr>
                            <tr>
                                <td><b>Số điện thoại :</b></td>
                                <td>{{ $data->phone }}</td>
                            </tr>
                            <tr>
                                <td><b>Hình ảnh:</b></td>
                                <td><img src="{{ asset($data->image) }}" width="250"></td>
                            </tr>
                            <tr>
                                <td><b>Địa chỉ :</b></td>
                                <td>{{ $data->address }}</td>
                            </tr>
                            <tr>
                                <td><b>Website:</b></td>
                                <td>{{ $data->website }}</td>
                            </tr>
                            <tr>
                                <td><b>Vị trí:</b></td>
                                <td>{{ $data->position }}</td>
                            </tr>
                            <tr>
                                <td><b>Trạng thái</b></td>
                                <td>{{ ($data->is_active == 1) ? 'Hiển thị' : 'Ẩn'  }}</td>
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

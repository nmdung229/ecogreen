@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Chỉnh sửa category <a href="{{route('admin.category.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-9">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-name">Thông tin category</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.category.update', ['id' => $category->id ])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input value="{{ $category->name }}" type="text" class="form-control" id="name" name="name" placeholder="Nhập tên nhãn hàng">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Thay đổi ảnh</label>
                                <input type="file" id="new_image" name="new_image">
                                <!-- Hiển thị ảnh cũ -->
                                <br>
                                <img src="{{ asset($category->image) }}" width="250">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tùy chỉnh thư mục cha</label>
                                <input value="{{ $category->parent_id }}" type="text" class="form-control" id="parent_id" name="parent_id" placeholder="parent_id">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" name="is_active" {{ ($category->is_active == 1) ? 'checked' : '' }} > Trạng thái hiển thị
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vị trí</label>
                                <input type="number" class="form-control" id="position" name="position" placeholder="Nhập tên vị trí" value="{{ $category->position }}">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('my_javascript')
    <script type="text/javascript">
        $(function () {
            // setup textarea sử dụng plugin CKeditor
            var _ckeditor = CKEDITOR.replace('editor1');
            _ckeditor.config.height = 450; // thiết lập chiều cao
        })
    </script>
@endsection

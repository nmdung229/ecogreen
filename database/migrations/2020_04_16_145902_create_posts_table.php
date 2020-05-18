<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->collation('utf8mb4_unicode_ci'); // title bài viết
            $table->string('slug')->index()->collation('utf8mb4_unicode_ci');
            $table->string('thumbnail',255)->collation('utf8mb4_unicode_ci')->nullable(); // ảnh
            $table->text('content')->collation('utf8mb4_unicode_ci')->nullable();
            $table->integer('position')->default(0); // vị trí
            $table->integer('is_active')->default(1); // trạng thái
            $table->integer('is_hot')->default(0); // sản phẩm hot
            $table->integer('views')->default(0); // lượng xem == khi click vào xem trong trang chủ
//            $table->integer('category_id')->default(0); // id danh mục sản phẩm
//            $table->string('url')->nullable()->default(null); // link url tùy chỉnh
//            $table->text('summary')->collation('utf8mb4_unicode_ci')->nullable(); // thông tin tóm tắt về sản phẩm
//            $table->text('description')->collation('utf8mb4_unicode_ci')->nullable(); // mô tả sản phẩm
            $table->string('meta_title',255)->collation('utf8mb4_unicode_ci')->nullable(); // keyword for SEO
            $table->text('meta_description',255)->collation('utf8mb4_unicode_ci')->nullable(); // keyword for SEO
            $table->integer('user_id')->default(0); // ID user post bài
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

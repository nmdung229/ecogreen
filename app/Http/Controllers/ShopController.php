<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Post;
use App\Product;
use App\User;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ShopController extends Controller
{
    //
    public function index() {
        $posts = Post::where('is_active',1)->get();
//        dd($posts);
        $products = Product::where(['is_active' => 1, 'is_hot' => 1])
                    ->limit(6)->orderBy('id', 'desc')->get();
//        dd($products);
//         Lấy dữ liệu danh mục sản phẩm
        $categories = Category::where('is_active', 1)->get();
        // Lấy dữ liệu danh mục banner
        $banners = Banner::where('is_active',1)->get();

        $feature_blog = Post::where(['is_active' => 1, 'is_hot' => 1])->limit(1)->orderBy('id', 'desc')->get();
//        die("success");

        $user = User::findorFail($feature_blog[0]->user_id);

        $authorname = $user->name;
//        die("success");
//        $list = []; // chứa danh sách sản phẩm theo thể loại
//        foreach($categories as $key => $category) {
//            if($category->parent_id == 0) { // kiểm tra xem có phải thư mục cha không?
//                $ids = [$category->id];
//
//                foreach($categories as $child) {
//                    if($child->parent_id == $category->id) {
//                        $ids[] = $child->id; // thêm ID của phần tử con vào mảng
//                    }
//                }
//                $list[$key]['category'] = $category;
//                $list[$key]['products'] = $category->products()->where(['is_active' => 1, 'is_hot' => 0])
//                                                                ->whereIn('category_id', $ids)
//                                                                ->limit(10)->orderBy('id','desc')
//                                                                ->get(); // it's a query !!
//            }
//        }

        return view('shop.home', [
              'title' => 'Home',
              'posts' => $posts,
              'products' => $products,
              'categories' => $categories,
              'banners' => $banners,
              'feature_blog' => $feature_blog,
              'authorname' => $authorname,
//            'list' => $list
        ]);


    }

    public function productIndex()
    {
        $products = Product::where(['is_active' => 1, 'is_hot' => 1])
            ->orderBy('id','desc')->paginate(6);

//        dd($products);
//        $products = Product::all()->paginate(4);
        $categories = Category::where('is_active', 1)->get();
        $quantityPerCategory = [];
        foreach($categories as $category) {

            $productofthis = Product::where(['is_active' => 1, 'category_id' => $category->id])->get();
            $quantityPerCategory[] = count($productofthis);
        }
//        die($quantityPerCategory[1]);
//        dd($quantityPerCategory[1]);
        return view('shop.product.index', [
            'title' => 'Product',
            'products' => $products,
            'categories' => $categories,
            'quantityPerCategory' => $quantityPerCategory,
        ]);
    }

    public function productByCategory($id)
    {
        $this_category = Category::findorFail($id);
        $categories = Category::where('is_active', 1)->get();
        $quantityPerCategory = [];
        foreach($categories as $category) {

            $productofthis = Product::where(['is_active' => 1, 'category_id' => $category->id])->get();
            $quantityPerCategory[] = count($productofthis);
        }
        $products = Product::where([ 'is_active' => 1, 'category_id' => $id])->orderBy('id','desc')->paginate(6);
//        dd('success');

        return view('shop.product.product-by-category',[
            'this_category' => $this_category,
            'products' => $products,
            'categories' => $categories,
            'quantityPerCategory' => $quantityPerCategory,
        ]);

    }

    public function productDetail()
    {
//        die('1234');
        $id = 0;
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        $product = Product::findorFail($id);

        $relateProduct = Product::where(['is_active' => 1, 'category_id' => $product->category_id])
                                    ->limit(4)->orderBy('id','desc')->get();
        $vendor = Vendor::findorFail($product->vendor_id);
//        $relatedProducts = product()->where('category_id')
//        dd($product);
//        dd($relateProduct);
        return view('shop.product.single-product', [
            'product' => $product,
            'vendor' => $vendor,
            'relateProduct' => $relateProduct
        ]);
    }

    public function blog()
    {
        $posts = Post::all();
        $features = Post::where([ 'is_active' => 1, 'is_hot' => 1])->limit(3)
            ->orderBy('id', 'desc')->get();
//        dd($features);
        return view('shop.blog.index', [
            'posts' => $posts,
            'title' => 'Blog',
            'features' => $features,
        ]);
    }

    public function blogDetail($id)
    {
        $data = Post::findorFail($id);
        $user = User::findorFail($data->user_id);
        $authorname = $user->name;
        return view('shop.blog.blog-detail', [
            'data' => $data,
            'author' => $authorname,
        ]);
//        return view('shop.blog.blog-detail');
    }

    public function login()
    {
        if(Auth::check()) {
            $user= Auth::user();
            return redirect('/');
        } else {
            return view('shop.login');
        }

//        return view('shop.login');
    }


    public function createUser()
    {
        return view('shop.register');
    }

    public function storeUser(Request $request) {
        //validate
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);
//        if($request->key('password') != $request->key('repassword')){
//            return redirect()->back()->with('status', 'Hãy đồng ý với điều khoản để đăng ký');
//        }

        if($request->has('is_agreeTerm') == ''){
            return redirect()->back()->with('status', 'Hãy đồng ý với điều khoản để đăng ký');
        }
        $is_active = 1;
        //luu vào csdl
        $user = new User();
        $user->name = $request->input('name'); // họ tên
        $user->email = $request->input('email'); // email
        $user->password = Hash::make($request->input('password')); // mật khẩu
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->role_id = 2; // phần quyền
        if ($request->hasFile('avatar')) {
            // get file
            $file = $request->file('avatar');
            // get ten
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/user/';
            // upload file
            $request->file('avatar')->move($path_upload,$filename);

            $user->avatar = $path_upload.$filename;
        }
        $user->is_active = $is_active;
        $user->save();
        // chuyen dieu huong trang
        return redirect()->route('getUserLogin');
    }



}

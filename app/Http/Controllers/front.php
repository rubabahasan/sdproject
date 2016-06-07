<?php

namespace App\Http\Controllers;

use App\Post;
use App\Brand;
use App\Category;
use App\Product;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;

class Front extends Controller {

    
    var $brands;
    var $categories;
    var $products;
    var $title;
    var $description;
    var $image;
    
    /*public function __construct() {
        $this->brands = Brand::all(array('name'));
        $this->categories = Category::all(array('name'));
        $this->products = Product::all(array('id','name','price'));
        
    }
    
    public function index() {
        //return view('home', array('page' => 'home'));
        return view('home', array('title' => 'Welcome','description' => '','page' => 'home', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    
    }

    public function products() {
        //return view('products', array('page' => 'products'));
        return view('products', array('title' => 'Products Listing','description' => '','page' => 'products', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    
    }

    public function product_details($id) {
        //return view('product_details', array('page' => 'products'));
        $product = Product::find($id);
        return view('product_details', array('product' => $product, 'title' => $product->name,'description' => '','page' => 'products', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    
    }

    public function product_categories($name) {
        //return view('products', array('page' => 'products'));
         return view('products', array('title' => 'Welcome','description' => '','page' => 'products', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    
    }

    public function product_brands($name, $category = null) {
        return view('products', array('title' => 'Welcome','description' => '','page' => 'products', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products)); 
    }*/

    public function blog() {
        $posts = Post::where('id', '>', 0)->paginate(3);
        $posts->setPath('blog');

        $data['posts'] = $posts;

        //return view('blog', array('data' => $data, 'title' => 'Latest Blog Posts', 'description' => '', 'page' => 'blog', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
        return view('blog_custom', array('data' => $data));
    }

    public function blog_post($id) {
        $post = Post::find($id);

        //$tags = $post->tags;
        $prev_url = Post::prevBlogPostUrl($post->id);
        $next_url = Post::nextBlogPostUrl($post->id);
        $title = $post->title;
        $description = $post->description;
        $page = 'blog';
        $time = $post->created_at;
        $image = $post->image;
        
        $content = $post->content;

        $data = compact('prev_url', 'next_url', 'post', 'title', 'description', 'page', 'time', 'content', 'image');
        //return view('blog_post', $data);

        return view('blog_post_custom', $data);
    }
    
    public function blog_input(Request $request) {
        
        $title = $request->get('title');
        //echo $title;
        
        $content = $request->get('blog');
        //echo $content;
        $image = $request->get('image');
        $input = Post::saveInput($title, $content, $image);
        
        $posts = Post::where('id', '>', 0)->paginate(3);
        $posts->setPath('blog');

        $data['posts'] = $posts;

        return view('blog_input_success');
    }
    
    public function blog_write() {
        return view('blog_write');
    }

    /*public function contact_us() {
        return view('contact_us', array('title' => 'Welcome','description' => '','page' => 'contact_us'));
    }

    public function login() {
        return view('login', array('title' => 'Welcome','description' => '','page' => 'home'));
    }

    public function logout() {
        return view('login', array('title' => 'Welcome','description' => '','page' => 'home'));
    }

    public function cart() {
        return view('cart', array('title' => 'Welcome','description' => '','page' => 'home'));
    }

    public function checkout() {
        return view('checkout', array('title' => 'Welcome','description' => '','page' => 'home'));
    }

    public function search($query) {
        return view('products', array('title' => 'Welcome','description' => '','page' => 'products'));
    }*/
    public function dummy() {
        return view('dummy');
        /*$posts = Post::where('id', '>', 0)->paginate(3);
        $posts->setPath('blog');

        $data['posts'] = $posts;

        //return view('blog_custom', array('data' => $data, 'title' => 'Latest Blog Posts', 'description' => '', 'page' => 'blog', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
        return view('blog', array('data' => $data, 'title' => 'Latest Blog Posts', 'description' => '', 'page' => 'blog', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));*/
        //return view('dummy', array('data' => $data));
    }
}
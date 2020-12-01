<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\User;
use App\Manufacturers;
use App\Brands;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models;

class AdminController extends Controller
{

    // for users

    public function index()
    {
        $users = User::all();

        return view('admin.admin_index', compact('users'));
    }

    public function users()
    {
        $users = User::paginate(12);

        return view('admin.admin_users', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.admin_edit', compact('user'));
    }

    public function update(\App\User $user)
    {
        $data = request()->validate([
            'id' => 'required',
            'email' => 'required',
            'email_verified_at' => '',
            'password' => 'required',
            'role' => 'required',
            'created_at' => '',
            'updated_at' => '',

        ]);

        $user->update($data);

        return redirect('/admin/users')->with('success', 'User updated successfully');
    }

    public function delete(\App\User $user)
    {
        User::where("id", $user->id)->delete();
        return redirect()->route('admin.users')->with('danger', 'User was removed from database');
    }


    public function create()
    {
        return view('admin.admin_create');
    }

    public function store()
    {
        $data = request()->validate([
            'email' => 'required|unique:users|email',
            'email_verified_at' => '',
            'password' => 'required',
            'role' => 'required',
            'created_at' => '',
            'updated_at' => '',
        ]);

        User::create([
            'email' => $data['email'],
            'email_verified_at' => $data['email_verified_at'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'created_at' => $data['created_at'],
            'updated_at' => $data['updated_at'],
        ]);


        return redirect('/admin/users')->with('success', 'User was created successfully');
    }

    // end user

    // posts 

    public function posts()
    {
        $posts = Post::paginate(12);

        return view('admin.admin_posts', compact('posts'));
    }

    public function delete_post(\App\User $post)
    {
        Post::where("id", $post->id)->delete();
        return redirect()->route('admin.posts')->with('danger', 'Post was removed from database');
    }


    // end posts



    // categories


    public function categories()
    {
        $parent_categories = Category::where('parent_id', '=', 0)->paginate(12);
        $sub_categories = Category::where('parent_id', '>', 0)->paginate(12);

        return view('admin.admin_categories', compact('parent_categories', 'sub_categories'));
    }

    public function edit_category(\App\Category $category)
    {
        $parent_categories = Category::where('parent_id', '=', 0)->get();
        return view('admin.admin_categories_edit', compact('category', 'parent_categories'));
    }

    public function update_category(\App\Category $category)
    {
        $data = request()->validate([
            'id' => 'required',
            'parent_id' => 'integer',
            'title' => 'required',
        ]);

        $category->update($data);

        return redirect('/admin/categories')->with('success', 'Category updated successfully');
    }


    public function create_category()
    {
        $parent_categories = Category::where('parent_id', '=', 0)->get();

        return view('admin.admin_categories_create', compact('parent_categories'));
    }


    public function store_category()
    {
        $data = request()->validate([
            'parent_id' => 'required|integer',
            'title' => 'required',
        ]);

        Category::create([
            'parent_id' => $data['parent_id'],
            'title' => $data['title'],
        ]);

        return redirect('/admin/categories')->with('success', 'Category was created successfully');
    }

    public function delete_category(\App\Category $category)
    {
        Category::where("id", $category->id)->delete();
        return redirect()->route('admin.categories')->with('danger', 'Category was removed from database');
    }

    // end categories

    // manufacturers
    public function manufacturers()
    {
        $manufacturers = Manufacturers::paginate(12);
        return view('admin.admin_manufacturers', compact('manufacturers'));
    }

    public function create_manufacturer()
    {
        return view('admin.admin_manufacturers_create');
    }


    public function store_manufacturer()
    {
        $data = request()->validate([
            'name' => 'required|unique:manufacturers',
        ]);

        Manufacturers::create([
            'name' => $data['name'],
        ]);

        return redirect('/admin/manufacturers')->with('success', 'Manufacturer was created successfully');
    }



    public function edit_manufacturer(\App\Manufacturers $manufacturer)
    {
        return view('admin.admin_manufacturers_edit', compact('manufacturer'));
    }

    public function update_manufacturer(\App\Manufacturers $manufacturer)
    {
        $data = request()->validate([
            'name' => 'string',
        ]);

        $manufacturer->update($data);

        return redirect('/admin/manufacturers')->with('success', 'Manufacturer updated successfully');
    }

    public function delete_manufacturer(\App\Manufacturers $manufacturer)
    {
        Manufacturers::where("id", $manufacturer->id)->delete();
        return redirect()->route('admin.manufacturers')->with('danger', 'Manufacturer was removed from database');
    }


    // brands

    public function brands()
    {
        $brands = Brands::paginate(12);
        return view('admin.admin_brands', compact('brands'));
    }

    public function create_brand()
    {
        $manufacturers = Manufacturers::all();
        return view('admin.admin_brand_create', compact('manufacturers'));
    }

    public function store_brand()
    {
        $data = request()->validate([
            'manufacturer_id' => 'required',
            'name' => 'required|unique:brands',
        ]);

        Brands::create([
            'manufacturer_id' => $data['manufacturer_id'],
            'name' => $data['name'],
        ]);

        return redirect('/admin/brands')->with('success', 'Brand was added successfully');
    }

    public function edit_brand(\App\Brands $brand)
    {
        $manufacturers = Manufacturers::all();
        return view('admin.admin_brand_edit', compact('brand', 'manufacturers'));
    }

    public function update_brand(\App\Brands $brand)
    {
        $data = request()->validate([
            'manufacturer_id' => 'required',
            'name' => 'required|unique:brands',
        ]);

        $brand->update($data);

        return redirect('/admin/brands')->with('success', 'Brand updated successfully');
    }

    public function delete_brand(\App\Brands $brand)
    {
        Brands::where("id", $brand->id)->delete();
        return redirect()->route('admin.brands')->with('danger', 'Brand was removed from database');
    }
}

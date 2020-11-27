<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
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

    public function posts()
    {
        $posts = Post::paginate(12);

        return view('admin.admin_posts', compact('posts'));
    }

    public function categories()
    {
        $parent_categories = Category::where('parent_id', '=', 0)->paginate(12);
        $sub_categories = Category::where('parent_id', '>', 0)->paginate(12);


        return view('admin.admin_categories', compact('parent_categories', 'sub_categories'));
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

    public function delete_post(\App\User $post)
    {
        Post::where("id", $post->id)->delete();
        return redirect()->route('admin.posts')->with('danger', 'Post was removed from database');
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

        // auth()->user()->posts()->create([])

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
}

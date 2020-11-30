<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Manufacturers;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::first();

        $vipPlus_posts = Post::where('post_type', 'V+')->get();
        $vip_posts = Post::where('post_type', 'V')->take(10)->get();
        $recently_added = Post::orderBy('created_at', 'desc')->take(5)->get();

        $sub_categories = Category::where('parent_id', '!=', 0)->get();
        $parent_categories = Category::where('parent_id', '=', 0)->get();

        $manufacturers = Manufacturers::all();

        return view('posts.index', compact('vipPlus_posts', 'vip_posts', 'recently_added', 'sub_categories', 'parent_categories', 'manufacturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub_categories = Category::where('parent_id', '!=', 0)->get();
        $parent_categories = Category::where('parent_id', '=', 0)->get();
        $manufacturers = Manufacturers::all();
        $this->authorize('create', Post::class);

        return view('posts.create', compact('sub_categories', 'parent_categories', 'manufacturers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            'deal_type' => 'required',
            'category_id' => 'required',
            'doors' => 'required',
            'manufacturer_id' => 'required',
            'model_id' => 'required',
            'prod_date' => 'required',
            'mileage' => 'required',
            'gearbox_type' => 'required',
            'engine_volume' => 'required',
            'color' => 'required',
            'turbo' => '',
            'cylinders' => 'required',
            'fuel_type' => 'required',
            'drive_wheels' => 'required',
            'wheel' => 'required',
            'hydraulics' => '',
            'rims' => '',
            'el_window' => '',
            'climate_control' => '',
            'seat_heater' => '',
            'central_lock' => '',
            'alarm' => '',
            'bord_computer' => '',
            'navigation' => '',
            'description' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'customs' => 'required',
            'price' => 'required',
            'post_type' => 'required',
            'image1' => 'required|image',
            'image2' => 'image',
            'image3' => 'image',
            'image4' => 'image',
            'image5' => 'image',
            'image6' => 'image',
        ]);

        $image1Path = request('image1')->store('uploads', 'public');
        $image2Path = request('image2') ? request('image2')->store('uploads', 'public') : '';
        $image3Path = request('image3') ? request('image3')->store('uploads', 'public') : '';
        $image4Path = request('image4') ? request('image4')->store('uploads', 'public') : '';
        $image5Path = request('image5') ? request('image5')->store('uploads', 'public') : '';
        $image6Path = request('image6') ? request('image6')->store('uploads', 'public') : '';

        $image1 = Image::make(public_path("storage/{$image1Path}"))->fit(550, 450);
        $image2 = $image2Path ? Image::make(public_path("storage/{$image2Path}"))->fit(550, 450) : '';
        $image3 = $image3Path ? Image::make(public_path("storage/{$image3Path}"))->fit(550, 450) : '';
        $image4 = $image4Path ? Image::make(public_path("storage/{$image4Path}"))->fit(550, 450) : '';
        $image5 = $image5Path ? Image::make(public_path("storage/{$image5Path}"))->fit(550, 450) : '';
        $image6 = $image6Path ? Image::make(public_path("storage/{$image6Path}"))->fit(550, 450) : '';

        $image1->save();
        $image2 ? $image2->save() : null;
        $image3 ? $image3->save() : null;
        $image4 ? $image4->save() : null;
        $image5 ? $image5->save() : null;
        $image6 ? $image6->save() : null;

        auth()->user()->posts()->create([
            'deal_type' => $data['deal_type'],
            'category_id' => $data['category_id'],
            'manufacturer_id' => $data['manufacturer_id'],
            'model_id' => $data['model_id'],
            'prod_date' => $data['prod_date'],
            'mileage' => $data['mileage'],
            'gearbox_type' => $data['gearbox_type'],
            'engine_volume' => $data['engine_volume'],
            'turbo' => $data['turbo'],
            'cylinders' => $data['cylinders'],
            'doors' => $data['doors'],
            'fuel_type' => $data['fuel_type'],
            'drive_wheels' => $data['drive_wheels'],
            'color' => $data['color'],
            'wheel' => $data['wheel'] ? $data['wheel'] : False,
            'hydraulics' => $data['hydraulics'] ? $data['hydraulics'] : False,
            'rims' => $data['rims'] ? $data['rims'] : False,
            'el_window' => $data['el_window'] ? $data['el_window'] : False,
            'climate_control' => $data['climate_control'] ? $data['climate_control'] : False,
            'seat_heater' => $data['seat_heater'] ? $data['seat_heater'] : False,
            'central_lock' => $data['central_lock'] ? $data['central_lock'] : False,
            'alarm' => $data['alarm'] ? $data['alarm'] : False,
            'bord_computer' => $data['bord_computer'] ? $data['bord_computer'] : False,
            'navigation' => $data['navigation'] ? $data['navigation'] : False,
            'description' => $data['description'],
            'name' => $data['name'],
            'phone' => $data['phone'],
            'location' => $data['location'],
            'customs' => $data['customs'],
            'price' => $data['price'],
            'post_type' => $data['post_type'],
            'image1' => $image1Path,
            'image2' => $image2Path ? $image2Path : '',
            'image3' => $image3Path ? $image3Path : '',
            'image4' => $image4Path ? $image4Path : '',
            'image5' => $image5Path ? $image5Path : '',
            'image6' => $image6Path ? $image6Path : '',

        ]);

        return redirect('/')->with('success', 'Your post was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Post $post)
    {

        $similar_posts = Post::where('model', $post->model_id)->take(5)->get();


        return view('posts.show', compact('post', 'similar_posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $sub_categories = Category::where('parent_id', '!=', 0)->get();
        $parent_categories = Category::where('parent_id', '=', 0)->get();

        $manufacturers = Manufacturers::all();

        return view('posts.edit', compact('post', 'sub_categories', 'parent_categories', 'manufacturers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Post $post)
    {
        $this->authorize('update', $post);

        $data = request()->validate([
            'deal_type' => 'required',
            'category_id' => 'required',
            'doors' => 'required',
            'manufacturer_id' => 'required',
            'model_id' => 'required',
            'prod_date' => 'required',
            'mileage' => 'required',
            'gearbox_type' => 'required',
            'engine_volume' => 'required',
            'color' => 'required',
            'turbo' => '',
            'cylinders' => 'required',
            'fuel_type' => 'required',
            'drive_wheels' => 'required',
            'wheel' => 'required',
            'hydraulics' => '',
            'rims' => '',
            'el_window' => '',
            'climate_control' => '',
            'seat_heater' => '',
            'central_lock' => '',
            'alarm' => '',
            'bord_computer' => '',
            'navigation' => '',
            'description' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'customs' => 'required',
            'price' => 'required',
            'post_type' => 'required',
            'image1' => 'image',
            'image2' => 'image',
            'image3' => 'image',
            'image4' => 'image',
            'image5' => 'image',
            'image6' => 'image',
        ]);

        if (request('image1')) {
            $image1Path = request('image1')->store('uploads', 'public');

            $image1 = Image::make(public_path("storage/{$image1Path}"))->fit(1000, 1000);
            $image1->save();

            $image1Array = ['image1' => $image1Path];
        }

        if (request('image2')) {
            $image2Path = request('image2')->store('uploads', 'public');

            $image2 = Image::make(public_path("storage/{$image2Path}"))->fit(1000, 1000);
            $image2->save();

            $image2Array = ['image2' => $image2Path];
        }

        if (request('image3')) {
            $image3Path = request('image3')->store('uploads', 'public');

            $image3 = Image::make(public_path("storage/{$image3Path}"))->fit(1000, 1000);
            $image3->save();

            $image3Array = ['image3' => $image3Path];
        }

        if (request('image4')) {
            $image4Path = request('image4')->store('uploads', 'public');

            $image4 = Image::make(public_path("storage/{$image4Path}"))->fit(1000, 1000);
            $image4->save();

            $image4Array = ['image4' => $image4Path];
        }

        if (request('image5')) {
            $image5Path = request('image5')->store('uploads', 'public');

            $image5 = Image::make(public_path("storage/{$image5Path}"))->fit(1000, 1000);
            $image5->save();

            $image5Array = ['image5' => $image5Path];
        }

        if (request('image6')) {
            $image6Path = request('image6')->store('uploads', 'public');

            $image6 = Image::make(public_path("storage/{$image6Path}"))->fit(1000, 1000);
            $image6->save();

            $image6Array = ['image6' => $image6Path];
        }

        $post->update(array_merge(
            $data,
            $image1Array ?? [],
            $image2Array ?? [],
            $image3Array ?? [],
            $image4Array ?? [],
            $image5Array ?? [],
            $image6Array ?? [],
        ));

        return redirect("/post/{$post->id}")->with('success', 'Your post was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Post $post)
    {
        $this->authorize('update', $post);

        $data = Post::where("id", $post->id)->delete();
        return redirect()->route('index')->with('danger', 'Your post was removed');
    }

    public function profile(\App\User $user)
    {
        $posts = Post::where('user_id', $user->id)->get();

        return view('posts.profile', compact('posts', 'user'));
    }

    public function filter(Request $request)
    {
        $posts = Post::all();
        $input = $request->all();

        if (isset($input['deal_type'])) :
            $posts = $posts->where('deal_type', '=', $input['deal_type']);
        endif;

        if (isset($input['manufacturer_id'])) :
            $posts = $posts->where('manufacturer_id', '=', $input['manufacturer_id']);
        endif;

        if (isset($input['model_id'])) :
            $posts = $posts->where('model_id', '=', $input['model_id']);
        endif;

        if (isset($input['category_id'])) :

            // all parent categories ids
            $parent_category_ids = Category::where('parent_id', '=', 0)->get(['category_id'])->toArray();

            $parent_category_ids = collect($parent_category_ids);

            $parent_category_ids = $parent_category_ids->pluck('category_id')->toArray();

            // if input category_id is in  parent category ids array
            if (in_array($input['category_id'], $parent_category_ids)) :
                // get all sub categories where parent_id = input category_id
                $sub_category_ids = Category::where('parent_id', '=', $input['category_id'])->get(['category_id'])->toArray();

                $sub_category_ids = collect($sub_category_ids);

                $sub_category_ids = $sub_category_ids->pluck('category_id')->toArray();

                $posts = Post::whereIn('category_id', $sub_category_ids)->get();
            else :
                $posts = $posts->where('category_id', '=', $input['category_id']);
            endif;

        endif;

        if (isset($input['fuel_type'])) :
            $posts = $posts->where('fuel_type', '=', $input['fuel_type']);
        endif;

        if (isset($input['gearbox_type'])) :
            $posts = $posts->where('gearbox_type', '=', $input['gearbox_type']);
        endif;

        if (isset($input['post_type'])) :
            $posts = $posts->where('post_type', '=', $input['post_type']);
        endif;

        if (isset($input['customs'])) :
            $posts = $posts->where('customs', '=', $input['customs']);
        endif;

        if (isset($input['wheel'])) :
            $posts = $posts->where('wheel', '=', $input['wheel']);
        endif;

        if (isset($input['location'])) :
            $posts = $posts->where('location', '=', $input['location']);
        endif;

        if (isset($input['wheel'])) :
            $posts = $posts->where('wheel', '=', $input['wheel']);
        endif;

        if (isset($input['searchKeyWords'])) :
            $posts = Post::where('description', 'like', '%' . $input['searchKeyWords'] . '%')
                ->orwhere('model_id', 'like', '%' . $input['searchKeyWords'] . '%')
                ->orwhere('location', 'like', '%' . $input['searchKeyWords'] . '%')
                ->orwhere('fuel_type', 'like', '%' . $input['searchKeyWords'] . '%')
                ->orwhere('gearbox_type', 'like', '%' . $input['searchKeyWords'] . '%')
                ->orwhere('manufactuter', 'like', '%' . $input['searchKeyWords'] . '%')->get();
        endif;

        if (isset($input['price_from'])) :
            $posts = $posts->where('price', '>=', $input['price_from']);
        endif;

        if (isset($input['price_to'])) :
            $posts = $posts->where('price', '<=', $input['price_to']);
        endif;

        if (isset($input['year_from'])) :
            $posts = $posts->where('prod_date', '>=', $input['year_from']);
        endif;

        if (isset($input['year_to'])) :
            $posts = $posts->where('prod_date', '<=', $input['year_to']);
        endif;

        if (isset($input['engine_from'])) :
            $posts = $posts->where('engine_volume', '>=', $input['engine_from']);
        endif;

        if (isset($input['engine_to'])) :
            $posts = $posts->where('engine_volume', '<=', $input['engine_to']);
        endif;

        $filtered_posts = $posts->sortBy('post_type')->reverse();

        $postCount = count($filtered_posts);

        return view('posts.filter', compact('filtered_posts', 'postCount'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\User;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        $vipPlus_posts = Post::where('post_type', 'V+')->get();
        $vip_posts = Post::where('post_type', 'V')->get();
        $recently_added = Post::orderBy('created_at', 'desc')->take(5)->get();
        // dd($recently_added);
        

        return view('posts.index', compact('vipPlus_posts', 'vip_posts', 'recently_added'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'manufacturer' => 'required',
            'model' => 'required',
            'prod_date' => 'required',
            'mileage' => 'required',
            // 'vin_code' => 'required',
            'gearbox_type' => 'required',
            'engine_volume' => 'required',
            'color' => 'required',
            'turbo' => '',
            'cylinders' => 'required',
            'fuel_type' => 'required',
            'drive_wheels' => 'required',
            // 'interior_material' => 'required',
            // 'airbags' => 'required',
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
            'image1' => 'required',
            'image2' => '',
            'image3' => '',
            'image4' => '',
            'image5' => '',
            'image6' => '',
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
            'manufacturer' => $data['manufacturer'],
            'model' => $data['model'],
            'prod_date' => $data['prod_date'],
            'mileage' => $data['mileage'],
            // 'vin_code' => $data['vin_code'],
            'gearbox_type' => $data['gearbox_type'],
            'engine_volume' => $data['engine_volume'],
            'turbo' => $data['turbo'],
            'cylinders' => $data['cylinders'],
            'doors' => $data['doors'],
            'fuel_type' => $data['fuel_type'],
            'drive_wheels' => $data['drive_wheels'],
            'color' => $data['color'],
            // 'interior_material' => $data['interior_material'],
            // 'airbags' => $data['airbags'],
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

        return redirect('/');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Post $post)
    {
        return view('posts.show', compact('post'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

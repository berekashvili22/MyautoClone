@extends('layouts.app')

@section('content')
<div class="create-post-cont container border" style="margin-top: 60px;">
   <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="create-post-title">
        <h1>Create new post</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-3">
            <label for=""><strong>Deal Type</strong></label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="deal_type" id="dealType1" value="sale" checked>
                <label class="form-check-label" for="dealType1">
                  For sale
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="deal_type" id="dealType2" value="rent">
                <label class="form-check-label" for="dealType2">
                  For rent
                </label>
            </div>
        </div>
    </div>
    <hr>
    {{-- first row --}}
    <div class="row">
        {{-- first column --}}
        <div class="col-3 mr-5">
            <div class="row pl-2">
                <label class="pl-2" for="categoryId"><strong>Category</strong></label>
                <select id="categoryId" name="category_id" class="form-control">
                    <option selected value="{{ old('category_id') }}">{{ old('category_id') }}</option>
                    @foreach ($parent_categories as $parent_category)
                        <option value="{{ $parent_category->id }}" style="font-weight: bolder; text-transform: uppercase;" disabled>{{ $parent_category->title }}</option>
                        @foreach ($sub_categories->where('parent_id', '=' , $parent_category->id) as $sub_category)
                            <option value="{{ $sub_category->id }}" style="text-transform: capitalize;">{{ $sub_category->title }}</option>
                        @endforeach
                    @endforeach
                </select>
                @error('category_id')
                    <strong class="error" style="color: red; font-size: 12px;">{{ $message }}</strong>
                @enderror
            </div>
            <div class="row pl-2 mt-3">
                <label class="pl-2" for="inputState"><strong>Manufacturer:</strong></label>
                <select id="inputState" class="form-control" name="manufacturer_id">
                    <option selected hidden value="{{ old('manufacturer_id') }}">
                        @if {{ old('manufacturer_id') }} != none
                        {{ $manufacturers->where('id', old('manufacturer_id'))->first()['name'] }}
                        @endif
                    </option>
                    @foreach ($manufacturers as $manufacturer)
                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                    @endforeach
                </select>
                @error('manufacturer_id')
                     <strong class="error" style="color: red; font-size: 12px;">{{ $message }}</strong>
                @enderror
            </div>
            <div class="row pl-2 mt-3">     
                <label for="inputModel"><strong>Model:</strong></label>
                <select id="inputState" class="form-control" name="model_id">
                    <option selected hidden></option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
                @error('model_id')
                    <strong class="error" style="color: red; font-size: 12px;">{{ $message }}</strong>
                @enderror
            </div>
            <div class="row pl-2 mt-3">
                <label class="pl-2" for="inputState"><strong>Prod. Year:</strong></label>
                <select id="inputState" class="form-control" name="prod_date">
                    <option selected value="{{ old('prod_date') }}">{{ old('prod_date') }}</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                </select>
                @error('prod_date')
                    <strong class="error" style="color: red; font-size: 12px;">{{ $message }}</strong>
                @enderror
            </div>
            <div class="row pl-2 mt-3">     
                <label for="inputMileage"><strong>Mileage(km):</strong></label>
                <input type="text" class="form-control" id="inputMileage" name="mileage" value="{{ old('mileage') }}">
                @error('mileage')
                    <strong class="error" style="color: red; font-size: 12px;">{{ $message }}</strong>
                @enderror
            </div>
            <div class="row pl-2 mt-3">
                <label class="pl-2" for="gearboxType"><strong>Gear box type:</strong></label>
                <select id="gearboxType" class="form-control" name="gearbox_type">
                    <option selected value=""></option>
                    <option value="manual">manual</option>
                    <option value="automatic">automatic</option>
                    <option value="typtronic">typtronic</option>
                    <option value="variator">variator</option>
                </select>
                @error('gearbox_type')
                    <strong class="error" style="color: red; font-size: 12px;">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        {{-- second column --}}
        <div class="col-3 ml-5">
            <div class="row pl-2 ">
                <label class="pl-2" for="inputState"><strong>Cylinders:</strong></label>
                <select id="inputState" class="form-control" name="cylinders">
                    <option selected value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                @error('cylinders')
                    <strong class="cylinders" style="color: red; font-size: 12px;">{{ $message }}</strong>
                @enderror
            </div>
            <div class="row pl-2 mt-3">
                <label class="pl-2" for="inputState"><strong>Doors:</strong></label>
                <select id="inputState" class="form-control" name="doors">
                    <option selected value=""></option>
                    <option value="4/5">4/5</option>
                    <option value="2/3">2/3</option>
                    <option value=">5">>5</option>
                </select>
                @error('doors')
                    <strong class="cylinders" style="color: red; font-size: 12px;">{{ $message }}</strong>
                @enderror
            </div>
            <div class="row pl-2 mt-3">
                <label class="pl-2" for="fuelType"><strong>Fuel type:</strong></label>
                <select id="fuelType" class="form-control" name="fuel_type">
                    <option selected value=""></option>
                    <option value="petrol">petrol</option>
                    <option value="diesel">diesel</option>
                    <option value="gas">gas</option>
                    <option value="hybric">hybric</option>
                    <option value="electric">electric</option>
                </select>
                @error('fuel_type')
                    <strong class="cylinders" style="color: red; font-size: 12px;">{{ $message }}</strong>
                @enderror
            </div>
            <div class="row pl-2 mt-3">
                <label class="pl-2" for="driveWheels"><strong>Drive wheels:</strong></label>
                <select id="driveWheels" class="form-control" name="drive_wheels">
                    <option selected value=""></option>
                    <option value="front">front</option>
                    <option value="back">back</option>
                    <option value="4x4">4x4</option>
                </select>
                @error('drive_wheels')
                    <strong class="cylinders" style="color: red; font-size: 12px;">{{ $message }}</strong>
                @enderror
            </div>
            <div class="row pl-2 mt-3">
                <label class="pl-2" for="driveWheels"><strong>Color:</strong></label>
                <select id="driveWheels" class="form-control" name="color">
                    <option selected value=""></option>
                    <option value="black">black</option>
                    <option value="white">white</option>
                    <option value="yellow">yellow</option>
                    <option value="blue">blue</option>
                    <option value="yellow">yellow</option>
                    <option value="brown">brown</option>
                </select>
                @error('color')
                    <strong class="cylinders" style="color: red; font-size: 12px;">{{ $message }}</strong>
                @enderror
            </div>
            <div class="row mt-3">
                <div class="col-9">
                    <label class="" for="engineVolume"><strong>Engine volume:</strong></label>
                    <select id="engineVolume" class="form-control" name="engine_volume">
                        <option selected value=""></option>
                        <option value="1.0">1.0</option>
                        <option value="1.5">1.5</option>
                        <option value="2.0">2.0</option>
                        <option value="2.5">2.5</option>
                        <option value="3.0">3.0</option>
                        <option value="3.5">3.5</option>
                        <option value="4.0">4.-</option>
                        <option value="4.5">4.5</option>
                        <option value="5.5">5.5</option>
                        <option value="6.3">6.3</option>
                        <option value="9.0">9.0</option>
                        <option value="12.0">12.0</option>
                    </select>
                    @error('engine_volume')
                        <strong class="cylinders" style="color: red; font-size: 12px;">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-3 mt-5">
                    <input class="form-check-input" type="hidden" name="turbo" value="0">
                    <input class="form-check-input" type="checkbox" name="turbo" id="HasTurbo" value="1">
                    <label class="form-check-label" for="HasTurbo"><Strong>Turbo</Strong></label>
                </div>
            </div>
        </div>
    </div>
    <hr>
    {{-- second row --}}
    <div class="row mt-2 ml-2">
        <div class="col-3">
            <label for=""><strong>Wheel</strong></label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="wheel" id="wheelSide" value="L" checked>
                <label class="form-check-label" for="wheelSide">
                  Left
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="wheel" id="WheelSide" value="R">
                <label class="form-check-label" for="WheelSide">
                  Right
                </label>
            </div>
        </div>
    </div>
    <hr>
    <div class="row mt-1">
        <div class="col-3 ml-5">
            <div class="row">
                <input class="form-check-input" type="hidden" name="hydraulics" value="0">
                <input class="form-check-input" type="checkbox" name="hydraulics" id="Hashydraulics" value="1">
                <label class="form-check-label" for="Hashydraulics"><Strong>Hydraulics</Strong></label>
            </div>
            <div class="row">
                <input class="form-check-input" type="hidden" name="rims" value="0">
                <input class="form-check-input" type="checkbox" name="rims" id="Hasrims" value="1">
                <label class="form-check-label" for="Hasrims"><Strong>Rims</Strong></label>
            </div>
            <div class="row">
                <input class="form-check-input" type="hidden" name="el_window" value="0">
                <input class="form-check-input" type="checkbox" name="el_window" id="Hasel_window" value="1">
                <label class="form-check-label" for="Hasel_window"><Strong>El. window</Strong></label>
            </div>
        </div>
        <div class="col-3">
            <div class="row">
                <input class="form-check-input" type="hidden" name="climate_control" value="0">
                <input class="form-check-input" type="checkbox" name="climate_control" id="Hasclimate_control" value="1">
                <label class="form-check-label" for="Hasclimate_control"><Strong>Climate control</Strong></label>
            </div>
            <div class="row">
                <input class="form-check-input" type="hidden" name="seat_heater" value="0">
                <input class="form-check-input" type="checkbox" name="seat_heater" id="Hasseat_heater" value="1">
                <label class="form-check-label" for="Hasseat_heater"><Strong>Seat heater</Strong></label>
            </div>
            <div class="row">
                <input class="form-check-input" type="hidden" name="central_lock" value="0">
                <input class="form-check-input" type="checkbox" name="central_lock" id="Hascentral_lock" value="1">
                <label class="form-check-label" for="Hascentral_lock"><Strong>Central lock</Strong></label>
            </div>
        </div>
        <div class="col-3">
            <div class="row">
                <input class="form-check-input" type="hidden" name="alarm" value="0">
                <input class="form-check-input" type="checkbox" name="alarm" id="Hasalarm" value="1">
                <label class="form-check-label" for="Hasalarm"><Strong>Alarm</Strong></label>
            </div>
            <div class="row">
                <input class="form-check-input" type="hidden" name="bord_computer" value="0">
                <input class="form-check-input" type="checkbox" name="bord_computer" id="Hasbord_computer" value="1">
                <label class="form-check-label" for="Hasbord_computer"><Strong>Bord computer</Strong></label>
            </div>
            <div class="row">
                <input class="form-check-input" type="hidden" name="navigation" value="0">
                <input class="form-check-input" type="checkbox" name="navigation" id="Hasnavigation" value="1">
                <label class="form-check-label" for="Hasnavigation"><Strong>Navigation</Strong></label>
            </div>
        </div>
    </div>
    <hr>
    {{-- third row --}}
    <label for="image1" class="col-md-4 col-form-label"><strong>Post Images (max 6)</strong></label>
    <div class="row mt-2">
        <div class="col-5 ml-3">
            <input type="file", class="form-control-file mb-2", id="image1", name="image1">
            @error('image1')
                    <strong style="color: red; font-size: 12px;">{{ $message }}</strong>
            @enderror
            <input type="file", class="form-control-file mb-2", id="image2", name="image2">
            @error('image2')
                    <strong>{{ $message }}</strong>
            @enderror
            <input type="file", class="form-control-file mb-2", id="image3", name="image3">
            @error('image3')
                    <strong>{{ $message }}</strong>
            @enderror
        </div>
        <div class="col-5">
            <input type="file", class="form-control-file mb-2", id="image4", name="image4">
            @error('image4')
                    <strong>{{ $message }}</strong>
            @enderror
            <input type="file", class="form-control-file mb-2", id="image5", name="image5">
            @error('image5')
                    <strong>{{ $message }}</strong>
            @enderror
            <input type="file", class="form-control-file mb-2", id="image5", name="image5">
            @error('image5')
                    <strong>{{ $message }}</strong>
            @enderror
        </div>
    </div>
    <hr>
    <div class="row p-3">
        <label for="exampleFormControlTextarea1" class="ml-2"><strong>Description</strong></label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Add description here..." name="description"></textarea>
        @error('description')
            <strong class="cylinders" style="color: red; font-size: 12px;">{{ $message }}</strong>
        @enderror
    </div>
    <hr>
    {{-- fourth row --}}
    <div class="row">
        <div class="col-4 ml-2 mr-5">
            <div class="row pl-2 mt-3">     
                <label for="inputName" class="ml-2"><strong>Name:</strong></label>
                <input type="text" class="form-control" id="inputName" name="name">
                @error('name')
                    <strong class="cylinders" style="color: red; font-size: 12px;">{{ $message }}</strong>
                @enderror
            </div>
            <div class="row pl-2 mt-3">     
                <label for="inputphone" class="ml-2"><strong>Phone:</strong></label>
                <input type="text" class="form-control" id="inputphone" name="phone">
                @error('phone')
                    <strong class="cylinders" style="color: red; font-size: 12px;">{{ $message }}</strong>
                @enderror
            </div>
            <div class="row pl-2 mt-3" style="max-width: 150px;">     
                <label for="inputphone" class="ml-2"><strong>Price (GEL) :</strong></label>
                <input type="text" class="form-control" id="inputPrice" name="price">
                @error('price')
                    <strong class="cylinders" style="color: red; font-size: 12px;">{{ $message }}</strong>
                @enderror
            </div>            
        </div>
        <div class="col-4 mt-3 mb-5">
            <div class="row">
                <label class="ml-2" for="Location"><strong>Location:</strong></label>
                <select id="Location" class="form-control" name="location">
                    <option selected value=""></option>
                    <option value="tbilisi">tbilisi</option>
                    <option value="batumi">batumi</option>
                    <option value="gori">gori</option>
                    <option value="telavi">telavi</option>
                    <option value="kobuleti">kobuleti</option>
                    <option value="mestia">mestia</option>
                    <option value="ozurgeti">ozurgeti</option>
                    <option value="gurjaani">gurjaani</option>
                    <option value="mtskheta">mtskheta</option>
                    <option value="foti">foti</option>
                    <option value="borjomi">borjomi</option>
                </select>
                @error('location')
                    <strong class="cylinders" style="color: red; font-size: 12px;">{{ $message }}</strong>
                @enderror
            </div>
            <div class="row mt-5 pt-2 ml-1">
                <label for="" class="mr-2"><strong>Customs</strong></label>
                <div class="form-check mr-2">
                    <input class="form-check-input" type="radio" name="customs" id="customs" value="1" checked>
                    <label class="form-check-label" for="customs">
                        Custom cleared
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="customs" id="customs" value="0">
                    <label class="form-check-label" for="customs">
                        Before Customs
                    </label>
                </div>
                <div class="mt-3">
                    <label for="postType"><strong>Post Type</strong></label>
                    <select id="postType" class="form-control" name="post_type">
                        <option selected value="N">normal</option>
                        <option value="V">vip</option>
                        <option value="V+">vip+</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex mt-3 justify-content-center pl-3 mb-5">
        <button class="btn btn-primary w-50">Add New Post</button>
    </div>
   </form>
</div>
@endsection

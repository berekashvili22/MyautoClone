@extends('layouts.app')

@section('content')
<div class="search-cont">
   <form action="{{ route('post.filter') }}" method="POST">
   @csrf
   <div class="row">
      <div class="searchpic col">
        <div class="search-pic-cont">
            <svg xmlns="http://www.w3.org/2000/svg" width="29.169" height="14" viewBox="0 0 29.169 14"><g id="prefix__car_icon" transform="translate(5 -2)"><path id="prefix__Union_5" d="M19.173 10.973A3.025 3.025 0 1 1 22.2 14a3.023 3.023 0 0 1-3.027-3.027zm2.111 0a.914.914 0 1 0 .914-.913.916.916 0 0 0-.914.913zm-17.139 0A3.025 3.025 0 1 1 7.171 14a3.024 3.024 0 0 1-3.026-3.027zm2.112 0a.913.913 0 1 0 .914-.913.917.917 0 0 0-.915.913zm19.763.376a3.47 3.47 0 0 0 .038-.366 3.738 3.738 0 0 0-7.475 0 3.377 3.377 0 0 0 .038.366h-7.88a3.47 3.47 0 0 0 .037-.366 3.737 3.737 0 0 0-7.474 0 3.662 3.662 0 0 0 .037.366H.5a.5.5 0 0 1-.5-.494V8.942a.388.388 0 0 1 .386-.387V7.111a1.451 1.451 0 0 1 1.1-1.405L6.53 4.453l3.746-3A6.636 6.636 0 0 1 14.42 0h6.716a1.729 1.729 0 0 1 1.158.442L25.6 3.409l1.063-.058a1.453 1.453 0 0 1 1.523 1.27l.486 3.937a.489.489 0 0 1 .493.494v1.8a.5.5 0 0 1-.5.494zM11.13 2.755L9.337 4.191l9.369-.472v-2.17h-4.138a5.493 5.493 0 0 0-3.438 1.206zm9.134.883l3.094-.156-1.913-1.713a.85.85 0 0 0-.572-.219h-.609z" data-name="Union 5" transform="translate(-5 2)" fill="#d0d4e3"></path></g></svg>
         </div>
         <div class="search-pic-cont">
            <svg xmlns="http://www.w3.org/2000/svg" id="prefix__tractor" width="21.187" height="18" viewBox="0 0 21.187 18"><path id="prefix__Union_6" d="M13.738 3.723A3.724 3.724 0 1 0 17.462 0a3.724 3.724 0 0 0-3.724 3.723zm3.1 0a.621.621 0 1 1 .62.621.621.621 0 0 1-.617-.621zM0 4.964A4.966 4.966 0 1 0 4.966 0 4.967 4.967 0 0 0 0 4.964zm3.1 0a1.863 1.863 0 1 1 1.866 1.862A1.865 1.865 0 0 1 3.1 4.964zM11.172 3.1v1.864h1.48a5.089 5.089 0 0 1-.152-1.241 4.808 4.808 0 0 1 .039-.621zM4.344 4.964a.62.62 0 1 0 .622-.621.623.623 0 0 0-.622.621zm6.7 1.241A6.207 6.207 0 0 1 1.016 9.753l-.79.958a7.46 7.46 0 0 0 4.741 1.7A7.405 7.405 0 0 0 9.08 11.17h8.384a2.486 2.486 0 0 0 2.482-2.48v-.668a4.933 4.933 0 0 1-2.482.668 4.972 4.972 0 0 1-4.3-2.484zm3.932 6.208v1.862a1.863 1.863 0 0 0 1.862 1.862V14.9a.622.622 0 0 1-.621-.621v-1.866zm-5.542 0a8.643 8.643 0 0 1-4.471 1.241 8.584 8.584 0 0 1-1.863-.2v3.308H1.862V18H11.8v-1.241h-1.08l1.141-4.346z" data-name="Union 6" transform="rotate(180 10.594 9)" fill="#d0d4e3"></path></svg>
         </div>
         <div class="search-pic-cont">
            <svg xmlns="http://www.w3.org/2000/svg" id="prefix__motorcycle" width="22.757" height="16" viewBox="0 0 22.757 16"><path id="prefix__Union_7" d="M16.09 3.334a3.294 3.294 0 0 0 .785 2.119l-.9 1.071a4.563 4.563 0 0 1-1.132-2.066 5.079 5.079 0 0 1-.129-1.123.667.667 0 0 0-.666-.666H7.757A3.961 3.961 0 1 0 8 4h1.379a5.307 5.307 0 0 1-.91 2.96A4.2 4.2 0 0 0 11.6 9.284a.671.671 0 0 1 .453.289l1.519 2.276a3.3 3.3 0 0 0 1.359 1.169c0-.005.009-.007.015-.013a3.289 3.289 0 0 0 1.1.315v1.289a4.648 4.648 0 0 1-.579.058h-.754a.666.666 0 1 0 0 1.333h.754a5.97 5.97 0 0 0 5.912-5.921 2.1 2.1 0 0 0-.6-1.526A1.905 1.905 0 0 0 19.427 8a5.4 5.4 0 0 1-1.127-.12 4.438 4.438 0 0 1-1.289-.521l.9-1.071a3.3 3.3 0 0 0 1.509.379 3.334 3.334 0 1 0-3.33-3.333zm1.335 0a2.024 2.024 0 1 1 1.347 1.883l1.173-1.466a.667.667 0 0 0-1.045-.834l-1.17 1.467a1.976 1.976 0 0 1-.306-1.05zM1.335 4A2.658 2.658 0 0 1 6.3 2.667H4.668a2 2 0 0 0-2 2A.666.666 0 0 0 4 4.666.668.668 0 0 1 4.668 4h2a2.666 2.666 0 1 1-5.333 0zm2 5.335A3.337 3.337 0 0 0 0 12.666a.668.668 0 0 0 .669.668h2.925l4.279-2.542a10.233 10.233 0 0 1 1.757-.813 5.539 5.539 0 0 1-2.085-1.93c0-.011 0-.022-.011-.033a5.63 5.63 0 0 1-4.2 1.319zm5.223 2.6l-1.064.641a4.676 4.676 0 0 0 3.885 2.09 4.616 4.616 0 0 0 2.474-.739 4.7 4.7 0 0 1-1.387-1.338l-1.141-1.715a8.938 8.938 0 0 0-2.768 1.062z" data-name="Union 7" transform="rotate(180 11.379 8)" fill="#d0d4e3"></path></svg>
         </div>
      </div>
      <div class="first col">
         <select class="form-control form-control mb-1" name="deal_type">
            <option disabled selected hidden>Deal type</option>
            <option value="sale">sale</option>
            <option value="rent">rent</option>
          </select>
          <select class="form-control form-control mb-1" name="manufacturer">
            <option disabled selected hidden>Manufacturer</option>
            <option value="bmw">bmw</option>
            <option value="mercedes-benz">mercedes-benz</option>
            <option value="audi">audi</option>
            <option value="opel">opel</option>
            <option value="ford">ford</option>
            <option value="honda">honda</option>
            <option value="volvo">volvo</option>
            <option value="fiat">fiat</option>
            <option value="suzuki">suzuki</option>
            <option value="dodge">dodge</option>
            <option value="toyota">toyota</option>
          </select>
          <input type="text" class="form-control mb-1" id="inputModel" name="model" placeholder="Model">
          <select class="form-control form-control mb-1" name="category_id">
            <option disabled selected hidden>Category</option>
            <option value="4">sedan</option>
            <option value="5">jeep</option>
            <option value="6">coupe</option>
            <option value="7">moto</option>
            <option value="8">tricycle</option>
            <option value="9">scooter</option>
            <option value="10">bus</option>
            <option value="11">truck</option>
            <option value="12">trailer</option>
          </select>
      </div>
      <div class="second col">
         <select id="inputState" class="form-control mb-1" name="year_from">
            <option disabled selected hidden>Year - from</option>
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
        <select id="engineVolume" class="form-control mb-1" name="engine_from">
            <option disabled selected hidden>Engine volume- from</option>
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
        <input type="text" class="form-control mb-1" id="inputPrice" name="price_from" placeholder="Price - from">
      </div>
      <div class="third col">
         <select id="inputState" class="form-control mb-1" name="year_to">
            <option disabled selected hidden> - to</option>
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
        <select id="engineVolume" class="form-control mb-1" name="engine_to">
            <option disabled selected hidden> - to</option>
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
        <input type="text" class="form-control mb-1" id="inputPrice" name="price_to" placeholder=" - to">
      </div>
      <div class="fourth col">
         <select id="gearboxType" class="form-control mb-1" name="gearbox_type">
            <option disabled selected hidden>Gearbox type</option>
            <option value="manual">manual</option>
            <option value="automatic">automatic</option>
            <option value="typtronic">typtronic</option>
            <option value="variator">variator</option>
        </select>
        <select id="fuelType" class="form-control mb-1" name="fuel_type">
            <option disabled selected hidden>Fuel type</option>
            <option value="petrol">petrol</option>
            <option value="diesel">diesel</option>
            <option value="gas">gas</option>
            <option value="hybric">hybric</option>
            <option value="electric">electric</option>
         </select>
         <select id="postType" class="form-control mb-1" name="post_type">
               <option disabled selected hidden>Post type</option>
               <option value="V">vip</option>
               <option value="V+">vip+</option>
         </select>
      </div>
      <div class="fifth col">
         <select id="postType" class="form-control mb-1" name="customs">
            <option disabled selected hidden>Customs</option>
            <option value="1">custom cleared</option>
            <option value="0">before custom</option>
         </select>
         <select id="postType" class="form-control mb-1" name="wheel">
            <option disabled selected hidden>Wheel</option>
            <option value="L">left</option>
            <option value="R">right</option>
         </select>
         <select id="Location" class="form-control mb-1" name="location">
            <option disabled selected hidden>Location</option>
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
         <button class="search-button">SEARCH</button>
   </div>
   <input type="text" class="serachbar form-control mb-1" id="inputPrice" name="searchKeyWords" placeholder="Enter any search keyword...">
</div>
   </form>
</div>
<hr>
{{-- slider for vip + --}}
<div class="slider-label mt-5">
   <label for="slide-container"><h2><strong>VIP +</strong></h2></label>
</div>
<div class="slider-container" id="slide-container">
   <div class="owl-carousel owl-theme mt-5">
      @foreach ($vipPlus_posts as $post)
      <div class="item">
         <a href="{{ route('post.show', $post->id) }}" class="index-card-link" style="text-decoration: none;">
            <div class="card" style="width: 19rem;">
               <img class="card-img-top" src="/storage/{{ $post->image1 }}" alt="N/A" style="width: 100%">
               <div class="card-body">
                  <p class="text-muted" style="text-transform: capitalize;">{{ $post->prod_date }} {{ $post->location }}</p>
                  <h5 class="card-title" style="">
                     <span style="text-transform: uppercase">{{ $post->manufacturer }}</span> {{ $post->model }}</h5>
                     <div class="index-card-category-cont text-muted">
                        <div class="index-card-category">{{ $post->category->title }}</div>
                        <div class="index-card-category">{{ $post->fuel_type }}</div>
                     </div>
                     <div>
                        <h2 class="index-card-price">{{ $post->price }} ₾</h2>
                     </div>
                  </div>
               </div>
            </a>
         </div>
      @endforeach
   </div>
</div>
<hr>
{{-- advert --}}
<div class="advert-1 border"> 
</div>
<hr>
{{-- slider for vip --}}
<div class="slider-label">
   <label for="slide-container"><h2><strong>VIP</strong></h2></label>
</div>
<div class="slider-container" id="slide-container">
   <div class="owl-carousel owl-theme mt-5">
      @foreach ($vip_posts as $post)
      <div class="item">
         <a href="{{ route('post.show', $post->id) }}" class="index-card-link" style="text-decoration: none;">
            <div class="card" style="width: 19rem;">
               <img class="card-img-top" src="/storage/{{ $post->image1 }}" alt="N/A" style="width: 100%">
               <div class="card-body">
                  <p class="text-muted" style="text-transform: capitalize;">{{ $post->prod_date }} {{ $post->location }}</p>
                  <h5 class="card-title" style="">
                     <span style="text-transform: uppercase">{{ $post->manufacturer }}</span> {{ $post->model }}</h5>
                     <div class="index-card-category-cont text-muted">
                        <div class="index-card-category">{{ $post->category->title }}</div>
                        <div class="index-card-category">{{ $post->fuel_type }}</div>
                     </div>
                     <div>
                        <h2 class="index-card-price">{{ $post->price }} ₾</h2>
                     </div>
                  </div>
               </div>
            </a>
         </div>
      @endforeach
   </div>
</div>
<hr>
{{-- advert --}}
<div class="advert-2 border"> 
</div>
<hr>
{{-- recently added --}}
<div class="slider-label">
   <label for="slide-container"><h2><strong>RECENTLY ADDED</strong></h2></label>
</div>
<div class="slider-container" id="slide-container">
   <div class="owl-carousel owl-theme mt-5">
      @foreach ($recently_added as $post)
      <div class="item">
         <a href="{{ route('post.show', $post->id) }}" class="index-card-link" style="text-decoration: none;">
            <div class="card" style="width: 19rem;">
               <img class="card-img-top" src="/storage/{{ $post->image1 }}" alt="N/A" style="width: 100%">
               <div class="card-body">
                  <p class="text-muted" style="text-transform: capitalize;">{{ $post->prod_date }} {{ $post->location }}</p>
                  <h5 class="card-title" style="">
                     <span style="text-transform: uppercase">{{ $post->manufacturer }}</span> {{ $post->model }}</h5>
                     <div class="index-card-category-cont text-muted">
                        <div class="index-card-category">{{ $post->category->title }}</div>
                        <div class="index-card-category">{{ $post->fuel_type }}</div>
                     </div>
                     <div>
                        <h2 class="index-card-price">{{ $post->price }} ₾</h2>
                     </div>
                  </div>
               </div>
            </a>
         </div>
      @endforeach
   </div>
</div>

@endsection


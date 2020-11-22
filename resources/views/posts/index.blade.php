@extends('layouts.app')

@section('content')
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

{{-- {{ $post->user->email }}
{{ $post->price }}
{{ $post->deal_type }}
{{ $post->category->title }}
{{ $post->category->where('category_id', $post->category->parent_id)->first()['title'] }}
<img class="" src="/storage/{{ $post->image1 }}" alt="">
</div> --}}


@extends('layouts.app')

@section('content')
    <div class="filter-main-cont container">
        <div class="result-found" style="background-color: rgb(238, 238, 238)">
            <p class="pt-3 pl-2">{{ $postCount }} results found</p>
        </div>
        @foreach ($filtered_posts as $post)
            <div class="post-main-box">
                <div class="top-box">
                    <div class="box-main-title">
                        <strong>
                            For {{ $post->deal_type }} <span style="text-transform: uppercase"></span> {{ $post->manufacturer->name }} {{ $post->brand->name }}
                        </strong>
                    </div>
                    <div class="box-prod-date">
                        <strong>{{ $post->prod_date }} y</strong>
                        @if ($post->customs != 0)
                        <p class="box-custom" style="color: green">Customs-cleared</p>
                        @else
                        <p class="box-custom" style="color: red">Custom {{ floor($post->price / 7) }} ₾</p>
                        @endif
                    </div>
                    <div class="box-price">
                        <strong>{{ $post->price }} ₾</strong>
                    </div>
                </div>
                <div class="bottom-box">
                    <div class="box-pic-cont">
                        <a href="{{ route('post.show', $post->id) }}">
                            <img class="box-img" src="/storage/{{ $post->image1 }}" alt="N/A" style="width: 230px">
                        </a>
                        @if ($post->post_type == 'V+')
                        <div class="p-type">
                            VIP +
                        </div>
                        @elseif ($post->post_type == 'V')
                        <div class="p-type" style="background-color: rgba(255, 166, 0, 0.541)">
                            VIP
                        </div>
                        @else
                        @endif
                       
                    </div>
                    <div class="box-post-detials">
                        <p class="box-details text-muted">{{ $post->engine_volume }} {{ $post->fuel_type }}</p>
                        <p class="box-details text-muted">{{ $post->mileage }} km</p>
                        <p class="box-details text-muted">{{ $post->gearbox_type }} </p>
                        <p class="box-details text-muted">@if ($post->wheel == 'L' ) Left wheel @else Right wheel @endif</p>
                    </div>
                    <div class="box-description">
                        <div class="p-descrtipion">
                            <p class="p-3">{{ substr($post->description, 0, 300) }}</p>
                        </div>
                        <div class="box-location">
                            <p class="p-2 pl-3">{{ $post->location }}</p>
                            <p class="p-2 pr-3">{{ $post->created_at->format('d M') }} </p>
                        </div>
                    </div>
                    <div class="box-id">
                        <strong>ID: {{ $post->id }}</strong>
                    </div>
                </div>
            </div>
         @endforeach
    </div>
@endsection

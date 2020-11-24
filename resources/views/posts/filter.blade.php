@extends('layouts.app')

@section('content')
    <div class="filter-main-cont container">
        @foreach ($filtered_posts as $post)
            <div class="post-main-box">
                <div class="top-box">
                    <div class="box-main-title">
                        <strong>For {{ $post->deal_type }} {{ $post->manufacturer }} {{ $post->model }}</strong>
                    </div>
                    <div class="box-prod-date">
                        <strong>{{ $post->prod_date }}</strong>
                        @if ($post->customs != 0)
                        <p class="box-custom">Customs-cleared</p>
                        @else
                        <p class="box-custom">Custom {{ floor($post->price / 7) }} ₾</p>
                        @endif
                    </div>
                    <div class="box-price">
                        <strong>{{ $post->price }}</strong>
                    </div>
                </div>
                <div class="bottom-box">
                    <div class="box-pic-cont">
                        <img class="box-img" src="/storage/{{ $post->image1 }}" alt="N/A" style="width: 250px">
                    </div>
                    <div class="box-post-detials">
                        <p class="box-details text-muted">{{ $post->engine_volume }} {{ $post->fuel_type }}</p>
                        <p class="box-details text-muted">{{ $post->mileage }} </p>
                        <p class="box-details text-muted">{{ $post->gearbox_type }} </p>
                        <p class="box-details text-muted">@if ($post->wheel == 'L' ) Left wheel @else Right wheel @endif</p>
                    </div>
                    <div class="box-description">
                        <div class="p-descrtipion">
                            <p>{{ $post->description }} </p>
                        </div>
                        <div class="box-location">
                            <p>{{ $post->location }}</p>
                            <p>{{ $post->created_at->format('d M') }} </p>
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

@extends('layouts.app')

@section('content')
    <div class="profile-title-cont">
        <h2><strong class="profile-title">My Posts</strong></h2>
    </div>
    <hr>
      <div class="profile-posts-cont">
         @foreach ($posts as $post)
            <a href="{{ route('post.show', $post->id) }}" class="" style="text-decoration: none;">
                <div class="profile-post">
                    <div>
                        <img class="" src="/storage/{{ $post->image1 }}" alt="N/A" style="width: 150px">
                    </div>
                    <div class="profile-post-mm">
                        <span style="text-transform: uppercase" class="pr-3">{{ $post->manufacturer }}</span>
                        <span style="text-transform: uppercase">{{ $post->model }}</span>
                    </div>
                    <div class="profile-post-p">
                        <h2 class="index-card-price">{{ $post->price }} ₾</h2>
                     </div>
                    <div class="profile-post-l">
                        {{ $post->location }}
                    </div>
                    <div class="profile-post-t">
                        {{ $post->created_at }}
                    </div>
                </div>
               </a>
         @endforeach
      </div>
@endsection

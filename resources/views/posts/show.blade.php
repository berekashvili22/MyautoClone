@extends('layouts.app')

@section('content')
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/storage/{{ $post->image1 }}" class="d-block w-100" alt="...">
          </div>
          @if (strlen($post->image2) > 3)
              {
                <div class="carousel-item">
                    <img src="/storage/{{ $post->image2 }}" class="d-block w-100" alt="...">
                </div>
              }
           @elseif (strlen($post->image3) > 3)
           {
            <div class="carousel-item">
                <img src="/storage/{{ $post->image3 }}" class="d-block w-100" alt="...">
            </div>
           }
           @elseif (strlen($post->image4) > 4)
           {
            <div class="carousel-item">
                <img src="/storage/{{ $post->image4 }}" class="d-block w-100" alt="...">
            </div>
           }
           @elseif (strlen($post->image5) > 5)
           {
            <div class="carousel-item">
                <img src="/storage/{{ $post->image5 }}" class="d-block w-100" alt="...">
            </div>
           }     
           @elseif (strlen($post->image6) > 5)
           {
            <div class="carousel-item">
                <img src="/storage/{{ $post->image6 }}" class="d-block w-100" alt="...">
            </div>
           }     
          @endif
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      {{-- @if ($post->image2) {
        <div class="carousel-item active">
            <img class="d-block w-100" src="/storage/{{ $post->image2 }}" alt="First slide">
        </div>
      }
      @elseif ($post->image3) {
        <div class="carousel-item active">
            <img class="d-block w-100" src="/storage/{{ $post->image3 }}" alt="First slide">
        </div>
      }
      @elseif ($post->image4) {
        <div class="carousel-item active">
            <img class="d-block w-100" src="/storage/{{ $post->image4 }}" alt="First slide">
        </div>
      }
      @elseif ($post->image5) {
        <div class="carousel-item active">
            <img class="d-block w-100" src="/storage/{{ $post->image5 }}" alt="First slide">
        </div>
      }
      @elseif ($post->image6) {
        <div class="carousel-item active">
            <img class="d-block w-100" src="/storage/{{ $post->image6 }}" alt="First slide">
        </div>
      }
      @else

      @endif --}}

@endsection


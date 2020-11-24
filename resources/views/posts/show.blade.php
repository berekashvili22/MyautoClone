@extends('layouts.app')

@section('content')
     <div class="show-post-cont">
       <div class="d-flex">
       @can('update', $post)
       <div class="pr-2">
        <a href="{{ route('post.edit', $post->id) }}" class="edit-post" style="text-decoration: none; color: orange;"><strong>Edit</strong></a>
       </div>
       @endcan
       @can('delete', $post)
       <div>
        <a href="{{ route('post.delete', $post->id) }}" class="edit-post" style="text-decoration: none; color: red;"><strong>Delete</strong></a>
       </div>
       @endcan
       </div>
        <div class="show-post-pic-cont">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="/storage/{{ $post->image1 }}" class="w-100" alt="...">
              </div>
              @if (strlen($post->image2) > 3)
                    <div class="carousel-item">
                        <img src="/storage/{{ $post->image2 }}" class="w-100" alt="...">
                    </div>
               @elseif (strlen($post->image3) > 3)
                <div class="carousel-item">
                    <img src="/storage/{{ $post->image3 }}" class="w-100" alt="...">
                </div>
               @elseif (strlen($post->image4) > 3)
                <div class="carousel-item">
                    <img src="/storage/{{ $post->image4 }}" class="w-100" alt="...">
                </div>
               @elseif (strlen($post->image5) > 3)
                <div class="carousel-item">
                    <img src="/storage/{{ $post->image5 }}" class="w-100" alt="...">
                </div>
               @elseif (strlen($post->image6) > 3)
                <div class="carousel-item">
                    <img src="/storage/{{ $post->image6 }}" class="w-100" alt="...">
                </div>
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
          </div>
        </div>
        {{-- end carousel --}}
        <div class="main-info-cont mt-2">
          <div class="left-cont p-2">
            <h2 class="index-card-price pl-1 mb-3 pt-2">{{ $post->price }} ₾</h2>
            @if ($post->customs != 0)
              <p class="c-c">Customs-cleared</p>
            @else
              <p class="c-p">Custom {{ floor($post->price / 7) }} ₾</p>
            @endif
          </div>
          <div class="right-cont pl-1">
              <div class="time-view-id mr-1 pt-1">
                <p class="text-muted pt-1 mr-2"><strong><span class="pr-3 pl-2">{{ $post->created_at->format('Y-m-d H:i') }}</span><span class="pr-3">views</span>ID -  {{ $post->id }}</strong></p>
              </div>
              <div>
                <h4 class="npl pt-4 pl-2"><span class="pr-4">{{ $post->name }}</span><span class="p-phone pr-5">{{ $post->phone }}</span>{{ $post->location }}</h4>
              </div>
          </div>
        </div>
        {{-- advert --}}
        <div class="show-p-ad mt-2 mb-2"> 
          <p></p>
        </div>
        {{-- post description --}}
        <div class="show-p-details">
          <div class="details-row-1">
            <strong>For <span class="pr-2">{{ $post->deal_type }}</span><span class="pr-1">{{ $post->manufacturer }}</span><span class="pr-1">{{ $post->model }}</span><span class="pr-1">{{ $post->prod_date }}</span> | <span>{{ $post->fuel_type }}</span> | {{ $post->location }}</strong>
          </div>
          <div class="details-row-2">
            <p class="description pl-4 pt-3">{{ $post->description }}</p>
          </div>
          {{-- post details --}}
          <div class="details-row-3">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td class="left-table">Manufacturer <strong style="text-transform: uppercase">{{ $post->manufacturer }} </strong></td>
                  <td class="right-table">
                    Rims
                    @if ($post->rims == 1)
                    <svg width="1em" height="1em" style="color: green;" viewBox="0 0 16 16" class="bi bi-check-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    @else
                    <svg width="1em" height="1em" style="color: red;" viewBox="0 0 16 16" class="bi bi-slash-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.646-2.646a.5.5 0 0 0-.708-.708l-6 6a.5.5 0 0 0 .708.708l6-6z"/>
                    </svg>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td class="left-table">Model <strong style="text-transform: uppercase">{{ $post->model }}</strong></td>
                  <td class="right-table">
                    El. windows
                    @if ($post->el_window == 1)
                    <svg width="1em" height="1em" style="color: green;" viewBox="0 0 16 16" class="bi bi-check-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    @else
                    <svg width="1em" height="1em" style="color: red;" viewBox="0 0 16 16" class="bi bi-slash-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.646-2.646a.5.5 0 0 0-.708-.708l-6 6a.5.5 0 0 0 .708.708l6-6z"/>
                    </svg>
                    @endif
                    </svg>
                  </td>
                </tr>
                <tr>
                  <td class="left-table">Prod. year <strong style="text-transform: uppercase">{{ $post->prod_date }}</strong></td>
                  <td class="right-table">
                    Climate control
                    @if ($post->climate_control == 1)
                    <svg width="1em" height="1em" style="color: green;" viewBox="0 0 16 16" class="bi bi-check-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    @else
                    <svg width="1em" height="1em" style="color: red;" viewBox="0 0 16 16" class="bi bi-slash-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.646-2.646a.5.5 0 0 0-.708-.708l-6 6a.5.5 0 0 0 .708.708l6-6z"/>
                    </svg>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td class="left-table">Category <strong style="text-transform: capitalize">{{ $post->category->title }}</strong></td>
                  <td class="right-table">
                    Seat heater
                    @if ($post->seat_heater == 1)
                    <svg width="1em" height="1em" style="color: green;" viewBox="0 0 16 16" class="bi bi-check-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    @else
                    <svg width="1em" height="1em" style="color: red;" viewBox="0 0 16 16" class="bi bi-slash-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.646-2.646a.5.5 0 0 0-.708-.708l-6 6a.5.5 0 0 0 .708.708l6-6z"/>
                    </svg>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td class="left-table">Fuel type <strong style="text-transform: capitalize">{{ $post->fuel_type }}</strong></td>
                  <td class="right-table">
                    Central lock
                    @if ($post->central_lock == 1)
                    <svg width="1em" height="1em" style="color: green;" viewBox="0 0 16 16" class="bi bi-check-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    @else
                    <svg width="1em" height="1em" style="color: red;" viewBox="0 0 16 16" class="bi bi-slash-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.646-2.646a.5.5 0 0 0-.708-.708l-6 6a.5.5 0 0 0 .708.708l6-6z"/>
                    </svg>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td class="left-table">Cylinders <strong style="text-transform: uppercase">{{ $post->cylinders }}</strong></td>
                  <td class="right-table">
                    Alarm
                    @if ($post->alarm == 1)
                    <svg width="1em" height="1em" style="color: green;" viewBox="0 0 16 16" class="bi bi-check-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    @else
                    <svg width="1em" height="1em" style="color: red;" viewBox="0 0 16 16" class="bi bi-slash-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.646-2.646a.5.5 0 0 0-.708-.708l-6 6a.5.5 0 0 0 .708.708l6-6z"/>
                    </svg>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td class="left-table">Gear box type <strong style="text-transform: capitalize">{{ $post->gearbox_type }}</strong></td>
                  <td class="right-table">
                    Board computer
                    @if ($post->board_computer == 1)
                    <svg width="1em" height="1em" style="color: green;" viewBox="0 0 16 16" class="bi bi-check-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    @else
                    <svg width="1em" height="1em" style="color: red;" viewBox="0 0 16 16" class="bi bi-slash-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.646-2.646a.5.5 0 0 0-.708-.708l-6 6a.5.5 0 0 0 .708.708l6-6z"/>
                    </svg>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td class="left-table">Drive Wheels <strong style="text-transform: capitalize">{{ $post->drive_wheels }}</strong></td>
                  <td class="right-table">
                    Navigation
                    @if ($post->navigation == 1)
                    <svg width="1em" height="1em" style="color: green;" viewBox="0 0 16 16" class="bi bi-check-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    @else
                    <svg width="1em" height="1em" style="color: red;" viewBox="0 0 16 16" class="bi bi-slash-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.646-2.646a.5.5 0 0 0-.708-.708l-6 6a.5.5 0 0 0 .708.708l6-6z"/>
                    </svg>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td class="left-table">Doors <strong style="text-transform: capitalize">{{ $post->doors }}</strong></td>
                  <td class="right-table">
                    Hydraulics
                    @if ($post->hydraulics == 1)
                    <svg width="1em" height="1em" style="color: green;" viewBox="0 0 16 16" class="bi bi-check-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    @else
                    <svg width="1em" height="1em" style="color: red;" viewBox="0 0 16 16" class="bi bi-slash-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.646-2.646a.5.5 0 0 0-.708-.708l-6 6a.5.5 0 0 0 .708.708l6-6z"/>
                    </svg>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td class="left-table">Color <strong style="text-transform: capitalize">{{ $post->color }}</strong></td>
                  <td class="right-table">
                    Turbo
                    @if ($post->turbo == 1)
                    <svg width="1em" height="1em" style="color: green;" viewBox="0 0 16 16" class="bi bi-check-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    @else
                    <svg width="1em" height="1em" style="color: red;" viewBox="0 0 16 16" class="bi bi-slash-circle-fill ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.646-2.646a.5.5 0 0 0-.708-.708l-6 6a.5.5 0 0 0 .708.708l6-6z"/>
                    </svg>
                    @endif
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
     </div>
     <hr>
     <div class="similar-posts-title">
      <p>Similar posts</p>
     </div>
     <div class="slider-container" id="slide-container">
      <div class="owl-carousel owl-theme mt-5">
         @foreach ($similar_posts as $post)
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

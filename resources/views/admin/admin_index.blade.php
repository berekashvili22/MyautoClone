@extends('admin.admin_layout')

@section('content')
<div class="box-container">
    <div class="dash-box">
        <div class="inbox-title pt-1">
            <svg width="5em" height="5em" style="color: #fff" viewBox="0 0 16 16" class="bi bi-people mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
            </svg>
            <h2 class="pt-3">Users</h2>
        </div>
        <div class="inbox-info">
            <p> New users today  <span style="padding-left: 100px">{{ $t_users }}</span></p>
            <p> New users this week  <span style="padding-left: 62px">{{ $w_users }}</span></p>
        </div>
    </div>
    <div class="dash-box" style="background-color: #fbac4b67">
            <div class="inbox-title pt-1">
            <svg width="5em" height="5em" viewBox="0 0 16 16" style="color: #fff" class="bi bi-sticky mr-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M1 2.5A1.5 1.5 0 0 1 2.5 1h11A1.5 1.5 0 0 1 15 2.5v6.086a1.5 1.5 0 0 1-.44 1.06l-4.914 4.915a1.5 1.5 0 0 1-1.06.439H2.5A1.5 1.5 0 0 1 1 13.5v-11zM2.5 2a.5.5 0 0 0-.5.5v11a.5.5 0 0 0 .5.5h6.086a.5.5 0 0 0 .353-.146l4.915-4.915A.5.5 0 0 0 14 8.586V2.5a.5.5 0 0 0-.5-.5h-11z"/>
            <path fill-rule="evenodd" d="M9.5 9a.5.5 0 0 0-.5.5v5H8v-5A1.5 1.5 0 0 1 9.5 8h5v1h-5z"/>
            </svg>
            <h2 class="pt-3">Posts</h2>
        </div>
        <div class="inbox-info">
            <p> New posts today  <span style="padding-left: 100px">{{ $t_posts }}</span></p>
            <p> New posts this week  <span style="padding-left: 62px">{{ $w_posts }}</span></p>
        </div>
    </div>
        <div class="dash-box" style="background-color: #ff646c65">
            <div class="inbox-title pt-1">
                <svg width="5em" height="5em" viewBox="0 0 16 16" style="color: #fff"  class="bi bi-eye mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                </svg>
               <h2 class="pt-3">Views</h2>
        </div>
        <div class="inbox-info">
            <p>Views today  <span style="padding-left: 100px">{{ $t_users }}</span></p>
            <p>Views this week  <span style="padding-left: 62px">{{ $w_users }}</span></p>
        </div>
    </div>
</div>
@endsection

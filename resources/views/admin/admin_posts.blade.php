@extends('admin.admin_layout')

@section('content')
<div class="users-table-wrap" style="width: 1200px;">
<div class="users-t-title">
  <h1 class="">Posts - Table</h1>
</div>
<table class="table table-hover table-dark" style="">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
      <th scope="col">user id</th>
      <th scope="col">author email</th>
      <th scope="col">type</th>
      <th scope="col">location</th>
      <th scope="col">created at</th>
      <th scope="col">updated at</th>
      <th scope="col">edit</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
    <tr>
      <th scope="row">{{ ++$loop->index }}</th>
      <td>{{ $post->id }}</td>
      <td>{{ $post->user_id }}</td>
      <td>{{ $post->user->email }}</td>
      <td>{{ $post->post_type }}</td>
      <td>{{ $post->location }}</td>
      <td>{{ $post->created_at }}</td>
      <td>{{ $post->updated_at }}</td>
      <td>
          <a href="/admin/posts/{{ $post->id }}/delete" class="badge badge-danger p-2">delete</a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>

</div>
<div class="paginate-links-admin">
  {{ $posts->links() }}
</div>
 
@endsection

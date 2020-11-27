@extends('admin.admin_layout')

@section('content')
<div class="admin-create-user-link">
  <a href="{{ route('admin.create') }}" class="badge badge-pill badge-success">Create new user</a>
</div>
<div class="users-table-wrap">
<div class="users-t-title">
  <h1 class="">Users - Table</h1>
</div>
<table class="table table-hover table-dark" style="">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
      <th scope="col">email</th>
      <th scope="col">email_verified_at</th>
      <th scope="col">password</th>
      <th scope="col">remember_token</th>
      <th scope="col">created_at</th>
      <th scope="col">updated_at</th>
      <th scope="col">edit</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
    <tr>
      <th scope="row">{{ ++$loop->index }}</th>
      <td>{{ $user->id }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->email_verified_at ? $user->email_verified_at : "-" }}</td>
      <td>{{ substr($user->password, 0, 10) }}...</td>
      <td>{{ $user->remember_token ? $user->remember_token : "-" }}</td>
      <td>{{ $user->created_at }}</td>
      <td>{{ $user->updated_at }}</td>
      <td>
          <a href="{{ route('admin.edit', $user->id) }}" class="badge badge-info p-2 mr-1">edit</a>
          <a href="/admin/users/{{ $user->id }}/delete" class="badge badge-danger p-2">delete</a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>

</div>
<div class="paginate-links-admin">
  {{ $users->links() }}
</div>
 
@endsection

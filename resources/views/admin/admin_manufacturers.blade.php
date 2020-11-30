@extends('admin.admin_layout')

@section('content')
<div class="admin-create-user-link">
  <a href="{{ route('admin.create_manufacturer') }}" class="badge badge-pill badge-success">Create new manufacturer</a>
</div>
<div class="users-table-wrap">
<div class="users-t-title">
  <h1 class="">Manufacturers - Table</h1>
</div>
<table class="table table-hover table-dark" style="">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
      <th scope="col">name</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($manufacturers as $manufacturer)
    <tr>
      <th scope="row">{{ ++$loop->index }}</th>
      <td>{{ $manufacturer->id }}</td>
      <td>{{ $manufacturer->name }}</td>
      <td>
        <a href="{{ route('admin.edit_manufacturer', $manufacturer->id) }}" class="badge badge-info p-2 mr-1">edit</a>
        <a href="/admin/manufacturers/{{ $manufacturer->id }}/delete" class="badge badge-danger p-2">delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>
<div class="paginate-links-admin">
  {{ $manufacturers->links() }}
</div>
 
@endsection
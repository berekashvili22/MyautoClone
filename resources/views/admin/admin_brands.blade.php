@extends('admin.admin_layout')

@section('content')
<div class="admin-create-user-link">
  <a href="{{ route('admin.create_brand') }}" class="badge badge-pill badge-success">Add new brand</a>
</div>
<div class="users-table-wrap">
<div class="users-t-title">
  <h1 class="">Brands - Table</h1>
</div>
<table class="table table-hover table-dark" style="">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
      <th scope="col">manufacturer</th>
      <th scope="col">name</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($brands as $brand)
    <tr>
      <th scope="row">{{ ++$loop->index }}</th>
      <td>{{ $brand->id }}</td>
      <td>{{ $brand->manufacturer_id }}</td>
      <td>{{ $brand->name }}</td>
      <td>
        <a href="{{ route('admin.edit_brand', $brand->id) }}" class="badge badge-info p-2 mr-1">edit</a>
        <a href="/admin/brands/{{ $brand->id }}/delete" class="badge badge-danger p-2">delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>
<div class="paginate-links-admin">
  {{ $brands->links() }}
</div>
 
@endsection
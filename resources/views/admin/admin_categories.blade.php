@extends('admin.admin_layout')

@section('content')
<div class="users-table-wrap">
<div class="users-t-title">
  <h1 class="">Users - Table</h1>
</div>
<table class="table table-hover table-dark" style="width: 800px">
     <a href="#" class="badge badge-pill badge-success p-2" style="font-size: 14px; width: 100px;"><strong>Create</strong></a>
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
      <th scope="col">parent_id</th>
      <th scope="col">category_id</th>
      <th scope="col">title</th>
      <th scope="col">edit</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($parent_categories as $category)
    <tr>
      <th scope="row">{{ ++$loop->index }}</th>
      <td>{{ $category->id }}</td>
      <td>{{ $category->parent_id }}</td>
      <td>{{ $category->category_id }}</td>
      <td>{{ $category->title }}</td>
      <td>
          <a href="{{ route('admin.edit', $category->id) }}" class="badge badge-info p-2 mr-1">edit</a>
          <a href="/admin/users/{{ $category->id }}/delete" class="badge badge-danger p-2">delete</a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>

</div>
<div class="paginate-links-admin">
  {{-- {{ $categories->links() }} --}}
</div>
 
@endsection

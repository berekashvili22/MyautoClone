@extends('admin.admin_layout')

@section('content')
<div class="users-table-wrap">
<div class="row">
  {{-- FIRST-COL --}}
  <div class="col-6">
    <table class="table table-hover table-dark" style="width: 600px">
      <a href="{{ route('admin.create_category') }}" class="badge badge-pill badge-success p-2" style="position: absolute; right: 5%">Create new category</a>
    <h2 class="categories-title">PARENT Categories - Table</h2>
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">id</th>
        <th scope="col">parent_id</th>
        <th scope="col">title</th>
        <th scope="col">edit</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($parent_categories as $category)
    <tr>
      <th scope="row">{{ ++$loop->index }}</th>
      <td>{{ $category->id }}</td>
      <td>{{ ($category->parent_id == 0 ) ? '-' : $category->parent->id }}</td>
      <td>{{ $category->title }}</td>
      <td>
        <a href="{{ route('admin.edit_category', $category->id) }}" class="badge badge-info p-2 mr-1">edit</a>
        <a href="/admin/categories/{{ $category->id }}/delete" class="badge badge-danger p-2">delete</a>
      </td>
    </tr>
    @endforeach
    </tbody>
  </table>
  {{ $parent_categories->links() }}
</div>
{{-- SECOND COL --}}
  <div class="col-6">
    <table class="table table-hover table-dark" style="width: 600px">
      <a href="{{ route('admin.create_category') }}" class="badge badge-pill badge-success p-2" style="position: absolute; right: 5%">Create new category</a>
     <h2 class="categories-title">SUB Categories - Table</h2>
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">id</th>
        <th scope="col">parent_id</th>
        <th scope="col">title</th>
        <th scope="col">edit</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($sub_categories as $category)
      <tr>
        <th scope="row">{{ ++$loop->index }}</th>
        <td>{{ $category->id }}</td>
        <td>{{ $category->parent_id }}</td>
        <td>{{ $category->title }}</td>
        <td>
          <a href="{{ route('admin.edit_category', $category->id) }}" class="badge badge-info p-2 mr-1">edit</a>
          <a href="/admin/categories/{{ $category->id }}/delete" class="badge badge-danger p-2">delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
    </table>
     {{ $sub_categories->links() }}
  </div>
</div>
</div>
@endsection

@extends('admin.admin_layout')

@section('content')
<div class="container">
    <form action="{{ route('admin.update_category', $category->id) }}" method="post">
    @csrf
    <div class="user-edit-form-container" style="width: 700px">
        <div class="row">
            <label class="u-e-f-label" for="id"><strong>Id:</strong></label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $category->id }}">
            @error('id')
                <strong class="error" style="color: red; font-size: 12px;">{{ $message }}</strong>
            @enderror
            <hr class="mb-5">
            <label class="u-e-f-label" for="user_role"><strong>Parent category:</strong></label>
            <select id="parent_id" class="form-control" name="parent_id" @if ($category->parent_id == 0) disabled @endif>
                @if ($category->parent_id != 0)
                <option disabled selected hidden>parent category</option>
                    @foreach ($parent_categories as $parent_category)
                        <option value="{{ $parent_category->id }}" @if ($category->parent_id == $parent_category->id) selected @endif>{{ $parent_category->title }}</option>
                    @endforeach
                @else
                    <option disabled selected value="0">parent category</option>
                @endif
            </select>
            @error('parent_id')
                <strong class="error" style="color: red; font-size: 12px;">{{ $message }}</strong>
            @enderror
            <hr class="mb-5">
            <label class="u-e-f-label" for="category_title"><strong>Category title :</strong></label>
            <input type="text" class="form-control" id="category_title" name="title" value="{{ $category->title}}">
            @error('title')
                <strong class="error" style="color: red; font-size: 12px;">{{ $message }}</strong>
            @enderror
            <hr class="mb-5">
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </div>
 
</form>
</div>
@endsection
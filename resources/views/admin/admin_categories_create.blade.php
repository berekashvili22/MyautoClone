@extends('admin.admin_layout')

@section('content')
<div class="container">
    <form action="{{ route('admin.store_category') }}" method="post">
    @csrf
    <div class="user-edit-form-container" style="width: 700px">
        <div class="row">
            <div>
                <h2 class="" style="color: #fff">Create new category</h2>
            </div>
            <hr class="mb-5 mt-5">
            <label class="u-e-f-label" for="user_role"><strong>Parent category:  <span class="pl-5" style="color: red">* select <span style="text-decoration: underline">PARENT CATEGORY</span> to create parent category</span></strong></label>
            <select id="parent_id" class="form-control" name="parent_id">
                <option disabled selected hidden>parent category</option>
                    <option value="0"><strong style="font-weight: bold; color: red; font-size: 14px;">PARENT CATEGORY</strong></option>
                    @foreach ($parent_categories as $parent_category)
                        <option value="{{ $parent_category->category_id }}">{{ $parent_category->title }}</option>
                    @endforeach
            </select>
            @error('parent_id')
                <strong class="error" style="color: red; font-size: 12px; height: 10px mb-1">{{ $message }}</strong>
            @enderror
            <hr class="mb-5">
            <label class="u-e-f-label" for="category_id"><strong>Category id:</strong></label>
            <input type="text" class="form-control" id="category_id" name="category_id">
            @error('category_id')
                <strong class="error" style="color: red; font-size: 12px; height: 10px mb-1">{{ $message }}</strong>
            @enderror
            <hr class="mb-5">
            <label class="u-e-f-label" for="category_title"><strong>Category title :</strong></label>
            <input type="text" class="form-control" id="category_title" name="title">
            @error('title')
                <strong class="error" style="color: red; font-size: 12px; height: 10px mb-1">{{ $message }}</strong>
            @enderror
            <hr class="mb-5">
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
 
</form>
</div>
@endsection
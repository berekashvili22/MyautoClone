@extends('admin.admin_layout')

@section('content')
<div class="container">
    <form action="{{ route('admin.update_manufacturer', $manufacturer->id) }}" method="post">
        @csrf
        <div class="user-edit-form-container" style="width: 700px">
            <div class="row" style="display: flex; flex-direction: column;">
                <hr class=" mt-3">
                <label class="u-e-f-label" for="manufacturer_title"><strong>Manufacturer name :</strong></label>
                <input type="text" class="form-control" id="manufacturer_title" name="name" value="{{ $manufacturer->name }}">
                @error('name')
                <strong class="error" style="color: red; font-size: 12px;">{{ $message }}</strong>
                @enderror
                <hr class="">
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>

    </form>
</div>
@endsection
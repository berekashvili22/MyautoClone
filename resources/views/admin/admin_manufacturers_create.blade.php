@extends('admin.admin_layout')

@section('content')
<div class="container">
    <form action="{{ route('admin.store_manufacturer') }}" method="post">
        @csrf
        <div class="user-edit-form-container" style="width: 700px">
            <div class="row" style="display: flex; flex-direction: column;">
                <div>
                    <h2 class="" style="color: #fff">Create new manufacturer</h2>
                </div>
                <hr class=" mt-3">
                <label class="u-e-f-label" for="manufacturer_title"><strong>Manufacturer name :</strong></label>
                <input type="text" class="form-control" id="manufacturer_title" name="name">
                @error('name')
                <strong class="error" style="color: red; font-size: 12px;">{{ $message }}</strong>
                @enderror
                <hr class="">
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>

    </form>
</div>
@endsection
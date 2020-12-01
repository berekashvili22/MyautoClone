@extends('admin.admin_layout')

@section('content')
<div class="container">
    <form action="{{ route('admin.store_brand') }}" method="post">
        @csrf
        <div class="user-edit-form-container" style="width: 700px">
            <div class="row" style="display: flex; flex-direction: column;">
                <div>
                    <h2 class="" style="color: #fff">Add new brand</h2>
                </div>
                <hr class="mt-3">
                <label class="u-e-f-label" for="user_role"><strong>Manufacturer:</label>
                <select id="manufacturer_id" class="form-control" name="manufacturer_id">
                    <option disabled selected hidden>select manufacturer...</option>
                        @foreach ($manufacturers as $manufacturer)
                            <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                        @endforeach
                </select>
                @error('manufacturer_id')
                    <strong class="error" style="color: red; font-size: 12px;">{{ $message }}</strong>
                @enderror
                <hr class="mt-1">
                <label class="u-e-f-label" for="manufacturer_title"><strong>Brand name :</strong></label>
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
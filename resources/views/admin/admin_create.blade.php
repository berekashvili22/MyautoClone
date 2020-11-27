@extends('admin.admin_layout')

@section('content')
<div class="container">
    <form action="{{ route('admin.store') }}" method="post">
    @csrf
    <div class="user-edit-form-container">
        <div class="row">
        <div class="col-5">
            <label class="u-e-f-label" for="user_email"><strong>email :</strong></label>
            <input type="text" class="form-control mb-3" id="user_email" name="email">
            @error('email')
                <strong class="error" style="color: red; font-size: 12px; position: absolute;">{{ $message }}</strong>
            @enderror
            <hr>
            <label class="u-e-f-label" for="user_email_verified_at"><strong>email_verified_at :</strong></label>
            <input type="date" class="form-control mb-3" id="user_email_verified_at" name="email_verified_at">
            @error('email_verified_at')
                <strong class="error" style="color: red; font-size: 12px; position: absolute;">{{ $message }}</strong>
            @enderror
            <hr>
            <label class="u-e-f-label" for="user_password"><strong>password :</strong></label>
            <input type="text" class="form-control mb-3" id="user_password" name="password">
            @error('password')
                <strong class="error" style="color: red; font-size: 12px; position: absolute;">{{ $message }}</strong>
            @enderror
            <hr class="mb-5">
            <button type="submit" class="btn btn-primary">Create User</button>
        </div>
        <div class="col-5">
            <label class="u-e-f-label" for="user_role"><strong>role :</strong></label>
            <select id="role" class="form-control mb-3" name="role">
                <option disabled selected hidden>select role</option>
                <option value="0">client</option>
                <option value="1">admin</option>
            </select>
            @error('role')
                <strong class="error" style="color: red; font-size: 12px; position: absolute;">{{ $message }}</strong>
            @enderror
            <hr>
            <label class="u-e-f-label" for="user_remember_token"><strong>remember_token :</strong></label>
            <input type="text" class="form-control mb-3" id="user_remember_token" name="remember_token">
            @error('remember_token')
                <strong class="error" style="color: red; font-size: 12px; position: absolute;">{{ $message }}</strong>
            @enderror
            <hr>
            <label class="u-e-f-label" for="user_created_at"><strong>created_at :</strong></label>
            <input type="date" class="form-control mb-3" id="user_created_at" name="created_at">
            @error('created_at')
                <strong class="error" style="color: red; font-size: 12px; position: absolute;">{{ $message }}</strong>
            @enderror
            <hr>
            <label class="u-e-f-label" for="user_updated_at"><strong>updated_at :</strong></label>
            <input type="date" class="form-control mb-3" id="user_updated_at" name="updated_at">
            @error('updated_at')
                <strong class="error" style="color: red; font-size: 12px; position: absolute;">{{ $message }}</strong>
            @enderror
            <hr>
        </div>
        </div>
        <div class="row pl-3">
            
        </div>
    </div>
</form>
</div>
@endsection
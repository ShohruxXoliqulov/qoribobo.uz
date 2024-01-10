@extends('layouts.main_index')
@section('content')
<div class="container">
    <div class="col-12 mt-3">
        <form action="{{ route('profile.update') }}" method="POST" class="card" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <h3 class="card-title">Adminni o'zgartirish</h3>
                <div class="row row-cards">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Admin ismi</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" placeholder="Admin">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="password">New Password:</label>
                            <input type="password" name="password" class="form-control" placeholder="Parol">

                            <label for="password_confirmation">Parolni tasdiqlang:</label>
                            <input type="password" name="password_confirmation"class="form-control" placeholder="Parolni takrorlang">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">O'zgartirish</button>
            </div>
        </form>
    </div>
</div>
@endsection
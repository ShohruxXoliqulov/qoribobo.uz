@extends('layouts.main_index')
@section('content')
<div class="container">
    <div class="col-12 mt-3">
        <form action="{{ route('products.update', $product->id) }}" method="POST" class="card" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <h3 class="card-title">Mahsulotni o'zgartirish</h3>
                <div class="row row-cards">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Mahsulot nomi</label>
                            <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" placeholder="Mahsulot">
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
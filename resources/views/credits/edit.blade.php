@extends('layouts.main_index')
@section('content')
<div class="container">
        <div class="col-12 mt-3">
            {{-- <button type="button" class="me-3 mb-3 btn btn-info" data-bs-toggle="collapse" data-bs-target="#next_sum">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-plus" viewBox="6 0 15 15">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg>
                Yangi qarz qo'shish
            </button>
            <span class="text-secondary">(Mavjud qarzdorlik ustiga yana qarz qo'shish!)</span>
            <form action="{{ route('additional_sum.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="next_sum" class="collapse border rounded px-3 mb-3">
                    <div class="mb-3 mt-3">
                        <label class="form-label">Qarz miqdori</label>
                        <input type="number" class="form-control" name="next_sum" placeholder="Qarz miqdori">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Izoh</label>
                        <textarea class="form-control" name="comment" rows="3" placeholder="Qarzdorlik bo'yicha izoh qoldiring!"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Qarzdor shaxs</label>
                        <select class="form-select" name="credit_id">
                            <option selected value="{{ $credit->id }}">{{ $credit->name }}</option>    
                        </select>
                    </div>
                    <div class="card-footer text-end mt-4 mb-4">
                        <button type="submit" class="btn btn-success">Qo'shish</button>
                    </div>
                </div>
            </form> --}}
            <form action="{{ route('credits.update', $credit->id) }}" method="POST" class="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header my-4">
                    <h4 class="modal-title">Qarzdorlik malumotlarini o'zgartirish</h4>
                </div>
                <div class="modal-body">
                    <div class="row row-cards">
                        <div class="col-md-12">
                            
                            <div class="mb-3">
                                <label class="form-label">Ism Familiya</label>
                                <input type="text" value="{{ $credit->name }}" class="form-control" name="name" placeholder="Ism Familiya">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telefon</label>
                                <input type="tel" value="{{ $credit->phone }}" class="form-control" name="phone" placeholder="Telefon raqam">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Summa</label>
                                <input type="number" value="{{ $credit->other_price }}" class="form-control" name="other_price" placeholder="Jami qarz summasi">
                            </div>
                            <button type="button" class="me-3 mb-3 btn btn-info" data-bs-toggle="collapse" data-bs-target="#product_1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-plus" viewBox="6 0 15 15">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                </svg>
                                Mahsulot qo'shish
                            </button>
                            <span class="text-secondary">(Agar mahsulot xarid qilingan bo'lsa!)</span>
                            <div id="product_1" class="collapse border rounded px-3 mb-3">
                                <div class="mb-3">
                                    <label class="form-label">Mahsulot turi</label>
                                    <select class="form-select" name="product_id" value="">
                                        <option value="{{ null }}"></option>
                                        @foreach ($products as $item)
                                            <option @if ($item->id == $credit->product_id) selected @endif value="{{ $item->id }}">{{ $item->product_name }}</option>    
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Mahsulot narxi <span class="text-secondary">(So'mda!)</span></label>
                                    <input type="number" value="{{ $credit->product_price }}" class="form-control" name="product_price" placeholder="Bir mahsulot narxi">
                                </div>
                            </div>
                            <div>
                                <label class="form-label">Izoh</label>
                                <textarea class="form-control" name="comment" rows="3" placeholder="Qarzdorlik bo'yicha izoh qoldiring!">{{ $credit->comment }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end mt-5">
                    <button type="submit" class="btn btn-primary">O'zgartirish</button>
                </div>
            </form>
        </div>
</div>
@endsection
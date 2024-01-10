@extends('layouts.main_index')
@section('content')
<div class="container">
    <div class="page-header d-print-none mb-3">
        <div class="container-xl">
          <div class="row g-2 align-items-center">
            <div class="col">
              <h2 class="page-title">
                ( {{ $key }} ) bo'yicha qidiruv natijalari : {{ count($credits) }} ta
              </h2>
            </div>
          </div>
        </div>
        {{-- <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 5l0 14" />
                        <path d="M5 12l14 0" />
                    </svg>
                    Yangi qarzdor qo'shish
                  </a>
                  <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 5l0 14" />
                        <path d="M5 12l14 0" />
                    </svg>
                  </a>
            </div>
        </div> --}}
        {{-- <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <form action="{{ route('credits.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Yangi qarzdor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Ism Familiya</label>
                            <input type="text" class="form-control" name="name" placeholder="Ism Familiya">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telefon</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Telefon raqam">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Summa</label>
                            <input type="number" class="form-control" name="other_price" placeholder="Jami qarz summasi">
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
                                <select class="form-select" name="product_id" placeholder="Mahsulot turi">
                                    <option value="{{ null }}" selected></option>
                                    @foreach ($products as $item)
                                        <option value="{{ $item->id }}">{{ $item->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mahsulot narxi <span class="text-secondary">(So'mda!)</span></label>
                                <input type="number" class="form-control" name="product_price" placeholder="Bir mahsulot narxi">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mahsulot miqdori <span class="text-secondary">(Dona yoki Kg!)</span></label>
                                <input type="number" class="form-control" name="product_amount" placeholder="Mahsulot miqdori">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Qarz berilgan sana <span class="text-secondary">(Majburiy emas!)</span></label>
                            <input type="date" name="given_date" class="form-control">
                        </div>
                        <div>
                            <label class="form-label">Izoh</label>
                            <textarea class="form-control" name="comment" rows="3" placeholder="Qarzdorlik bo'yicha izoh qoldiring!"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link text-danger" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" fill="currentColor" class="bi bi-x-lg" viewBox="3 0 15 15">
                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                            </svg>
                            Bekor qilish
                        </a>
                        <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="currentColor" class="bi bi-check-lg" viewBox="3 0 15 15">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022"/>
                            </svg>
                            Qo'shish
                        </button>
                    </div>
                </form>
              </div>
            </div>
        </div> --}}
    </div>
    <div class="col-12">
        <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter card-table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th><strong class="h4 text-dark">#</strong></th>
                        <th><strong class="h4 text-dark">Ism Familiya</strong></th>
                        <th><strong class="h4 text-dark">Telefon</strong></th>
                        <th><strong class="h4 text-dark">Jami summa</strong></th>
                        <th><strong class="h4 text-dark">Sana</strong></th>
                        <th><strong class="h4 text-dark">Actions</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($credits as $item)
                    <tr>
                        <th scope="row">{{ ++$loop->index }}</th>
                        <td >{{ $item->name }}</td>
                        <td class="text-muted" >
                            {{ $item->phone }}
                        </td>
                        <td class="text-muted" >
                            {{ $item->total_price }} so'm
                        </td>
                        <td class="text-muted">
                            @if ($item->given_date)
                                {{ \Carbon\Carbon::parse($item->given_date)->format('d/m/Y') }}
                            @else
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                            @endif
                        </td>
                        <td>
                            <form method="POST" action="{{ route('credits.destroy', $item->id) }}">
                                @csrf
                                @method('DELETE')

                                <a class="btn btn-primary mb-1" href="{{ route('credits.show', $item->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                    </svg>
                                </a>
                                <a class="btn btn-primary mb-1" href="{{ route('credits.edit', $item->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </a>

                                <button type="submit" class="btn btn-danger mb-1" onclick="return confirm('Rostdan o`chirishni hohlaysizmi ?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                    </svg>
                                </button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $credits->links() }}
        </div>
        </div>
    </div>
</div>
@endsection
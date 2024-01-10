@extends('layouts.main_index')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            Xabarlar
          </h2>
        </div>
        <!-- Page title actions -->
      </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
      <div class="card card-lg">
        <div class="card-body">
            <table class="table table-transparent table-responsive table-hover">
                <thead>
                    <tr>
                        <th><strong class="h4 text-dark">Id</strong></th>
                        <th><strong class="h4 text-dark">Ism Familiya</strong></th>
                        <th><strong class="h4 text-dark">O'zgarish</strong></th>
                        <th><strong class="h4 text-dark">Status</strong></th>
                        <th><strong class="h4 text-dark">Qo'shilgan sana</strong></th>
                        <th><strong class="h4 text-dark">Actions</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($audits as $audit)
                    
                        <tr>
                            <td class="text-start">
                                {{ $audit->id }}
                            </td>
                            <td>
                                <span class="fw-bold">{{ $audit->user_name }}</span>
                            </td>
                            <td>
                                <span>Qarzdorlik {{ $audit->event_type }}</span>
                            </td>
                            <td>
                                @if($audit -> status == 1)
                                    <font style="color: green;">O`qildi</font>
                                @else
                                    <font style="color: red;">O`qilmagan</font> 
                                @endif
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($audit->date)->format('d/m/Y') }}
                            </td>
                            <td>
                                
                                <form method="POST" action="{{ route('audits.destroy', $audit->id) }}">
                                    @csrf
                                    @method('DELETE')
    
                                    <a class="btn btn-primary mb-1" href="{{ route('audits.show', $audit->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
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
            {{ $audits->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
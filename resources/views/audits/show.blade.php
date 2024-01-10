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
                <tr>
                    <th scope="row">Admin nomi</th>
                    <td>{{ $audit->user_name }}</td>
                </tr>
                <tr>
                    <th scope="row">O'zgarish</th>
                    <td>{{ $audit->event_type }}</td>
                </tr>
                <tr>
                  <th scope="row">Ma`lumot</th>
                  <td>{{ $decodedData }}</td>
                </tr>
                <tr>
                    <th scope="row">Date</th>
                    <td>{{ $audit->date }}</td>
                </tr>
            </table>
        </div>
      </div>
    </div>
  </div>
@endsection
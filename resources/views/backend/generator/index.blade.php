@extends('partials.master')
@section('content')
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb adminx-page-breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">List Kode</li>
    </ol>
  </nav>

  <div class="pb-3">
    <h1>List Kode</h1>
  </div>

  @include('common.alert')

  <div class="row">
    <div class="col">
      <div class="card mb-grid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <a href="{{route('generateKode', ["frommodule" => "frommodule"])}}" class="btn btn-sm btn-success">Generator kode Absen +</a>
        </div>
        <div class="table-responsive-md">
          <table class="table table-actions table-striped table-hover mb-0">
            <thead>
              <tr>
                <th scope="col">
                  <label class="custom-control custom-checkbox m-0 p-0">
                    <input type="checkbox" class="custom-control-input table-select-all">
                    <span class="custom-control-indicator"></span>
                  </label>
                </th>
                <th scope="col">Kode</th>
                <th scope="col">Pembuat kode</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($kodes as $kode)
              <tr>
                <th scope="row">
                  <label class="custom-control custom-checkbox m-0 p-0">
                    <input type="checkbox" class="custom-control-input table-select-row">
                    <span class="custom-control-indicator"></span>
                  </label>
                </th>
                <td>{{$kode->code}}</td>
                <td>{{$kode->name}}</td>
                <td>
                    @if($kode->users_id_get = null)
                        Sudah dipakai
                    @else
                        Belum dipakai
                    @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
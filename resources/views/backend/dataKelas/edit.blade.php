@extends('partials.master')
@section('content')
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb adminx-page-breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{route('indexDataKelas')}}">Kelas</a> </li>
      <li class="breadcrumb-item active" aria-current="page">Edit Data Kelas</li>
    </ol>
  </nav>

  <div class="pb-3">
    <h1>Edit Data Kelas</h1>
  </div>

  @include('common.alert')

  <div class="card mb-grid">
    <div class="card-header">
      <div class="card-header-title">Horizontal form</div>
    </div>
    <div class="card-body">
      <form method="POST" action="{{route('updateDataKelas', ["id" => $edit->id])}}">
        @csrf
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label form-label">Nama Kelas</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="kelas" placeholder="Nama Kelas" value="{{$edit->kelas}}">
            </div>
          </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label form-label">Jurusan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="jurusan" placeholder="Jurusan" value="{{$edit->jurusan}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label form-label">Fakultas</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="fakultas" placeholder="Fakultas" value="{{$edit->fakultas}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label form-label">Tingkat</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="tingkat" placeholder="Tingkat" value="{{$edit->tingkat}}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  @endsection
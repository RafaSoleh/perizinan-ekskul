@extends('layout.tampilan')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@section('konten')
@include('sweetalert::alert')
<div class="container mt-5">
<div class="row">
    <div class="col-lg-8">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0">Data Perjalanan {{ Auth::guard('masyarakat')->user()->nama }}</h6>
           @foreach ($data as $item)
           <div class="d-flex text-body-secondary pt-3">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
              <div class="d-flex justify-content-between">
                <strong class="text-gray-dark d-inline-block text-truncate" style="max-width: 520px;">{{ $item->lokasi }}</strong>
                <span>{{ $item->tgl_perjalanan->diffForHumans() }}</span>
              </div>
              <span class="d-block"></span>
            </div>
          </div>
           @endforeach
            </div>
            {{ $data->links() }}
        

    </div>
    <div class="col-lg-4">
        
    <form class="mt-2" method="post" action="/home">
     @csrf
  <div class="mb-3">
    <h5>Form Data Perjalanan</h5>
    <hr>
    <input type="hidden" class="form-control" name='nik'>

    <label for="exampleInputEmail1" class="form-label">Suhu Tubuh <i class="bi bi-thermometer-half"></i></label>
    <input type="text" class="form-control {{ $errors->has('suhu_tubuh') ? ' is-invalid' : '' }}" name="suhu_tubuh"  id="exampleInputEmail1">
    @if($errors->has('suhu_tubuh'))
    <span class="invalid-feedback">{{ $errors->first('suhu_tubuh') }}</span>
  @endif
    
    <label for="exampleInputEmail1" class="form-label">Nama Tempat <i class="bi bi-bank f-left"></i></label>
    <input type="text" class="form-control {{ $errors->has('tempat') ? ' is-invalid' : '' }}" name="tempat"  id="exampleInputEmail1">
    @if($errors->has('tempat'))
    <span class="invalid-feedback">{{ $errors->first('tempat') }}</span>
  @endif
 
  </div>
  
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Catatan Perjalanan <i class="bi bi-book"></i></label>
        <textarea class="form-control {{ $errors->has('lokasi') ? ' is-invalid' : '' }}" name="lokasi" style="max-height:250px; min-height:120px;"   id="exampleFormControlTextarea1" rows="3"></textarea>
        @if($errors->has('lokasi'))
        <span class="invalid-feedback">{{ $errors->first('lokasi') }}</span>
      @endif
     
  </div>
  <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
  <input type="reset" value="Reset" class="btn btn-danger btn-sm">
</form>
    </div>
</div>
</div>
    
@endsection
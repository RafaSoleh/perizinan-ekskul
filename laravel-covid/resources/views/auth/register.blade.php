@extends('layout.tampilan')

@section('konten')
@include('sweetalert::alert')
<main class="form-signin w-100 m-auto">
    <form action="/auth/create" method="post">
        @csrf
      
      <h1 class="h3 mb-3 fw-normal text-center my-4">Register Account</h1>
        <div style="margin-left:36%;">
      <div class="form-floating " style="width: 380px;">
        <input type="text" name="nik" class="form-control  {{ $errors->has('nik') ? ' is-invalid' : '' }}"  value="{{ old('nik') }}">
        
        <label for="floatingInput">Nik</label>
        @if($errors->has('nik'))
        <span class="invalid-tooltip">{{ $errors->first('nik') }}</span>
      @endif
      </div>
      <div class="form-floating " style="width: 380px;">
        <input type="text" name="nama" class="form-control  {{ $errors->has('nama') ? ' is-invalid' : '' }}" value="{{ old('nama') }}">
        
        <label for="floatingInput">Nama</label>
        @if($errors->has('nama'))
        <span class="invalid-tooltip">{{ $errors->first('nama') }}</span>
      @endif
      </div>
      <div class="form-floating" style="width: 380px;">
        <input type="text" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"  value="{{ old('email') }}">
        
        <label for="floatingInput">Email address</label>
        @if($errors->has('email'))
        <span class="invalid-tooltip">{{ $errors->first('email') }}</span>
      @endif
      </div>
      <div class="form-floating" style="width: 380px;">
        <input type="password" name="password" class="form-control  {{ $errors->has('password') ? ' is-invalid' : '' }}" >
        
        <label for="floatingInput">Password</label>
        @if($errors->has('password'))
        <span class="invalid-tooltip">{{ $errors->first('password') }}</span>
      @endif
      
      </div>
      
      <div class="form-floating" style="width: 380px;">
        <input type="text" name="telp" class="form-control  {{ $errors->has('telp') ? ' is-invalid' : '' }}" value="{{ old('telp') }}">
        
        <label for="floatingInput">Telpon</label>
        @if($errors->has('telp'))
        <span class="invalid-tooltip">{{ $errors->first('telp') }}</span>
      @endif
      
      </div>
      
      <button class="btn btn-primary mt-3 " style="width:380px;" type="submit">Register</button>
     
        </div>
    </form>
    <small style="margin-left:44%; margin-top:10%;" >Sudah Punya Akun? <a href="/auth">Login!</a></small>

  </main>

@endsection
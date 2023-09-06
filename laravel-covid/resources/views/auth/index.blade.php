@extends('layout.tampilan')

@section('konten')
@include('sweetalert::alert')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<main class="form-signin w-100 m-auto">
    <form action="/auth/login" method="post" class="needs-validation" novalidate>
        @csrf
      
      <h1 class="h3 mb-3 fw-normal text-center my-5">Please sign in</h1>
      <div class="container">
        @if ($errors->any())
        <div class="pt-3">
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 380px; margin-left:34%;">
                <ul>
                @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>   
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </ul>
            </div>
        </div>
        @endif
    
        <div style="margin-left:34%;">
      <div class="form-floating input-group has-validation" style="width: 380px;">
        <input type="text" name="email" class="form-control" id="validationCustomUsername" value="{{ Session::get('email') }}" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Email tidak boleh kosong.
        </div>
      
        <label  for="floatingInput">Email address </label>
      </div>
      <div class="form-floating input-group has-validation" style="width: 380px;">
        <input type="password" name="password" class="form-control " id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Password tidak boleh kosong.
        </div>
      
        <label for="floatingInput">Password</label>
      </div>
     
      <button class="btn btn-primary mt-5 " style="width:380px;" type="submit">Login</button>
     
        </div>
    </form>
    <small style="margin-left:41%; margin-top:5%;" class="d-blok">Belum Buat Akun? <a href="/auth/register">Buat Akun Anda!</a></small>

  </main>

  
  <script>
    function myFunction() {
        var x = document.getElementById("mybutton");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
{{-- 
<form class="row g-3 needs-validation" novalidate>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">First name</label>
    <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Last name</label>
    <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Username</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
      <div class="invalid-feedback">
        Please choose a username.
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">City</label>
    <input type="text" class="form-control" id="validationCustom03" required>
    <div class="invalid-feedback">
      Please provide a valid city.
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom04" class="form-label">State</label>
    <select class="form-select" id="validationCustom04" required>
      <option selected disabled value="">Choose...</option>
      <option>...</option>
    </select>
    <div class="invalid-feedback">
      Please select a valid state.
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom05" class="form-label">Zip</label>
    <input type="text" class="form-control" id="validationCustom05" required>
    <div class="invalid-feedback">
      Please provide a valid zip.
    </div>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form> --}}

<script>
  (() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>

    
    
@endsection
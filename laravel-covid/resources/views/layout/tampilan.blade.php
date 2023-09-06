<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peduli Diri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>

  <body>
    
    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container">
          <a class="navbar-brand text-dark fw-semibold" href="#">Peduli Sendiri</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          @if (Auth::guard('masyarakat')->check())
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active text-dwhite" aria-current="page" href="/home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="/home/create">Buat Data Perjalanan</a>
              </li>
              
            </ul>  
          @endif
          
            @if (Auth::guard('masyarakat')->check())
            <span class="" data-bs-toggle="modal" data-bs-target="#exampleModalLogout" > <span class="text-dark">
                <i class="bi bi-box-arrow-in-left"></i> Logout
                
            </span></span>
         
         @else
         <a class="link-offset-2 link-underline link-underline-opacity-0" href="/auth"> <span class="navbar-link text-dark">
            <i class="bi bi-box-arrow-in-right"></i> Login
            
        </span></a>
     
     @endif
        </div>
        </div>
      </nav>
    @yield('konten')


    <div class="modal fade" id="exampleModalLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Apakah anda yakin ingin keluar?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            <a href="/auth/logout" type="button" class="btn btn-danger btn-sm">Logout</a>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
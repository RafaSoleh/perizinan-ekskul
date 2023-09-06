@extends('layout.tampilan')

@section('konten')
@include('sweetalert::alert')
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


<style>
  
.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg,#7ad82e,#59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg,#FFB64D,#ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg,#FF5370,#ff869a);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Perjalanan</h6>
                    <h2 class="text-right"><i class="bi bi-bank f-left"></i><span  style="margin-left: 70%;">{{ $total }}</span></h2>
                    <p class="m-b-0"> <a href="#" class="link-offset-2 link-underline link-underline-opacity-0 text-white"> Selengkapnya</a><span class="f-right"></span></p>
                
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Suhu Tubuh Normal</h6>
                    <h2 class="text-right"><i class="bi bi-thermometer-half f-left"></i><span style="margin-left: 70%;">{{ $normal }}</span></h2>
                    <p class="m-b-0" data-bs-toggle="modal" data-bs-target="#exampleModal"> <a href="#" class="link-offset-2 link-underline link-underline-opacity-0 text-white"> Selengkapnya</a><span class="f-right"></span></p>
                </div>
            </div>
        </div>
        
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Suhu Tubuh Dingin</h6>
                    <h2 class="text-right"><i class="bi bi-thermometer-snow f-left"></i><span  style="margin-left: 70%;">{{ $dingin }}</span></h2>
                    <p class="m-b-0" data-bs-toggle="modal" data-bs-target="#exampleModalDingin"> <a href="#" class="link-offset-2 link-underline link-underline-opacity-0 text-white"> Selengkapnya</a><span class="f-right"></span></p>
                
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Suhu Tubuh Panas</h6>
                    <h2 class="text-right"><i class="bi bi-thermometer-sun f-left"></i><span  style="margin-left: 70%;">{{ $panas }}</span></h2>
                    <p class="m-b-0" data-bs-toggle="modal" data-bs-target="#exampleModalPanas"> <a href="#" class="link-offset-2 link-underline link-underline-opacity-0 text-white"> Selengkapnya</a><span class="f-right"></span></p>
                
                </div>
            </div>
        </div>
	</div>
</div>


    <div class="container my-3">
        <h5 class="text-secondary">Table Pejalanan {{ Auth::guard('masyarakat')->user()->nama }}</h5>
        <hr>
       
    </div>
    <div class="container mt-5 mb-5">
        <table class="table  table-hover table-borderless table-striped table-sm" id="dataTable" width="100%">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Tanggal Pejalanan</th>
                    <th>Lokasi</th>
                    <th class="text-center">Tempat</th>
                    <th class="text-center">Suhu Badan</th>
                    <th class="text-center">Status</th>
                    
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="text-center">No</th>
                    <th>Tanggal Pejalanan</th>
                    <th>Lokasi</th>
                    <th class="text-center">Tempat</th>
                    <th class="text-center">Suhu Badan</th>
                    <th class="text-center">Status</th>
                    
                </tr>
            </tfoot>
            <tbody>
                <?php $no=1; ?>
                @foreach ($data as $item)
                <tr>
                    <td class="text-center" style="width:50px;">{{ $no++ }}</td>
                    <td style="width:220px ;">{{ $item->tgl_perjalanan->isoFormat('dddd, MMMM Y') }}</td>
                    <td class="d-inline-block text-truncate" style="max-width: 391px;">{{ $item->lokasi }}</td>
                    <td style="width: 200px;" class="text-center">{{ $item->tempat }}</td>
                    <td class="text-center" style="width: 150px;">{{ $item->suhu_tubuh }}&deg;C</td>
                    @if ($item->suhu_tubuh >'37,2')
                        
                        <td><span class="badge text-bg-danger">Suhu Panas &nbsp;&nbsp;<i class="bi bi-thermometer-sun"></i></span>
                        </td>
                       
                    @elseif($item->suhu_tubuh <='35,5')
                    <td><span class="badge text-bg-primary">Suhu Dingin <i class="bi bi-thermometer-snow"></i></span>
                    </td>

                    @else
                    <td><span class="badge text-bg-warning">Suhu Normal <i class="bi bi-thermometer-half"></i></span>
                    </td>

                     @endif
                    
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Suhu Normal  <i class="bi bi-thermometer-half"></i> </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                  <tr>
                    
                    <th>Tanggal Pejalanan</th>
                    <th>Kunjungan</th>
                    <th class="text-center">Suhu Badan</th>
                    <th class="text-center">Status</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @foreach ($normalCard as $item)
                      <tr>
                        <td style="width:220px ;">{{ $item->tgl_perjalanan->isoFormat('dddd, MMMM Y') }}</td>
                        <td class="d-inline-block text-truncate" style="max-width: 300px;">{{ $item->lokasi }}</td>
                        <td class="text-center" style="width: 200px;">{{ $item->suhu_tubuh }}&deg;C</td>
                       <td><span class="badge text-bg-warning" >Suhu Normal  <i class="bi bi-thermometer-half"></i></span>
                       </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Oke</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModalDingin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Suhu Dingin  <i class="bi bi-thermometer-snow"></i></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                  <tr>
                    
                    <th>Tanggal Pejalanan</th>
                    <th>Kunjungan</th>
                    <th class="text-center">Suhu Badan</th>
                    <th class="text-center">Status</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @foreach ($dinginCard as $item)
                      <tr>
                        <td style="width:220px ;">{{ $item->tgl_perjalanan->isoFormat('dddd, MMMM Y') }}</td>
                        <td class="d-inline-block text-truncate" style="max-width: 300px;">{{ $item->lokasi }}</td>
                        <td class="text-center" style="width: 200px;">{{ $item->suhu_tubuh }}&deg;C</td>
                       <td><span class="badge text-bg-primary">Suhu Dingin <i class="bi bi-thermometer-snow"></i></span>
                       </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Oke</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalPanas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Suhu Panas <i class="bi bi-thermometer-sun"></i></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                  <tr>
                    
                    <th>Tanggal Pejalanan</th>
                    <th>Kunjungan</th>
                    <th class="text-center">Suhu Badan</th>
                    <th class="text-center">Status</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @foreach ($panasCard as $item)
                      <tr>
                        <td style="width:220px ;">{{ $item->tgl_perjalanan->isoFormat('dddd, MMMM Y') }}</td>
                        <td class="d-inline-block text-truncate" style="max-width: 300px;">{{ $item->lokasi }}</td>
                        <td class="text-center" style="width: 200px;">{{ $item->suhu_tubuh }}&deg;C</td>
                       <td><span class="badge text-bg-danger">Suhu Panas <i class="bi bi-thermometer-sun"></i></span>
                       </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Oke</button>
        </div>
      </div>
    </div>
  </div>

@endsection
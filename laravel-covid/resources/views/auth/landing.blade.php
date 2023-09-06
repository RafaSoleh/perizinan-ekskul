@extends('layout.tampilan')


@section('konten')
<section class="bg-card-dashboard" style="padding: 30px 0 0 0; margin-bottom: 0; background:linear-gradient(#a0d34a	,#90EE90	);">
<div class="container index-header-container">
  <div class="index-custom-width col-md-8" id="header-title">
    <div class="index-header-title-container">
      <h1 class="header-title">
        SATUSEHAT Dashboard<br />untuk Satu Indonesia
      </h1>
      <p class="header-description">
        Pusat data kesehatan Indonesia yang menyajikan informasi
        interaktif dalam bentuk dasbor.
      </p>
    </div>
  </div>
  <div class="col-md-4" id="header-image">
    <img src="https://satusehat.kemkes.go.id/dashboard/assets/img/home-web-img.png" class="img-fluid" />
  </div>
</div>
</section>
<section class="py-5">
    <div class="container" style="display: flex; flex-wrap: wrap">
      <div class="col-md-5" style="padding: 16px">
        <img
          src="https://satusehat.kemkes.go.id/dashboard/assets/img/index_satu_data.png"
          style="
            width: 100%;
            min-width: 240px;
            max-width: 100%;
            height: 400px;
            display: flex;
            border-radius: 12px;
            object-fit: contain;
          "
          alt="index_satu_data"
        />
      </div>
      <div class="col-md-7" style="display: flex; align-items: center">
        <div>
          <h1 class="general-title">Mengapa SATUSEHAT Dashboard?</h1>
          <p class="general-description">
            Portal SATUSEHAT yang menjadi sumber data dan informasi kesehatan
            Indonesia dalam bentuk dasbor interaktif untuk mendukung
            pengawasan, perumusan kebijakan dan pengambilan keputusan yang
            terukur serta tepat sasaran.
          </p>
        </div>
      </div>
    </div>

  </section>

  <footer>
    <div class="container">
      <div class="row custom-footer py-4 ">
        <div class="col-md-8">
          <a href="#" class="nav-link pe-2 footer-link ">© 2023 Pusat Data dan Teknologi Informasi. Kementerian Kesehatan Republik Indonesia</a>
        </div>
        <div
          class="col-md-4 custom-footer text-center"
          style="display: flex; justify-content: flex-end"
        >
          <a href="#" class="nav-link pe-2 footer-link">Peta Situs</a>
          <a href="#" class="nav-link pe-2 footer-link">Kebijakan Privasi</a>
          <a href="#" class="nav-link footer-link">Syarat Penggunaan</a>
        </div>
      </div>
    </div>
  </footer>
  

@endsection
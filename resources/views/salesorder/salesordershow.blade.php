@include('header')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-error">
    {{ session('error') }}
</div>
@endif

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Form Create Data Barang</h3>
              </div>
              <!-- /.card-header -->
                       
            <!-- /.card-body -->
            </div>
            <div class="card-footer p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    ID :
                    <span class="float-right text-normal">
                      {{ old('nama_barang', $salesorder->id) }}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Tanggal :
                    <span class="float-right text-normal">
                      {{ old('nama_barang', $salesorder->tgl ) }}
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Nama Customer :
                    <span class="float-right text-normal">
                      {{ old('nama_barang', $salesorder->nm_customer) }}
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Produk :
                    <span class="float-right text-normal">
                      {{ old('nama_barang', $salesorder->produk) }}
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Qty :
                    <span class="float-right text-normal">
                      {{ old('nama_barang', $salesorder->qty) }}
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Harga Satuan :
                    <span class="float-right text-normal">
                      {{ old('nama_barang', $salesorder->hargasatuan) }}
                    </span>
                  </a>
                </li>                         
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Created At
                    <span class="float-right text-normal">
                      {{ old('nama_barang', $salesorder->created_at) }}
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Updated At
                    <span class="float-right text-normal">
                      {{ old('nama_barang', $salesorder->updated_at) }}
                    </span>
                  </a>
                </li>                                
              </ul>
            </div>                        
            <!-- /.card -->
            <div class="form-group mt-3">
              <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('salesorder.destroy', $salesorder->id) }}" method="POST">
                <a href="{{ route('salesorder.edit', $salesorder->id) }}" class="btn btn btn-primary">EDIT</a>
                @csrf
                @method('DELETE')                        
              <button type="submit" class="ml-2 btn btn btn-danger">HAPUS</button>
              </form>
            </div>            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @include('footer')   
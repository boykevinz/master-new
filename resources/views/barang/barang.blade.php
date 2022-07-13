@include('header')

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
                <h3 class="card-title">Form List Master Barang</h3>
                <a href="{{ route('barang.create') }}"><button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Barang</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama Barang</th>
                    <th>Deskripsi</th>
                    <th>Stok(s)</th>
                    <th>Harga</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>                
                    @forelse ($barangs as $barang)                    
                  <tr>
                    <td>{{ $barang->nm_barang }}</td>
                    <td>{{ $barang->deskripsi }}</td>
                    <td>{{ $barang->stok }}</td>
                    <td>{{ $barang->harga }}</td>
                    <td>
                        <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-sm btn-warning">View</a>
                        {{-- <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barang.destroy', $barang->id) }}" method="POST">
                        @csrf
                        @method('DELETE')                        
                      <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                    </form> --}}
                    </td>
                    @csrf
                    @empty
                  </tr>
                  @endforelse
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nama Barang</th>
                    <th>Deskripsi</th>
                    <th>Stok(s)</th>
                    <th>Harga</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
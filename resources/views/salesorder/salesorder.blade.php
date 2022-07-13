@include('header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Sales Order</h1>
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
                <h3 class="card-title">Form List Sales Order</h3>
                <a href="{{ route('salesorder.create') }}"><button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Sales Order</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>tanggal</th>
                    <th>Nama Customer</th>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Harga Satuan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>                
                    @forelse ($salesorders as $salesorder)                    
                  <tr>
                    <td>{{ $salesorder->tgl }}</td>
                    <td>{{ $salesorder->nm_customer }}</td>
                    <td>{{ $salesorder->produk }}</td>
                    <td>{{ $salesorder->qty }}</td>
                    <td>{{ $salesorder->hargasatuan }}</td>
                    <td>
                      <a href="{{ route('salesorder.show', $salesorder->id) }}" class="btn btn-sm btn-warning">view</a>
                    </td>
                    @csrf
                    @empty
                  </tr>
                  @endforelse
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>tanggal</th>
                    <th>Nama Customer</th>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Harga Satuan</th>
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
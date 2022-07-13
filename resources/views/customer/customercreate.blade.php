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
            <h1>Data Customer</h1>
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
                <h3 class="card-title">Form Create Data Customer</h3>
              </div>
              <!-- /.card-header -->
              <form action="{{ route('customer.store') }}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Customer</label>
                    <input name="nama_customer" type="text" class="form-control form-control " id="exampleInputEmail1" placeholder="Nama Customer">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input name="alamat" type="text" class="form-control" id="exampleInputEmail1" placeholder="Desksipsi Alamat">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor HP</label>
                    <input name="nohp" type="text" class="form-control" id="exampleInputEmail1" placeholder="Stock nohp">
                </div>         
                <button type="submit" type="text" class="btn btn-primary">Submit</button>                                               
              </div>
                         
              </form>
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
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
              <form action="{{ route('salesorder.update', $salesorder->id) }}" method="POST">
                @csrf
                @method('PUT')                
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal</label>
                    <input name="tanggal" type="date" class="form-control form-control " id="exampleInputEmail1" placeholder="Nama Barang" value="{{ old('tanggal', $salesorder->tgl) }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Customer</label>
                  <select name="id_customer" id="" class="form-control">
                    @forelse ($customers as $customer)
                    <option value="{{ $customer->id  }}> {{ $customer->nm_customer }}</option>
                    @empty
                    @endforelse
                  </select>
                  
                </div>
                {{-- row produk 1 --}}
                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Produk</label>
                    <select name="produk" id="" class="form-control">
                      <option value="{{ $customer->id; }}">{{ $customer->nm_customer; }}</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Qty</label>
                      <input name="qty" type="text" class="form-control" id="exampleInputEmail1" placeholder="No Hp" value="{{ old('qty', $salesorder->qty) }}">
                  </div>
                  <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">harga Satuan</label>
                      <input name="harga_satuan" type="text" class="form-control" id="exampleInputEmail1" placeholder="No Hp" value="{{ old('harga_satuan', $salesorder->hargasatuan) }}">
                  </div>  
                </div>
               
                {{-- row produk 2 --}}
                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Produk 2</label>
                    <select name="produk2" id="" class="form-control">
                      <option value="{{ old('produk', $salesorder->produk2) }}">{{ old('produk', $salesorder->produk2) }}</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Qty 2</label>
                      <input name="qty2" type="text" class="form-control" id="exampleInputEmail1" placeholder="No Hp" value="{{ old('qty', $salesorder->qty2) }}">
                  </div>
                  <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">harga Satuan 2</label>
                      <input name="harga_satuan2" type="text" class="form-control" id="exampleInputEmail1" placeholder="No Hp" value="{{ old('harga_satuan', $salesorder->hargasatuan2) }}">
                  </div>  
                </div> 
                
                {{-- row produk 2 --}}
                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Produk 3</label>
                    <select name="produk2" id="" class="form-control">
                      <option value="{{ old('produk', $salesorder->produk3) }}">{{ old('produk', $salesorder->produk3) }}</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Qty 3</label>
                      <input name="qty3" type="text" class="form-control" id="exampleInputEmail1" placeholder="No Hp" value="{{ old('qty', $salesorder->qty3) }}">
                  </div>
                  <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">harga Satuan 3</label>
                      <input name="harga_satuan3" type="text" class="form-control" id="exampleInputEmail1" placeholder="No Hp" value="{{ old('harga_satuan', $salesorder->hargasatuan3) }}">
                  </div>  
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
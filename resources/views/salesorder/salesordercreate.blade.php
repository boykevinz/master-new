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
                <h3 class="card-title">Form Create Data Sales Order</h3>
              </div>
              <!-- /.card-header -->
              <form action="{{ route('salesorder.store') }}" method="POST">
                @csrf                
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal</label>
                    <input name="tanggal" type="date" class="@error('tanggal') is-invalid @enderror form-control form-control @error('tgl') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nama Customer">
                                <!-- error message untuk tanggal -->
                                @error('tanggal')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror                                  
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Customer</label>
                    {{-- <input name="nama_customer" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Customer"> --}}
                    <select name="id_customer" id="id_customer" class="form-control">
                      @forelse ($customers as $customer)
                      <option value="{{ $customer->id; }}">{{ $customer->nm_customer; }}</option>
                      @empty
                      @endforelse
                    </select>
                    </div>
                    {{-- row produk 1 --}}
                 <div class="row">  
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Produk</label>
                        <select name="produk" id="" class="form-control">
                          @forelse ($barangs as $barang)
                          <option value="{{ $barang->nm_barang; }}">{{ $barang->nm_barang; }}</option>
                          @empty
                          @endforelse
                        </select>                    
                    </div>                
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Qty</label>
                        <input name="qty" type="text" class="@error('qty') is-invalid @enderror form-control" id="exampleInputEmail1" placeholder="Stock Qty">
                        @error('qty')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>                    
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Harga Satuan</label>
                        <input name="harga_satuan" type="text" class="@error ('harga_satuan') is-invalid @enderror form-control" id="exampleInputEmail1" placeholder="Harga Satuan">
                        @error('harga_satuan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror                        
                    </div>
                  </div>
                  
                  {{-- row produk 2 --}}
                  <div class="row">
                      <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Produk</label>
                        <select name="produk2" id="" class="form-control">
                          <option value=>pilih barang</option>
                          @forelse ($barangs as $barang)
                          <option value="{{ $barang->nm_barang; }}">{{ $barang->nm_barang; }}</option>
                          @empty
                          @endforelse
                        </select>                    
                    </div>                
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Qty</label>
                        <input name="qty2" type="text" class="form-control" id="exampleInputEmail1" placeholder="Stock Qty">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Harga Satuan</label>
                        <input name="harga_satuan2" type="text" class="form-control" id="exampleInputEmail1" placeholder="Harga Satuan">
                    </div>
                  </div>

                  {{-- row produk 3 --}}
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Produk</label>
                      <select name="produk3" id="" class="form-control">
                        <option value=>pilih barang</option>
                        @forelse ($barangs as $barang)
                        <option value="{{ $barang->nm_barang; }}">{{ $barang->nm_barang; }}</option>
                        @empty
                        @endforelse
                      </select>                    
                  </div>                
                  <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Qty</label>
                      <input name="qty3" type="text" class="form-control" id="exampleInputEmail1" placeholder="Stock Qty">
                  </div>
                  <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Harga Satuan</label>
                      <input name="harga_satuan3" type="text" class="form-control" id="exampleInputEmail1" placeholder="Harga Satuan">
                  </div>
                </div>                  
                  <button type="submit" type="text" class="btn btn-primary">Submit</button>                                               
                </div>                  
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
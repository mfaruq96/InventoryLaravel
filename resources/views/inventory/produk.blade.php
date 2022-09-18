<!-- section for layout -->
@extends('layouts.main')

<!-- section fof title -->
@section('title', 'Inventory Laravel | Produk')

<!-- section for sidebar dashboard -->
@section('side-dashboard')
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
@endsection

<!-- section for sidebar kategori -->
@section('side-kategori')
    <!-- Nav Item - Kategori -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/kategori') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Kategori</span></a>
    </li>
@endsection

<!-- section for sidebar produk -->
@section('side-produk')
    <!-- Nav Item - Kategori -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/produk') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Produk</span></a>
    </li>
@endsection

<!-- section for content -->
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Produk</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">

                <!-- DataTales Produk -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <a href="#" class="btn btn-sm btn-primary mt-3 shadow-sm" onClick="addProduk()">
                            <i class="fas fa-plus fa-sm text-white-50"></i> add
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center data-table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Kode Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Tanggal Register</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @foreach ($produk as $prd)
                                        <tr>
                                            <td class="text-center">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $prd->id_kategori }}
                                            </td>
                                            <td>
                                                {{ $prd->kode_produk }}
                                            </td>
                                            <td>
                                                {{ $prd->nama_produk }}
                                            </td>
                                            <td>
                                                {{ $prd->tgl_register }}
                                            </td>
                                            <td class="text-center">
                                                <a href="" class="btn btn-sm btn-success shadow-sm">
                                                    <i class="fas fa-edit fa-sm text-white-50"></i> edit
                                                </a>
                                                <a href="" class="btn btn-sm btn-danger shadow-sm">
                                                    <i class="fas fa-trash fa-sm text-white-50"></i> delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody> --}}
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formProduk">
                        <input type="text" name="id" hidden>
                        <input type="text" name="produk" hidden>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" id="id_kategori">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kode Produk</label>
                            <input type="text" class="form-control" id="kode_produk" name="kode_produk">
                        </div>
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="saveSubmit()" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })

        $(document).ready(function() {
            table()
        });

        function table() {
            $('.data-table').DataTable({
                destroy: true,
                processing: true,
                serverSide: true,
                dom: 'Bfrtip',
                ajax: "{{ route('produk_table') }}",
                buttons: [
                    'csv', 'excel', 'pdf'
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'id_kategori',
                        name: 'id_kategori'
                    },
                    {
                        data: 'kode_produk',
                        name: 'kode_produk'
                    },
                    {
                        data: 'nama_produk',
                        name: 'nama_produk'
                    },
                    {
                        data: 'tgl_register',
                        name: 'tgl_register'
                    },
                    {
                        data: 'action',
                        name: 'action',
                    },
                ]
            });
        }

        function addProduk() {
            $("#modalProduk").modal("show")
            $("[name=id]").val("")
            $("[name=produk]").val("add")
            $("[name=nama_produk]").val("")
            $(".modal-title").text("Tambah produk")
        }

        function edit(id) {
            $("#modalProduk").modal("show")
            $("[name=id]").val(id)
            $("[name=produk]").val("edit")
            $(".modal-title").text("Edit produk")
            $.ajax({
                url: "/produk_edit/" + id,
                dataType: "json",
                success: function(data) {
                    $("[name=nama_produk]").val(data.nama_produk)
                }
            })
        }

        function deleteRow(id) {
            if (confirm("Are you sure?")) {
                $.ajax({
                    url: "/produk_delete/" + id,
                    method: "POST",
                    dataType: "json",
                    success: function(data) {
                        alert('success delete data')
                        table()
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                })
            }
            return false;
        }

        function saveSubmit() {
            $.ajax({
                url: "/produk_save",
                data: $('#formproduk').serialize(),
                method: "POST",
                dataType: "json",
                success: function(data) {
                    alert('success save data')
                    table()
                    $("#modalProduk").modal("hide")
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            })
        }
    </script>
    <!-- /.container-fluid -->
@endsection

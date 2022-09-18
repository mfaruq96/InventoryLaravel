<!-- section for layout -->
@extends('layouts.main')

<!-- section fof title -->
@section('title', 'Inventory Laravel | Kategori')

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
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/kategori') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Kategori</span></a>
    </li>
@endsection

<!-- section for sidebar produk -->
@section('side-produk')
    <!-- Nav Item - Kategori -->
    <li class="nav-item">
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
            <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">

                <!-- DataTales Kategori -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <a href="#" class="btn btn-sm btn-primary mt-3 shadow-sm" onClick="addKategori()">
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formKategori">
                        <input type="text" name="id" hidden>
                        <input type="text" name="kategori" hidden>
                        <div class="form-group">
                            <label>Nama kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori">
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
                ajax: "{{ route('kategori_table') }}",
                buttons: [
                    'csv', 'excel', 'pdf'
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_kategori',
                        name: 'nama_kategori'
                    },
                    {
                        data: 'action',
                        name: 'action',
                    },
                ]
            });
        }

        function addKategori() {
            $("#modalKategori").modal("show")
            $("[name=id]").val("")
            $("[name=kategori]").val("add")
            $("[name=nama_kategori]").val("")
            $(".modal-title").text("Tambah Kategori")
        }

        function edit(id) {
            $("#modalKategori").modal("show")
            $("[name=id]").val(id)
            $("[name=kategori]").val("edit")
            // $("[name=name_kategori]").val("")
            $(".modal-title").text("Edit Kategori")
            $.ajax({
                url: "/kategori_edit/" + id,
                dataType: "json",
                success: function(data) {
                    $("[name=nama_kategori]").val(data.nama_kategori)
                }
            })
        }

        function deleteRow(id) {
            if (confirm("Are you sure?")) {
                $.ajax({
                    url: "/kategori_delete/" + id,
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
                url: "/kategori_save",
                data: $('#formKategori').serialize(),
                method: "POST",
                dataType: "json",
                success: function(data) {
                    alert('success save data')
                    table()
                    $("#modalKategori").modal("hide")
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            })
        }
    </script>
    <!-- /.container-fluid -->
@endsection

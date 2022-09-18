<!-- section for layout -->
@extends('layouts.main')

<!-- section fof title -->
@section('title', "Inventory Laravel | Inventory")

<!-- section for sidebar dashboard -->
@section('side-dashboard')
<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="{{ url('/home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
@endsection

<!-- section for sidebar iventory -->
@section('side-inventory')
<!-- Nav Item - Inventory -->
<li class="nav-item active">
    <a class="nav-link" href="{{ url('/inventory') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Inventory</span></a>
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
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Kategori</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 mb-3 justify-content-end">
                        <a href="#" class="btn btn-sm btn-primary mt-3 shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Add
                        </a>
                        <a href="#" class="btn btn-sm btn-primary mt-3 shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Add
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>1</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-sm btn-success shadow-sm">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> edit
                                    </a>
                                    <a href="" class="btn btn-sm btn-danger shadow-sm">
                                        <i class="fas fa-trash fa-sm text-white-50"></i> delete
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

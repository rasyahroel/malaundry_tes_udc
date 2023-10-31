@extends('layouts.app')

@section('title-app', 'Satuan Unit')

@section('title', 'Satuan Unit')

@section('content')

    <!-- Card header -->
    <div class="card-header border-0 d-flex justify-content-between align-items-center">
        <h3 class="card-title">Satuan Unit</h3>
        <div class="ml-auto">
            <a href="satuans" class="btn text-light px-5 mr-4 m-2" style="background-color: #00c0ee">REFRESH</a>
            <button class="btn btn-light px-5 m-2" style="background-color: #f4f4f4" data-bs-toggle="modal"
                data-bs-target="#myModal"><i class="bi bi-plus-lg"></i> Create</button>
        </div>
    </div>
    <!-- /.card-header -->

    <!-- Modal -->
    <!-- Modal Create -->
    @include('modal.satuan.add')

    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead class="text-light" style="background-color: #50C227; box-shadow: 0px 3px 0px rgba(0, 0, 0, 1);">
                <tr>
                    <th>Satuan Unit</th>
                    <th>Deskripsi</th>
                    <th class="text-center">Aktif</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($satuanList as $data)
                    <tr>
                        <td>{{ $data->unit }}</td>
                        <td>{{ $data->desc }}</td>
                        <td class="text-center">

                            @if ($data->status === 'Aktif')
                                <button class="btn text-light"
                                    style="background-color: #05a55a">{{ $data->status }}</button>
                            @else
                                <button class="btn btn-danger">{{ $data->status }}</button>
                            @endif

                        </td>

                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" style="background-color: #50C227">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $data->id }}"><i class="bi bi-info-lg mr-2"
                                                style="color: #62a4f6"></i>
                                            Detail</a>
                                    </li>

                                    @if ($data->status == 'Aktif')
                                        <li>
                                            <a class="dropdown-item" href="/satuan/updateStatus/{{ $data->id }}">
                                                <i class="bi bi-power text-danger fw-bold mr-2"></i>
                                                Nonaktif
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a class="dropdown-item" href="/satuan/updateStatus/{{ $data->id }}">
                                                <i class="bi bi-power fw-bold mr-2" style="color: #50C227"></i>
                                                Aktif
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </td>
                    </tr>

                    {{--  Modal Update  --}}
                    @include('modal.satuan.edit')
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

@endsection

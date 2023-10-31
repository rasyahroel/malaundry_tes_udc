@extends('layouts.app')

@section('title-app', 'Paket Kuota')

@section('title', 'Paket Kuota')

@section('content')

    <!-- Card header -->
    <div class="card-header border-0 d-flex justify-content-between align-items-center">
        <form action="/laundrys/filter" method="GET" class="w-100">
            <div class="row">
                <div class="col-md-3">
                    <label class="">Dari</label>
                    <input type="date" id="fromDate" name="start_date" class="form-control">
                    @error('created_at')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="">Sampai</label>
                    <input type="date" id="toDate" name="end_date" class="form-control">
                    @error('updated_at')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-2 mt-2">
                    <button id="filterButton" type="submit" class="btn btn-light mt-4"
                        style="width: 75%; background-color: #f4f4f4">
                        Filter
                    </button>
                </div>

                <div class="col-md-4">
                    <label for="">Export</label>
                    <br>
                    <div class="row">
                        <button type="button" class="btn text-light" style="background-color: #05a55a">
                            <i class="bi bi-file-earmark-excel"></i> Excel
                        </button>
                        <button type="button" class="btn btn-danger ml-2">
                            <i class="bi bi-file-earmark-pdf"></i> PDF
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <div class="ml-auto mt-2">
            <div class="d-flex flex-row align-items-center mt-4">
                <a href="laundrys" class="btn text-light px-5 mr-4 m-2" style="background-color: #00c0ee">REFRESH</a>
                <button class="btn btn-light px-5 " style="background-color: #f4f4f4" data-bs-toggle="modal"
                    data-bs-target="#addLaundry">
                    Create
                </button>
            </div>
        </div>
    </div>


    <!-- /.card-header -->

    <!-- Modal -->
    <!-- Modal Create -->
    @include('modal.laundry.add')

    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead class="text-light" style="background-color: #50C227; box-shadow: 0px 3px 0px rgba(0, 0, 0, 1);">
                <tr>
                    <th>Paket Kuota</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Cabang</th>
                    <th>Created At</th>
                    <th class="text-center">Aktif</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($filteredList as $data)
                    <tr>
                        <td>{{ $data->kuota }}</td>
                        <td>{{ $data->berat }} Kg</td>
                        <td class="rupiah">{{ $data->price }}</td>
                        <td>
                            <ul>
                                <li>MLPTI {{ $data->cabang }}</li>
                            </ul>
                        </td>
                        <td>{{ $data->created_at }}</td>
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
                                            data-bs-target="#editLaundry{{ $data->id }}"><i class="bi bi-info-lg mr-2"
                                                style="color: #62a4f6"></i>
                                            Detail</a>
                                    </li>

                                    @if ($data->status == 'Aktif')
                                        <li>
                                            <a class="dropdown-item" href="/laundry/updateStatus/{{ $data->id }}">
                                                <i class="bi bi-power text-danger fw-bold mr-2"></i>
                                                Nonaktif
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a class="dropdown-item" href="/laundry/updateStatus/{{ $data->id }}">
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
                    @include('modal.laundry.edit')
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

@endsection

<div class="modal fade" id="editLaundry{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-3 pt-4">
            <form action="/laundry/{{ $data->id }}" method="POST" class="p-2">
                @csrf
                @method('PUT')

                <div class="modal-body border">
                    <div class="mb-3">
                        <h5 class="modal-title" id="exampleModalLabel">Paket Kuota</h5>
                    </div>

                    <div class="mb-3">
                        <label for="kuota" class="form-label">Paket Kuota <span class="text-danger">*</span></label>
                        <select name="kuota" id="class" class="form-control">

                            @foreach (['Cuci Setrika', 'Setrika', 'Cuci'] as $enumValue)
                                <option value="{{ $enumValue }}" {{ $data->kuota == $enumValue ? 'selected' : '' }}>
                                    {{ $enumValue }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="berat" class="form-label">Berat <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="berat" name="berat"
                                value="{{ $data->berat }}">
                        </div>
    
                        <div class="col-md-6 mb-3">
                            <label for="satuans_id" class="form-label">Satuan Unit <span
                                    class="text-danger">*</span></label>
                            <select name="satuans_id" id="class" class="form-control">
    
                                @foreach ($satuan as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $data->satuans_id ? 'selected' : '' }}>
                                        {{ $item->unit }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Harga <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="price" name="price"
                            value="{{ $data->berat }}">
                    </div>

                    <div class="mb-3">
                        <label for="cabang" class="form-label">Cabang <span class="text-danger">*</span></label>
                        <select name="cabang" id="class" class="form-control">

                            @foreach (['Tangerang', 'Bekasi'] as $enumValue)
                                <option value="{{ $enumValue }}"
                                    {{ $data->cabang == $enumValue ? 'selected' : '' }}>
                                    {{ $enumValue }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn border-0" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn text-light" style="background-color: #f39c12">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

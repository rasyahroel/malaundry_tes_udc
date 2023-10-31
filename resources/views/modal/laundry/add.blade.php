<div class="modal fade" id="addLaundry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-2 pt-4">
            <form action="laundry" method="POST" class="p-2">
                @csrf

                <div class="modal-body border">
                    <div class="mb-3">
                        <h5 class="modal-title" id="exampleModalLabel">Paket Kuota</h5>
                    </div>

                    <div class="mb-3">
                        <label for="kuota" class="form-label">Paket Kuota <span class="text-danger">*</span></label>
                        <select class="form-control @error('kuota') is-invalid @enderror" name="kuota"
                            value="{{ old('kuota') }}">
                            <option value="">Pilih Paket Kuota</option>
                            <option value="Cuci Setrika" {{ old('kuota') == 'Cuci Setrika' ? 'selected' : '' }}>Cuci
                                Setrika</option>
                            <option value="Setrika" {{ old('kuota') == 'Setrika' ? 'selected' : '' }}>Setrika</option>
                            <option value="Cuci" {{ old('kuota') == 'Cuci' ? 'selected' : '' }}>Cuci</option>
                        </select>

                        @error('kuota')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="berat" class="form-label">Berat <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('berat') is-invalid @enderror"
                                id="berat" name="berat" placeholder="Berat" value="{{ old('berat') }}">

                            @error('berat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="satuans_id" class="form-label">Satuan Unit <span
                                    class="text-danger">*</span></label>
                            <select name="satuans_id" id="class"
                                class="form-control @error('satuans_id') is-invalid @enderror">
                                <option value="">Satuan Unit</option>

                                @foreach ($satuan as $item)
                                    @if ($item->status == 'Aktif')
                                        <option value="{{ $item->id }}"
                                            {{ old('satuans_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->unit }}
                                        </option>
                                    @endif
                                @endforeach
                                
                                @if ($satuan->where('status', '=', 'Aktif')->count() === 0)
                                    <option value="" disabled>Tidak ada data item</option>
                                @endif
                            </select>

                            @error('satuans_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Harga <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                            name="price" placeholder="Harga" value="{{ old('price') }}">

                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cabang" class="form-label">Cabang <span class="text-danger">*</span></label>
                        <select name="cabang" id="class"
                            class="form-control @error('cabang') is-invalid @enderror">
                            <option value="">Pilih Cabang</option>
                            <option value="Tangerang" {{ old('cabang') == 'Tangerang' ? 'selected' : '' }}>Tangerang
                            </option>
                            <option value="Bekasi" {{ old('cabang') == 'Bekasi' ? 'selected' : '' }}>Bekasi</option>
                        </select>


                        @error('cabang')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn border-0" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn text-light" style="background-color: #50C227">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

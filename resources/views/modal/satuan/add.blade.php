<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-2 pt-4">
            <form action="satuan" method="POST" class="p-2">

                @csrf
                
                <div class="modal-body border">
                    <div class="mb-3">
                        <h5 class="modal-title" id="exampleModalLabel">Satuan Unit</h5>
                    </div>

                    <div class="mb-3">
                        <label for="unit" class="form-label">Satuan Unit <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('unit') is-invalid @enderror" id="unit"
                            name="unit" value="{{ old('unit') }}">

                        @error('unit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="desc" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" cols="30"
                            rows="3">{{ old('desc') }}</textarea>

                        @error('desc')
                            <div class="invalid-feedback">{{ $message }}</div>
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

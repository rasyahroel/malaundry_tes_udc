<div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-3 pt-4">
            <form action="/satuan/{{ $data->id }}" method="POST" class="p-2">
                @csrf
                @method('PUT')

                <div class="modal-body border">
                    <div class="mb-3">
                        <h5 class="modal-title" id="exampleModalLabel">Satuan Unit</h5>
                    </div>
                    <div class="mb-3">
                        <label for="unit" class="form-label">Satuan Unit <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="unit" name="unit"
                            value="{{ $data->unit }}">
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="desc" id="desc" cols="30" rows="3">{{ $data->desc }}</textarea>
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

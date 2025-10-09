<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            កែប្រែសាខា
        </h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-center mb-3">
                <div class="mr-4 position-relative" style="width: 120px; height: 120px;">
                    @if ($preview_branch_img)
                        <img src="{{ $preview_branch_img->temporaryUrl() }}"
                            class="profile-user-img img-fluid img-circle w-100 h-100" style="object-fit: cover;">
                    @elseif($branch_img)
                        <img src="{{ $branch_img }}" class="profile-user-img img-fluid img-circle w-100 h-100"
                            style="object-fit: cover;">
                    @else
                        <img src="{{ asset('default.png') }}" class="profile-user-img img-fluid img-circle w-100 h-100"
                            style="object-fit: cover;">
                    @endif
                    <div wire:loading wire:target="preview_branch_img" class="position-absolute"
                        style="top:0; left:0; width:100%; height:100%;">
                        <div class="d-flex justify-content-center align-items-center w-100 h-100"
                            style="background: rgba(255,255,255,0.8); border-radius: 50%;">
                            <div class="spinner-border text-info"></div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" wire:model="preview_branch_img">
                        <label class="custom-file-label">សូមបញ្ចូលរូបថត</label>
                        @error('branch_img')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>ឈ្មោះ</label>
                <input wire:model="kh_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះ">
                @error('kh_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>ឈ្មោះឡាតាំង</label>
                <input wire:model="en_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះឡាតាំង">
                @error('en_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info float-right"><i class="fa fa-save mr-1"></i> កែប្រែ</button>
        </div>
    </form>
</div>

@script
    <script>
        $wire.on("update_fail", (event) => {
            Swal.fire({
                title: "មានបញ្ហា!",
                text: event.message,
                icon: "error",
                confirmButtonText: "អូខេ",
                confirmButtonColor: "#dc3545"
            });
        });
    </script>
@endscript

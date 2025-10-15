<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">កែប្រែតួនាទី</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>ឈ្មោះឡាតាំង</label>
                    <input wire:model="name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះឡាតាំង">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 form-group">
                    <label>ឈ្មោះខ្មែរ</label>
                    <input wire:model="kh_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះខ្មែរ">
                    @error('kh_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>ជ្រើសរើសមុខងារប្រព័ន្ធ</label>
                <div>
                    @if ($selected_permissions)
                        @foreach ($selected_permissions as $selected_permission)
                            <span class="list-inline-item badge badge-primary">
                                {{ $selected_permission }}
                            </span>
                        @endforeach
                    @else
                        <p class="text-muted">គ្មានតួនាទីក្នុងប្រព័ន្ធ</p>
                    @endif
                </div>
                @error('selected_permissions')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <div class="d-flex flex-wrap align-items-center">
                    @foreach ($permissions as $permission)
                        <div wire:key="{{ $permission->id }}" class="custom-control custom-checkbox mr-4">
                            <input class="custom-control-input" type="checkbox" id="{{ $permission->name }}"
                                value="{{ $permission->name }}" wire:model.live="selected_permissions">
                            <label for="{{ $permission->name }}" class="custom-control-label">
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
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
                icon: "error"
                confirmButtonText: "អូខេ",
                confirmButtonColor: "#dc3545"
            });
        });
    </script>
@endscript

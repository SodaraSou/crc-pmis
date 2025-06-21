<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">កែប្រែអ្នកប្រើប្រាស់</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>ឈ្មោះខ្មែរ</label>
                    <input wire:model="kh_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះខ្មែរ">
                    @error('kh_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 form-group">
                    <label>ឈ្មោះឡាតាំង</label>
                    <input wire:model="name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះឡាតាំង">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>អុីម៉ែល</label>
                    <input wire:model="email" class="form-control" placeholder="សូមបញ្ចូលអុីម៉ែល">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 form-group">
                    <label>លេខទូរស័ព្ទ</label>
                    <input wire:model="phone_number" class="form-control" placeholder="សូមបញ្ចូលលេខទូរស័ព្ទ">
                    @error('phone_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>លំដាប់អ្នកប្រើប្រាស់</label>
                    <select wire:model.live="user_level_id" class="form-control">
                        <option value="">សូមជ្រើសរើសលំដាប់អ្នកប្រើប្រាស់</option>
                        @foreach ($user_levels as $user_level)
                            <option wire:key="{{ $user_level->id }}" value="{{ $user_level->id }}">
                                {{ $user_level->kh_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_level_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 form-group">
                    <label>តួនាទី</label>
                    <select wire:model="selected_role" class="form-control">
                        <option value="">សូមជ្រើសរើសតួនាទី</option>
                        @foreach ($roles as $role)
                            <option wire:key="{{ $role->id }}" value="{{ $role->name }}">
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('selected_role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-4">
                @if ($user_level_id == 2 || $user_level_id == 3)
                    <div class="col-12 col-md-6 form-group">
                        <label>សាខា</label>
                        <select wire:model.live="branch_id" class="form-control">
                            <option value="">សូមជ្រើសរើសសាខា</option>
                            @foreach ($branches as $branch)
                                <option wire:key="{{ $branch->id }}" value="{{ $branch->id }}">
                                    {{ $branch->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('branch_id')
                            <span class="text-danger">{{ $errors->first('branch_id') }}</span>
                        @enderror
                    </div>
                @endif
                @if ($user_level_id == 3)
                    <div class="col-12 col-md-6 form-group">
                        <label>អនុសាសា</label>
                        <select wire:model="sub_branch_id" class="form-control">
                            <option value="">សូមជ្រើសរើសអនុសាខា</option>
                            @foreach ($sub_branches as $sub_branch)
                                <option wire:key="{{ $sub_branch->id }}" value="{{ $sub_branch->id }}">
                                    {{ $sub_branch->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('sub_branch_id')
                            <span class="text-danger">{{ $errors->first('sub_branch_id') }}</span>
                        @enderror
                    </div>
                @endif
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>លេខសម្ងាត់</label>
                    <input type="password" wire:model="password" class="form-control" placeholder="សូមបញ្ចូលលេខសម្ងាត់">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info"><i class="fa fa-save mr-1"></i> កែប្រែ</button>
        </div>
    </form>
</div>

@script
    <script>
        window.addEventListener("update_fail", event => {
            Swal.fire({
                title: "មានបញ្ហា!",
                text: event.detail.message,
                icon: "error",
                confirmButtonText: "អូខេ",
                confirmButtonColor: "#dc3545"
            });
        });
    </script>
@endscript

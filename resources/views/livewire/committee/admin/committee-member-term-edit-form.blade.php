<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">កែប្រែអាណត្តិសមាជិក</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>ថ្នាក់គណ:កិត្តិយស<span class="text-danger">*</span></label>
                    <select wire:model.live="committee_level_id" class="form-control">
                        <option value="">សូមជ្រើសរើសថ្នាក់</option>
                        @foreach ($committee_levels as $committee_level)
                            <option wire:key="{{ $committee_level->id }}" value="{{ $committee_level->id }}">
                                {{ $committee_level->kh_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('committee_level_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 form-group">
                    <label>គណ:កិត្តិយស<span class="text-danger">*</span></label>
                    <select wire:model.live="committee_id" class="form-control">
                        <option value="">សូមជ្រើសរើសថ្នាក់</option>
                        @foreach ($committees as $committee)
                            <option wire:key="{{ $committee->id }}" value="{{ $committee->id }}">
                                {{ $committee->kh_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('committee_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-4 form-group">
                    <label>អាណត្តិ<span class="text-danger">*</span></label>
                    <select wire:model="term_id" class="form-control">
                        <option value="">សូមជ្រើសរើសអាណត្តិ</option>
                        @foreach ($terms as $term)
                            <option wire:key="{{ $term->id }}" value="{{ $term->id }}">
                                {{ $term->kh_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('term_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>តួនាទី<span class="text-danger">*</span></label>
                    <select wire:model="committee_position_id" class="form-control">
                        <option value="">សូមជ្រើសរើសតួនាទី</option>
                        @foreach ($committee_positions as $committee_position)
                            <option wire:key="{{ $committee_position->id }}" value="{{ $committee_position->id }}">
                                {{ $committee_position->kh_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('committee_position_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>តួនាទីក្នុងរដ្ឋាភិបាល<span class="text-danger">*</span></label>
                    <input wire:model="gov_position" class="form-control" placeholder="សូមបញ្ចូលតួនាទីក្នុងរដ្ឋាភិបាល">
                    @error('gov_position')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>លំដាប់សមាជិក</label>
                    <input wire:model="member_position_order" class="form-control" placeholder="សូមបញ្ចូលលំដាប់់តួនាទី">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info float-right"><i class="fa fa-save mr-1"></i>
                រក្សាទុក</button>
        </div>
    </form>
</div>

@script
    <script>
        $(function() {
            $('.select2').select2({
                theme: 'bootstrap4'
            });
        });

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

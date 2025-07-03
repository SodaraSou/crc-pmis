<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">ផ្លាស់តួនាទីបុគ្គលិក</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-12 col-md-4 form-group">
                    <label>ការិយាល័យ</label>
                    <select wire:model="office_id" class="form-control">
                        <option value="">សូមជ្រើសរើសការិយាល័យ</option>
                        @foreach ($offices as $office)
                            <option wire:key="{{ $office->id }}" value="{{ $office->id }}">
                                {{ $office->kh_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('office_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>តួនាទី<span class="text-danger">*</span></label>
                    <select wire:model="position_id" class="form-control">
                        <option value="">សូមជ្រើសរើសតួនាទី</option>
                        @foreach ($positions as $position)
                            <option wire:key="{{ $position->id }}" value="{{ $position->id }}">
                                {{ $position->kh_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('position_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>ឈ្មោះតួនាទី (Optional)</label>
                    <input wire:model="opt_position_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះតួនាទី">
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save mr-1"></i> រក្សាទុក</button>
        </div>
    </form>
</div>

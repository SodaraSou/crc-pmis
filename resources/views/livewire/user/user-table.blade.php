<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-4 form-group">
                    <label>ស្វែងរក</label>
                    <input wire:model.live.debounce.500ms="search" type="text" class="form-control"
                           placeholder="ស្វែងរកអ្នកប្រើប្រាស់"/>
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>នាយកដ្ឋាន</label>
                    <select wire:model.live="department_id" class="form-control">
                        <option value="">ជ្រើសរើសនាយកដ្ឋាន</option>
                        @foreach ($departments as $department)
                            <option wire:key="{{ $department->id }}" value="{{ $department->id }}">
                                {{ $department->kh_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>ចំនួនមួយទំព័រ</label>
                    <select wire:model.live='per_page' class="form-control">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    
                </div>
                <div><a href="#" wire:click.prevent="resetFilter" class="btn btn-primary">Filter</a></div>
            </div>
        </div>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">អ្នកប្រើប្រាស់</h3>
                <a href="{{ route('user.create') }}" class="btn btn-success"><i class="fa fa-plus mr-1"></i>
                    បង្កើត</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        ឈ្មោះខ្មែរ
                    </th>
                    <th>
                        ឈ្មោះឡាតាំង
                    </th>
                    <th class="text-center">សកម្មភាព</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr wire:key='{{ $user->id }}'>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->kh_name }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn-primary mr-2">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-info mr-2">
                                    <i class="fa fa-pen" aria-hidden="true"></i>
                                </a>
                                {{-- <button class="btn btn-sm btn-danger"
                                    wire:click="$dispatch('alert-delete', {id: {{ $user->id }}})">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button> --}}
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $users->links() }}
        </div>
    </div>
</div>

<div class="content">
    @include('livewire.group.group-update')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        @include('livewire.group.group-create')
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success" style="margin-top:30px;">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="table-responsive text-center">
                            <input type="text"  class="form-control mb-4" placeholder="Search by Group" wire:model="searchTerm" />
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Group</th>
                                        <th>Group Code</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($groups as $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->group }}</td>
                                            <td>{{ $value->group_code }}</td>
                                            <td>
                                                <button data-toggle="modal" data-target="#updateModal"
                                                    wire:click="edit({{ $value->id }})"
                                                    class="btn btn-primary btn-sm">Edit</button>
                                                <button wire:click="delete({{ $value->id }})"
                                                    class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4">Data Not Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right">
                            {{ $groups->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

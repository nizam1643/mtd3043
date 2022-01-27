<div class="content">
    @include('livewire.user.user-update')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        @include('livewire.user.user-create')
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success" style="margin-top:30px;">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="table-responsive text-center">
                            <input type="text"  class="form-control mb-4" placeholder="Search by Name" wire:model="searchTerm" />
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->system_level }}</td>
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
                                        <td colspan="8" class="text">Data Not Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

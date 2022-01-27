<div class="content">
    @include('livewire.year.year-update')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        @include('livewire.year.year-create')
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success" style="margin-top:30px;">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="table-responsive text-center">
                            <input type="text"  class="form-control mb-4" placeholder="Search by Year" wire:model="searchTerm" />
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Year</th>
                                        <th>Batch Code</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($years as $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->year }}</td>
                                            <td>{{ $value->batch_code }}</td>
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
                            {{ $years->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

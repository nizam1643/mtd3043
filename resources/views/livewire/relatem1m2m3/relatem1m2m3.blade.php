<div class="content">
    @include('livewire.relatem1m2m3.relatem1m2m3-update')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        @include('livewire.relatem1m2m3.relatem1m2m3-create')
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success" style="margin-top:30px;">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="table-responsive text-center">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Year</th>
                                        <th>Group</th>
                                        <th>Subject</th>
                                        <th>Teacher</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($relates as $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->m1_id }}</td>
                                            <td>{{ $value->m2_id }}</td>
                                            <td>{{ $value->m3_id }}</td>
                                            <td>{{ $value->user_id }}</td>
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
                                        <td colspan="6" class="text">Data Not Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

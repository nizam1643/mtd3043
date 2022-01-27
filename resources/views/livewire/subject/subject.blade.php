<div class="content">
    @include('livewire.subject.subject-update')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        @include('livewire.subject.subject-create')
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success" style="margin-top:30px;">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="table-responsive text-center">
                            <input type="text"  class="form-control mb-4" placeholder="Search by Subject" wire:model="searchTerm" />
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Subject</th>
                                        <th>Subject Code</th>
                                        <th>Description</th>
                                        <th>Thumbnail Image</th>
                                        <th>Year</th>
                                        <th>Group</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($subjects as $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->subject }}</td>
                                            <td>{{ $value->subject_code }}</td>
                                            <td>{{ $value->desc }}</td>
                                            <td><img src="{{ asset('storage/'.$value->thumbnail) }}" class="img-thumbnail" width="50px" height="50px" alt="{{ $value->thumbnail }}"></td>
                                            <td>{{ $value->year->year }} ({{ $value->year->batch_code }})</td>
                                            <td>{{ $value->group->group }} ({{ $value->group->group_code }})</td>
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
                            {{ $subjects->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

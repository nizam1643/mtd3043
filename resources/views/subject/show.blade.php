@extends('layout.user')

@section('style')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0"><b>SUBJECT:</b> {{ $data->subject }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="position-relative mb-4">
                                <img src="{{ asset('storage/'.$data->thumbnail) }}" alt="{{ $data->thumbnail }}" class="img-fluid">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div class="ribbon bg-success text-lg">
                                    {{ $data->year->year }}
                                    </div>
                                </div>
                            </div>
                            <h6 class="card-title"><b>CODE:</b> {{ $data->subject_code }} | <b>TEACHER:</b> {{ $data->subject_code }} </h6>
                            <p class="card-text"><b>DESC:</b> {{ $data->desc }}</p>
                        </div>
                    </div>
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0"><b>VIRTUAL TOOL</b></h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('subject.note.virtual', $data->id) }}" method="POST">
                            @csrf
                                <button type="submit" class="btn btn-block btn-primary">Virtual Class Meet</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                      <h3 class="card-title"><b>NOTE & MATERIAL</b></h3>
                                      <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                        </button>
                                      </div>
                                    </div>
                                    <div class="card-body">
                                        @if (Auth::user()->system_level == 1 || Auth::user()->system_level == 2)
                                            <button type="button" class="btn btn-block btn-primary float-right mb-4" data-toggle="modal" data-target="#exampleModal">
                                                CREATE
                                            </button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('subject.note.store') }}" method="POST">
                                                            <div class="modal-body">
                                                                @csrf
                                                                <input hidden type="text" value="{{ $data->id }}" name="subject_id" id="subject_id">
                                                                <div class="form-group">
                                                                    <label for="title">Title</label>
                                                                    <input id="title" name="title" type="text" class="form-control" required="required">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="desc">Description</label>
                                                                    <textarea id="desc" name="desc" type="text" class="form-control" required="required"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="url">URL</label>
                                                                    <input id="url" name="url" type="url" class="form-control" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary close-modal">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            @forelse ($data->note as $item)
                                                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('subject.note.edit', $item->id) }}" method="POST">
                                                                <div class="modal-body">
                                                                    @csrf
                                                                    <input hidden type="text" value="{{ $data->id }}" name="subject_id" id="subject_id">
                                                                    <div class="form-group">
                                                                        <label for="title">Title</label>
                                                                        <input id="title" name="title" type="text" value="{{ $item->title }}" class="form-control" required="required">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="desc">Description</label>
                                                                        <textarea id="desc" name="desc" type="text" class="form-control" required="required">{{ $item->title }}</textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="url">URL</label>
                                                                        <input id="url" name="url" type="url" class="form-control" value="{{ $item->url }}" required="required">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary close-modal">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty

                                            @endforelse
                                        @endif
                                        <div class="table-responsive">
                                            <table id="example1" class="table table-bordered">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Title</th>
                                                        <th class="text-center">Description</th>
                                                        <th class="text-center">URL</th>
                                                        @if (Auth::user()->system_level == 1 || Auth::user()->system_level == 2)
                                                            <th class="text-center">Action</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($data->note as $item)
                                                        <tr class="text-center">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->title }}</td>
                                                            <td>{{ $item->desc }}</td>
                                                            <td>
                                                                <a target="_blank" href="{{ $item->url }}" class="btn btn-primary">
                                                                    Go To URL
                                                                </a>
                                                            </td>
                                                            @if (Auth::user()->system_level == 1 || Auth::user()->system_level == 2)
                                                            <td>
                                                                <form action="{{ route('subject.note.destroy', $item->id) }}" method="post">
                                                                    @method('Delete')
                                                                    @csrf
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                                                        UPDATE
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                                                </form>
                                                            </td>
                                                            @endif
                                                        </tr>
                                                    @empty

                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                      <h3 class="card-title"><b>ASSIGNMENT & TUTORIAL</b></h3>
                                      <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                        </button>
                                      </div>
                                    </div>
                                    <div class="card-body">
                                        @if (Auth::user()->system_level == 1 || Auth::user()->system_level == 2)
                                            <button type="button" class="btn btn-block btn-primary float-right mb-4" data-toggle="modal" data-target="#exampleModalA">
                                                CREATE
                                            </button>
                                            <div class="modal fade" id="exampleModalA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('assignment.store') }}" method="POST">
                                                            <div class="modal-body">
                                                                @csrf
                                                                <input hidden type="text" value="{{ $data->id }}" name="subject_id" id="subject_id">
                                                                <div class="form-group">
                                                                    <label for="title">Title</label>
                                                                    <input id="title" name="title" type="text" class="form-control" required="required">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="desc">Description</label>
                                                                    <textarea id="desc" name="desc" type="text" class="form-control" required="required"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="url">URL</label>
                                                                    <input id="url" name="url" type="url" class="form-control" required="required">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="start">Start</label>
                                                                    <input id="start" name="start" type="date" class="form-control" required="required">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="end">End</label>
                                                                    <input id="end" name="end" type="date" class="form-control" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary close-modal">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            @forelse ($data->assignment as $item)
                                                <div class="modal fade" id="exampleModalA{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('assignment.edit', $item->id) }}" method="POST">
                                                                <div class="modal-body">
                                                                    @csrf
                                                                    <input hidden type="text" value="{{ $data->id }}" name="subject_id" id="subject_id">
                                                                    <div class="form-group">
                                                                        <label for="title">Title</label>
                                                                        <input id="title" name="title" type="text" value="{{ $item->title }}" class="form-control" required="required">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="desc">Description</label>
                                                                        <textarea id="desc" name="desc" type="text" class="form-control" required="required">{{ $item->title }}</textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="url">URL</label>
                                                                        <input id="url" name="url" type="url" class="form-control" value="{{ $item->url }}" required="required">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="start">Start</label>
                                                                        <input id="start" name="start" type="date" class="form-control" value="{{ $item->start }}" required="required">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="end">End</label>
                                                                        <input id="end" name="end" type="date" class="form-control" value="{{ $item->end }}" required="required">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary close-modal">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty

                                            @endforelse
                                        @endif
                                        <div class="table-responsive">
                                            <table id="example1A" class="table table-bordered">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Title</th>
                                                        <th class="text-center">Description</th>
                                                        <th class="text-center">Date</th>
                                                        <th class="text-center">URL</th>
                                                        @if (Auth::user()->system_level == 3)
                                                            <th class="text-center">Submit</th>
                                                        @endif
                                                        @if (Auth::user()->system_level == 1 || Auth::user()->system_level == 2)
                                                            <th class="text-center">List Submission</th>
                                                            <th class="text-center">Action</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($data->assignment as $item)
                                                        <tr class="text-center">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->title }}</td>
                                                            <td>{{ $item->desc }}</td>
                                                            <td>Start:{{ $item->start }} <br>End:{{ $item->end }}</td>
                                                            <td>
                                                                <a target="_blank" href="{{ $item->url }}" class="btn btn-primary">
                                                                    Go To URL
                                                                </a>
                                                            </td>
                                                            @if (Auth::user()->system_level == 3)
                                                                <td>
                                                                    @php
                                                                        $check_submit = Illuminate\Support\Facades\DB::table('m6_submits')
                                                                            ->where([['assignment_id',$item->id],['user_id',auth()->user()->id]])
                                                                            ->count();
                                                                    @endphp
                                                                    @if ($check_submit == NULL || $check_submit == 0)
                                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalB">
                                                                        Submit
                                                                    </button>
                                                                    @else
                                                                    <button type="button" class="btn btn-success">
                                                                        Success
                                                                    </button>
                                                                    @endif
                                                                    <div class="modal fade" id="exampleModalB" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form action="{{ route('submit.store') }}" method="POST">
                                                                                    <div class="modal-body">
                                                                                        @csrf
                                                                                        <input hidden type="text" value="{{ $data->id }}" name="subject_id" id="subject_id">
                                                                                        <input hidden type="text" value="{{ $item->id }}" name="assignment_id" id="assignment_id">
                                                                                        <input hidden type="text" value="{{ Auth::user()->id }}" name="user_id" id="user_id">
                                                                                        <div class="form-group">
                                                                                            <label for="url">URL</label>
                                                                                            <input id="url" name="url" type="url" class="form-control" required="required">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="submit" class="btn btn-primary close-modal">Save changes</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            @endif
                                                            @if (Auth::user()->system_level == 1 || Auth::user()->system_level == 2)
                                                            <td>
                                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalC{{ $item->id }}">
                                                                    List
                                                                </button>
                                                                <div class="modal fade" id="exampleModalC{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body text-left">
                                                                                <div class="accordion" id="accordionExample">
                                                                                    @forelse ($item->submit as $item1)
                                                                                        <ol>
                                                                                            <li>
                                                                                                Name: {{ $item1->user->name }} || <a target="_blank" href="{{ $item1->url }}">URL Submission</a>
                                                                                            </li>
                                                                                        </ol>
                                                                                    @empty

                                                                                    @endforelse
                                                                                  </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <form action="{{ route('assignment.destroy', $item->id) }}" method="post">
                                                                    @method('Delete')
                                                                    @csrf
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalA{{ $item->id }}">
                                                                        UPDATE
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                                                </form>
                                                            </td>
                                                            @endif
                                                        </tr>
                                                    @empty

                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h5 class="m-0"><b>LIST OF STUDENT</h5>
                                    </div>
                                    <div class="card-body">
                                        <ol>
                                            @forelse ($data->user->where('system_level', 3) as $itemlist)
                                                <li>{{ $itemlist->name }}</li>
                                            @empty

                                            @endforelse
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('script')
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": false,
            "lengthChange": true,
            "autoWidth": false,
            "paging": true,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $("#example1A").DataTable({
            "responsive": false,
            "lengthChange": true,
            "autoWidth": false,
            "paging": true,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection

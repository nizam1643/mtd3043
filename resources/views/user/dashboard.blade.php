@extends('layout.user')

@section('style')

@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Featured</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">Special title treatment</h6>

                            <p class="card-text">With supporting text below as a natural lead-in to additional content.
                            </p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="container-fluid">
                        @if (Auth::user()->id == 1)
                            <div class="row">
                                    @forelse ($admins as $value1)
                                        <div class="col-lg-6">
                                            <div class="card card-primary card-outline">
                                                <div class="card-header">
                                                    <h5 class="m-0"><b>SUBJECT:</b> {{ $value1->subject }}</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="position-relative mb-4">
                                                        <img src="{{ asset('storage/'.$value1->thumbnail) }}" alt="{{ $value1->thumbnail }}" class="img-fluid">
                                                        <div class="ribbon-wrapper ribbon-lg">
                                                        <div class="ribbon bg-success text-lg">
                                                            {{ $value1->year->year }}
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <h6 class="card-title"><b>CODE:</b> {{ $value1->subject_code }} | <b>TEACHER:</b> {{ $value1->subject_code }} </h6>

                                                    <p class="card-text"><b>DESC:</b> {{ $value1->desc }}</p>
                                                    @php $prodID= base64_encode(base64_encode($value1->id)); @endphp
                                                    <a href="{{ route('subject.note.show', $prodID) }}" class="btn btn-primary float-right">Go To Subject</a>
                                                </div>
                                            </div>
                                        </div>
                                    @empty

                                    @endforelse
                            </div>
                        @else
                        <div class="row">
                            @forelse ($datas as $data)
                                @forelse ($data->subject as $value1)
                                    <div class="col-lg-6">
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h5 class="m-0"><b>SUBJECT:</b> {{ $value1->subject }}</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="position-relative mb-4">
                                                    <img src="{{ asset('storage/'.$value1->thumbnail) }}" alt="{{ $value1->thumbnail }}" class="img-fluid">
                                                    <div class="ribbon-wrapper ribbon-lg">
                                                      <div class="ribbon bg-success text-lg">
                                                        {{ $value1->year->year }}
                                                      </div>
                                                    </div>
                                                </div>
                                                <h6 class="card-title"><b>CODE:</b> {{ $value1->subject_code }} | <b>TEACHER:</b> {{ $value1->subject_code }} </h6>

                                                <p class="card-text"><b>DESC:</b> {{ $value1->desc }}</p>
                                                @php $prodID= base64_encode(base64_encode($value1->id)); @endphp
                                                <a href="{{ route('subject.note.show', $prodID) }}" class="btn btn-primary float-right">Go To Subject</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty

                                @endforelse
                            @empty

                            @endforelse
                        </div>
                        @endif
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('script')

@endsection

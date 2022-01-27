@extends('layout.user')

@section('style')

@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Feedback Form</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('parentstore') }}" method="POST">
                            @csrf
                                <div class="form-group row">
                                  <label for="title" class="col-4 col-form-label">Title</label>
                                  <div class="col-8">
                                    <input id="title" name="title" type="text" class="form-control" required="required">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="select" class="col-4 col-form-label">Category</label>
                                  <div class="col-8">
                                    <select id="select" name="category" class="custom-select" required="required">
                                      <option value="">Please Choose</option>
                                      <option value="Complaint">Complaint</option>
                                      <option value="Suggestion ">Suggestion</option>
                                      <option value="General">General</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="content" class="col-4 col-form-label">Comment</label>
                                  <div class="col-8">
                                    <textarea id="content" name="content" cols="40" rows="5" class="form-control" required="required"></textarea>
                                  </div>
                                </div>
                                <input hidden type="text" name="user_id" value="{{ auth()->user()->id }}">
                                <div class="form-group row">
                                  <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                                </div>
                              </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="container-fluid">
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

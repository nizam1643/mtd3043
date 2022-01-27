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
                            <div class="table-responsive">
                                <form action="{{ route('studentstore') }}" method="POST">
                                @csrf
                                    <table class="table table-bordered text-center">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Question</th>
                                            <th scope="col">Bad</th>
                                            <th scope="col">Normal</th>
                                            <th scope="col">Good</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">1</th>
                                            <td>Teacher is prepared for class.</td>
                                            <td><input name="point1" type="radio" required="required" class="control-input" value="5"></td>
                                            <td><input name="point1" type="radio" required="required" class="control-input" value="10"></td>
                                            <td><input name="point1" type="radio" required="required" class="control-input" value="20"></td>
                                          </tr>
                                          <tr>
                                            <th scope="row">2</th>
                                            <td>Teacher knows his/her subject.</td>
                                            <td><input name="point2" type="radio" required="required" class="control-input" value="5"></td>
                                            <td><input name="point2" type="radio" required="required" class="control-input" value="10"></td>
                                            <td><input name="point2" type="radio" required="required" class="control-input" value="20"></td>
                                          </tr>
                                          <tr>
                                            <th scope="row">3</th>
                                            <td>Teacher gives me good feedback on homework and projects so that I can improve.</td>
                                            <td><input name="point3" type="radio" required="required" class="control-input" value="5"></td>
                                            <td><input name="point3" type="radio" required="required" class="control-input" value="10"></td>
                                            <td><input name="point3" type="radio" required="required" class="control-input" value="20"></td>
                                          </tr>
                                          <tr>
                                            <th scope="row">4</th>
                                            <td>Teacher is clear in giving directions and on explaining what is expected on assignments and tests.</td>
                                            <td><input name="point4" type="radio" required="required" class="control-input" value="5"></td>
                                            <td><input name="point4" type="radio" required="required" class="control-input" value="10"></td>
                                            <td><input name="point4" type="radio" required="required" class="control-input" value="20"></td>
                                          </tr>
                                          <tr>
                                            <th scope="row">5</th>
                                            <td>I have learned a lot from this teacher about this subject.</td>
                                            <td><input name="point5" type="radio" required="required" class="control-input" value="5"></td>
                                            <td><input name="point5" type="radio" required="required" class="control-input" value="10"></td>
                                            <td><input name="point5" type="radio" required="required" class="control-input" value="20"></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                    <input hidden type="hidden" name="student_id" value="{{ Auth::user()->id }}">
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="submit" type="submit" class="btn btn-primary float-right">Submit</button>
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

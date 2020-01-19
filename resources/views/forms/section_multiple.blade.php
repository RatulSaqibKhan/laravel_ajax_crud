@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Multiple Section Entry</h4>
        </div>
        <div class="card-body">
            {!! Form::open(['url' => '/sections/store-multiple', 'method' => 'POST', 'class' => 'common-form', 'autocomplete' => 'off']) !!}
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Class Name</th>
                                <th>Section Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-row">
                                <td>
                                    {!! Form::select('class_id[]', $student_classes, null, ['class' => 'form-control', 'placeholder' => 'Select Class Name']) !!}
                                    <span class="text-danger class_id"></span>
                                </td>
                                <td>
                                    {!! Form::text('name[]', null, ['class' => 'form-control', 'placeholder' => 'Section Name']) !!}
                                    <span class="text-danger name"></span>
                                </td>
                                <td>
                                    <div>
                                        <button type="button" class="btn btn-success btn-sm add-more-tr"><i
                                                    class="fa fa-plus"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm remove-tr hideDom"><i
                                                    class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{ url('/sections') }}"
                           class="btn btn-danger float-left cancel-button">Cancel</a>
                        <button type="submit" class="btn btn-success float-right">Submit</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/multiple-add-form.js') }}"></script>
    <script src="{{ asset('js/common_form_submit.js') }}"></script>
@endsection
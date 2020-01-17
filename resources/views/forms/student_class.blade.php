@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{ $student_class ? "Update" : "New" }} Class</h4>
        </div>
        <div class="card-body">
            {!! Form::model($student_class, ['url' => $student_class ? 'student-classes/'. $student_class->id .'/update' : '/student-classes/store', 'method' => $student_class ? 'PUT' : 'POST', 'class' => 'common-form', 'autocomplete' => 'off']) !!}
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-12">
                        {!! Form::label('name', 'Class Name', ['class' => '']) !!}<dfn class="red-color">*</dfn>
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Student Name']) !!}
                        <span class="text-danger name"></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{ url('/student-classes') }}" class="btn btn-danger float-left cancel-button">Cancel</a>
                        <button type="submit" class="btn btn-success float-right">Submit</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/common_form_submit.js') }}"></script>
@endsection
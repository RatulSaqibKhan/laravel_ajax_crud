@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{ $student ? "Update" : "New" }} Student</h4>
        </div>
        <div class="card-body">
            {!! Form::model($student, ['url' => $student ? 'students/'. $student->id .'/update' : '/students', 'method' => $student ? 'PUT' : 'POST', 'id' => 'student-form', 'autocomplete' => 'off']) !!}
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        {!! Form::label('student_id', 'Student Id', ['class' => '']) !!}<dfn class="red-color">*</dfn>
                        {!! Form::text('student_id', null, ['class' => 'form-control', 'placeholder' => 'Student Id']) !!}
                        <span class="text-danger student_id"></span>
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('name', 'Student Name', ['class' => '']) !!}<dfn class="red-color">*</dfn>
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Student Name']) !!}
                        <span class="text-danger name"></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Form::label('birth_date', 'Birth Date', ['class' => '']) !!}<dfn class="red-color">*</dfn>
                        {!! Form::date('birth_date', null, ['class' => 'form-control', 'placeholder' => 'Birth Date']) !!}
                        <span class="text-danger birth_date"></span>
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('gender', 'Student Name', ['class' => '']) !!}<dfn class="red-color">*</dfn>
                        {!! Form::select('gender', \App\Student::GENDERS, null, ['class' => 'form-control', 'placeholder' => 'Select Gender']) !!}
                        <span class="text-danger gender"></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Form::label('guardian_name', 'Guardian Name', ['class' => '']) !!}<dfn class="red-color">*</dfn>
                        {!! Form::text('guardian_name', null, ['class' => 'form-control', 'placeholder' => 'Guardian Name']) !!}
                        <span class="text-danger guardian_name"></span>
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('contact_no', 'Contact No', ['class' => '']) !!}<dfn class="red-color">*</dfn>
                        {!! Form::text('contact_no', null, ['class' => 'form-control', 'placeholder' => 'Contact No']) !!}
                        <span class="text-danger contact_no"></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        {!! Form::label('address', 'Address', ['class' => '']) !!}
                        {!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Address']) !!}
                        <span class="text-danger address"></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{ url('/students') }}" class="btn btn-danger float-left">Cancel</a>
                        <button type="submit" class="btn btn-success float-right">Submit</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/students_form.js') }}"></script>
@endsection
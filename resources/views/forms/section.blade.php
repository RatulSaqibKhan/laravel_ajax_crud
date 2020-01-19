@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{ $section ? "Update" : "New" }} Section</h4>
        </div>
        <div class="card-body">
            {!! Form::model($section, ['url' => $section ? 'sections/'. $section->id .'/update' : '/sections/store', 'method' => $section ? 'PUT' : 'POST', 'class' => 'common-form', 'autocomplete' => 'off']) !!}
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        {!! Form::label('class_id', 'Class Name', ['class' => '']) !!}<dfn class="red-color">*</dfn>
                        {!! Form::select('class_id', $student_classes, null, ['class' => 'form-control', 'placeholder' => 'Select Class Name']) !!}
                        <span class="text-danger class_id"></span>
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('name', 'Section Name', ['class' => '']) !!}<dfn class="red-color">*</dfn>
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Section Name']) !!}
                        <span class="text-danger name"></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{ url('/sections') }}" class="btn btn-danger float-left cancel-button">Cancel</a>
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
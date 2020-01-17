@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Class List</h4>
        </div>
        <div class="card-body">
            <div class="row pb-4">
                <div class="col-sm-2">
                    <button type="button" data-href="{{ url('/student-classes/create') }}" class="form-control btn btn-sm btn-outline-primary create-button">New Entry</button>
                </div>
                <div class="col-sm-10">
                    {!! Form::open(['url' => '/student-classes/search', 'method' => 'get', 'class'=> 'form-group', 'autocomplete' => 'off']) !!}
                    <div class="row">
                        <div class="offset-5 col-4 pull-right">
                            {!! Form::text('q', $q ?? null, ['class' => 'form-control', 'placeholder' => 'Search Here']) !!}
                        </div>
                        <div class="col-3  pull-right">
                            <button type="submit" class="form-control btn btn-sm btn-primary">Search</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 table-responsive dom-min-height-500">
                    <table class="table table-bordered table-head-fix">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Class Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($student_classes && $student_classes->count())
                            @foreach($student_classes as $student_class)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student_class->name }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ url('/student-classes/edit?id='.$student_class->id) }}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="{{ url('/student-classes/delete') }}" data-id="{{ $student_class->id }}" class="delete-list-data btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th class="text-center" colspan="3">No Data</th>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
            {{ $student_classes->render() }}
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/list_data.js') }}"></script>
    <script src="{{ asset('js/delete_list_data.js') }}"></script>
@endsection
@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Student List</h4>
        </div>
        <div class="card-body">
            <div class="row pb-4">
                <div class="col-sm-3">
                    <a href="{{ url('/students/create') }}" class="btn btn-sm btn-outline-primary">New Entry</a>
                </div>
                {{--{!! Form::open(['url' => '/students/search', 'method' => 'get', 'class'=> 'form-group', 'autocomplete' => 'off']) !!}
                <div class="col-sm-7">
                    {!! Form::text('q', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="form-control btn btn-sm btn-primary">Search</button>
                </div>
                {!! Form::close() !!}--}}
            </div>
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Guardian Name</th>
                            <th>Contact No</th>
                            <th>Address</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($students && $students->count())
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ str_pad($student->id, 10, STR_PAD_LEFT) }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ \App\Student::GENDERS[$student->gender] }}</td>
                                    <td>{{ date('d/m/Y', strtotime($student->birth_date)) }}</td>
                                    <td>{{ $student->guardian_name }}</td>
                                    <td>{{ $student->contact_no }}</td>
                                    <td>{{ $student->address }}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
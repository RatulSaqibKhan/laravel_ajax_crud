@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Students</th>
                            <th>Classes</th>
                            <th>Sections</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="student-count"></td>
                            <td class="class-count"></td>
                            <td class="section-count"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            getDashboardData();

            function getDashboardData() {
                var studentCountDom = $('.student-count');
                var classCountDom = $('.class-count');
                var sectionCountDom = $('.section-count');
                studentCountDom.html('');
                classCountDom.html('');
                sectionCountDom.html('');
                var url = '/get-dashboard-data';
                var data= '';
                ajaxGet(url, data).done(function (response) {
                    if(response.status === 'success') {
                        studentCountDom.html(response.student_count);
                        classCountDom.html(response.class_count);
                        sectionCountDom.html(response.section_count);
                    }
                }).fail(function (response) {
                    console.log(response.responseJSON);
                });

            }
        });
    </script>
@endsection

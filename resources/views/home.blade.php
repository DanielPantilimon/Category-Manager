@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-bordered" id="users-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <hr>


        <div class="d-grid gap-2 col-md-4 mx-auto">
            <a class="btn btn-outline-secondary btn-block" href="/addUser">Create New User</a>
            <a class="btn btn-outline-success btn-block" href="/departments">Show All Departments</a>
        </div>


        <p class="zoomable">
            Click me to zoom
        </p>
        <script type="module">
            $(document).ready(function() {
                $(".zoomable").click(function() {
                    $(this).animate({
                        fontSize: "40px"
                    }, 1000);
                });
            });
        </script>

    </div>
@endsection

@push('scripts')
    <script type="module">
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatables.data') !!}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'surname',
                        name: 'surname'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'dep_name',
                        name: 'dep_name'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endpush

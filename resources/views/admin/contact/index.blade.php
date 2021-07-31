@extends('layouts.app')

@section('content')
<main class="main">


    <div class="container-fluid" style="padding-top: 30px">
        <div class="animated fadeIn">
            <div class="content-header">
                                        </div><!--content-header-->

                                        <div class="card">
<div class="card-header">
<h3 class="page-title float-left d-inline">Contact Us</h3>

</div>
<div class="card-body">
<div class="row">
    @if (session('error') || session('message'))
    <div class="alert alert-success" style=" width: 100%;">
    <span class="{{ session('error') ? 'error':'success' }}">{{ session('error') ?? session('message') }}</span>
</div>
@endif
<div class="col-12">
    <div class="table-responsive">
        <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
            <table id="myTable" class="table table-bordered table-striped dataTable no-footer"
                role="grid" aria-describedby="myTable_info">
                <thead>
                    <tr role="row">
                        <th>{{ __('lang.number') }}</th>
                        <th>{{ __('lang.Name') }}</th>
                        <th>{{ __('lang.Email') }}</th>
                        <th>{{ __('lang.Phone') }}</th>
                        <th>{{ __('lang.Message') }}</th>
                        <th>{{ __('lang.Actions') }}</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>

        </div><!--animated-->
    </div><!--container-fluid-->
</main>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "processing": true,
                "serverSide": true,
                "responsive": true,
                "ajax": {
                    "url": "{{ route('admin.getContact') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": {
                        _token: "{{ csrf_token() }}"
                    }
                },
                "columns": [{
                        "data": "number"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "email"
                    },
                    {
                        "data": "phone"
                    },
                    {
                        "data": "message"
                    },
                    {
                        "data": "created_at"
                    },
                ]

            });
        });
    </script>
@endsection

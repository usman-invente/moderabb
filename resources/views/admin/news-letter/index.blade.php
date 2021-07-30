@extends('layouts.app')

@section('content')
<main class="main">
                                

    <div class="container-fluid" style="padding-top: 30px">
        <div class="animated fadeIn">
            <div class="content-header">
                                        </div><!--content-header-->

                                        <div class="card">
<div class="card-header">
<h3 class="page-title float-left d-inline">{{ __('lang.Newsletter subscribers') }}</h3>
    <div class="float-right">
        <a href="" class="btn btn-success">{{ __('lang.Group Messages') }} </a>
    </div>    
</div>
<div class="card-body">
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                <table id="myTable" class="table table-bordered table-striped dataTable no-footer"
                    role="grid" aria-describedby="myTable_info">
                    <thead>
                        <tr role="row">
                            <th>{{ __('lang.number') }}</th>
                            <th>{{ __('lang.Emai') }}</th>
                            <th>{{ __('lang.Message') }}</th>
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
                    "url": "{{ route('get_news_data') }}",
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
                        "data": "email"
                    },
                    {
                        "data": "actions"
                    },
                ]

            });
        });
    </script>
@endsection

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
                <table id="myTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="myTable_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="number: activate to sort column descending">{{ __('lang.number') }}</th>
                    <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="email: activate to sort column ascending" style="width: 526.266px;">{{ __('lang.email address') }}</th>
                    <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 241.109px;">{{ __('lang.Actions') }}</th>
                </tr></thead>
                <tbody>
                @foreach ($data as $val)
                <tr>
                    <td>{{ $val->id }}</td>
                    <td>{{ $val->email }}</td>
                    <td><a href=""
                        class="btn btn-primary">{{ __('lang.Message') }}</a></td>
                </tr>
                @endforeach
                </tbody>
            </table></div>
    </div>
</div>
</div>
</div>   

        </div><!--animated-->
    </div><!--container-fluid-->
</main>
@endsection
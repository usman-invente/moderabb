@extends('layouts.app') @section('content')
<main class="main">
	<div class="container-fluid" style="padding-top: 30px">
		<div class="animated fadeIn">
			<div class="content-header"> </div>
			<form class="form-horizontal" method="POST" action="{{ route('create_blogcategory') }}" id="slider-create" enctype="multipart/form-data">
                 @csrf
				<div class="alert alert-danger d-none" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
					<div class="error-list"> </div>
				</div>
				<div class="card">
					<div class="card-header">
						<h3 class="page-title d-inline">Category</h3>
						
					</div>
					<div class="card-body">
						<div class="row form-group">
							<label class="col-md-2 form-control-label" for="first_name">name</label>
							<div class="col-md-10">
								<input class="form-control" type="text" name="name" id="name" placeholder="name" maxlength="191" autofocus="">
                             </div>
						</div>
						<div class="row form-group">
							<label class="col-md-2 form-control-label" for="image">bg image</label>
							<div class="col-md-10">
							    <select class="form-control "id="widget" name="maincategory">
									<option value="" selected="selected">select widget</option>
									<option value="1">Search bar</option>
									<option value="2">Countdown</option>
								</select>
							</div>
						</div>
						<div class="row form-group">
							<label class="col-md-2 form-control-label" for="overlay">Color</label>
							<div class="col-md-10">
								<label class="switch switch-sm switch-3d switch-primary">
                                    <input type="color" id="favcolor" name="color" value="#ff0000">
							</div>
						</div>
						<div class="row form-group">
							<label class="col-md-2 form-control-label" for="hero_text">Order</label>
							<div class="col-md-10">
								<input class="form-control" type="text" name="order" id="hero_text" placeholder="Ex 1"> </div>
						</div>
					
                        <button type="submit">ADD</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</main>
@endsection
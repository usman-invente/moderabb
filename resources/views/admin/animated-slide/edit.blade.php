@extends('layouts.app') @section('content')
<main class="main">
	<div class="container-fluid" style="padding-top: 30px">
		<div class="animated fadeIn">
			<div class="content-header"> </div>
			<form class="form-horizontal" method="POST" action="{{ route('update_sliders',$data->id) }}" id="slider-create" enctype="multipart/form-data">
                 @csrf
				<div class="alert alert-danger d-none" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
					<div class="error-list"> </div>
				</div>
				<div class="card">
					<div class="card-header">
						<h3 class="page-title d-inline">create segment</h3>
						<div class="float-right"> <a href="{{ route('sliders') }}" class="btn btn-success">Slide Show</a> </div>
					</div>
					<div class="card-body">
						<div class="row form-group">
							<label class="col-md-2 form-control-label" for="first_name">name</label>
							<div class="col-md-10">
								<input class="form-control" type="text" value="{{ $data->name }}" name="name" id="name" placeholder="name" maxlength="191" autofocus=""> </div>
						</div>
						<div class="row form-group">
							<label class="col-md-2 form-control-label" for="image">bg image</label>
							<div class="col-md-10">
								<input class="form-control d-inline-block" placeholder="" accept="image/jpeg,image/gif,image/png" name="image" type="file">
                                <img src="{{ asset('upload/slider/' . $data->image) }}" height="80" width="180"
                                                style="margin-top: 10px">
								<p class="help-text mb-0 font-italic">Note: Please download .jpg or .png with a resolution of <b> 1920 x 900 </b>. For best result, use darker or overlay images for better result.</p>
							</div>
						</div>
						<div class="row form-group">
							<label class="col-md-2 form-control-label" for="overlay">cover</label>
							<div class="col-md-10">
								<label class="switch switch-sm switch-3d switch-primary">
                                    <input name="overlay" type="hidden" value="0">
									<input class="switch-input" type="checkbox" name="overlay" id="overlay" value="1" {{$data->overlay==1 ? 'checked' : ''}}><span class="switch-label"></span><span class="switch-handle"></span></label>
								<p class="help-text mb-0 font-italic">if you turn it on. A black overlay will be displayed on your image. It will be useful when the BG image is not darker or has no overlay </p>
							</div>
						</div>
						<div class="row form-group">
							<label class="col-md-2 form-control-label" for="hero_text">slide text</label>
							<div class="col-md-10">
								<input class="form-control" type="text" value="{{ $data->hero_text }}" name="hero_text" id="hero_text" placeholder="slide text"> </div>
						</div>
						<div class="row form-group">
							<label class="col-md-2 form-control-label" for="sub_text">sub-text</label>
							<div class="col-md-10">
								<input class="form-control" type="text" value="{{ $data->sub_text }}" name="sub_text" id="sub_text" placeholder="sub-text"> </div>
						</div>
						<div class="row form-group">
							<label class="col-md-2 form-control-label" for="widget">Widget</label>
							<div class="col-md-10">
								<select class="form-control "id="widget" name="widget">
									<option value="" selected="selected">select widget</option>
									<option value="1" {{$data->widget==1 ? 'selected' : ''}}>Search bar</option>
									<option value="2" {{$data->widget==2 ? 'selected' : ''}}>Countdown</option>
								</select>
								<div class="widget-container mt-2 d-none"> </div>
							</div>
						</div>
						<div class="form-group row justify-content-center">
							<div class="col-4"> <a class="btn btn-danger" href="{{ route('sliders') }}">Cancel</a>
								<button type="submit" class="btn btn-info waves-effect waves-light ">
                                    Update
                                </button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</main>
@endsection
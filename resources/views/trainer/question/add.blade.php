@extends('layouts.app')

@section('content')
<style>
    .select2-container .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    height: 39px !important;
    user-select: none;
    -webkit-user-select: none;
}
.select2-selection--multiple .select2-selection__rendered {
    box-sizing: border-box;
    list-style: none;
    margin: 0;
    padding: 0 5px;
    width: 100%;
    height: 38px !important;
}
</style>
<div class="container-fluid" style="padding-top: 30px">
    <div class="animated fadeIn">
        <div class="content-header">
                                    </div><!--content-header-->

<form method="POST" action="{{ route('tcreate_question') }}" accept-charset="UTF-8" enctype="multipart/form-data">
@csrf
<div class="card">
<div class="card-header">
<h3 class="page-title float-left mb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Create question</font></font></h3>
<div class="float-right">
<a href="{{ route('tquestions') }}" class="btn btn-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">view questions</font></font></a>
</div>
</div>
<div class="card-body">
<div class="row">
<div class="col-12 form-group">
    <label for="question" class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">question*</font></font></label>
    <textarea class="form-control " placeholder="" required="" name="question" cols="50" rows="10" id="question"></textarea>
    <p class="help-block"></p>
                    </div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="question_image" class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">question image</font></font></label>
    <input class="form-control" style="margin-top: 4px;" name="question_image" type="file" id="question_image">
    <p class="help-block"></p>
                    </div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="score" class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">number of points*</font></font></label>
    <input class="form-control" placeholder="" required="" name="score" type="number" value="1" id="score">
    <p class="help-block"></p>
                    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-4 form-group">
        <label for="course_id" class="control-label">course</label>
        <select class="form-control select2 js-example-placeholdere-single select2bs4" required="" id="course_id" name="course_id" tabindex="-1" aria-hidden="true">
            <option value="" selected="selected">Please select a course</option>
            @foreach ($course as $cata)
                <option value="{{ $cata->id }}">{{ $cata->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12 col-lg-4 form-group">
        <label for="lesson_id" class="control-label">lesson</label>
        <select class="form-control select2 js select2bs4" required="" id="lesson_id" name="lesson_id" tabindex="-1" aria-hidden="true">

        </select>
    </div>
    <div class="col-12 col-lg-4 form-group">
        <label for="course_id" class="control-label">test</label>
        <select class="form-control select2 js-example-placeholder-multiple select2bs4" required multiple="multiple" id="test_id" name="tests[]">

        </select>
    </div>
</div>

</div>
</div>

<div class="card">
<div class="card-body">
<div class="row">
<div class="col-12 form-group">
    <label for="option_text_1" class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">option text*</font></font></label>
    <textarea class="form-control " rows="3" name="option_text_1" cols="50" id="option_text_1"></textarea>
    <p class="help-block"></p>
                    </div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="explanation_1" class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Option explanation</font></font></label>
    <textarea class="form-control " rows="3" name="explanation_1" cols="50" id="explanation_1"></textarea>
    <p class="help-block"></p>
                    </div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="correct_1" class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">correct answer</font></font></label>
    <input name="correct_1" type="hidden" value="0" id="correct_1">
    <input name="correct_1" type="checkbox" value="1" id="correct_1">
    <p class="help-block"></p>
            </div>
</div>
</div>
</div>
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-12 form-group">
    <label for="option_text_2" class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">option text*</font></font></label>
    <textarea class="form-control " rows="3" name="option_text_2" cols="50" id="option_text_2"></textarea>
    <p class="help-block"></p>
                    </div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="explanation_2" class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Option explanation</font></font></label>
    <textarea class="form-control " rows="3" name="explanation_2" cols="50" id="explanation_2"></textarea>
    <p class="help-block"></p>
                    </div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="correct_2" class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">correct answer</font></font></label>
    <input name="correct_2" type="hidden" value="0" id="correct_2">
    <input name="correct_2" type="checkbox" value="1" id="correct_2">
    <p class="help-block"></p>
                    </div>
</div>
</div>
</div>
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-12 form-group">
    <label for="option_text_3" class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">option text*</font></font></label>
    <textarea class="form-control " rows="3" name="option_text_3" cols="50" id="option_text_3"></textarea>
    <p class="help-block"></p>
                    </div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="explanation_3" class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Option explanation</font></font></label>
    <textarea class="form-control " rows="3" name="explanation_3" cols="50" id="explanation_3"></textarea>
    <p class="help-block"></p>
                    </div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="correct_3" class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">correct answer</font></font></label>
    <input name="correct_3" type="hidden" value="0" id="correct_3">
    <input name="correct_3" type="checkbox" value="1" id="correct_3">
    <p class="help-block"></p>
                    </div>
</div>
</div>
</div>
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-12 form-group">
    <label for="option_text_4" class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">option text*</font></font></label>
    <textarea class="form-control " rows="3" name="option_text_4" cols="50" id="option_text_4"></textarea>
    <p class="help-block"></p>
                    </div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="explanation_4" class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Option explanation</font></font></label>
    <textarea class="form-control " rows="3" name="explanation_4" cols="50" id="explanation_4"></textarea>
    <p class="help-block"></p>
                    </div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="correct_4" class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">correct answer</font></font></label>
    <input name="correct_4" type="hidden" value="0" id="correct_4">
    <input name="correct_4" type="checkbox" value="1" id="correct_4">
    <p class="help-block"></p>
                    </div>
</div>
</div>
</div>
<div class="col-12 text-center">
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input class="btn btn-danger mb-4 form-group" type="submit" value="Save"></font></font>
</div>

</form>
    </div><!--animated-->
</div>

@endsection

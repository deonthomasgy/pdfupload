@extends('layout') @section('content')
<div class="sticky-peek-header">
    <div class="sticky-wrapper">
        <div class="card">
<div>
    <form class="form-group" action="/cp/addons/pdf-upload/update">
        {{ csrf_field() }}
        
        <input type="hidden" value="{{$file_detail['file_id']}}" class="form-control" name="id">
        
        <div class="input-group">
            <span class="input-group-addon"><i class="icon icon-block"></i></span>
            <input type="text" value="{{$file_detail['file_path']}}" disabled="disabled" class="form-control">
        </div>
        <hr>

        <div class="input-group">
            <span class="input-group-addon"><i class="icon icon-edit"></i></span>
            <input type="text" class="form-control" name="alt" placeholder="Type Alternative Name Here" value="{{$file_detail['alt']}}">
        </div>
        <hr>
        <div class="radio-fieldtype-wrapper">
            <label class="block">Which Year Should This Book Be Available For?</label>
            <ul class="list-unstyled">
                <li>
                    <input name="year" type="radio" value="year1" id="year-1">
                    <label for="year-1">Year 1</label>
                </li>
                <li>
                    <input name="year" type="radio" value="year2" id="year-2">
                    <label for="year-2">Year 2</label>
                </li>
                <li>
                    <input name="year" type="radio" value="year3" id="year-3">
                    <label for="year-3">Year 3</label>
                </li>
                <li>
                    <input name="year" type="radio" value="year4" id="year-4">
                    <label for="year-4">Year 4</label>
                </li>
            </ul>
        </div>
        <hr> 
        <div class="radio-fieldtype-wrapper">
            <label class="block">Should this book available for Download ?</label>
            <ul class="list-unstyled">
                <li>
                    <input name="download" type="radio" value="True" id="download-1">
                    <label for="download-1">Yes</label>
                </li>
                <li>
                    <input name="download" type="radio" value="False" id="download-2">
                    <label for="download-2">No</label>
                </li>
            </ul>
        </div>
        <hr>
        <input type="submit" class="btn btn-primary" class="form-control" />
    </form>
    <ol class="breadcrumb">
        <li><a href="/cp/addons/pdf-upload/getAll">Cancel Edit</a></li>
        <li><a href="/cp/addons/pdf-upload">Back To Uploads</a></li>
    </ol>
</div>
</div>
</div>
</div>
</div>
@endsection

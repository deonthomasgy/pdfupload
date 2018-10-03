@extends('layout') @section('content')
<div class="sticky-peek-header">
    <div class="sticky-wrapper">
        <div class="card">
            <div>
                <form method="POST" action="/cp/addons/pdf-upload/save" enctype="multipart/form-data" class="form-group">
                    <div class="publish-main">
                        <div class="publish-fields title-field"></div>
                        {{ csrf_field() }}

                        <div class="publish-fields">
                            {{--  <div class="form-group text-fieldtype width-100">
                                <div class="field-inner">
                                    <label class="block">Book Name</label>
                                    <input tabindex="0" type="text" name="pdfname" class="form-control type-text" required></input>
                                </div>
                            </div>  --}}

                            <div class="form-group text-fieldtype width-100">
                                <div class="field-inner">
                                    <label class="block">Title</label>
                                    <input tabindex="0" type="text" name="alt" class="form-control type-text" required></input>
                                </div>
                            </div>


                            <div class="form-group radio-fieldtype width-100 ">
                                <div class="field-inner">
                                    <label class="block">Which Year Should This Book Be Available For?</label>
                                    <div class="radio-fieldtype-wrapper">
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
                                            <li>
                                                <input name="year" type="radio" value="open" id="year-5">
                                                <label for="year-5">Any Year</label>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr> 
                            <div class=" form-group radio-fieldtype-wrapper width-100">
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
                            <div class="input-group">
                                <input type="file" name="upload" accept="application/pdf" required/>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <button type="upload" class="btn btn-success add-row">
                                <span class="icon icon-arrow-long-up" aria-hidden="true"></span> Add Book
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

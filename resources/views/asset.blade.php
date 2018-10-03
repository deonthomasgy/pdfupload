@extends('layout') @section('content')
<div class="sticky-peek-header">
    <div class="sticky-wrapper">
        <div class="card">

    <table class="table table-condensed">
    <tr>
        <th><h5>File Name</h5></th>
        <th><h5>Modification Date</h5></th>
        <th><h5>Edit</h5></th> 
    </tr>
    @foreach($assetArray as $asset)
    <tr>
        <td> {{ $asset->basename() }} </td>
        <td> {{ $asset->lastModified() }} </td>
        <td> <a href="/cp/addons/pdf-upload/edit?id={{$asset->id()}}">Edit</a></td>

    </tr>
    </tr>
    
    @endforeach
    </table>
</div>
</div>
</div>
</div>

@endsection

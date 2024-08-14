@extends('nmsnoteswidget::includes.pluginadmin')

@section('title', 'Notes Widget Plugin')

@section('content2')

<div class="row">
    @if ($errors->any())
    <div class="text-red-500 text-sm mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="col-md-12">
        <h3>About Notes Widget Plugin</h3>
        <p>
            This plugin will show the notes widget on the device overview page.
        </p>
        <p>
            <strong>Version:</strong> {{ $nmsnoteswidget_version }}
        </p>
    </div>


</div>

@endsection
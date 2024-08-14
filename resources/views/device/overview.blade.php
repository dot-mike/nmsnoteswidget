{{-- This page will render the notes widget on the device overview page. --}}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-condensed device-notes">
            <div class="panel-heading">
                <strong>{{ $title }}</strong> <a href="{{ $url }}">[EDIT]</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        {{-- Output the markdown output unescaped because we want the raw html
                         to be output to the page. Be careful with unescaped output as it can lead to security issues. --}}
                        {!! Str::markdown($device->notes ?? '') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
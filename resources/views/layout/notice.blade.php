@if(Session::has('error'))

<div class="alert bg-pink alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    {{ Session::get('error') }}
</div>
@endif
@if(Session::has('notice'))

<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    {{ Session::get('notice') }}
</div>
@endif
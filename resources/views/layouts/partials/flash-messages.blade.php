@if (Session::has('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p>{{ Session::get('success') }}</p>
</div>
@endif

@if (Session::has('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p>{{ Session::get('error') }}</p>
</div>
@endif

@if (Session::has('warning'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p>{{ Session::get('warning') }}</p>
</div>
@endif

@if (Session::has('info'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p>{{ Session::get('info') }}</p>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Opps!</strong> Algo salio mal<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

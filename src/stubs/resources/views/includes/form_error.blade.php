@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <!-- if there are creation errors, they will show here -->
       @if($errors->all())
        <ul>
            @foreach($errors->all() as $error)
               <li> {{ $error }}</li>
            @endforeach
        </ul>
       @endif
    </div>
@endif
@if(session()->has('success'))
<div class="alert alert-info">{!! session('success') !!}</div>
@endif
@if (session()->has('message'))
<div class="alert alert-info">{!! session('message') !!}</div>
@endif

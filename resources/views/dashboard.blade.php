@if (auth()->check()&&(auth()->user()->isUser()))
@include('index')
@elseif (  auth()->check()&&(auth()->user()->isAdmin()))
@include('admin')
@endif


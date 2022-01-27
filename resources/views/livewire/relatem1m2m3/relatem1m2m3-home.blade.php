@extends('layout.user')

@section('style')
<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@livewireStyles
@endsection

@section('content')
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    @livewire('relatem1m2m3')
@endsection

@section('script')
@livewireScripts
<script type="text/javascript">
    window.livewire.on('userStore', () => {
        $('#exampleModal').modal('hide');
    });
</script>
@endsection

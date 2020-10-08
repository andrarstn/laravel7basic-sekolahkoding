@extends('layouts.app')
@section('content')
<h1>Bikin Artikel Baru</h1>
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif --}}
<form action="/article" method="POST" enctype="multipart/form-data">
    @csrf
    <x-input field="title" label="Judul" type="text" placeholder="Tulis Judul Disini..." />
    <x-textarea field="subject" label="Subject" type="text" />
    <x-inputfile />
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
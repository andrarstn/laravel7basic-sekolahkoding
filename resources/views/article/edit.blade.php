@extends('layouts.app')
@section('content')
<h1>Edit Artikel</h1>
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif --}}
<form action="/article/{{ $article->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-input field="title" label="Judul" type="text" oldvalue="{{ $article->title }}" />
    <x-textarea field="subject" label="Subject" type="text" oldvalue="{{ $article->subject }}" />
    @if ($article->thumbnail)
    <img src="/images/{{ $article->thumbnail }}" alt="" width="250">
    @endif
    <x-inputfile />

    {{-- <div class="form-group">
        <label for="title">Judul</label>
        <input type="text" class="form-control" id="title" name="title"
            value="{{ old('title')?old('title'):$article->title }}">
    @error('title')
    <small class="text-danger">{{ $message }}</small>
    @enderror
    </div>
    <div class="form-group">
        <label for="subject">Subject</label>
        <textarea type="text" class="form-control" id="subject" name="subject"
            rows="3">{{ old('subject')?old('subject'):$article->subject }}</textarea>
        @error('subject')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div> --}}
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
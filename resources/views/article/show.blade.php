@extends('layouts.app')
@section('content')

<h1>{{ $article->title }}</h1>
<p>{{ $article->subject }}</p>
<div class="row">
    <div class="col">
        <a href="/article/{{ $article->id }}/edit" class="btn btn-sm btn-success">Edit</a>
        <div class="d-inline-block">

            <form action="/article/{{ $article->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>
<a href="/article" class="btn btn-info mt-2">
    <<</a> @endsection
@extends('layouts.app')
@section('title','Halaman Artikel')
@section('content')
<h1>Halaman Article</h1>
<a href="/article/create" class="btn btn-primary btn-sm">Tambah Article</a>
@foreach ($articles->chunk(3) as $articleChunk)
<div class="row">
    @foreach ($articleChunk as $article)
    <div class="col card my-3 p-3 mx-1">
        <div class="card-body">
            <img src="/images/{{ $article->thumbnail }}" alt="" class="card-img-top">
            <p>
                <strong>{{ ucfirst($article->title) }}</strong>
            </p>
            <p>{{ $article->subject }}</p>
            <a href="/article/{{ $article->slug }}" class="btn btn-sm btn-info stretched-link">Baca</a>

        </div>
    </div>
    @endforeach
</div>
@endforeach
<div class="d-flex justify-content-center">{{ $articles->links() }}</div>
@include('layouts.footer')
@endsection
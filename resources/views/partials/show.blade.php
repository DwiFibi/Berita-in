@extends('layouts.app') {{-- Sesuaikan dengan layout yang kamu pakai --}}

@section('title', 'Kategori: ' . $category->name)

@section('content')
<div class="container my-4">
    <h1 class="mb-4">Kategori: {{ $category->name }}</h1>
    <p>{{ $category->description ?? 'Tidak ada deskripsi kategori.' }}</p>

    @if($articles->count())
        <div class="list-group">
            @foreach($articles as $article)
                <a href="{{ route('article.show', $article->id) }}" class="list-group-item list-group-item-action mb-2">
                    <h5 class="mb-1">{{ $article->title }}</h5>
                    <small>Dipublikasikan: {{ $article->published_at->format('d M Y') }}</small>
                    <p class="mb-1 text-truncate">{{ Str::limit(strip_tags($article->content), 150) }}</p>
                </a>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $articles->links() }}
        </div>
    @else
        <p>Tidak ada artikel untuk kategori ini.</p>
    @endif
</div>
@endsection

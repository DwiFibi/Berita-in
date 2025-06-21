@extends('layouts.app')

@include('partials.navbar')

@section('content')

    {{-- Garis hitam di atas foto profil --}}
    <hr style="border: none; border-top: 2px solid #000; margin: 3rem 0;">

    {{-- Foto Profil dan Info Penulis --}}
    <div class="author-profile" style="text-align: center; margin-bottom: 2rem;">
        @if ($author->profile_image)
            <img src="{{ asset('storage/' . $author->profile_image) }}" alt="{{ $author->name }}"
                style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover;">
        @else
            <img src="{{ asset('images/default-profile.png') }}" alt="Foto Profil Default"
                style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover;">
        @endif

        <h1 style="margin-top: 1rem;"> {{ $author->name }}</h1>
        <p><strong>Email:</strong> {{ $author->email }}</p>
        <p><strong>Bio:</strong> {{ $author->bio }}</p>
    </div>

    {{-- Artikel Penulis --}}
    <div class="author-articles" style="margin-top: 3rem; text-align: center;">
        <h2 style="margin-bottom: 2rem;">Artikel Terbaru oleh {{ $author->name }}</h2>

        @if ($author->articles->count())
            <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 1.5rem;">
                @foreach ($author->articles as $article)
                    <div
                        style="width: 200px; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; background: #fff;">
                        {{-- Gambar artikel --}}
                        @if ($article->image_path)
                            <img src="{{ asset('storage/' . $article->image_path) }}" alt="{{ $article->title }}"
                                style="width: 100%; height: 200px; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/default-article.jpg') }}" alt="Thumbnail Default"
                                style="width: 100%; height: 200px; object-fit: cover;">
                        @endif

                        <div style="padding: 0.75rem; text-align: left;">
                            <h3 style="margin: 0 0 0.5rem; font-size: 1rem;">
                                <a href="{{ route('article.show', $article->id) }}"
                                    style="text-decoration: none; color: #333;">
                                    {{ \Illuminate\Support\Str::limit($article->title, 50) }}
                                </a>
                            </h3>
                            <p style="margin: 0; color: #666; font-size: 0.85rem;">
                                Kategori: {{ $article->category->name ?? '-' }}
                            </p>
                            <p style="margin: 0.3rem 0 0; color: #999; font-size: 0.8rem;">
                                {{ \Carbon\Carbon::parse($article->published_at)->translatedFormat('d F Y') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Penulis ini belum memiliki artikel.</p>
        @endif
    </div>

    {{-- Garis hitam di bawah artikel --}}
    <hr style="border: none; border-top: 2px solid #000; margin: 3rem 0;">

    @include('partials.footer')
@endsection

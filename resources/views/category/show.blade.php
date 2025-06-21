@extends('layouts.app') {{-- sesuaikan dengan layout yang kamu gunakan --}}
@include('partials.navbar')
@section('content')
    <div class="container">
        <div class="row">
            {{-- MAIN CONTENT --}}
            <div class="col-lg-8">
                <h2 class="mb-4">Category: {{ $category->name }}</h2>

                <div class="tc-post-list-style3">
                    <div class="items">
                        @foreach ($articles as $article)
                            <div class="item mt-30">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="img th-230 img-cover overflow-hidden">
                                            <img src="{{ asset('storage/' . $article->image_path) }}"
                                                alt="{{ $article->title }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="content mt-20 mt-lg-0">
                                            <a href="#"
                                                class="color-999 fsz-13px text-uppercase mb-10">{{ $article->category->name }}</a>
                                            <h4 class="title fw-bold">
                                                <a href="{{ route('articles.show', $article->id) }}"
                                                    class="hover-underline">
                                                    {{ $article->title }}
                                                </a>
                                            </h4>
                                            <div class="text color-666 mt-20">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 200, '...') }}
                                            </div>
                                            <div class="meta-bot fsz-13px color-666">
                                                <ul class="d-flex">
                                                    <li class="date me-5">
                                                        <a href="#">
                                                            <img src="https://img.icons8.com/?size=100&id=116423&format=png&color=000000"
                                                                alt="calendar-icon"
                                                                style="width: 16px; height: 16px; margin-right: 5px;">
                                                            {{ $article->created_at->translatedFormat('d F Y') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- Pagination --}}
                        <div class="mt-4">
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4">
                <div class="sidebar-categories mt-40">
                    <h6 class="color-000 text-uppercase mb-30 ltspc-1 d-flex align-items-center">
                        Categories
                        <img src="https://img.icons8.com/?size=100&id=12616&format=png&color=000000" alt="arrow icon"
                            style="width: 16px; height: 16px;" class="ms-2">
                    </h6>

                    @foreach ($allCategories as $cat)
                        <a href="{{ route('category.show', $cat->id) }}"
                            class="cat-card d-flex align-items-center mb-3 text-decoration-none">
                            <div class="img img-cover me-3" style="width: 40px; height: 40px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $cat->icon) }}" alt="{{ $cat->name }}"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="info">
                                <h5 class="mb-0">{{ $cat->name }}</h5>
                                <span class="num">{{ $cat->articles()->count() }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection

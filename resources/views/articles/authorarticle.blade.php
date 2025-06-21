{{-- resources/views/singlepost.blade.php --}}
@extends('layouts.app') {{-- Ubah jika nama layout utama kamu berbeda --}}

@section('content')
    @include('partials.navbar')
    @include('partials.header')

    <section class="tc-main-post-style1 pb-60">
        <div class="container">
            <div class="tc-main-post-title pt-10 pb-20">
                <div class="row">
                    <div class="col-lg-8">
                        <p class="text-uppercase mb-15">{{ $article->category->name }}</p>
                        <h2 class="title">{{ $article->title }}</h2>
                    </div>
                </div>
            </div>
            <div class="meta-nav pt-30 pb-30 border-top border-1 brd-gray">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="author-side color-666 fsz-13px">
                            <div class="author me-40 d-flex d-lg-inline-flex align-items-center">
                                <span class="icon-30 rounded-circle overflow-hidden me-10"
                                    style="width: 30px; height: 30px; display: inline-block;">
                                    <img src="{{ asset('storage/' . ($article->author->profile_image ?? 'default.jpg')) }}"
                                        alt="{{ $article->author->name ?? 'Unknown Author' }}"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </span>
                                <span>By</span>
                                <a href="#"
                                    class="text-decoration-underline text-primary ms-1">{{ $article->author->name ?? 'Admin' }}</a>
                            </div>
                            <span class="me-40">
                                <a href="#">
                                    <img src="https://img.icons8.com/?size=100&id=WEaFLeNOxzc7&format=png&color=000000"
                                        alt="Clock Icon"
                                        style="width:16px; height:16px; margin-right:6px; vertical-align:middle;" />
                                    {{ $article->created_at->translatedFormat('d F Y') }}
                                </a>
                            </span>
                            <span>
                                <a href="#">
                                    <img src="https://img.icons8.com/?size=100&id=14552&format=png&color=000000"
                                        alt="Comment Icon"
                                        style="width:16px; height:16px; margin-right:6px; vertical-align:middle;" />
                                    0 Comments
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <div class="links-side color-000 fsz-13px">
                            <a href="#" class="me-40">
                                <img src="https://img.icons8.com/?size=100&id=85799&format=png&color=000000" alt="Link Icon"
                                    style="width: 16px; height: 16px; margin-right: 6px;">
                                Copy Link
                            </a>
                            <a href="#">
                                <img src="https://img.icons8.com/?size=100&id=83134&format=png&color=000000"
                                    alt="Bookmark Icon" style="width: 16px; height: 16px; margin-right: 6px;">
                                Bookmark
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tc-main-post-img img-cover mb-50">
                <img src="{{ asset('storage/' . $article->image_path) }}" alt="{{ $article->title }}">
            </div>
            <div class="tc-main-post-content color-000">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="sharing">
                            <p class="text-uppercase mb-20">Share</p>
                            <div class="share-icons">
                                <a href="#"><img src="https://img.icons8.com/ios-glyphs/24/000000/twitter--v1.png"
                                        alt="Twitter"></a>
                                <a href="#"><img src="https://img.icons8.com/ios-glyphs/24/000000/facebook-new.png"
                                        alt="Facebook"></a>
                                <a href="#"><img src="https://img.icons8.com/ios-glyphs/24/000000/instagram-new.png"
                                        alt="Instagram"></a>
                                <a href="#"><img src="https://img.icons8.com/ios-glyphs/24/000000/youtube-play.png"
                                        alt="YouTube"></a>
                                <a href="#"><img src="https://img.icons8.com/ios-glyphs/24/000000/spotify.png"
                                        alt="Spotify"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        {!! $article->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ====== start comments ====== -->
    <section class="tc-single-post-comments">
        <div class="container">
            <div class="comments-content pt-50 pb-50 border-1 border-top border-dark">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="content">
                            <div class="comments-filter">
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        <p class="text-uppercase">{{ $comments->count() }} comments</p>
                                    </div>
                                    <div class="col-8 text-end">
                                        <div class="form-group">
                                            <label for="sortComments">Sort by :</label>
                                            <select id="sortComments" class="form-select">
                                                <option value="">Most liked</option>
                                                <option value="">Most views</option>
                                                <option value="">Most rated</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comments-cards">
                                @forelse ($comments as $comment)
                                    <div class="comment-replay-cont border-bottom border-1 brd-gray pb-40 pt-40">
                                        <div class="d-flex comment-cont">
                                            @if ($comment->author && $comment->author->profile_image)
                                                <img src="{{ asset('storage/' . $comment->author->profile_image) }}"
                                                    alt="{{ $comment->author->name }}">
                                            @else
                                                <span
                                                    class="material-symbols-outlined fs-1 text-muted">account_circle</span>
                                            @endif
                                            <div class="inf w-100 px-2">
                                                <div class="title d-flex justify-content-between">
                                                    <h6 class="fw-bold fsz-14px">{{ $comment->name }}</h6>
                                                    <span
                                                        class="time fsz-12px text-uppercase color-999">{{ $comment->created_at->diffForHumans() }}</span>
                                                </div>
                                                <div class="text color-666 fsz-12px mt-10">{{ $comment->content }}</div>
                                                <a href="#" class="butn border border-1 mt-20 py-2 px-3 reply-button"
                                                    data-comment-id="{{ $comment->id }}">
                                                    <span class="fsz-11px"> reply </span>
                                                </a>
                                            </div>
                                        </div>

                                        @foreach ($comment->children as $reply)
                                            <div class="d-flex comment-replay ps-5 mt-30 ms-4">
                                                @if ($reply->author && $reply->author->profile_image)
                                                    <img src="{{ asset('storage/' . $reply->author->profile_image) }}"
                                                        alt="{{ $reply->author->name }}">
                                                @else
                                                    <span
                                                        class="material-symbols-outlined fs-1 text-muted">account_circle</span>
                                                @endif
                                                <div class="inf w-100 px-2">
                                                    <div class="title d-flex justify-content-between">
                                                        <h6 class="fw-bold fsz-14px">{{ $reply->name }}</h6>
                                                        <span
                                                            class="time fsz-12px text-uppercase color-999">{{ $reply->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    <div class="text color-666 fsz-12px mt-10">{{ $reply->content }}</div>
                                                    <a href="#"
                                                        class="butn border border-1 mt-20 py-2 px-3 reply-button"
                                                        data-comment-id="{{ $reply->id }}">
                                                        <span class="fsz-11px"> reply </span>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @empty
                                    <p class="mt-4">Belum ada komentar.</p>
                                @endforelse
                            </div>

                            @if (session('success'))
                                <div class="alert alert-success mt-4">{{ session('success') }}</div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger mt-4">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('comments.store') }}" method="POST"
                                class="comment-form d-block pt-30">
                                @csrf
                                <input type="hidden" name="article_id" value="{{ $article->id }}">
                                <input type="hidden" name="parent_id" id="parent_id" value="">
                                <p class="text-uppercase mb-30">Leave A Comment</p>
                                <div class="row">
                                    <div class="col-lg-12 mb-30">
                                        <textarea class="form-control rounded-0 fsz-12px p-3" name="content" rows="6"
                                            placeholder="Write your comment here" required>{{ old('content') }}</textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control fsz-12px rounded-0 p-3" name="name"
                                            placeholder="Your Name *"
                                            value="{{ old('name', request()->cookie('comment_name')) }}" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" class="form-control fsz-12px rounded-0 p-3" name="email"
                                            placeholder="Your Email *"
                                            value="{{ old('email', request()->cookie('comment_email')) }}" required>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" name="save_info" type="checkbox"
                                                value="1" id="flexCheckDefault"
                                                {{ old('save_info') ? 'checked' : '' }}>
                                            <label class="form-check-label fsz-12px" for="flexCheckDefault">
                                                Save my name & email in this browser for next time I comment
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn bg-main text-white rounded-0 mt-40">
                                            <span class="fsz-11px">Submit Comment</span>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== end comments ====== -->

    {{-- Script kecil untuk isi parent_id jika reply --}}
    <script>
        document.querySelectorAll('.reply-button').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const commentId = this.getAttribute('data-comment-id');
                document.getElementById('parent_id').value = commentId;
                window.scrollTo({
                    top: document.querySelector('.comment-form').offsetTop,
                    behavior: 'smooth'
                });
            });
        });
    </script>

    @include('partials.hightlights', ['categories' => $categories])
    @include('partials.footer')
@endsection

<!-- ====== Highlights ====== -->
<section class="tags-posts">
    <div class="container">
        <div class="content pt-60 pb-60 border-2 border-top brd-gray">

            {{-- Judul kategori untuk desktop --}}
            <p class="fw-bold text-uppercase fsz-14px mb-30 pt-15 border-2 border-top border-dark">
                Berita sesuai kategori
            </p>

            {{-- Judul kategori untuk desktop --}}
            <div class="titles d-none d-lg-block">
                <div class="row gx-5">
                    @foreach ($categories as $category)
                        <div class="col-lg-4">
                            <p class="fw-bold text-uppercase fsz-14px mb-30 border-2 border-top border-dark pt-15">
                                {{ $category->name }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row gx-5">
                @foreach ($categories as $category)
                    <div class="col-lg-4 border-1 {{ $loop->last ? '' : 'border-end' }} brd-gray mt-5 mt-lg-0">

                        {{-- Judul kategori untuk mobile --}}
                        <p
                            class="fw-bold text-uppercase fsz-14px mb-30 border-2 border-top border-dark pt-15 d-block d-lg-none">
                            {{ $category->name }}
                        </p>

                        {{-- Ambil artikel dari $articlesByCategory berdasarkan id kategori --}}
                        @php
                            $articles = $articlesByCategory[$category->id] ?? collect();
                        @endphp

                        {{-- Artikel utama kategori (artikel pertama) --}}
                        @if ($articles->count() > 0)
                            @php
                                $mainArticle = $articles->first();
                            @endphp
                            <div class="tc-post-grid-default">
                                <div class="item border-1 border-bottom brd-gray pb-30">
                                    <a href="{{ url('article/' . $mainArticle->id) }}"
                                        class="img img-cover th-250 d-block">
                                        <img src="{{ asset('storage/' . $mainArticle->image_path) }}"
                                            alt="{{ $mainArticle->title }}">
                                    </a>
                                    <div class="content pt-30">
                                        <h3 class="title ltspc--1 mb-10 fs-4">
                                            <a href="{{ url('article/' . $mainArticle->id) }}">
                                                {{ $mainArticle->title }}
                                            </a>
                                        </h3>
                                        <div class="text color-666">
                                            {{ \Illuminate\Support\Str::limit($mainArticle->summary, 150) }}
                                        </div>
                                        <div class="meta-bot lh-1 mt-30">
                                            <a href="#" class="fsz-11px color-000 text-uppercase">
                                                {{ $mainArticle->published_at
                                                    ? $mainArticle->published_at->diffForHumans()
                                                    : $mainArticle->created_at->diffForHumans() }}
                                                <span class="color-999">by</span>
                                                {{ $mainArticle->author->name ?? 'Penulis tidak diketahui' }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Artikel sisanya (artikel ke 2 dan ke 3) --}}
                        <div class="tc-post-list-style2">
                            <div class="items">
                                @foreach ($articles->skip(1) as $article)
                                    <div
                                        class="item pt-30 pb-30 @if ($loop->last) pb-0 border-0 @endif">
                                        <div class="row gx-3">
                                            <div class="col-4">
                                                <a href="{{ url('article/' . $article->id) }}"
                                                    class="img img-cover th-70 d-block">
                                                    <img src="{{ asset('storage/' . $article->image_path) }}"
                                                        alt="{{ $article->title }}">
                                                </a>
                                            </div>
                                            <div class="col-8">
                                                <div class="content">
                                                    <h6 class="title fsz-18px mb-10 ltspc--1 lh-3">
                                                        <a href="{{ url('article/' . $article->id) }}">
                                                            {{ $article->title }}
                                                        </a>
                                                    </h6>
                                                    <a href="#" class="fsz-11px color-000 text-uppercase">
                                                        {{ $mainArticle->published_at
                                                            ? $mainArticle->published_at->diffForHumans()
                                                            : $mainArticle->created_at->diffForHumans() }}
                                                        <span class="color-999">by</span>
                                                        {{ $mainArticle->author->name ?? 'Penulis tidak diketahui' }}
                                                    </a>   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- ====== Highlights ====== -->

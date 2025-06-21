<!-- ====== start Featured posts  ====== -->
<section id="featured" class="">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-9">
                <div class="features-content pb-80">
                    <p class="fw-bold text-uppercase fsz-14px mb-30 pt-15 border-2 border-top border-dark">
                        Featured posts
                    </p>
                    <div class="row gx-5">
                        {{-- Main featured post --}}
                        <div class="col-lg-8 border-1 border-end brd-gray">
                            @if ($featuredArticles->isNotEmpty())
                                @php
                                    $mainFeatured = $featuredArticles->first();
                                @endphp
                                <div class="tc-post-grid-default">
                                    <div class="item">
                                        <a href="{{ url('article/' . $mainFeatured->id) }}"
                                            class="img img-cover th-400 d-block">
                                            <img src="{{ asset('storage/' . $mainFeatured->image_path) }}"
                                                alt="{{ $mainFeatured->title }}">
                                        </a>
                                        <div class="content pt-30">
                                            @if ($mainFeatured->category)
                                                <a href="{{ url('category/' . $mainFeatured->category->id) }}"
                                                    class="news-cat color-main fsz-13px text-uppercase mb-15 fw-bold">
                                                    {{ $mainFeatured->category->name }}
                                                </a>
                                            @endif
                                            <h2 class="title ltspc--1 mb-20">
                                                <a href="{{ url('article/' . $mainFeatured->id) }}">
                                                    {{ $mainFeatured->title }}
                                                </a>
                                            </h2>
                                            <div class="text color-666">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($mainFeatured->content), 200, ' [...]') }}
                                            </div>
                                            <div class="meta-bot lh-1 mt-40">
                                                <a href="#" class="fsz-11px color-000 text-uppercase">
                                                    {{ $mainFeatured->published_at ? $mainFeatured->published_at->diffForHumans() : '' }}
                                                    <span class="color-999">by</span>
                                                    {{ $mainFeatured->author->name ?? 'Admin' }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- List featured posts (6 articles) --}}
                        <div class="col-lg-4 border-1 border-end brd-gray">
                            <div class="tc-post-list-style2">
                                <div class="items">
                                    @foreach ($featuredArticles->skip(1)->take(6) as $article)
                                        <div class="item @if ($loop->last) border-0 @endif">
                                            <div class="content">
                                                @if ($article->category)
                                                    <a href="{{ url('category/' . $article->category->id) }}"
                                                        class="news-cat fsz-13px text-uppercase mb-2 fw-bold color-main">
                                                        {{ $article->category->name }}
                                                    </a>
                                                @endif

                                                @if (!empty($article->is_live) && $article->is_live)
                                                    <a href="#"
                                                        class="news-cat fsz-10px text-uppercase mb-2 text-white bg-danger py-1 px-2 ms-2">
                                                        <b><i
                                                                class="icon-6 rounded-circle bg-white me-1 d-inline-block"></i>
                                                            live</b>
                                                    </a>
                                                @endif

                                                <h5 class="title">
                                                    <a href="{{ url('article/' . $article->id) }}"
                                                        class="hover-underline">
                                                        {{ $article->title }}
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div> <!-- end row gx-5 -->
                </div> <!-- end features-content -->
            </div> <!-- end col-lg-9 -->
            <div class="col-lg-3">
                <div class="widgetspb-60">
                    <p class="fw-bold text-uppercase fsz-14px mb-30 pt-15 border-2 border-top border-dark ">stay
                        connected</p>
                    <div class="tc-widget-social-style6">
                        <div class="item">
                            <a href="https://www.facebook.com/NamaHalamanAnda" class="icon" target="_blank"
                                rel="noopener noreferrer">
                                <img src="https://img.icons8.com/?size=100&id=118468&format=png&color=000000"
                                    alt="Facebook Icon" style="width: 24px; height: 24px; margin-right: 8px;">
                                <span>Facebook</span>
                            </a>
                            <div class="followers">
                                <strong><span class="counter">57,5</span>K</strong>
                            </div>
                        </div>

                        <div class="item">
                            <a href="https://twitter.com/NamaAkunAnda" class="icon" target="_blank"
                                rel="noopener noreferrer">
                                <img src="https://img.icons8.com/?size=100&id=6Fsj3rv2DCmG&format=png&color=000000"
                                    alt="Twitter Icon" style="width: 24px; height: 24px; margin-right: 8px;">
                                <span>Twitter</span>
                            </a>
                            <div class="followers">
                                <strong><span class="counter">22,4</span>K</strong>
                            </div>
                        </div>

                        <div class="item">
                            <a href="https://instagram.com/NamaAkunAnda" class="icon" target="_blank"
                                rel="noopener noreferrer">
                                <img src="https://img.icons8.com/?size=100&id=32292&format=png&color=000000"
                                    alt="Instagram Icon" style="width: 24px; height: 24px; margin-right: 8px;">
                                <span>Instagram</span>
                            </a>
                            <div class="followers">
                                <strong><span class="counter">46,1</span>K</strong>
                            </div>
                        </div>

                        <div class="item">
                            <a href="https://youtube.com/NamaChannelAnda" class="icon" target="_blank"
                                rel="noopener noreferrer">
                                <img src="https://img.icons8.com/?size=100&id=37325&format=png&color=000000"
                                    alt="YouTube Icon" style="width: 24px; height: 24px; margin-right: 8px;">
                                <span>YouTube</span>
                            </a>
                            <div class="followers">
                                <strong><span class="counter">7,9</span>K</strong>
                            </div>
                        </div>
                    </div>
                    @if ($subscribeAd && $subscribeAd->image_path)
                        <div class="tc-subscribe-style6 mt-40 mb-40">
                            <div class="tc-subscribe-card text-center">
                                <a href="{{ $subscribeAd->link ?? '#' }}" target="_blank">
                                    <img src="{{ asset('storage/' . $subscribeAd->image_path) }}"
                                        alt="Iklan Berlangganan" class="mx-auto my-3 rounded"
                                        style="width: 300px; height: auto;">
                                </a>
                            </div>
                        </div>
                    @endif


                </div>
            </div>
        </div> <!-- end row gx-5 -->
    </div> <!-- end container -->

    <!-- end container -->

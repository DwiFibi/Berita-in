@php use Illuminate\Support\Str; @endphp
<section id="trending" class="tc-trends-news-style6">
    <div class="container">
        <div class="content pb-50">
            <strong class="color-000 text-uppercase mb-30 d-block pt-15 border-2 border-top border-dark">
                trending
                posts
            </strong>
            <div class="tc-post-grid-style6">
                <div class="tc-trends-news-slider6 tc-slider-style1">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @forelse ($trendingArticles as $index => $article)
                                <div class="swiper-slide">
                                    <div class="item">
                                        <div class="row gx-4 align-items-center">
                                            <div class="col-2">
                                                <h4 class="number">
                                                    {{ $index + 1 }}
                                                </h4>
                                            </div>
                                            <div class="col-4">
                                                <a href="{{ route('article.show', $article->id) }}"
                                                    class="img th-70 img-cover d-block">
                                                    <img src="{{ asset('storage/' . $article->image_path) }}"
                                                        alt="{{ $article->title }}">
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <div class="content">
                                                    <h5 class="title">
                                                        <a href="{{ route('article.show', $article->id) }}"
                                                            class="hover-color1 hover-underline">
                                                            {{ Str::limit($article->title, 30) }}
                                                        </a>
                                                    </h5>
                                                    <div class="meta-bot mt-10 color-666 fsz-11px text-uppercase">
                                                        <ul>
                                                            <li class="date">
                                                                <img src="https://img.icons8.com/?size=100&id=WEaFLeNOxzc7&format=png&color=000000"
                                                                    alt="Clock Icon"
                                                                    style="width: 16px; height: 16px; margin-right: 6px; vertical-align: middle;">
                                                                {{ $article->created_at->translatedFormat('d F Y') }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="swiper-slide">
                                    <div class="item">
                                        <span>Tidak
                                            ada
                                            artikel
                                            trending.</span>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <!-- arrows -->
                    <div class="swiper-button-next">
                    </div>
                    <div class="swiper-button-prev">
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- ====== start latest posts style4 ====== -->
<section id="latest" class="tc-latest-posts-style4 pt-70 pb-70">
    <div class="container">
        <div class="content pt-15 border-2 border-white border-top">
            <div class="row">
                <div class="col-lg-3 col-8">
                    <div class="d-flex justify-content-between align-items-center mb-30">
                        <p class="fw-bold text-uppercase fsz-14px">latest news</p>
                        {{-- <a href="{{ route('articles.index') }}" class="fsz-13px">See more <i class="la la-angle-right me-2"></i></a> --}}
                    </div>
                </div>
            </div>
            <div class="tc-post-grid-default">
                <div class="tc-latest-posts-slider4 tc-slider-style1">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">

                            @foreach ($latestArticles as $article)
                                <div class="swiper-slide">
                                    <div class="item">
                                        <a href="{{ route('articles.show', $article->id) }}"
                                            class="img img-cover th-180 d-block">
                                            <img src="{{ asset('storage/' . $article->image_path) }}"
                                                alt="{{ $article->title }}">
                                        </a>

                                        <div class="content pt-20">
                                            @if ($article->category)
                                                <a href="{{ route('category.show', $article->category->id) }}"
                                                    class="news-cat color-main fsz-13px text-uppercase mb-10 fw-bold">
                                                    {{ $article->category->name }}
                                                </a>
                                            @endif

                                            <h4 class="title">
                                                <a href="{{ route('articles.show', $article->id) }}">
                                                    {{ $article->title }}
                                                </a>
                                            </h4>

                                            <div class="meta-bot lh-1 mt-30">
                                                <a href="#" class="fsz-11px text-white text-uppercase">
                                                    {{ $article->published_at ? $article->published_at->diffForHumans() : $article->created_at->diffForHumans() }}
                                                    <span class="color-999">by</span>
                                                    {{ $article->author->name ?? 'Admin' }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ====== end latest posts style4 ====== -->

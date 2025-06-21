<div class="container">
    <div class="tc-post-list-style3">
        <div class="items">
            @foreach ($articles as $article)
                <div class="item mt-30">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="img th-230 img-cover overflow-hidden">
                                <img src="{{ asset('storage/' . $article->image_path) }}" alt="{{ $article->title }}">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="content mt-20 mt-lg-0">
                                <a href="#"
                                    class="color-999 fsz-13px text-uppercase mb-10">{{ $article->category->name }}</a>
                                <h4 class="title fw-bold">
                                    <a href="page-single-post-features.html" class="hover-underline">
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
        </div>
    </div>
</div>

<!-- resources/views/components/breaking-news.blade.php -->

<section class="tc-breaking-news-style6 pb-50 mt-4 mt-lg-0">
    <div class="container">
        <div class="content">
            <div class="breaking-title">
                <strong>
                    <img src="https://img.icons8.com/?size=100&id=60998&format=png&color=000000" alt="Breaking Icon"
                        style="width: 20px; height: 20px; margin-right: 8px;">
                    Breaking News
                </strong>
            </div>
            <div class="breaking-body">
                <div class="tc-breaking-news-slider6">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @forelse ($breakingNews as $article)
                                <div class="swiper-slide">
                                    <div class="item">
                                        <a href="{{ route('article.show', $article->id) }}" class="hover-underline">
                                            {{ \Illuminate\Support\Str::limit($article->title, 80) }}
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="swiper-slide">
                                    <div class="item">
                                        <span>Tidak ada berita terkini.</span>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- arrows -->
                <div class="arrows">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</section>







<!-- ====== popup categories ====== -->

<div class="offcanvas offcanvas-start sidebar-popup-style1" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        {{-- <div class="logo">
            <img src="{{ asset('assets/img/logoBeritain.png') }}" alt="" class="dark-none">
            <img src="{{ asset('assets/img/logoBeritain.png') }}" alt="" class="light-none">
        </div> --}}
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mt-4">
        <h6 class="color-000 text-uppercase mb-15 ltspc-1 d-flex align-items-center">
            About Us
            <img src="https://img.icons8.com/?size=100&id=17091&format=png&color=000000" alt="home icon"
                style="width: 16px; height: 16px;" class="ms-2">
        </h6>
        <div class="text">
            Portal berita'in memuat banyak berita hangat, trending, berita unggulan yang sangat update dan aktual sesuai
            dengan fakta.
        </div>

        <div id="kategori-sidebar" class="sidebar-categories mt-40">
            <h6 class="color-000 text-uppercase mb-30 ltspc-1 d-flex align-items-center">
                Categories
                <img src="https://img.icons8.com/?size=100&id=12616&format=png&color=000000" alt="arrow icon"
                    style="width: 16px; height: 16px;" class="ms-2">
            </h6>
            @foreach ($allCategories as $category)
                <a href="{{ route('category.show', $category->id) }}" class="cat-card">
                    <div class="img img-cover">
                        {{-- Tampilkan gambar kategori dari storage --}}
                        <img src="{{ asset('storage/' . $category->icon) }}" alt="{{ $category->name }}">
                    </div>
                    <div class="info">
                        <h5>{{ $category->name }}</h5>

                        {{-- Hitung jumlah artikel di kategori ini --}}
                        <span class="num">{{ $category->articles()->count() }}</span>
                    </div>
                </a>
            @endforeach
        </div>


        <div class="sidebar-contact-info mt-50">
            <h6 class="color-000 text-uppercase mb-20 ltspc-1 d-flex align-items-center">
                Contact & follow
                <img src="https://img.icons8.com/?size=100&id=86517&format=png&color=000000" alt="arrow icon"
                    style="width: 16px; height: 16px;" class="ms-2">
            </h6>
            <ul class="m-0">
                <li class="mb-3 d-flex align-items-center">
                    <img src="https://img.icons8.com/ios-filled/24/000000/marker.png" class="me-2" alt="Location" />
                    <a href="#">Kota Baru Driyorejo</a>
                </li>
                <li class="mb-3 d-flex align-items-center">
                    <img src="https://img.icons8.com/ios-filled/24/000000/new-post.png" class="me-2" alt="Email" />
                    <a href="#">portal@beritain.com</a>
                </li>
                <li class="mb-3 d-flex align-items-center">
                    <img src="https://img.icons8.com/ios-filled/24/000000/phone.png" class="me-2" alt="Phone" />
                    <a href="#">+62 999 69 98</a>
                </li>
            </ul>
            <div class="social-links d-flex gap-2 mt-3">
                <a href="#">
                    <img src="https://img.icons8.com/ios/24/000000/twitter.png" alt="Twitter" />
                </a>
                <a href="#">
                    <img src="https://img.icons8.com/ios/24/000000/facebook-new.png" alt="Facebook" />
                </a>
                <a href="#">
                    <img src="https://img.icons8.com/ios/24/000000/instagram-new.png" alt="Instagram" />
                </a>
                <a href="#">
                    <img src="https://img.icons8.com/ios/24/000000/youtube-play.png" alt="YouTube" />
                </a>
                <a href="#">
                    <img src="https://img.icons8.com/ios/24/000000/spotify.png" alt="Spotify" />
                </a>
            </div>
        </div>

    </div>
</div>
<!-- ====== end modals ====== -->

</main>
<!--End-Contents-->

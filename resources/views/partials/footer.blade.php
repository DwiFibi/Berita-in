<!-- ====== start footer ====== -->
<footer class="footer-style6 pt-80">
    <div class="container">
        <div class="content">
            <div class="row justify-content-between">
                <div class="col-lg-4">
                    <div class="info">
                        <h6 class="foot-tilte mb-40">Berita'in - Business Magazine</h6>
                        <ul class="contact-info m-0">
                            <li>
                                <span class="me-2">&bull;</span>
                                <span>Kota Baru Driyorejo</span>
                            </li>
                            <li>
                                <span class="me-2">&bull;</span>
                                <span>+62 999 69 98</span>
                            </li>
                            <li>
                                <span class="me-2">&bull;</span>
                                <span>portal@beritain.com</span>
                            </li>
                        </ul>
                        <div class="social-links mt-50" style="display: flex; gap: 15px; align-items: center;">
                            <a href="https://twitter.com/NamaAkunAnda" target="_blank" rel="noopener noreferrer">
                                <img src="https://img.icons8.com/?size=100&id=6Fsj3rv2DCmG&format=png&color=000000"
                                    alt="Twitter Logo" style="width:24px; height:24px;">
                            </a>
                            <a href="https://www.facebook.com/NamaHalamanAnda" target="_blank"
                                rel="noopener noreferrer">
                                <img src="https://img.icons8.com/?size=100&id=118497&format=png&color=000000"
                                    alt="Facebook Logo" style="width:24px; height:24px;">
                            </a>
                            <a href="https://instagram.com/NamaAkunAnda" target="_blank" rel="noopener noreferrer">
                                <img src="https://img.icons8.com/?size=100&id=BrU2BBoRXiWq&format=png&color=000000"
                                    alt="Instagram Logo" style="width:24px; height:24px;">
                            </a>
                            <a href="https://youtube.com/NamaChannelAnda" target="_blank" rel="noopener noreferrer">
                                <img src="https://img.icons8.com/?size=100&id=19318&format=png&color=000000"
                                    alt="YouTube Logo" style="width:24px; height:24px;">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mt-5 mt-lg-0">
                    <div class="link-group">
                        <h6 class="foot-tilte mb-40">Kategori</h6>
                        <ul>
                            @foreach ($footerCategories as $category)
                                <li>
                                    <a href="{{ route('category.show', $category->id) }}" class="f-link">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                            <li>
                                <a href="#" class="f-link" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasExample">
                                    Lainnya
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 mt-5 mt-lg-0">
                    <div class="link-group">
                        <h6 class="foot-tilte mb-40">Help</h6>
                        <ul>
                            <li>
                                <a href="https://winnicode.com" class="f-link" target="_blank">About</a>
                            </li>
                            <li>
                                <a href="https://winnicode.com" class="f-link" target="_blank">Contact</a>
                            </li>
                            <li>
                                <a href="https://winnicode.com" class="f-link" target="_blank">Advertise</a>
                            </li>
                            <li>
                                <a href="https://winnicode.com" class="f-link" target="_blank">Career</a>
                            </li>
                            <li>
                                <a href="https://winnicode.com" class="f-link" target="_blank">Policy</a>
                            </li>
                            <li>
                                <a href="https://winnicode.com" class="f-link" target="_blank">FAQ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 mt-5 mt-lg-0">
                    <div class="newsletter">
                        <h6 class="foot-tilte mb-40">newsletter</h6>
                        <div class="cont">
                            <div class="text">
                                Register now to get latest updates on promotions & coupons.
                            </div>
                            @if (session('success'))
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        Toastify({
                                            text: "{{ session('success') }}",
                                            duration: 3000,
                                            gravity: "top",
                                            position: "right",
                                            backgroundColor: "#4CAF50",
                                        }).showToast();
                                    });
                                </script>
                            @endif

                            @if ($errors->any())
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        Toastify({
                                            text: "{{ $errors->first('email') }}",
                                            duration: 3000,
                                            gravity: "top",
                                            position: "right",
                                            backgroundColor: "#f44336",
                                        }).showToast();
                                    });
                                </script>
                            @endif

                            <form action="{{ route('subscribe.store') }}" method="POST" class="form mt-30">
                                @csrf
                                <div class="form-group">
                                    <span class="icon">
                                        <img src="https://img.icons8.com/?size=100&id=86840&format=png&color=000000"
                                            alt="Envelope Icon" style="width: 20px; height: 20px;">
                                    </span>
                                    <input type="text" name="email" placeholder="Enter your email" required>
                                    <button type="submit">
                                        <span>
                                            <img src="https://img.icons8.com/?size=100&id=85940&format=png&color=000000"
                                                alt="Send Icon" style="width: 20px; height: 20px;">
                                        </span>
                                    </button>
                                </div>
                                <p class="text fst-italic fsz-14px mt-15 fw-light color-ccc">
                                    By subscribing, you accepted our
                                    <a href="#" class="text-decoration-underline fst-normal text-white">Policy</a>
                                </p>
                            </form>
                            @if (session('success'))
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        Toastify({
                                            text: "{{ session('success') }}",
                                            duration: 3000,
                                            gravity: "top",
                                            position: "right",
                                            backgroundColor: "#28a745",
                                            stopOnFocus: true,
                                        }).showToast();
                                    });
                                </script>
                            @endif

                            @if ($errors->any())
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        Toastify({
                                            text: "{{ $errors->first('email') }}",
                                            duration: 3000,
                                            gravity: "top",
                                            position: "right",
                                            backgroundColor: "#dc3545",
                                            stopOnFocus: true,
                                        }).showToast();
                                    });
                                </script>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="foot mt-100 pb-60">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="d-flex align-items-end">
                        <a href="#" class="foot-logo">
                            <img src="{{ asset('img/logoBeritain.png') }}" alt="Logo" style="height: 40px;">
                            <span style="font-size: 20px; font-weight: bold; color: #ea3f3f;">Berita'in</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center text ps-100 fsz-14px color-ccc" style="margin-top: -10px;">
            © 2025 Copyrights by <span class="text-white">Berita'in</span>. All Rights Reserved.
        </div>
    </div>
    </div>


    <!-- ====== start to top button ====== -->


    <!-- Tombol scroll to top -->
    <a href="#" class="to_top">
        <span class="material-symbols-outlined" style="font-size: 32px;">
            arrow_upward
        </span>
    </a>

    <!-- ====== end to top button ====== -->
</footer>
<!-- ====== end footer ====== -->

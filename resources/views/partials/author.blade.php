<!-- ====== start columnist ====== -->
<section id="authors" class="tc-columnist-style1 pt-60 pb-60">
    <div class="container">
        <div class="content">
            <p class="fw-bold text-uppercase fsz-14px mb-30 pt-15 border-2 border-top border-dark">Featured writers</p>
            <div class="content">
                <div class="row">
                    @foreach ($authors as $author)
                        <div class="col-12 col-md-6 col-lg-4 @if ($loop->index >= 3) mt-4 @endif">
                            <a href="{{ route('author.show', $author->id) }}"
                                class="columnist-card d-flex align-items-center h-100">
                                <div class="img img-cover icon-100 rounded-circle overflow-hidden flex-shrink-0 me-4">
                                    <img src="{{ asset('storage/' . $author->profile_image) }}"
                                        alt="{{ $author->name }}">
                                </div>
                                <div class="info">
                                    <h6 class="name fsz-20px mb-2">{{ $author->name }}</h6>
                                    <p class="fsz-13px text-muted mb-0">{{ $author->bio }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ====== end columnist ====== -->

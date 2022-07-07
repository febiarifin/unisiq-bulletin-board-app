<div class="footer">
    <div class="container">
        <div class="row pt-5 pb-3">
            <div class="col-md-4 mb-3">
                <div class="p-3 box-navigation">
                    <p class="fw-semibold">Navigasi</p>
                    <hr>
                    @foreach ($categories as $category)
                    <a href="{{ url('post/category/'.$category->slug) }}" class="mylink-primary">{{ $category->name
                        }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="p-3 box-social-media">
                    <p class="fw-semibold">Media sosial</p>
                    <hr>
                    <a href="" class="btn btn-primary btn-small mb-1"><i class="bi bi-instagram"></i> Instagram</a>
                    <a href="" class="btn btn-primary btn-small mb-1"><i class="bi bi-facebook"></i> Facebook</a>
                    <a href="" class="btn btn-primary btn-small mb-1"><i class="bi bi-twitter"></i> Twitter</a>
                    <a href="" class="btn btn-primary btn-small mb-1"><i class="bi bi-youtube"></i> YouTube</a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="p-3 box-contact">
                    <p class="fw-semibold">Kontak kami</p>
                    <hr>
                    <form action="{{ route('sendMessage') }}" method="post">
                        @csrf
                        <input type="email" class="form-control mb-2" name="email" placeholder="Input you email..."
                            required>
                        <textarea name="content" rows="2" class="form-control" placeholder="Input your message..."
                            required></textarea>
                        <button class="btn btn-primary btn-small mt-2">Kirim</button>
                    </form>
                </div>
            </div>

            <div class="mt-5">&copy 2022 {{ config('app.name') }}</div>
        </div>
    </div>
</div>
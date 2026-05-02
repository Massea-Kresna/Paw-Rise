<footer class="pr-footer">
    <div class="container">
        <div class="row align-items-start g-4">
            <div class="col-md-5">
                <a href="{{ route('home') }}" class="pr-brand"><i class="bi bi-suit-club-fill"></i> PawRise</a>
                <p class="pr-footer-tag mt-2 mb-0">© {{ date('Y') }} PawRise Indonesia. Connect Love, Saving Live.</p>
            </div>
            <div class="col-6 col-md-3">
                <ul class="list-unstyled mb-0 pr-footer-list">
                    <li><a href="#">Kebijakan Privasi</a></li>
                    <li><a href="#">Syarat &amp; Ketentuan</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-4">
                <ul class="list-unstyled mb-0 pr-footer-list">
                    <li><a href="#">Kontak Shelter</a></li>
                    <li><a href="{{ route('register') }}">Gabung Relawan</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<footer class="pr-footer">
    <div class="container">
        <div class="row align-items-start g-4">
            {{-- Brand --}}
            <div class="col-md-5">
                <a href="{{ route('home') }}" class="pr-brand mb-2 d-inline-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 100 100" fill="var(--pr-orange)">
                        <ellipse cx="25" cy="18" rx="11" ry="14"/>
                        <ellipse cx="50" cy="11" rx="11" ry="14"/>
                        <ellipse cx="75" cy="18" rx="11" ry="14"/>
                        <ellipse cx="13" cy="44" rx="9" ry="12"/>
                        <ellipse cx="87" cy="44" rx="9" ry="12"/>
                        <path d="M50 34 C33 34 20 45 20 58 C20 70 30 80 50 80 C70 80 80 70 80 58 C80 45 67 34 50 34Z"/>
                    </svg>
                    <span>PawRise</span>
                </a>
                <p class="pr-footer-tag mt-1 mb-0">© {{ date('Y') }} PawRise Indonesia. Connect Love, Saving Live.</p>
            </div>

            {{-- Column 2: Kebijakan Privasi & Syarat --}}
            <div class="col-6 col-md-3">
                <ul class="list-unstyled mb-0 pr-footer-list">
                    <li><a href="#">Kebijakan Privasi</a></li>
                    <li><a href="#">Syarat & Ketentuan</a></li>
                </ul>
            </div>

            {{-- Column 3: Kontak Shelter & Gabung Relawan --}}
            <div class="col-6 col-md-4">
                <ul class="list-unstyled mb-0 pr-footer-list">
                    <li><a href="#">Kontak Shelter</a></li>
                    <li><a href="{{ route('register') }}">Gabung Relawan</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

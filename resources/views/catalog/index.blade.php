@extends('layouts.guest')
@section('title', 'Katalog Hewan - PawRise')
@section('content')

{{-- ===== Orange hero banner with search ===== --}}
<section class="pr-cat-hero">
    <div class="container">
        <h1 class="pr-cat-hero-title">Temukan Sahabat Baru Anda</h1>
        <p class="pr-cat-hero-sub">Ribuan hewan menggemaskan menunggu rumah yang penuh kasih sayang.</p>

        <form method="GET" action="{{ route('catalog.index') }}" class="pr-cat-search-row">
            {{-- preserve sidebar filters when submitting search/location --}}
            @foreach(['species','age','size'] as $arr)
                @foreach((array) request($arr, []) as $v)
                    <input type="hidden" name="{{ $arr }}[]" value="{{ $v }}">
                @endforeach
            @endforeach
            @if(request('gender'))<input type="hidden" name="gender" value="{{ request('gender') }}">@endif
            @if(request('sort'))  <input type="hidden" name="sort"   value="{{ request('sort') }}">  @endif

            <div class="pr-cat-searchbar">
                <i class="bi bi-search pr-cat-search-icon"></i>
                <input type="text" name="q" value="{{ request('q') }}"
                       class="form-control pr-cat-search-input"
                       placeholder="Cari berdasarkan nama, ras, dll." data-testid="input-search">
                <button type="submit" class="btn pr-cat-search-btn" data-testid="button-search">Cari</button>
            </div>

            <div class="pr-cat-loc">
                <div class="pr-cat-loc-icon"><i class="bi bi-geo-alt-fill"></i></div>
                <div class="flex-grow-1">
                    <small class="pr-cat-loc-label">LOKASI</small>
                    <select name="city" class="pr-cat-loc-select" onchange="this.form.submit()" data-testid="select-location">
                        <option value="">Semua Lokasi</option>
                        @foreach($cities as $c)
                            <option value="{{ $c }}" {{ request('city') == $c ? 'selected' : '' }}>{{ $c }}</option>
                        @endforeach
                    </select>
                </div>
                <i class="bi bi-chevron-down text-muted"></i>
            </div>
        </form>
    </div>
</section>

{{-- ===== Body: filter + listing ===== --}}
<section class="pr-cat-body">
    <div class="container">
        <div class="row g-4">
            {{-- ----- Sidebar filter ----- --}}
            <aside class="col-lg-3">
                <div class="pr-filter-card">
                    <form method="GET" action="{{ route('catalog.index') }}" id="filterForm">
                        @if(request('q'))   <input type="hidden" name="q"    value="{{ request('q') }}">   @endif
                        @if(request('city'))<input type="hidden" name="city" value="{{ request('city') }}">@endif
                        @if(request('sort'))<input type="hidden" name="sort" value="{{ request('sort') }}">@endif

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6 class="pr-filter-title m-0">Filter</h6>
                            <a href="{{ route('catalog.index') }}" class="pr-filter-reset" data-testid="link-reset-filter">Reset</a>
                        </div>

                        <div class="pr-filter-group">
                            <div class="pr-filter-label">Jenis Hewan</div>
                            @foreach(['anjing'=>'Anjing','kucing'=>'Kucing','lainnya'=>'Lainnya'] as $val => $label)
                                <label class="pr-filter-check">
                                    <input type="checkbox" name="species[]" value="{{ $val }}"
                                           {{ in_array($val, (array) request('species', [])) ? 'checked' : '' }}
                                           data-testid="check-species-{{ $val }}">
                                    <span>{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>

                        <div class="pr-filter-group">
                            <div class="pr-filter-label">Umur</div>
                            @foreach([
                                'bayi'   => 'Bayi (< 6 Bulan)',
                                'muda'   => 'Muda (6 - 12 Bulan)',
                                'dewasa' => 'Dewasa (1 - 5 Tahun)',
                                'senior' => 'Senior (> 5 Tahun)'
                            ] as $val => $label)
                                <label class="pr-filter-check">
                                    <input type="checkbox" name="age[]" value="{{ $val }}"
                                           {{ in_array($val, (array) request('age', [])) ? 'checked' : '' }}
                                           data-testid="check-age-{{ $val }}">
                                    <span>{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>

                        <div class="pr-filter-group">
                            <div class="pr-filter-label">Gender</div>
                            <div class="pr-pill-group">
                                @foreach(['jantan'=>'Jantan','betina'=>'Betina'] as $val => $label)
                                    @php $active = request('gender') === $val; @endphp
                                    <label class="pr-pill {{ $active ? 'active' : '' }}" data-testid="pill-gender-{{ $val }}">
                                        <input type="radio" name="gender" value="{{ $val }}" {{ $active ? 'checked' : '' }} hidden>
                                        {{ $label }}
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="pr-filter-group">
                            <div class="pr-filter-label">Ukuran</div>
                            @foreach(['kecil'=>'Kecil','sedang'=>'Sedang','besar'=>'Besar'] as $val => $label)
                                <label class="pr-filter-check">
                                    <input type="checkbox" name="size[]" value="{{ $val }}"
                                           {{ in_array($val, (array) request('size', [])) ? 'checked' : '' }}
                                           data-testid="check-size-{{ $val }}">
                                    <span>{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>

                        <button type="submit" class="btn pr-btn-primary w-100 mt-2" data-testid="button-apply-filter">Terapkan Filter</button>
                    </form>
                </div>
            </aside>

            {{-- ----- Listing ----- --}}
            <div class="col-lg-9">
                <div class="d-flex flex-wrap justify-content-between align-items-start mb-4 gap-3">
                    <div>
                        <h3 class="pr-cat-h3 mb-1">Temukan Sahabat Barumu</h3>
                        <p class="pr-muted mb-0" data-testid="text-total-count">{{ $animals->total() }} hewan sedang mencari rumah.</p>
                    </div>

                    <form method="GET" class="pr-sort-chip">
                        @foreach(request()->except('sort','page') as $k => $v)
                            @if(is_array($v))
                                @foreach($v as $vv)<input type="hidden" name="{{ $k }}[]" value="{{ $vv }}">@endforeach
                            @else
                                <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                            @endif
                        @endforeach
                        <span class="pr-muted">Urutkan:</span>
                        <select name="sort" onchange="this.form.submit()" class="pr-sort-select" data-testid="select-sort">
                            <option value="terbaru" {{ request('sort','terbaru') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                            <option value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Terlama</option>
                        </select>
                    </form>
                </div>

                @if($animals->count())
                    <div class="row g-4">
                        @foreach($animals as $animal)
                            <div class="col-sm-6 col-xl-4">@include('partials.animal-card', ['animal' => $animal])</div>
                        @endforeach
                    </div>

                    @if($animals->hasPages())
                        <nav class="pr-pagination mt-5" aria-label="Pagination">
                            <ul>
                                <li class="{{ $animals->onFirstPage() ? 'disabled' : '' }}">
                                    <a href="{{ $animals->previousPageUrl() ?? '#' }}" data-testid="link-prev-page"><i class="bi bi-chevron-left"></i></a>
                                </li>
                                @for($i = 1; $i <= $animals->lastPage(); $i++)
                                    <li class="{{ $animals->currentPage() === $i ? 'active' : '' }}">
                                        <a href="{{ $animals->url($i) }}" data-testid="link-page-{{ $i }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="{{ ! $animals->hasMorePages() ? 'disabled' : '' }}">
                                    <a href="{{ $animals->nextPageUrl() ?? '#' }}" data-testid="link-next-page"><i class="bi bi-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    @endif
                @else
                    <div class="pr-filter-card text-center py-5">
                        <i class="bi bi-search" style="font-size: 60px; color: var(--pr-orange-light)"></i>
                        <p class="pr-muted mt-3 mb-0">Tidak ada hewan yang cocok dengan filter Anda.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<script>
    // Toggle pills for Gender (allows uncheck by clicking active)
    document.querySelectorAll('.pr-pill').forEach(p => {
        p.addEventListener('click', e => {
            const radio = p.querySelector('input[type=radio]');
            if (!radio) return;
            if (radio.checked) {
                radio.checked = false;
                p.classList.remove('active');
                e.preventDefault();
            } else {
                document.querySelectorAll('.pr-pill').forEach(o => o.classList.remove('active'));
                p.classList.add('active');
            }
        });
    });
</script>
@endsection

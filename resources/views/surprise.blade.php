<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Our Journey &amp; Love Story</title>
    <meta name="robots" content="noindex, nofollow">
    <meta name="theme-color" content="#fbe1e6">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Cormorant+Garamond:wght@600&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="sp-body">

    {{-- ============ 1. HALAMAN WELCOME ============ --}}
    <section id="welcome" class="sp-welcome fixed inset-0 z-50 flex items-center justify-center px-6 text-center">
        <div id="hearts" class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true"></div>

        <div class="relative max-w-sm">
            <p class="sp-hand text-3xl text-[#b76e79]">buat {{ $herName }}</p>
            <h1 class="sp-display mt-3 text-5xl leading-[1.05] text-[#5a3a40]">
                anu iniii ada seesuatuu<br>
            </h1>
            <p class="mt-6 text-sm text-[#8a6a70]">musiknya jgn lupa di play yaa</p>

            <div class="mt-8 flex h-16 items-center justify-center">
    <button id="openBtn" type="button" class="sp-btn rounded-full px-8 py-4 text-lg">
        bukanya klik yg ini yaa 
    </button>
</div>
        </div>
    </section>

    {{-- ============ 2. PEMUTAR MUSIK (pojok kanan atas) ============ --}}
    <audio id="bgm" src="{{ $music }}" preload="auto"></audio>
    <button id="musicBtn" type="button" class="sp-player" aria-label="Putar musik" aria-pressed="false">
        <span class="sp-vinyl" aria-hidden="true"></span>
        <span class="sp-player-icon" aria-hidden="true"></span>
    </button>

    {{-- ============ 3. BUKU ============ --}}
    <main id="stage" style="display:none" class="min-h-[100dvh] flex-col items-center justify-center px-3 py-6">
        <div class="w-full max-w-[940px]">
            <div id="book">

                {{-- Cover depan --}}
<div class="sp-page sp-cover sp-cover-photo" data-density="hard">
    <div class="sp-cover-bg" style="background-image:url('{{ $coverBg }}')"></div>
    <div class="sp-cover-frame"></div>
    <div class="sp-inner">
        <h2 class="sp-cover-title">just me<br>&amp; you</h2>
        <p class="sp-cover-sub">untuk {{ $herName }}, dari {{ $hisName }}</p>
    </div>
</div>

                {{-- Halaman 1: foto + kutipan --}}
                <div class="sp-page">
                    <div class="sp-inner">
                        <img class="sp-photo" src="{{ $photos[0] }}" alt="Foto kenangan kita" loading="lazy">
                        <p class="sp-quote">“{{ $quote }}”</p>
                        <p class="sp-p">{{ $story1 }}</p>
                        <div class="sp-divider"></div>
                    </div>
                </div>

                {{-- Halaman 2: cerita --}}
                <div class="sp-page">
                    <div class="sp-inner">
                        <h3 class="sp-h">{{ $storyTitle }}</h3>
                        <div class="sp-divider"></div>
                        <p class="sp-p">{{ $story }}</p>
                        <img class="sp-photo mt-auto" src="{{ $photos[1] }}" alt="Kenangan indah" loading="lazy">
                    </div>
                </div>

                {{-- Halaman 3: galeri polaroid (1) --}}
                <div class="sp-page">
                    <div class="sp-inner sp-gallery">
                        <h3 class="sp-h">Galeri Kita</h3>
                        <figure class="sp-polaroid sp-pl-left" style="--r:-4deg">
                            <img src="{{ $polaroids[0]['src'] }}" alt="" loading="lazy">
                            <figcaption>{{ $polaroids[0]['caption'] }}</figcaption>
                        </figure>
                        <figure class="sp-polaroid sp-pl-right" style="--r:3.5deg">
                            <img src="{{ $polaroids[1]['src'] }}" alt="" loading="lazy">
                            <figcaption>{{ $polaroids[1]['caption'] }}</figcaption>
                        </figure>
                       
                    </div>
                </div>

                {{-- Halaman 4: galeri polaroid (2) --}}
                <div class="sp-page">
                    <div class="sp-inner sp-gallery">
                        
                        <figure class="sp-polaroid sp-pl-right" style="--r:4deg">
                            <img src="{{ $polaroids[2]['src'] }}" alt="" loading="lazy">
                            <figcaption>{{ $polaroids[2]['caption'] }}</figcaption>
                        </figure>
                        <figure class="sp-polaroid sp-pl-left" style="--r:-3deg">
                            <img src="{{ $polaroids[3]['src'] }}" alt="" loading="lazy">
                            <figcaption>{{ $polaroids[3]['caption'] }}</figcaption>
                        </figure>
                    </div>
                </div>

                  {{-- Halaman 5: galeri polaroid (2) --}}
                <div class="sp-page">
                    <div class="sp-inner sp-gallery">
                        <h3 class="sp-h">Masih Galeri Kita</h3>
                        <figure class="sp-polaroid sp-pl-right" style="--r:4deg">
                            <img src="{{ $polaroids[4]['src'] }}" alt="" loading="lazy">
                            <figcaption>{{ $polaroids[4]['caption'] }}</figcaption>
                        </figure>
                        <figure class="sp-polaroid sp-pl-left" style="--r:-3deg">
                            <img src="{{ $polaroids[5]['src'] }}" alt="" loading="lazy">
                            <figcaption>{{ $polaroids[5]['caption'] }}</figcaption>
                        </figure>
                    </div>
                </div>

                {{-- Halaman 6: galeri polaroid (2) --}}
                <div class="sp-page">
                    <div class="sp-inner sp-gallery">
                        
                        <figure class="sp-polaroid sp-pl-right" style="--r:4deg">
                            <img src="{{ $polaroids[6]['src'] }}" alt="" loading="lazy">
                            <figcaption>{{ $polaroids[6]['caption'] }}</figcaption>
                        </figure>
                        <figure class="sp-polaroid sp-pl-left" style="--r:-3deg">
                            <img src="{{ $polaroids[7]['src'] }}" alt="" loading="lazy">
                            <figcaption>{{ $polaroids[7]['caption'] }}</figcaption>
                        </figure>
                    </div>
                </div>
                {{-- Halaman 6: galeri polaroid (2) --}}
                <div class="sp-page">
                    <div class="sp-inner sp-gallery">
                        
                        <figure class="sp-polaroid sp-pl-right" style="--r:4deg">
                            <img src="{{ $polaroids[8]['src'] }}" alt="" loading="lazy">
                            <figcaption>{{ $polaroids[8]['caption'] }}</figcaption>
                        </figure>
                        <figure class="sp-polaroid sp-pl-left" style="--r:-3deg">
                            <img src="{{ $polaroids[9]['src'] }}" alt="" loading="lazy">
                            <figcaption>{{ $polaroids[9]['caption'] }}</figcaption>
                        </figure>
                    </div>
                </div>
                {{-- Halaman 5: alasan --}}
                <div class="sp-page">
                    <div class="sp-inner">
                        <h3 class="sp-h">the reasson<br>why i love you</h3>
                        <ul class="sp-reasons">
                            @foreach ($reasons as $reason)
                                <li>
                                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                                    <span>{{ $reason }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                {{-- Halaman 5: alasan --}}
                <div class="sp-page">
                    <div class="sp-inner">
                        <h3 class="sp-h">the reasson<br>why i love you</h3>
                        <ul class="sp-reasons">
                            @foreach ($reasons2 as $reason2)
                                <li>
                                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                                    <span>{{ $reason2 }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- Halaman 6: surat --}}
                <div class="sp-page">
                    <div class="sp-inner">
                        <h3 class="sp-h">Surat Kecil</h3>
                        <div class="sp-divider"></div>
                        <p class="sp-p">{{ $letter }}</p>
                        <p class="sp-quote mt-auto text-right">— {{ $hisName }}</p>
                    </div>
                </div>

               <div class="sp-page sp-cover sp-cover-photo sp-back" data-density="hard">
    <div class="sp-cover-bg" style="background-image:url('{{ $backBg }}')"></div>
    <div class="sp-cover-frame"></div>
    <div class="sp-inner">
        <h3 class="sp-cover-title" style="font-size:9cqw">Sampai Jumpa<br>di Halaman Berikutnya</h3>
        <p class="sp-p">{{ $closing }}</p>
        <button id="replayBtn" type="button" class="sp-btn sp-btn-soft">Ulangi Musik 🎵</button>
        <a href="{{ $waUrl }}" target="_blank" rel="noopener" class="sp-btn">ini di klik yg iniiii 💬</a>
    </div>
</div>

            </div>
        </div>

        {{-- Navigasi --}}
        <nav class="sp-nav" aria-label="Navigasi buku">
            <button id="prevBtn" type="button" class="sp-btn sp-btn-soft" aria-label="Halaman sebelumnya">←</button>
            <span id="pageIndicator" class="min-w-[4.5rem] text-center text-sm font-semibold text-[#8a6a70]" aria-live="polite">1 / 8</span>
            <button id="nextBtn" type="button" class="sp-btn" aria-label="Halaman berikutnya">→</button>
        </nav>
        <p class="mt-3 text-xs text-[#a98a90]">Geser atau seret halaman untuk membalik</p>
    </main>

</body>
</html>
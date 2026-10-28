import { PageFlip } from 'page-flip';

document.addEventListener('DOMContentLoaded', () => {
    const welcome = document.getElementById('welcome');
    if (!welcome) return; // bukan halaman kejutan

    const stage = document.getElementById('stage');
    const bookEl = document.getElementById('book');
    const audio = document.getElementById('bgm');
    const openBtn = document.getElementById('openBtn');
    const musicBtn = document.getElementById('musicBtn');
    const replayBtn = document.getElementById('replayBtn');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const indicator = document.getElementById('pageIndicator');
    let flip = null;

    // --- Hati melayang di halaman welcome ---
    const hearts = document.getElementById('hearts');
    for (let i = 0; i < 18; i++) {
        const h = document.createElement('span');
        h.className = 'sp-heart';
        h.textContent = '♥';
        h.style.left = Math.random() * 100 + '%';
        h.style.fontSize = 14 + Math.random() * 22 + 'px';
        h.style.animationDuration = 9 + Math.random() * 9 + 's';
        h.style.animationDelay = Math.random() * 8 + 's';
        hearts.appendChild(h);
    }

    // --- Musik ---
    audio.loop = true;
    audio.volume = 0.7;
    const syncPlayer = () => {
        const playing = !audio.paused;
        document.body.classList.toggle('sp-playing', playing);
        musicBtn.setAttribute('aria-pressed', String(playing));
        musicBtn.setAttribute('aria-label', playing ? 'Jeda musik' : 'Putar musik');
    };
    audio.addEventListener('play', syncPlayer);
    audio.addEventListener('pause', syncPlayer);

    musicBtn.addEventListener('click', () => {
        audio.paused ? audio.play().catch(() => {}) : audio.pause();
    });

    replayBtn.addEventListener('click', () => {
        audio.currentTime = 0;
        audio.play().catch(() => {});
    });

    // --- Buku ---
    const updateIndicator = (page) => {
        indicator.textContent = `${page + 1} / ${flip.getPageCount()}`;
    };

    const initBook = () => {
        flip = new PageFlip(bookEl, {
            width: 400,
            height: 560,
            size: 'stretch',
            minWidth: 260,
            maxWidth: 460,
            minHeight: 364,
            maxHeight: 644,
            showCover: true,
            usePortrait: true,
            drawShadow: true,
            maxShadowOpacity: 0.45,
            flippingTime: 900,
            mobileScrollSupport: false,
            swipeDistance: 25,
            startPage: 0,
        });
        flip.loadFromHTML(document.querySelectorAll('#book .sp-page'));
        flip.on('flip', (e) => updateIndicator(e.data));
        updateIndicator(0);

        prevBtn.addEventListener('click', () => flip.flipPrev());
        nextBtn.addEventListener('click', () => flip.flipNext());
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight') flip.flipNext();
            if (e.key === 'ArrowLeft') flip.flipPrev();
        });

        // Tombol di dalam halaman tidak boleh memicu gerakan flip
        bookEl.querySelectorAll('.sp-btn').forEach((el) => {
            ['mousedown', 'touchstart'].forEach((evt) =>
                el.addEventListener(evt, (e) => e.stopPropagation(), { passive: true })
            );
        });

        // Polaroid: ketuk untuk menegakkan/memperbesar (berguna di HP)
        bookEl.querySelectorAll('.sp-polaroid').forEach((el) =>
            el.addEventListener('click', () => el.classList.toggle('sp-up'))
        );
    };

    // --- Tombol "Buka Kejutan": kabur 3x dulu, baru terbuka ---
    const openBook = () => {
        // Harus dipanggil langsung dari klik agar browser mengizinkan audio
        audio.play().catch(() => {});

        welcome.classList.add('sp-leave');
        stage.style.display = 'flex';
        stage.classList.add('sp-stage-in');
        requestAnimationFrame(initBook);

        setTimeout(() => welcome.remove(), 900);
    };

    // Teks tombol setelah tiap kali kabur. Jumlah isi array = jumlah kaburnya.
    const teasers = [
        'e tapi boonk ',
        'cie kepo bgt yah wkwwk',
        'ya uda iya inii',
    ];
    let taps = 0;

    const runAway = (label) => {
        if (openBtn.style.position !== 'fixed') {
            const r = openBtn.getBoundingClientRect();
            Object.assign(openBtn.style, {
                position: 'fixed',
                left: r.left + 'px',
                top: r.top + 'px',
                margin: '0',
                zIndex: '55',
                transition: 'left .55s cubic-bezier(.3,1.4,.5,1), top .55s cubic-bezier(.3,1.4,.5,1)',
            });
            openBtn.getBoundingClientRect(); // paksa reflow supaya transisinya jalan
        }

        openBtn.textContent = label;
        const b = openBtn.getBoundingClientRect();
        const pad = 16;
        const minY = 80; // sisakan ruang untuk tombol musik di atas
        const maxX = Math.max(pad, window.innerWidth - b.width - pad);
        const maxY = Math.max(minY, window.innerHeight - b.height - pad);

        let x, y, tries = 0;
        do {
            x = pad + Math.random() * (maxX - pad);
            y = minY + Math.random() * (maxY - minY);
            tries++;
        } while (Math.hypot(x - b.left, y - b.top) < 120 && tries < 20);

        openBtn.style.left = x + 'px';
        openBtn.style.top = y + 'px';
    };

    openBtn.addEventListener('click', () => {
        if (taps < teasers.length) {
            runAway(teasers[taps]);
            taps++;
            return;
        }
        openBook();
    });
});
{{-- Tema Toko Joses: teal, krem, oranye. Font, warna, dan kelas komponen dipakai semua layout. --}}
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=sora:600,700,800|figtree:400,500,600&display=swap" rel="stylesheet">
<style>
  :root {
    --tj-teal: #0E6B63;
    --tj-teal-dark: #0A4F49;
    --tj-teal-soft: #D6EAE6;
    --tj-cream: #FAF3E3;
    --tj-cream-deep: #F1E6CB;
    --tj-orange: #F07F1F;
    --tj-orange-dark: #C95F08;
    --tj-tag: #F07F1F;
    --tj-ink: #143A36;
    --tj-muted: #5B716D;
    --tj-line: #E6DBC0;
    --tj-surface: #FFFDF8;
    --tj-display: 'Sora', ui-sans-serif, system-ui, sans-serif;
    --tj-body: 'Figtree', ui-sans-serif, system-ui, sans-serif;
  }
  body { font-family: var(--tj-body); background: var(--tj-cream); color: var(--tj-ink); }
  h1, h2, h3, .tj-display { font-family: var(--tj-display); letter-spacing: -0.02em; }
  input[type="checkbox"] { color: var(--tj-teal); }

  .tj-card { background: var(--tj-surface); border: 1px solid var(--tj-line); border-radius: 18px; }
  .tj-muted { color: var(--tj-muted); }
  .tj-link { color: var(--tj-teal); font-weight: 600; }
  .tj-link:hover { text-decoration: underline; }

  .tj-btn { display: inline-flex; align-items: center; justify-content: center; gap: .4rem; border-radius: 999px;
            background: var(--tj-teal); color: #fff; padding: .6rem 1.3rem; font-size: .875rem; font-weight: 600;
            border: 0; cursor: pointer; transition: background .15s, transform .15s; }
  .tj-btn:hover { background: var(--tj-teal-dark); }
  .tj-btn:active { transform: scale(.98); }
  .tj-btn-quiet { background: var(--tj-surface); color: var(--tj-ink); border: 1px solid var(--tj-line); }
  .tj-btn-quiet:hover { background: var(--tj-cream-deep); }
  .tj-btn-orange { background: var(--tj-orange); color: var(--tj-ink); }
  .tj-btn-orange:hover { background: #FF9535; }
  .tj-btn:focus-visible, a:focus-visible, button:focus-visible { outline: 3px solid var(--tj-orange); outline-offset: 2px; }

  /* Label harga: kapsul oranye */
  .tj-price { display: inline-block; background: var(--tj-orange); color: var(--tj-ink); font-family: var(--tj-display);
              font-weight: 700; padding: .3rem .85rem; border-radius: 999px; }

  .tj-chip { display: inline-flex; align-items: center; gap: .35rem; border-radius: 999px; padding: .2rem .7rem;
             font-size: .75rem; font-weight: 600; background: var(--tj-teal-soft); color: var(--tj-teal-dark); }
  .tj-table th { background: var(--tj-cream-deep); color: var(--tj-muted); font-weight: 600; }
  .tj-field { border: 1px solid var(--tj-line); border-radius: 12px; background: #fff; }
  .tj-field:focus { border-color: var(--tj-teal); box-shadow: 0 0 0 3px rgba(14,107,99,.18); outline: none; }

  .tj-pill { display: inline-flex; align-items: center; gap: .5rem; border-radius: 999px; padding: .45rem .95rem;
             font-size: .875rem; font-weight: 500; border: 1px solid var(--tj-line); background: var(--tj-surface); transition: background .15s; }
  .tj-pill:hover { background: var(--tj-cream-deep); }
  .tj-pill[aria-current="true"] { background: var(--tj-teal); border-color: var(--tj-teal); color: #fff; font-weight: 600; }

  @media (prefers-reduced-motion: reduce) { * { transition: none !important; } }
</style>

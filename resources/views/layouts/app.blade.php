<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — RuangBaca</title>
    <meta name="description" content="RuangBaca, sistem manajemen perpustakaan digital.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,400,0,0&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root{color-scheme:light;--canvas:#e7fefc;--surface:#fff;--surface-soft:#f6faf8;--surface-hover:#eef7f3;--text:#181d1b;--muted:#66746e;--line:#e6eeea;--primary:#006c50;--primary-strong:#005640;--primary-soft:#d7f4e7;--primary-pale:#effaf5;--danger:#ba1a1a;--danger-soft:#ffdad6;--amber:#925b00;--amber-soft:#fff0c2;--blue:#315d9b;--blue-soft:#e4efff;--shadow:0 2px 12px rgba(15,57,43,.045);--sidebar:260px}
        html[data-theme="dark"]{color-scheme:dark;--canvas:#0b1326;--surface:#131b2e;--surface-soft:#171f33;--surface-hover:#222a3d;--text:#dae2fd;--muted:#a5b1c7;--line:#29344a;--primary:#4edea3;--primary-strong:#93f6ce;--primary-soft:#153d35;--primary-pale:#122d2a;--danger:#ffb4ab;--danger-soft:#492321;--amber:#ffd27a;--amber-soft:#493817;--blue:#a8c7ff;--blue-soft:#1e3354;--shadow:0 2px 14px rgba(0,0,0,.14)}
        *{box-sizing:border-box}html{min-height:100%;background:var(--canvas)}body{margin:0;background:var(--canvas);color:var(--text);font-family:'Plus Jakarta Sans',sans-serif;font-size:14px;line-height:1.5;-webkit-font-smoothing:antialiased}button,input{font:inherit}button,a{-webkit-tap-highlight-color:transparent}a{color:inherit;text-decoration:none}.icon{font-family:'Material Symbols Outlined';font-weight:normal;font-style:normal;font-size:20px;line-height:1;display:inline-flex;white-space:nowrap;direction:ltr;-webkit-font-feature-settings:'liga';-webkit-font-smoothing:antialiased;align-items:center;justify-content:center}
        .app-shell{min-height:100vh}.sidebar{position:fixed;inset:0 auto 0 0;z-index:60;width:var(--sidebar);padding:20px 16px 16px;background:var(--surface);border-right:1px solid var(--line);display:flex;flex-direction:column;transition:transform .25s ease}.brand{display:flex;align-items:center;gap:12px;padding:4px 10px 25px}.brand-mark{width:40px;height:40px;border-radius:13px;background:var(--primary);color:#fff;display:grid;place-items:center;box-shadow:0 5px 12px color-mix(in srgb,var(--primary) 18%,transparent)}.brand-mark .icon{font-size:24px}.brand-name{font-size:17px;font-weight:800;letter-spacing:-.6px}.brand-sub{color:var(--muted);font-size:11px;margin-top:1px}.nav-label{padding:12px 12px 8px;color:var(--muted);font-size:10px;font-weight:800;letter-spacing:1.3px;text-transform:uppercase}.nav-list{display:grid;gap:4px}.nav-item{display:flex;align-items:center;gap:12px;min-height:44px;padding:0 12px;border-radius:11px;color:var(--muted);font-weight:600;transition:background .2s,color .2s}.nav-item:hover{background:var(--surface-hover);color:var(--text)}.nav-item.active{background:var(--primary);color:#fff;box-shadow:0 4px 10px color-mix(in srgb,var(--primary) 18%,transparent)}html[data-theme="dark"] .nav-item.active{color:#08261d}.nav-item .nav-badge{margin-left:auto;font-size:10px;font-weight:800;background:var(--surface-hover);border-radius:7px;padding:2px 6px}.sidebar-spacer{flex:1}.sidebar-note{padding:16px;border-radius:14px;background:#128463;color:white;margin:18px 0 14px;position:relative;overflow:hidden}.sidebar-note:after{content:"";position:absolute;width:100px;height:100px;border:1px solid #ffffff25;border-radius:50%;right:-35px;top:-40px;box-shadow:0 0 0 15px #ffffff0a,0 0 0 30px #ffffff08}.sidebar-note .icon{font-size:23px}.sidebar-note h3{font-size:13px;margin:10px 0 5px}.sidebar-note p{font-size:11px;line-height:1.65;margin:0;color:#e1fff2}.sidebar-note a{display:inline-flex;align-items:center;gap:5px;margin-top:12px;font-size:11px;font-weight:700}.sidebar-foot{display:flex;align-items:center;gap:10px;padding:12px 8px 2px;border-top:1px solid var(--line)}.avatar{width:36px;height:36px;border-radius:50%;background:var(--primary-soft);color:var(--primary);display:grid;place-items:center;font-weight:800;font-size:12px;flex:none}.foot-name{font-weight:700;font-size:12px}.foot-role{font-size:10px;color:var(--muted);margin-top:2px}.more{margin-left:auto;color:var(--muted)}
        .main{margin-left:var(--sidebar);min-height:100vh}.topbar{height:68px;position:sticky;top:0;z-index:40;display:flex;align-items:center;gap:18px;padding:0 32px;background:color-mix(in srgb,var(--surface) 91%,transparent);backdrop-filter:blur(16px);border-bottom:1px solid var(--line)}.menu-toggle{display:none}.crumb{display:flex;align-items:center;gap:8px;color:var(--muted);font-size:12px;white-space:nowrap}.crumb strong{color:var(--text);font-weight:700}.top-search{display:flex;align-items:center;gap:9px;width:min(310px,34vw);height:38px;padding:0 12px;margin-left:12px;background:var(--surface-soft);border:1px solid var(--line);border-radius:10px;color:var(--muted)}.top-search input{width:100%;min-width:0;border:0;outline:0;background:transparent;color:var(--text);font-size:12px}.top-search input::placeholder{color:var(--muted)}.top-actions{margin-left:auto;display:flex;align-items:center;gap:10px}.icon-btn{width:38px;height:38px;border:1px solid var(--line);border-radius:11px;background:var(--surface);color:var(--muted);display:grid;place-items:center;cursor:pointer;transition:background .2s,color .2s}.icon-btn:hover{background:var(--surface-hover);color:var(--text)}.top-divider{height:30px;width:1px;background:var(--line);margin:0 3px}.top-profile{display:flex;align-items:center;gap:9px}.top-profile .avatar{width:34px;height:34px}.profile-copy{min-width:94px}.profile-copy strong{display:block;font-size:11px}.profile-copy span{display:block;color:var(--muted);font-size:10px;margin-top:1px}.content{padding:30px 32px 40px;max-width:1600px;margin:0 auto}.page-heading{display:flex;align-items:flex-end;justify-content:space-between;gap:20px;margin-bottom:26px}.eyebrow{display:flex;align-items:center;gap:7px;color:var(--primary);font-size:10px;font-weight:800;letter-spacing:1.2px;text-transform:uppercase;margin-bottom:8px}.eyebrow-dot{width:6px;height:6px;border-radius:50%;background:var(--primary)}h1{font-size:30px;letter-spacing:-1.15px;line-height:1.2;margin:0;font-weight:800} .page-heading p{color:var(--muted);font-size:12px;margin:9px 0 0}.heading-actions{display:flex;gap:9px;flex-wrap:wrap}.btn{min-height:40px;display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:0 14px;border-radius:10px;border:1px solid var(--line);background:var(--surface);color:var(--text);font-weight:700;font-size:12px;cursor:pointer;transition:transform .2s,background .2s}.btn:hover{background:var(--surface-hover)}.btn:active{transform:scale(.98)}.btn-primary{background:var(--primary);border-color:var(--primary);color:white}.btn-primary:hover{background:var(--primary-strong);border-color:var(--primary-strong)}html[data-theme="dark"] .btn-primary{color:#08261d}
        .metrics{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:16px}.metric{padding:20px;background:var(--surface);border-radius:15px;box-shadow:var(--shadow);min-width:0;position:relative;overflow:hidden}.metric-top{display:flex;align-items:center;justify-content:space-between;gap:8px}.metric-label{font-size:11px;font-weight:700;color:var(--muted)}.metric-icon{width:38px;height:38px;border-radius:12px;display:grid;place-items:center;background:var(--primary-pale);color:var(--primary)}.metric-icon.blue{background:var(--blue-soft);color:var(--blue)}.metric-icon.amber{background:var(--amber-soft);color:var(--amber)}.metric-icon.red{background:var(--danger-soft);color:var(--danger)}.metric-value{font-size:29px;font-weight:800;letter-spacing:-1.2px;margin-top:17px;line-height:1}.metric-foot{display:flex;align-items:center;gap:6px;margin-top:12px;color:var(--muted);font-size:10px}.metric-foot .icon{font-size:14px;color:var(--primary)}.metric-foot .warn{color:var(--danger)}.metric-foot strong{color:var(--text);font-weight:700}.section-grid{display:grid;grid-template-columns:minmax(0,1.65fr) minmax(280px,1fr);gap:18px;margin-top:22px}.panel{background:var(--surface);border-radius:15px;box-shadow:var(--shadow);min-width:0;overflow:hidden}.panel-head{padding:20px 22px;display:flex;align-items:center;justify-content:space-between;gap:12px}.panel-title{font-size:14px;font-weight:800;letter-spacing:-.2px}.panel-subtitle{font-size:11px;color:var(--muted);margin-top:4px}.text-link{display:inline-flex;align-items:center;gap:5px;color:var(--primary);font-size:11px;font-weight:800;white-space:nowrap}.text-link .icon{font-size:16px}.table-wrap{width:100%;overflow-x:auto}table{width:100%;border-collapse:collapse;text-align:left;white-space:nowrap}thead{background:var(--surface-soft)}th{padding:11px 18px;font-size:9px;font-weight:800;color:var(--muted);text-transform:uppercase;letter-spacing:.8px}td{padding:13px 18px;border-top:1px solid var(--line);font-size:11px}tbody tr{transition:background .15s}tbody tr:hover{background:var(--surface-soft)}.book-title{font-weight:700;font-size:11px}.book-meta{font-size:10px;color:var(--muted);margin-top:3px}.member-cell{display:flex;align-items:center;gap:9px}.mini-avatar{width:30px;height:30px;border-radius:10px;background:var(--primary-pale);color:var(--primary);display:grid;place-items:center;font-size:10px;font-weight:800;flex:none}.status{display:inline-flex;align-items:center;gap:5px;border-radius:7px;padding:5px 8px;font-size:9px;font-weight:800}.status:before{content:"";width:5px;height:5px;border-radius:50%;background:currentColor}.status-active{background:var(--primary-soft);color:var(--primary)}.status-late{background:var(--danger-soft);color:var(--danger)}.status-returned{background:var(--surface-hover);color:var(--muted)}.empty-state{padding:36px 20px;text-align:center;color:var(--muted);font-size:12px}.empty-state .icon{display:block;font-size:30px;margin:0 auto 10px;color:var(--primary)}.side-panels{display:grid;gap:18px;align-content:start}.panel-body{padding:0 20px 20px}.stock-list{display:grid;gap:16px}.stock-item{display:flex;align-items:center;gap:12px}.book-cover{width:42px;height:48px;border-radius:8px;background:var(--primary-pale);color:var(--primary);display:grid;place-items:center;flex:none}.book-cover .icon{font-size:22px}.stock-copy{min-width:0;flex:1}.stock-copy strong{display:block;font-size:11px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.stock-copy span{display:block;color:var(--muted);font-size:10px;margin-top:4px}.stock-count{font-size:10px;font-weight:800;color:var(--danger);background:var(--danger-soft);padding:5px 7px;border-radius:7px}.stock-count.ok{color:var(--primary);background:var(--primary-soft)}.quick-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:10px}.quick-link{padding:14px;border:1px solid var(--line);border-radius:12px;display:flex;align-items:center;gap:10px;transition:background .2s,border .2s}.quick-link:hover{background:var(--surface-soft);border-color:color-mix(in srgb,var(--primary) 35%,var(--line))}.quick-icon{width:34px;height:34px;display:grid;place-items:center;border-radius:10px;background:var(--primary-pale);color:var(--primary);flex:none}.quick-link strong{display:block;font-size:10px}.quick-link span{display:block;color:var(--muted);font-size:9px;margin-top:3px}.page-footer{display:flex;justify-content:space-between;gap:10px;margin-top:24px;color:var(--muted);font-size:10px}.page-footer strong{color:var(--primary)}
        .mobile-overlay{display:none}
        @media(min-width:1500px){.content{padding-left:40px;padding-right:40px}.metrics{gap:18px}.metric{padding:23px}}
        @media(max-width:1200px){.metrics{grid-template-columns:repeat(2,minmax(0,1fr))}.section-grid{grid-template-columns:minmax(0,1.35fr) minmax(250px,1fr)}.content{padding:26px 24px 34px}.topbar{padding:0 24px}.metric-value{font-size:27px}}
        @media(max-width:900px){.sidebar{transform:translateX(-102%);box-shadow:none}.sidebar.open{transform:translateX(0);box-shadow:12px 0 40px #0002}.mobile-overlay.show{display:block;position:fixed;inset:0;z-index:55;background:#07140f75;backdrop-filter:blur(2px)}.main{margin-left:0}.menu-toggle{display:grid}.section-grid{grid-template-columns:1fr}.topbar{gap:12px}.crumb{display:none}.top-search{margin-left:0;width:min(340px,42vw)}}
        @media(max-width:600px){.topbar{height:60px;padding:0 16px;gap:9px}.top-search{flex:1;width:auto}.top-actions{gap:6px}.top-actions .top-divider,.profile-copy{display:none}.top-profile .avatar{width:34px;height:34px}.content{padding:23px 16px 28px}.page-heading{align-items:flex-start;flex-direction:column;margin-bottom:20px;gap:17px}h1{font-size:26px}.page-heading p{max-width:300px;line-height:1.7}.heading-actions{width:100%}.heading-actions .btn{flex:1}.metrics{gap:11px}.metric{padding:15px;border-radius:13px}.metric-icon{width:32px;height:32px;border-radius:10px}.metric-icon .icon{font-size:18px}.metric-label{font-size:10px}.metric-value{font-size:25px;margin-top:15px}.metric-foot{font-size:9px;line-height:1.5;align-items:flex-start}.panel-head{padding:17px 16px}.panel-body{padding:0 16px 17px}th{padding:11px 13px}td{padding:12px 13px}.quick-grid{gap:8px}.quick-link{padding:10px;gap:8px}.quick-icon{width:30px;height:30px}.quick-link strong{font-size:9px}.page-footer{flex-direction:column;line-height:1.7}.top-actions .icon-btn{width:34px;height:34px}}
        @media(prefers-reduced-motion:reduce){*,*:before,*:after{transition:none!important;scroll-behavior:auto!important}}
    </style>
    @stack('styles')
</head>
<body>
<div class="app-shell">
    <aside class="sidebar" id="sidebar" aria-label="Navigasi utama">
        <a class="brand" href="{{ route('dashboard') }}">
            <span class="brand-mark"><span class="icon">auto_stories</span></span>
            <span><span class="brand-name">RuangBaca</span><span class="brand-sub" style="display:block">Library management</span></span>
        </a>
        <div class="nav-label">Workspace</div>
        <nav class="nav-list">
            <a class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><span class="icon">grid_view</span>Dashboard</a>
            <a class="nav-item" href="#buku" title="Modul buku segera hadir"><span class="icon">menu_book</span>Data Buku<span class="nav-badge">Soon</span></a>
            <a class="nav-item" href="#anggota" title="Modul anggota segera hadir"><span class="icon">groups</span>Data Anggota<span class="nav-badge">Soon</span></a>
            <a class="nav-item" href="#kategori" title="Modul kategori segera hadir"><span class="icon">category</span>Kategori Buku<span class="nav-badge">Soon</span></a>
            <div class="nav-label">Sirkulasi</div>
            <a class="nav-item" href="#peminjaman" title="Modul peminjaman segera hadir"><span class="icon">sync_alt</span>Peminjaman<span class="nav-badge">Soon</span></a>
            <a class="nav-item" href="#pengembalian" title="Modul pengembalian segera hadir"><span class="icon">assignment_return</span>Pengembalian</a>
            <a class="nav-item" href="#laporan" title="Modul laporan segera hadir"><span class="icon">summarize</span>Laporan</a>
        </nav>
        <div class="sidebar-spacer"></div>
        <div class="sidebar-note">
            <span class="icon">tips_and_updates</span>
            <h3>Perpustakaan lebih tertata.</h3>
            <p>Kelola koleksi, anggota, dan transaksi dalam satu tempat.</p>
            <a href="#peminjaman">Jelajahi fitur <span class="icon" style="font-size:15px">arrow_forward</span></a>
        </div>
        <div class="sidebar-foot">
            <span class="avatar">RB</span>
            <span><span class="foot-name">Administrator</span><span class="foot-role" style="display:block">Pengelola perpustakaan</span></span>
            <span class="icon more">more_horiz</span>
        </div>
    </aside>
    <div class="mobile-overlay" id="mobileOverlay"></div>
    <main class="main">
        <header class="topbar">
            <button class="icon-btn menu-toggle" id="menuToggle" aria-label="Buka navigasi"><span class="icon">menu</span></button>
            <div class="crumb"><span>Workspace</span><span class="icon" style="font-size:15px">chevron_right</span><strong>@yield('breadcrumb', 'Dashboard')</strong></div>
            <label class="top-search"><span class="icon" style="font-size:18px">search</span><input id="globalSearch" type="search" placeholder="Cari di halaman ini..." aria-label="Cari di halaman ini"><kbd style="font-size:9px;border:1px solid var(--line);border-radius:5px;padding:2px 5px;white-space:nowrap">/</kbd></label>
            <div class="top-actions">
                <button class="icon-btn" id="themeToggle" type="button" aria-label="Ganti tema" title="Ganti tema"><span class="icon" id="themeIcon">dark_mode</span></button>
                <div class="top-divider"></div>
                <div class="top-profile"><span class="avatar">AD</span><span class="profile-copy"><strong>Administrator</strong><span>Admin perpustakaan</span></span></div>
            </div>
        </header>
        <section class="content">
            @yield('content')
            <footer class="page-footer"><span>© {{ date('Y') }} <strong>RuangBaca</strong> · Sistem Manajemen Perpustakaan</span><span>Dibuat dengan teliti untuk pengelolaan yang lebih baik.</span></footer>
        </section>
    </main>
</div>
<script>
(() => {
    const root = document.documentElement;
    const themeButton = document.getElementById('themeToggle');
    const themeIcon = document.getElementById('themeIcon');
    const savedTheme = localStorage.getItem('ruangbaca-theme');
    if (savedTheme === 'dark' || savedTheme === 'light') root.dataset.theme = savedTheme;
    const syncThemeIcon = () => { themeIcon.textContent = root.dataset.theme === 'dark' ? 'light_mode' : 'dark_mode'; };
    syncThemeIcon();
    themeButton.addEventListener('click', () => {
        root.dataset.theme = root.dataset.theme === 'dark' ? 'light' : 'dark';
        localStorage.setItem('ruangbaca-theme', root.dataset.theme);
        syncThemeIcon();
    });
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('mobileOverlay');
    const closeMenu = () => { sidebar.classList.remove('open'); overlay.classList.remove('show'); };
    document.getElementById('menuToggle').addEventListener('click', () => { sidebar.classList.toggle('open'); overlay.classList.toggle('show'); });
    overlay.addEventListener('click', closeMenu);
    sidebar.querySelectorAll('a').forEach(link => link.addEventListener('click', () => { if (window.innerWidth <= 900) closeMenu(); }));
    const search = document.getElementById('globalSearch');
    search.addEventListener('input', () => {
        const query = search.value.trim().toLocaleLowerCase('id');
        document.querySelectorAll('[data-search-row]').forEach(row => { row.hidden = !row.textContent.toLocaleLowerCase('id').includes(query); });
        document.querySelectorAll('[data-searchable]').forEach(item => { item.hidden = query.length > 0 && !item.textContent.toLocaleLowerCase('id').includes(query); });
    });
    document.addEventListener('keydown', event => {
        if (event.key === '/' && !['INPUT','TEXTAREA'].includes(document.activeElement.tagName)) { event.preventDefault(); search.focus(); }
        if (event.key === 'Escape') { closeMenu(); search.blur(); }
    });
})();
</script>
@stack('scripts')
</body>
</html>

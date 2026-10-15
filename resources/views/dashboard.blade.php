@extends('layouts.app')

@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')
    <div class="page-heading">
        <div>
            <div class="eyebrow"><span class="eyebrow-dot"></span>Ringkasan perpustakaan</div>
            <h1>Selamat datang kembali 👋</h1>
            <p>Pantau koleksi buku dan aktivitas perpustakaanmu dari satu tempat.</p>
        </div>
        <div class="heading-actions">
            <button class="btn" type="button" onclick="window.print()"><span class="icon">download</span> Cetak ringkasan</button>
            <a class="btn btn-primary" href="#peminjaman"><span class="icon">add</span> Transaksi baru</a>
        </div>
    </div>

    <section class="metrics" aria-label="Statistik perpustakaan">
        <article class="metric">
            <div class="metric-top"><span class="metric-label">Judul buku</span><span class="metric-icon"><span class="icon">menu_book</span></span></div>
            <div class="metric-value">{{ number_format($totalBooks, 0, ',', '.') }}</div>
            <div class="metric-foot"><span class="icon">auto_stories</span><span>Terdaftar dalam koleksi</span></div>
        </article>
        <article class="metric">
            <div class="metric-top"><span class="metric-label">Anggota terdaftar</span><span class="metric-icon blue"><span class="icon">groups</span></span></div>
            <div class="metric-value">{{ number_format($totalMembers, 0, ',', '.') }}</div>
            <div class="metric-foot"><span class="icon">group_add</span><span>Anggota perpustakaan</span></div>
        </article>
        <article class="metric">
            <div class="metric-top"><span class="metric-label">Sedang dipinjam</span><span class="metric-icon amber"><span class="icon">sync_alt</span></span></div>
            <div class="metric-value">{{ number_format($activeLoans, 0, ',', '.') }}</div>
            <div class="metric-foot"><span class="icon">schedule</span><span>Dari {{ number_format($totalLoans, 0, ',', '.') }} total transaksi</span></div>
        </article>
        <article class="metric">
            <div class="metric-top"><span class="metric-label">Terlambat dikembalikan</span><span class="metric-icon red"><span class="icon">notification_important</span></span></div>
            <div class="metric-value">{{ number_format($overdueLoans, 0, ',', '.') }}</div>
            <div class="metric-foot"><span class="icon {{ $overdueLoans > 0 ? 'warn' : '' }}">{{ $overdueLoans > 0 ? 'priority_high' : 'check_circle' }}</span><span>{{ $overdueLoans > 0 ? 'Perlu ditindaklanjuti' : 'Tidak ada keterlambatan' }}</span></div>
        </article>
    </section>

    <div class="section-grid">
        <section class="panel" aria-labelledby="recent-title">
            <div class="panel-head">
                <div><div class="panel-title" id="recent-title">Aktivitas peminjaman</div><div class="panel-subtitle">Transaksi terbaru yang tercatat di sistem</div></div>
                <a href="#peminjaman" class="text-link">Lihat semua <span class="icon">arrow_forward</span></a>
            </div>
            @if($recentLoans->isNotEmpty())
                <div class="table-wrap">
                    <table>
                        <thead><tr><th>Peminjam</th><th>Buku</th><th>Tanggal pinjam</th><th>Status</th></tr></thead>
                        <tbody id="loanTableBody">
                        @foreach($recentLoans as $loan)
                            @php
                                $dueDate = $loan->tgl_jatuh_tempo ?? $loan->tgl_tatuh_tempo ?? null;
                                $isLate = !$loan->tgl_kembali && $dueDate && \Illuminate\Support\Carbon::parse($dueDate)->isPast();
                                $memberName = $loan->anggota?->nama ?? 'Anggota dihapus';
                                $bookTitle = $loan->buku?->judul ?? 'Buku dihapus';
                            @endphp
                            <tr data-search-row>
                                <td><div class="member-cell"><span class="mini-avatar">{{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($memberName, 0, 1)) }}</span><span><span class="book-title">{{ $memberName }}</span><span class="book-meta">ID #{{ $loan->id_anggota }}</span></span></div></td>
                                <td><div class="book-title">{{ $bookTitle }}</div><div class="book-meta">Transaksi #{{ $loan->id_pinjam }}</div></td>
                                <td>{{ $loan->tgl_pinjam ? \Illuminate\Support\Carbon::parse($loan->tgl_pinjam)->translatedFormat('d M Y') : '—' }}</td>
                                <td>
                                    @if($loan->tgl_kembali)
                                        <span class="status status-returned">Dikembalikan</span>
                                    @elseif($isLate)
                                        <span class="status status-late">Terlambat</span>
                                    @else
                                        <span class="status status-active">Dipinjam</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state"><span class="icon">receipt_long</span><strong>Belum ada aktivitas</strong><p style="margin:6px 0 0">Transaksi peminjaman yang baru akan muncul di sini.</p></div>
            @endif
        </section>

        <div class="side-panels">
            <section class="panel" aria-labelledby="stock-title">
                <div class="panel-head">
                    <div><div class="panel-title" id="stock-title">Stok menipis</div><div class="panel-subtitle">Buku dengan stok tersisa 2 atau kurang</div></div>
                    <span class="metric-icon red" style="width:34px;height:34px"><span class="icon">inventory_2</span></span>
                </div>
                <div class="panel-body">
                    @if($lowStockBooks->isNotEmpty())
                        <div class="stock-list">
                            @foreach($lowStockBooks as $book)
                                <div class="stock-item" data-searchable>
                                    <span class="book-cover"><span class="icon">menu_book</span></span>
                                    <span class="stock-copy"><strong>{{ $book->judul }}</strong><span>{{ $book->kategori?->nama_kategori ?? 'Tanpa kategori' }} · Rak {{ $book->lokasi_rak ?: '—' }}</span></span>
                                    <span class="stock-count">{{ $book->stok }} unit</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state" style="padding:20px 4px"><span class="icon">inventory</span><strong>Stok aman</strong><p style="margin:5px 0 0">Belum ada buku yang perlu diperiksa.</p></div>
                    @endif
                </div>
            </section>

            <section class="panel" aria-labelledby="quick-title">
                <div class="panel-head"><div><div class="panel-title" id="quick-title">Akses cepat</div><div class="panel-subtitle">Pintasan untuk pekerjaan harian</div></div></div>
                <div class="panel-body">
                    <div class="quick-grid">
                        <a class="quick-link" href="#buku"><span class="quick-icon"><span class="icon">library_add</span></span><span><strong>Tambah buku</strong><span>{{ number_format($totalCategories, 0, ',', '.') }} kategori</span></span></a>
                        <a class="quick-link" href="#anggota"><span class="quick-icon"><span class="icon">person_add</span></span><span><strong>Anggota baru</strong><span>Kelola anggota</span></span></a>
                        <a class="quick-link" href="#peminjaman"><span class="quick-icon"><span class="icon">add_card</span></span><span><strong>Peminjaman</strong><span>Buat transaksi</span></span></a>
                        <a class="quick-link" href="#laporan"><span class="quick-icon"><span class="icon">summarize</span></span><span><strong>Laporan</strong><span>Ringkasan data</span></span></a>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

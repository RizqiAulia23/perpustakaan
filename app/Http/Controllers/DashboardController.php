<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\Peminjaman;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $hasBooks = Schema::hasTable('buku');
        $hasMembers = Schema::hasTable('anggota');
        $hasCategories = Schema::hasTable('kategori_buku');
        $hasLoans = Schema::hasTable('peminjaman');

        $totalBooks = $hasBooks ? Buku::count() : 0;
        $totalMembers = $hasMembers ? Anggota::count() : 0;
        $totalCategories = $hasCategories ? KategoriBuku::count() : 0;
        $totalLoans = $hasLoans ? Peminjaman::count() : 0;

        $activeLoans = $hasLoans
            ? Peminjaman::whereNull('tgl_kembali')->count()
            : 0;

        $overdueLoans = $hasLoans
            ? Peminjaman::whereNull('tgl_kembali')
                ->whereDate('tgl_jatuh_tempo', '<', today())
                ->count()
            : 0;

        $recentLoans = collect();
        if ($hasLoans && $hasMembers && $hasBooks) {
            $recentLoans = Peminjaman::with(['anggota', 'buku'])
                ->orderByDesc('tgl_pinjam')
                ->limit(6)
                ->get();
        }

        $lowStockBooks = $hasBooks
            ? Buku::with('kategori')
                ->where('stok', '<=', 2)
                ->orderBy('stok')
                ->limit(5)
                ->get()
            : collect();

        return view('dashboard', compact(
            'totalBooks',
            'totalMembers',
            'totalCategories',
            'totalLoans',
            'activeLoans',
            'overdueLoans',
            'recentLoans',
            'lowStockBooks',
        ));
    }
}

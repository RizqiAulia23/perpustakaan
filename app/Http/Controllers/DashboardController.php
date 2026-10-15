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

        $activeLoans = $hasLoans && Schema::hasColumn('peminjaman', 'tgl_kembali')
            ? Peminjaman::whereNull('tgl_kembali')->count()
            : 0;

        $dueDateColumn = $hasLoans && Schema::hasColumn('peminjaman', 'tgl_jatuh_tempo')
            ? 'tgl_jatuh_tempo'
            : ($hasLoans && Schema::hasColumn('peminjaman', 'tgl_tatuh_tempo') ? 'tgl_tatuh_tempo' : null);

        $overdueLoans = $dueDateColumn && Schema::hasColumn('peminjaman', 'tgl_kembali')
            ? Peminjaman::whereNull('tgl_kembali')->whereDate($dueDateColumn, '<', today())->count()
            : 0;

        $recentLoans = collect();
        if ($hasLoans && $hasMembers && $hasBooks) {
            $query = Peminjaman::with(['anggota', 'buku']);

            if (Schema::hasColumn('peminjaman', 'tgl_pinjam')) {
                $query->orderByDesc('tgl_pinjam');
            } else {
                $query->orderByDesc('id_pinjam');
            }

            $recentLoans = $query->limit(6)->get();
        }

        $lowStockBooks = $hasBooks
            ? Buku::with('kategori')->where('stok', '<=', 2)->orderBy('stok')->limit(5)->get()
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

<?php

namespace Tests\Feature;

use Tests\TestCase;

class DashboardTest extends TestCase
{
    public function test_dashboard_page_loads_successfully(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('RuangBaca')
            ->assertSee('Selamat datang kembali')
            ->assertSee('Aktivitas peminjaman')
            ->assertSee('Stok menipis');
    }
}

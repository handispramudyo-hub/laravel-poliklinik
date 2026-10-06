<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Halaman login bisa diakses tanpa autentikasi.
     */
    public function test_login_page_is_available(): void
    {
        $this->get('/login')->assertStatus(200);
    }

    /**
     * Halaman register bisa diakses tanpa autentikasi.
     */
    public function test_register_page_is_available(): void
    {
        $this->get('/register')->assertStatus(200);
    }

    /**
     * Root mengarahkan tamu ke halaman login.
     */
    public function test_guest_is_redirected_to_login(): void
    {
        $this->get('/')->assertRedirect('/login');
    }

    /**
     * Route dashboard harus dilindungi middleware auth.
     */
    public function test_dashboard_requires_auth(): void
    {
        foreach (['/admin/dashboard', '/dokter/dashboard', '/pasien/dashboard'] as $uri) {
            $this->get($uri)->assertRedirect('/login');
        }
    }
}

<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test 1: Halaman login mengembalikan status HTTP 200.
     */
    public function test_login_page_returns_200(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * Test 2: Halaman register mengembalikan status HTTP 200.
     */
    public function test_register_page_returns_200(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    /**
     * Test 3: Route Google redirect mengembalikan status HTTP 302 (redirect ke Google).
     */
    public function test_google_redirect_returns_302(): void
    {
        $response = $this->get('/auth/google/redirect');

        $response->assertStatus(302);
    }

    /**
     * Test 4: Halaman utama (home) mengembalikan status HTTP 200.
     */
    public function test_home_page_returns_200(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test 5: Register gagal tanpa reCAPTCHA (redirect back with errors).
     */
    public function test_register_fails_without_recaptcha(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            // 'g-recaptcha-response' => sengaja dikosongkan
        ]);

        $response->assertSessionHasErrors('g-recaptcha-response');
    }

    /**
     * Test 6: Dashboard memerlukan autentikasi (redirect ke login jika guest).
     */
    public function test_dashboard_requires_authentication(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    /**
     * Test 7: User yang login bisa mengakses dashboard.
     */
    public function test_authenticated_user_can_access_dashboard(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
    }

    /**
     * Test 8: Halaman produk mengembalikan status HTTP 200.
     */
    public function test_products_page_returns_200(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
    }
}

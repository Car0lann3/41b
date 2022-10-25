<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_Slash()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
        // Voir https://laravel.com/docs/9.x/http-tests#assert-redirect
        $response->assertRedirect('/fr/accueil');
    }

    public function test_Accueil_FR()
    {
        $response = $this->get('/fr/accueil');
        $response->assertStatus(200);
        // Tester les valeurs passées à la vue
        // https://laravel.com/docs/8.x/http-tests#assert-view-has
        $response->assertViewHasAll([
            'title' => 'Accueil'
        ]);
        $response->assertViewHas('title', function ($title) {
            return $title == 'Accueil';
        });
    }

    public function test_Accueil_EN()
    {
        $response = $this->get('/en/accueil');
        $response->assertStatus(200);
        // Tester les valeurs passées à la vue
        // https://laravel.com/docs/8.x/http-tests#assert-view-has
        $response->assertViewHasAll([
            'title' => 'Accueil'
        ]);
    }

    public function test_Apropos_FR()
    {
        $response = $this->get('/fr/a-propos');
        $response->assertStatus(200);
        // Tester les valeurs passées à la vue
        // https://laravel.com/docs/8.x/http-tests#assert-view-has
        $response->assertViewHasAll([
            'title' => 'À propos'
        ]);
        $response->assertViewIs('page');
    }

    public function test_404()
    {
        $response = $this->get('/frt/not-found');
        $response->assertStatus(404);
    }
}

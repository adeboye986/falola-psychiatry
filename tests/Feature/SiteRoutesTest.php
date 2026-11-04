<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class SiteRoutesTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_home_page_renders_the_phase_one_foundation(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertViewIs('home')
            ->assertSee('Falola Psychiatry Practice')
            ->assertSee('Phase 1 foundation');
    }

    #[DataProvider('placeholderPages')]
    public function test_sitemap_placeholder_pages_render(string $uri, string $heading): void
    {
        $response = $this->get($uri);

        $response
            ->assertOk()
            ->assertViewIs('pages.placeholder')
            ->assertSee($heading)
            ->assertSee('No medical or professional information has been inferred or added.');
    }

    /**
     * @return array<string, array{string, string}>
     */
    public static function placeholderPages(): array
    {
        return [
            'about' => ['/about', 'About'],
            'services' => ['/services', 'Services'],
            'service detail' => ['/services/content-pending', 'Service Detail'],
            'telepsychiatry' => ['/telepsychiatry', 'Telepsychiatry'],
            'patient information' => ['/patient-information', 'Patient Information'],
            'appointments' => ['/appointments', 'Appointments'],
            'patient portal' => ['/patient-portal', 'Patient Portal'],
            'contact' => ['/contact', 'Contact'],
        ];
    }
}

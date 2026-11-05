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

    public function test_home_page_renders_the_approved_homepage_content(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertViewIs('home')
            ->assertSee('Mental Health Care')
            ->assertSee('Dr. Michael Falola, M.D., M.P.H.')
            ->assertSee('Accepted Insurance')
            ->assertSee('https://d2oe0ra32qx05a.cloudfront.net/?practiceKey=k_1_110057', false)
            ->assertDontSee('board-certified', false);
    }

    public function test_home_page_links_every_service_card_to_its_detail_route(): void
    {
        $response = $this->get('/');

        $response->assertOk();

        foreach ([
            'adhd',
            'anxiety',
            'depression',
            'bipolar-disorders',
            'trauma',
            'ocd',
            'addiction',
            'schizophrenia',
            'brief-psychotherapies',
            'academic-coaching',
        ] as $service) {
            $response->assertSee('href="'.route('services.show', ['service' => $service]).'"', false);
        }
    }

    public function test_about_page_renders_verified_physician_content(): void
    {
        $response = $this->get('/about');

        $response
            ->assertOk()
            ->assertViewIs('about')
            ->assertSee('Dr. Michael Falola, M.D., M.P.H.')
            ->assertSee('University of Alabama at Birmingham')
            ->assertSee('Current and Past Appointments')
            ->assertSee('https://www.researchgate.net/profile/Michael-Falola', false)
            ->assertSee('https://www.psychiatryonline.org/doi/10.1176/appi.pn.2018.6a26', false)
            ->assertSee('https://d2oe0ra32qx05a.cloudfront.net/?practiceKey=k_1_110057', false)
            ->assertDontSee('board-certified', false);
    }

    public function test_services_page_renders_every_verified_service_and_destination(): void
    {
        $response = $this->get('/services');

        $response
            ->assertOk()
            ->assertViewIs('services')
            ->assertSee('Areas of Care and Treatment')
            ->assertSee('Interactive video and audio care')
            ->assertSee('https://d2oe0ra32qx05a.cloudfront.net/?practiceKey=k_1_110057', false);

        foreach ([
            'adhd' => 'ADHD',
            'anxiety' => 'Anxiety',
            'depression' => 'Depression',
            'bipolar-disorders' => 'Bipolar Disorders',
            'trauma' => 'Trauma',
            'ocd' => 'OCD',
            'addiction' => 'Addiction',
            'schizophrenia' => 'Schizophrenia',
            'brief-psychotherapies' => 'Brief Psychotherapies',
            'academic-coaching' => 'Academic Coaching',
        ] as $slug => $name) {
            $response
                ->assertSee($name)
                ->assertSee('href="'.route('services.show', ['service' => $slug]).'"', false);
        }
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
            'service detail' => ['/services/content-pending', 'Service Detail'],
            'telepsychiatry' => ['/telepsychiatry', 'Telepsychiatry'],
            'patient information' => ['/patient-information', 'Patient Information'],
            'appointments' => ['/appointments', 'Appointments'],
            'patient portal' => ['/patient-portal', 'Patient Portal'],
            'contact' => ['/contact', 'Contact'],
        ];
    }
}

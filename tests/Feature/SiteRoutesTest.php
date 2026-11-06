<?php

namespace Tests\Feature;

use App\Support\ServicePageCatalog;
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

        foreach (ServicePageCatalog::slugs() as $service) {
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
            ->assertSee('Support for patterns of inattention, hyperactivity, and impulsivity')
            ->assertSee('Support focused on study strategies, time management, organization, and academic goals.')
            ->assertSee('https://d2oe0ra32qx05a.cloudfront.net/?practiceKey=k_1_110057', false)
            ->assertDontSee("is listed among the practice's areas of care");

        foreach (self::servicePages() as [$slug, $name]) {
            $response
                ->assertSee($name)
                ->assertSee('href="'.route('services.show', ['service' => $slug]).'"', false);
        }
    }

    public function test_telepsychiatry_page_renders_verified_information_and_shared_actions(): void
    {
        $response = $this->get('/telepsychiatry');

        $response
            ->assertOk()
            ->assertViewIs('telepsychiatry')
            ->assertSee('Convenient Virtual Care')
            ->assertSee('Important: Location Requirement')
            ->assertSee('Telepsychiatry services are available only to patients who are physically located in Alabama at the time of their appointment.')
            ->assertSee('href="#how-it-works"', false)
            ->assertSee('href="'.route('contact').'"', false)
            ->assertSee('https://d2oe0ra32qx05a.cloudfront.net/?practiceKey=k_1_110057', false)
            ->assertDontSee('HIPAA-compliant')
            ->assertDontSee('secure link');
    }

    public function test_telepsychiatry_page_photographs_are_unique_files(): void
    {
        $imagePaths = [
            public_path('images/telepsychiatry/hero.webp'),
            public_path('images/telepsychiatry/how-it-works.webp'),
            public_path('images/telepsychiatry/compassionate-care.webp'),
        ];

        $imageHashes = [];

        foreach ($imagePaths as $imagePath) {
            $this->assertFileExists($imagePath);
            $imageHashes[] = hash_file('sha256', $imagePath);
        }

        $this->assertCount(3, array_unique($imagePaths));
        $this->assertCount(3, array_unique($imageHashes));
    }

    public function test_patient_information_page_renders_verified_resources_and_destinations(): void
    {
        $response = $this->get('/patient-information');

        $response
            ->assertOk()
            ->assertViewIs('patient-information')
            ->assertSee('Helpful Information for Your Care')
            ->assertSee('Preparing for Your Visit')
            ->assertSee('Confirm Current Details')
            ->assertSee('Quick Answers from Verified Information')
            ->assertSee('Access the External Patient Portal')
            ->assertSee('href="#appointments"', false)
            ->assertSee('href="#insurance"', false)
            ->assertSee('href="#fees-payment"', false)
            ->assertSee('href="#frequently-asked-questions"', false)
            ->assertSee('https://d2oe0ra32qx05a.cloudfront.net/?practiceKey=k_1_110057', false)
            ->assertSee('https://portal.kareo.com/pp-webapp/app/new/login', false)
            ->assertSee('target="_blank"', false)
            ->assertDontSee('$300')
            ->assertDontSee('$350')
            ->assertDontSee('manage your care');
    }

    public function test_patient_information_page_photographs_are_unique_files(): void
    {
        $imagePaths = [
            public_path('images/patient-information/hero.webp'),
            public_path('images/patient-information/appointments.webp'),
            public_path('images/patient-information/insurance-payment.webp'),
            public_path('images/patient-information/patient-portal.webp'),
        ];

        $imageHashes = [];

        foreach ($imagePaths as $imagePath) {
            $this->assertFileExists($imagePath);
            $imageHashes[] = hash_file('sha256', $imagePath);
        }

        $this->assertCount(4, array_unique($imagePaths));
        $this->assertCount(4, array_unique($imageHashes));
    }

    #[DataProvider('servicePages')]
    public function test_each_service_detail_page_renders_its_content_and_shared_actions(string $slug, string $name): void
    {
        $servicePage = ServicePageCatalog::find($slug);
        $this->assertNotNull($servicePage);

        $response = $this->get(route('services.show', ['service' => $slug]));

        $response
            ->assertOk()
            ->assertViewIs('services.show')
            ->assertViewHas('service', fn (array $service): bool => $service['name'] === $name)
            ->assertSee('<h1', false)
            ->assertSee($name)
            ->assertSee($servicePage['overview_heading'])
            ->assertSee('Common Concerns')
            ->assertSee('Important Note')
            ->assertSee('general educational information')
            ->assertSee('href="'.route('services.index').'"', false)
            ->assertSee('href="'.route('contact').'"', false)
            ->assertSee('href="'.route('services.show', ['service' => $slug]).'"', false)
            ->assertSee('images/services/details/'.$slug.'.webp', false)
            ->assertSee('https://d2oe0ra32qx05a.cloudfront.net/?practiceKey=k_1_110057', false);
    }

    public function test_unknown_service_detail_returns_not_found(): void
    {
        $this->get('/services/not-a-service')->assertNotFound();
    }

    public function test_service_detail_photographs_are_unique_files(): void
    {
        $imagePaths = [];
        $imageHashes = [];

        foreach (ServicePageCatalog::slugs() as $slug) {
            $service = ServicePageCatalog::find($slug);
            $this->assertNotNull($service);

            $imagePath = public_path('images/services/details/'.$service['hero_image']);
            $this->assertFileExists($imagePath);

            $imagePaths[] = $imagePath;
            $imageHashes[] = hash_file('sha256', $imagePath);
        }

        $this->assertCount(10, array_unique($imagePaths));
        $this->assertCount(10, array_unique($imageHashes));
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

    /** @return array<string, array{string, string}> */
    public static function servicePages(): array
    {
        return [
            'ADHD' => ['adhd', 'ADHD'],
            'anxiety' => ['anxiety', 'Anxiety'],
            'depression' => ['depression', 'Depression'],
            'bipolar disorders' => ['bipolar-disorders', 'Bipolar Disorders'],
            'trauma' => ['trauma', 'Trauma'],
            'OCD' => ['ocd', 'OCD'],
            'addiction' => ['addiction', 'Addiction'],
            'schizophrenia' => ['schizophrenia', 'Schizophrenia'],
            'brief psychotherapies' => ['brief-psychotherapies', 'Brief Psychotherapies'],
            'academic coaching' => ['academic-coaching', 'Academic Coaching'],
        ];
    }

    /** @return array<string, array{string, string}> */
    public static function placeholderPages(): array
    {
        return [
            'appointments' => ['/appointments', 'Appointments'],
            'patient portal' => ['/patient-portal', 'Patient Portal'],
            'contact' => ['/contact', 'Contact'],
        ];
    }
}

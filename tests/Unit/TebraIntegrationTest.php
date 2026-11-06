<?php

namespace Tests\Unit;

use App\Support\TebraIntegration;
use Illuminate\Config\Repository;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class TebraIntegrationTest extends TestCase
{
    private const PORTAL_URL = 'https://portal.kareo.com/pp-webapp/app/new/login';

    private const SCHEDULER_URL = 'https://d2oe0ra32qx05a.cloudfront.net/?practiceKey=k_1_110057';

    public function test_it_accepts_the_approved_destinations_and_iframe_settings(): void
    {
        $integration = $this->integration([
            'scheduler_url' => self::SCHEDULER_URL,
            'portal_url' => self::PORTAL_URL,
            'scheduler_mode' => 'iframe',
            'scheduler_timeout_ms' => 7000,
        ]);

        $this->assertSame(self::SCHEDULER_URL, $integration->schedulerUrl());
        $this->assertSame(self::PORTAL_URL, $integration->portalUrl());
        $this->assertSame('iframe', $integration->schedulerMode());
        $this->assertTrue($integration->shouldEmbedScheduler());
        $this->assertSame('https://d2oe0ra32qx05a.cloudfront.net', $integration->schedulerOrigin());
        $this->assertSame(7000, $integration->schedulerTimeoutMs());
    }

    #[DataProvider('invalidSchedulerUrls')]
    public function test_it_rejects_unapproved_scheduler_destinations(mixed $url): void
    {
        $integration = $this->integration([
            'scheduler_url' => $url,
            'scheduler_mode' => 'iframe',
        ]);

        $this->assertNull($integration->schedulerUrl());
        $this->assertFalse($integration->shouldEmbedScheduler());
        $this->assertNull($integration->schedulerOrigin());
    }

    public function test_it_rejects_unapproved_portal_destinations(): void
    {
        $integration = $this->integration([
            'portal_url' => 'https://portal.kareo.com.attacker.example/login',
        ]);

        $this->assertNull($integration->portalUrl());
    }

    public function test_it_falls_back_to_safe_mode_and_bounded_timeout_values(): void
    {
        $integration = $this->integration([
            'scheduler_url' => self::SCHEDULER_URL,
            'scheduler_mode' => 'unexpected',
            'scheduler_timeout_ms' => 'invalid',
        ]);

        $this->assertSame('external', $integration->schedulerMode());
        $this->assertFalse($integration->shouldEmbedScheduler());
        $this->assertSame(12000, $integration->schedulerTimeoutMs());

        $this->assertSame(3000, $this->integration(['scheduler_timeout_ms' => 250])->schedulerTimeoutMs());
        $this->assertSame(30000, $this->integration(['scheduler_timeout_ms' => 90000])->schedulerTimeoutMs());
    }

    /** @return array<string, array{mixed}> */
    public static function invalidSchedulerUrls(): array
    {
        return [
            'null' => [null],
            'empty' => [''],
            'non-https' => ['http://d2oe0ra32qx05a.cloudfront.net/?practiceKey=test'],
            'unapproved host' => ['https://example.com/schedule'],
            'lookalike host' => ['https://d2oe0ra32qx05a.cloudfront.net.attacker.example/schedule'],
            'embedded credentials' => ['https://user:pass@d2oe0ra32qx05a.cloudfront.net/schedule'],
            'unapproved port' => ['https://d2oe0ra32qx05a.cloudfront.net:8443/schedule'],
            'fragment' => ['https://d2oe0ra32qx05a.cloudfront.net/schedule#patient'],
        ];
    }

    /** @param array<string, mixed> $tebraConfig */
    private function integration(array $tebraConfig): TebraIntegration
    {
        return new TebraIntegration(new Repository(['tebra' => $tebraConfig]));
    }
}

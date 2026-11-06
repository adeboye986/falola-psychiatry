<?php

namespace App\Support;

use Illuminate\Contracts\Config\Repository;

final class TebraIntegration
{
    private const DEFAULT_TIMEOUT_MS = 12000;

    private const MAX_TIMEOUT_MS = 30000;

    private const MIN_TIMEOUT_MS = 3000;

    /** @var list<string> */
    private const PORTAL_HOSTS = [
        'portal.kareo.com',
    ];

    /** @var list<string> */
    private const SCHEDULER_HOSTS = [
        'd2oe0ra32qx05a.cloudfront.net',
    ];

    public function __construct(private readonly Repository $config) {}

    public function schedulerUrl(): ?string
    {
        return $this->validatedUrl(
            $this->config->get('tebra.scheduler_url'),
            self::SCHEDULER_HOSTS,
        );
    }

    public function portalUrl(): ?string
    {
        return $this->validatedUrl(
            $this->config->get('tebra.portal_url'),
            self::PORTAL_HOSTS,
        );
    }

    public function schedulerMode(): string
    {
        $mode = $this->config->get('tebra.scheduler_mode');

        return in_array($mode, ['external', 'iframe'], true) ? $mode : 'external';
    }

    public function shouldEmbedScheduler(): bool
    {
        return $this->schedulerMode() === 'iframe' && $this->schedulerUrl() !== null;
    }

    public function schedulerOrigin(): ?string
    {
        $schedulerUrl = $this->schedulerUrl();

        if ($schedulerUrl === null) {
            return null;
        }

        $host = parse_url($schedulerUrl, PHP_URL_HOST);

        return is_string($host) ? 'https://'.strtolower($host) : null;
    }

    public function schedulerTimeoutMs(): int
    {
        $timeout = filter_var(
            $this->config->get('tebra.scheduler_timeout_ms'),
            FILTER_VALIDATE_INT,
        );

        if ($timeout === false) {
            return self::DEFAULT_TIMEOUT_MS;
        }

        return min(max($timeout, self::MIN_TIMEOUT_MS), self::MAX_TIMEOUT_MS);
    }

    /** @param list<string> $allowedHosts */
    private function validatedUrl(mixed $value, array $allowedHosts): ?string
    {
        if (! is_string($value)) {
            return null;
        }

        $url = trim($value);

        if ($url === '' || filter_var($url, FILTER_VALIDATE_URL) === false) {
            return null;
        }

        $parts = parse_url($url);

        if (! is_array($parts)) {
            return null;
        }

        $scheme = strtolower((string) ($parts['scheme'] ?? ''));
        $host = strtolower((string) ($parts['host'] ?? ''));
        $port = $parts['port'] ?? null;

        if (
            $scheme !== 'https'
            || ! in_array($host, $allowedHosts, true)
            || isset($parts['user'])
            || isset($parts['pass'])
            || isset($parts['fragment'])
            || ($port !== null && $port !== 443)
        ) {
            return null;
        }

        return $url;
    }
}

<?php declare(strict_types = 1);

namespace Faker\Test\Provider;

use Faker\Provider\UserAgent;
use PHPUnit\Framework\TestCase;

final class UserAgentTest extends TestCase
{
    public function testRandomUserAgent(): void
    {
        $this->assertNotNull(UserAgent::userAgent());
    }

    public function testFirefoxUserAgent(): void
    {
        $this->assertStringContainsString(' Firefox/', UserAgent::firefox());
    }

    public function testSafariUserAgent(): void
    {
        $this->assertStringContainsString('Safari/', UserAgent::safari());
    }

    public function testInternetExplorerUserAgent(): void
    {
        $this->assertStringStartsWith('Mozilla/5.0 (compatible; MSIE ', UserAgent::internetExplorer());
    }

    public function testOperaUserAgent(): void
    {
        $this->assertStringStartsWith('Opera/', UserAgent::opera());
    }

    public function testChromeUserAgent(): void
    {
        $this->assertStringContainsString('(KHTML, like Gecko) Chrome/', UserAgent::chrome());
    }
}

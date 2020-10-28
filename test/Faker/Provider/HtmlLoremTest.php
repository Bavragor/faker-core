<?php declare(strict_types = 1);

namespace Faker\Test\Provider;

use Faker\Generator;
use Faker\Provider\HtmlLorem;
use PHPUnit\Framework\TestCase;

final class HtmlLoremTest extends TestCase
{
    public function testProvider(): void
    {
        $faker = new Generator();
        $faker->addProvider(new HtmlLorem($faker));
        $node = $faker->randomHtml(6, 10);
        $this->assertStringStartsWith('<html>', $node);
        $this->assertStringEndsWith("</html>\n", $node);
    }

    public function testRandomHtmlReturnsValidHTMLString(): void
    {
        $faker = new Generator();
        $faker->addProvider(new HtmlLorem($faker));
        $node = $faker->randomHtml(6, 10);
        $dom = new \DOMDocument();
        $error = $dom->loadHTML($node);
        $this->assertTrue($error);
    }
}

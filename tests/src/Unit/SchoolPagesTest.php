<?php

declare(strict_types=1);

namespace Drupal\Tests\my_module\Unit;

use Drupal\my_module\SchoolPages;
use Drupal\Tests\UnitTestCase;

/**
 * Проверяет реестр страниц сайта и согласованность с шаблонами и routing.yml.
 *
 * @coversDefaultClass \Drupal\my_module\SchoolPages
 * @group my_module
 */
class SchoolPagesTest extends UnitTestCase {

  /**
   * @covers ::exists
   * @covers ::title
   */
  public function testExistsAndTitle(): void {
    $this->assertTrue(SchoolPages::exists('index'));
    $this->assertTrue(SchoolPages::exists('album'));
    $this->assertFalse(SchoolPages::exists('no-such-page'));
    $this->assertNotSame('', SchoolPages::title('news'));
    $this->assertSame('', SchoolPages::title('no-such-page'));
  }

  /**
   * @covers ::subpages
   */
  public function testSubpagesExcludeHome(): void {
    $this->assertNotContains(SchoolPages::HOME, SchoolPages::subpages());
    $this->assertCount(count(SchoolPages::PAGES) - 1, SchoolPages::subpages());
  }

  /**
   * У каждой страницы есть шаблон, а список в routing.yml полный.
   */
  public function testTemplatesAndRoutingMatchRegistry(): void {
    $module = dirname(__DIR__, 3);
    foreach (array_keys(SchoolPages::PAGES) as $page) {
      $this->assertFileExists("$module/templates/school/pages/$page.html.twig");
    }
    $routing = file_get_contents("$module/my_module.routing.yml");
    $this->assertNotFalse($routing);
    foreach (SchoolPages::subpages() as $page) {
      $this->assertMatchesRegularExpression('/[\'|]' . preg_quote($page, '/') . '[|\']/', $routing, $page);
    }
  }

}

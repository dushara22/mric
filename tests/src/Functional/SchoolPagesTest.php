<?php

declare(strict_types=1);

namespace Drupal\Tests\my_module\Functional;

use Drupal\my_module\SchoolPages;
use Drupal\Tests\BrowserTestBase;

/**
 * Проверяет, что страницы сайта СДЮШОР №4 отдаются модулем.
 *
 * @group my_module
 */
class SchoolPagesTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['my_module'];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * Все страницы открываются анонимно и содержат шапку сайта.
   */
  public function testAllPagesRender(): void {
    $this->drupalGet('/school');
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->pageTextContains('СДЮШОР №4');
    $this->assertSession()->elementExists('css', 'nav .dropdown');

    foreach (SchoolPages::subpages() as $page) {
      $this->drupalGet('/school/' . $page);
      $this->assertSession()->statusCodeEquals(200);
    }
  }

  /**
   * Неизвестная страница — 404, а /school/index не дублирует главную.
   */
  public function testUnknownPageIs404(): void {
    $this->drupalGet('/school/no-such-page');
    $this->assertSession()->statusCodeEquals(404);
    $this->drupalGet('/school/index');
    $this->assertSession()->statusCodeEquals(404);
  }

}

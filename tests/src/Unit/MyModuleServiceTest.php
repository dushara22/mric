<?php

declare(strict_types=1);

namespace Drupal\Tests\my_module\Unit;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Config\ImmutableConfig;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\Core\Logger\LoggerChannelInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\my_module\Service\MyModuleService;
use Drupal\Tests\UnitTestCase;

/**
 * @coversDefaultClass \Drupal\my_module\Service\MyModuleService
 * @group my_module
 */
class MyModuleServiceTest extends UnitTestCase {

  /**
   * Тестируемый сервис.
   */
  protected MyModuleService $service;

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    // Мокаем конфигурацию.
    $config = $this->createMock(ImmutableConfig::class);
    $config->method('get')
      ->willReturnMap([
        ['welcome_message', 'Тестовое приветствие'],
        ['enable_feature', TRUE],
      ]);

    $configFactory = $this->createMock(ConfigFactoryInterface::class);
    $configFactory->method('get')
      ->with('my_module.settings')
      ->willReturn($config);

    // Мокаем текущего пользователя.
    $currentUser = $this->createMock(AccountProxyInterface::class);
    $currentUser->method('isAnonymous')->willReturn(FALSE);
    $currentUser->method('getDisplayName')->willReturn('TestUser');

    // Мокаем логгер.
    $logger = $this->createMock(LoggerChannelInterface::class);
    $loggerFactory = $this->createMock(LoggerChannelFactoryInterface::class);
    $loggerFactory->method('get')->willReturn($logger);

    // Создаём сервис.
    $this->service = new MyModuleService(
      $configFactory,
      $currentUser,
      $loggerFactory,
    );
  }

  /**
   * @covers ::getGreeting
   */
  public function testGetGreeting(): void {
    $result = $this->service->getGreeting();
    $this->assertStringContainsString('Тестовое приветствие', $result);
    $this->assertStringContainsString('TestUser', $result);
  }

  /**
   * @covers ::isFeatureEnabled
   */
  public function testIsFeatureEnabled(): void {
    $this->assertTrue($this->service->isFeatureEnabled());
  }

}
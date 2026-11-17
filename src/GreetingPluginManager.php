<?php

declare(strict_types=1);

namespace Drupal\my_module;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\my_module\Attribute\Greeting;

/**
 * Менеджер плагинов «Greeting» (src/Plugin/Greeting/*).
 */
class GreetingPluginManager extends DefaultPluginManager {

  /**
   * Конструктор.
   *
   * @param \Traversable $namespaces
   *   Пространства имён модулей и тем.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Кэш определений плагинов.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   Обработчик модулей.
   */
  public function __construct(
    \Traversable $namespaces,
    CacheBackendInterface $cache_backend,
    ModuleHandlerInterface $module_handler,
  ) {
    parent::__construct(
      'Plugin/Greeting',
      $namespaces,
      $module_handler,
      GreetingInterface::class,
      Greeting::class,
    );
    $this->alterInfo('my_module_greeting_info');
    $this->setCacheBackend($cache_backend, 'my_module_greeting_plugins');
  }

}

<?php

declare(strict_types=1);

namespace Drupal\my_module\Service;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Psr\Log\LoggerInterface;

/**
 * Кастомный сервис модуля My Module.
 *
 * Содержит бизнес-логику, используемую в контроллерах, блоках и других
 * компонентах модуля.
 */
class MyModuleService {

  /**
   * Логгер модуля.
   *
   * @var \Psr\Log\LoggerInterface
   */
  protected readonly LoggerInterface $logger;

  /**
   * Конструктор сервиса.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $configFactory
   *   Фабрика конфигурации Drupal.
   * @param \Drupal\Core\Session\AccountProxyInterface $currentUser
   *   Текущий пользователь.
   * @param \Drupal\Core\Logger\LoggerChannelFactoryInterface $loggerFactory
   *   Фабрика каналов логирования.
   */
  public function __construct(
    protected readonly ConfigFactoryInterface $configFactory,
    protected readonly AccountProxyInterface $currentUser,
    LoggerChannelFactoryInterface $loggerFactory,
  ) {
    $this->logger = $loggerFactory->get('my_module');
  }

  /**
   * Возвращает приветствие для текущего пользователя.
   *
   * @return string
   *   Персонализированное приветствие.
   */
  public function getGreeting(): string {
    $config = $this->configFactory->get('my_module.settings');

    $baseMessage = $config->get('welcome_message');

    if (!is_string($baseMessage) || trim($baseMessage) === '') {
      $baseMessage = 'Привет';
    }

    $username = $this->currentUser->isAnonymous()
      ? 'Гость'
      : $this->currentUser->getDisplayName();

    if (!is_string($username) || trim($username) === '') {
      $username = 'Пользователь';
    }

    return sprintf('%s, %s!', trim($baseMessage), trim($username));
  }

  /**
   * Проверяет, включена ли дополнительная функция.
   *
   * @return bool
   *   TRUE, если функция включена, иначе FALSE.
   */
  public function isFeatureEnabled(): bool {
    $enabled = $this->configFactory
      ->get('my_module.settings')
      ->get('enable_feature');

    return $enabled === TRUE || $enabled === 1 || $enabled === '1';
  }

  /**
   * Записывает действие пользователя в журнал Drupal.
   *
   * @param string $action
   *   Описание выполненного действия.
   */
  public function logAction(string $action): void {
    $action = trim($action);

    if ($action === '') {
      $this->logger->warning(
        'Попытка записать действие без описания.'
      );
      return;
    }

    $username = $this->currentUser->isAnonymous()
      ? 'Гость'
      : $this->currentUser->getDisplayName();

    $this->logger->info(
      'Пользователь @user выполнил действие: @action',
      [
        '@user' => $username,
        '@action' => $action,
      ]
    );
  }

}

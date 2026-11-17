<?php

declare(strict_types=1);

namespace Drupal\my_module\EventSubscriber;

use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Event Subscriber модуля My Module.
 *
 * Подписывается на события HTTP-ядра Symfony.
 */
class MyModuleSubscriber implements EventSubscriberInterface {

  use StringTranslationTrait;

  /**
   * Конструктор.
   */
  public function __construct(
    protected readonly AccountProxyInterface $currentUser,
    protected readonly MessengerInterface $messenger,
  ) {}

  /**
   * {@inheritdoc}
   *
   * Определяем, на какие события подписываемся.
   */
  public static function getSubscribedEvents(): array {
    return [
      // Событие при входящем запросе (приоритет 100 — высокий).
      KernelEvents::REQUEST => ['onRequest', 100],
      // Событие перед отправкой ответа.
      KernelEvents::RESPONSE => ['onResponse'],
    ];
  }

  /**
   * Обработчик события REQUEST.
   *
   * @param \Symfony\Component\HttpKernel\Event\RequestEvent $event
   *   Объект события.
   */
  public function onRequest(RequestEvent $event): void {
    // Пример: логируем запросы к нашему модулю.
    $path = $event->getRequest()->getPathInfo();

    if (str_starts_with($path, '/my-module')) {
      \Drupal::logger('my_module')->debug('Request to my_module: @path', [
        '@path' => $path,
      ]);
    }
  }

  /**
   * Обработчик события RESPONSE.
   *
   * @param \Symfony\Component\HttpKernel\Event\ResponseEvent $event
   *   Объект события.
   */
  public function onResponse(ResponseEvent $event): void {
    // Пример: добавляем кастомный HTTP-заголовок.
    $response = $event->getResponse();
    $response->headers->set('X-My-Module', 'active');
  }

}
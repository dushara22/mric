<?php

declare(strict_types=1);

namespace Drupal\my_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\my_module\Service\MyModuleService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Контроллер для страниц модуля My Module.
 */
class MyModuleController extends ControllerBase {

  /**
   * Конструктор — инъекция зависимостей.
   *
   * @param \Drupal\my_module\Service\MyModuleService $myModuleService
   *   Наш кастомный сервис.
   */
  public function __construct(
    protected readonly MyModuleService $myModuleService,
  ) {}

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container): static {
    return new static(
      $container->get('my_module.service'),
    );
  }

  /**
   * Главная страница модуля.
   *
   * @return array
   *   Render array.
   */
  public function mainPage(): array {
    // Получаем приветственное сообщение из нашего сервиса.
    $greeting = $this->myModuleService->getGreeting();

    // Получаем настройки модуля из конфигурации.
    $config = $this->config('my_module.settings');
    $site_message = $config->get('welcome_message') ?? 'Добро пожаловать!';

    // Формируем список элементов для отображения.
    $items = [
      $this->t('Это кастомный модуль для Drupal 11'),
      $this->t('Создан в учебных целях'),
      $this->t('Используй его как шаблон для своих проектов'),
    ];

    // Возвращаем render array.
    return [
      // Используем наш кастомный Twig-шаблон.
      '#theme' => 'my_module_page',
      '#greeting' => $greeting,
      '#message' => $site_message,
      '#items' => $items,

      '#attached' => [
        'library' => [
          'my_module/main',
        ],
      ],

      '#cache' => [
        'tags' => [
          'config:my_module.settings',
        ],
        'max-age' => 3600,
      ],
    ];
  }

  /**
   * Детальная страница с параметром из URL.
   *
   * @param string $name
   *   Параметр из URL.
   *
   * @return array
   *   Render array.
   */
  public function detailPage(string $name): array {
    return [
      '#type' => 'markup',
      '#markup' => $this->t(
        'Привет, @name! Это детальная страница.',
        [
          '@name' => $name,
        ]
      ),
    ];
  }

  /**
   * Пример JSON-ответа.
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   *   JSON-ответ.
   */
  public function jsonEndpoint(): JsonResponse {
    $data = [
      'status' => 'ok',
      'module' => 'my_module',
      'time' => date('Y-m-d H:i:s'),
    ];

    return new JsonResponse($data);
  }

}
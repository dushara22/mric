<?php

declare(strict_types=1);

namespace Drupal\my_module\Plugin\rest\resource;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\my_module\Service\MyModuleService;
use Drupal\rest\Attribute\RestResource;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * REST-ресурс для получения информации модуля.
 */
#[RestResource(
  id: "my_module_resource",
  label: new TranslatableMarkup("My Module Resource"),
  uri_paths: [
    "canonical" => "/api/my-module/{id}",
    "create" => "/api/my-module",
  ],
)]
class MyModuleResource extends ResourceBase {

  /**
   * Конструктор.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    array $serializer_formats,
    LoggerInterface $logger,
    protected readonly MyModuleService $myModuleService,
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $serializer_formats, $logger);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(
    ContainerInterface $container,
    array $configuration,
    $plugin_id,
    $plugin_definition,
  ): static {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->getParameter('serializer.formats'),
      $container->get('logger.factory')->get('rest'),
      $container->get('my_module.service'),
    );
  }

  /**
   * Обрабатывает GET-запрос.
   *
   * @param int $id
   *   ID записи.
   *
   * @return \Drupal\rest\ResourceResponse
   *   REST-ответ.
   */
  public function get(int $id): ResourceResponse {
    $data = [
      'id' => $id,
      'greeting' => $this->myModuleService->getGreeting(),
      'feature_enabled' => $this->myModuleService->isFeatureEnabled(),
      'timestamp' => time(),
    ];

    $response = new ResourceResponse($data, 200);
    // Ответ зависит от времени и пользователя — не кэшируем.
    $response->addCacheableDependency((new CacheableMetadata())->setCacheMaxAge(0));

    return $response;
  }

  /**
   * Обрабатывает POST-запрос.
   *
   * @param mixed $data
   *   Десериализованное тело запроса.
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   HTTP-запрос.
   *
   * @return \Drupal\rest\ResourceResponse
   *   REST-ответ.
   */
  public function post(mixed $data, Request $request): ResourceResponse {
    // Здесь логика сохранения данных...
    $this->logger->notice('New data received via REST: @data', [
      '@data' => json_encode($data),
    ]);

    return new ResourceResponse(['status' => 'created'], 201);
  }

}

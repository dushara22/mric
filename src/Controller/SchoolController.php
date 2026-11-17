<?php

declare(strict_types=1);

namespace Drupal\my_module\Controller;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Cache\CacheableResponse;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Extension\ModuleExtensionList;
use Drupal\Core\File\FileUrlGeneratorInterface;
use Drupal\Core\Render\RendererInterface;
use Drupal\my_module\SchoolPages;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Отдаёт страницы сайта СДЮШОР №4.
 *
 * Сайт — это бывший статический сайт (27 HTML-страниц). Теперь каждая страница
 * — Twig-шаблон в templates/school/pages/, а шапка, меню и подвал общие
 * (templates/school/_header|_nav|_footer.html.twig). Ответ формируется как
 * самостоятельный HTML-документ, чтобы вёрстка сайта не смешивалась с темой
 * Drupal (Olivero/Claro).
 */
class SchoolController extends ControllerBase {

  /**
   * Конструктор — инъекция зависимостей.
   */
  public function __construct(
    protected readonly RendererInterface $renderer,
    protected readonly FileUrlGeneratorInterface $fileUrlGenerator,
    protected readonly ModuleExtensionList $moduleList,
  ) {}

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container): static {
    return new static(
      $container->get('renderer'),
      $container->get('file_url_generator'),
      $container->get('extension.list.module'),
    );
  }

  /**
   * Страница сайта.
   *
   * @param string $page
   *   Машинное имя страницы (см. SchoolPages::PAGES).
   *
   * @return \Drupal\Core\Cache\CacheableResponse
   *   Готовый HTML-документ.
   *
   * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
   *   Если такой страницы нет.
   */
  public function page(string $page = SchoolPages::HOME): CacheableResponse {
    if (!SchoolPages::exists($page)) {
      throw new NotFoundHttpException();
    }

    $assets = $this->fileUrlGenerator->generateString(
      $this->moduleList->getPath('my_module') . '/assets'
    );

    $build = [
      '#theme' => 'my_module_school_document',
      '#school_page' => $page,
      '#school_title' => SchoolPages::title($page),
      '#assets' => $assets,
      '#lang' => 'ru',
      '#cache' => [
        'tags' => ['my_module:school'],
      ],
    ];

    $html = $this->renderer->renderInIsolation($build);

    $response = new CacheableResponse();
    $response->setContent((string) $html);
    $response->addCacheableDependency(CacheableMetadata::createFromRenderArray($build));

    return $response;
  }

}

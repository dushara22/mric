<?php

declare(strict_types=1);

namespace Drupal\my_module\Plugin\Block;

use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\my_module\Service\MyModuleService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Блок приветствия.
 *
 * PHP-атрибут #[Block] — это способ определения плагинов в Drupal 11.
 * Он заменяет @Block аннотации из Drupal 9/10.
 */
#[Block(
  id: "my_module_welcome_block",
  admin_label: new TranslatableMarkup("Welcome Block"),
  category: new TranslatableMarkup("My Module"),
)]
class WelcomeBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Конструктор.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    protected readonly MyModuleService $myModuleService,
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
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
      $container->get('my_module.service'),
    );
  }

  /**
   * {@inheritdoc}
   *
   * Значения конфигурации блока по умолчанию.
   */
  public function defaultConfiguration(): array {
    return [
      'block_message' => 'Привет из блока!',
      'show_greeting' => TRUE,
    ];
  }

  /**
   * {@inheritdoc}
   *
   * Форма настроек блока (отображается в UI при размещении блока).
   */
  public function blockForm($form, FormStateInterface $form_state): array {
    $form['block_message'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Сообщение блока'),
      '#default_value' => $this->configuration['block_message'],
    ];

    $form['show_greeting'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Показывать приветствие'),
      '#default_value' => $this->configuration['show_greeting'],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state): void {
    $this->configuration['block_message'] = $form_state->getValue('block_message');
    $this->configuration['show_greeting'] = $form_state->getValue('show_greeting');
  }

  /**
   * {@inheritdoc}
   *
   * Построение содержимого блока.
   */
  public function build(): array {
    $build = [];

    $build['message'] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => $this->configuration['block_message'],
    ];

    if ($this->configuration['show_greeting']) {
      $build['greeting'] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#attributes' => ['class' => ['greeting']],
        '#value' => $this->myModuleService->getGreeting(),
      ];
    }

    // Кэш-теги для корректной инвалидации.
    $build['#cache'] = [
      'tags' => ['config:my_module.settings'],
      'contexts' => ['user'],  // Кэш зависит от пользователя.
    ];

    return $build;
  }

}
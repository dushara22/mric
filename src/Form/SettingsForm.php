<?php

declare(strict_types=1);

namespace Drupal\my_module\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Форма настроек модуля.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'my_module_settings_form';
  }

  /**
   * {@inheritdoc}
   *
   * Список конфигурационных объектов, которые редактирует эта форма.
   */
  protected function getEditableConfigNames(): array {
    return [
      'my_module.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $config = $this->config('my_module.settings');

    $form['welcome_message'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Приветственное сообщение'),
      '#default_value' => $config->get('welcome_message') ?? '',
      '#description' => $this->t(
        'Сообщение, которое отображается на главной странице модуля.'
      ),
      '#required' => TRUE,
    ];

    $form['items_per_page'] = [
      '#type' => 'number',
      '#title' => $this->t('Элементов на странице'),
      '#default_value' => $config->get('items_per_page') ?? 10,
      '#min' => 1,
      '#max' => 100,
      '#required' => TRUE,
    ];

    $form['enable_feature'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Включить дополнительную функцию'),
      '#default_value' => (bool) ($config->get('enable_feature') ?? FALSE),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(
    array &$form,
    FormStateInterface $form_state
  ): void {
    $this->config('my_module.settings')
      ->set(
        'welcome_message',
        $form_state->getValue('welcome_message')
      )
      ->set(
        'items_per_page',
        (int) $form_state->getValue('items_per_page')
      )
      ->set(
        'enable_feature',
        (bool) $form_state->getValue('enable_feature')
      )
      ->save();

    parent::submitForm($form, $form_state);
  }

}

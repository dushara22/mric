<?php

declare(strict_types=1);

namespace Drupal\my_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Форма обратной связи.
 */
class ContactForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'my_module_contact_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Ваше имя'),
      '#required' => TRUE,
      '#maxlength' => 128,
      '#placeholder' => $this->t('Введите ваше имя...'),
      '#description' => $this->t('Укажите своё полное имя.'),
    ];

    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Электронная почта'),
      '#required' => TRUE,
      '#maxlength' => 254,
      '#placeholder' => 'you@example.com',
      '#description' => $this->t('Укажите действующий адрес электронной почты.'),
    ];

    $form['subject'] = [
      '#type' => 'select',
      '#title' => $this->t('Тема обращения'),
      '#options' => [
        'question' => $this->t('Вопрос'),
        'suggestion' => $this->t('Предложение'),
        'bug' => $this->t('Ошибка'),
        'other' => $this->t('Другое'),
      ],
      '#default_value' => 'question',
      '#required' => TRUE,
    ];

    $form['message'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Сообщение'),
      '#required' => TRUE,
      '#rows' => 6,
      '#maxlength' => 5000,
      '#description' => $this->t('Опишите ваш вопрос или предложение подробно.'),
    ];

    $form['agree'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Я согласен с обработкой персональных данных'),
      '#required' => TRUE,
    ];

    $form['actions'] = [
      '#type' => 'actions',
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Отправить'),
      '#button_type' => 'primary',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(
    array &$form,
    FormStateInterface $form_state,
  ): void {

    // Проверяем имя.
    $name = trim((string) $form_state->getValue('name'));

    if (mb_strlen($name) < 2) {
      $form_state->setErrorByName(
        'name',
        $this->t('Имя должно содержать минимум 2 символа.'),
      );
    }

    // Проверяем email.
    $email = trim((string) $form_state->getValue('email'));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $form_state->setErrorByName(
        'email',
        $this->t('Введите корректный адрес электронной почты.'),
      );
    }

    // Проверяем тему.
    $subject = $form_state->getValue('subject');

    $allowed_subjects = [
      'question',
      'suggestion',
      'bug',
      'other',
    ];

    if (!in_array($subject, $allowed_subjects, TRUE)) {
      $form_state->setErrorByName(
        'subject',
        $this->t('Выберите корректную тему обращения.'),
      );
    }

    // Проверяем сообщение.
    $message = trim((string) $form_state->getValue('message'));

    if (mb_strlen($message) < 10) {
      $form_state->setErrorByName(
        'message',
        $this->t('Сообщение должно быть не короче 10 символов.'),
      );
    }

    // Проверяем согласие.
    if (!$form_state->getValue('agree')) {
      $form_state->setErrorByName(
        'agree',
        $this->t('Необходимо согласиться с обработкой персональных данных.'),
      );
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(
    array &$form,
    FormStateInterface $form_state,
  ): void {

    $name = trim((string) $form_state->getValue('name'));
    $email = trim((string) $form_state->getValue('email'));
    $subject = (string) $form_state->getValue('subject');
    $message = trim((string) $form_state->getValue('message'));

    // Получаем человекочитаемое название темы.
    $subject_labels = [
      'question' => $this->t('Вопрос'),
      'suggestion' => $this->t('Предложение'),
      'bug' => $this->t('Ошибка'),
      'other' => $this->t('Другое'),
    ];

    $subject_label = $subject_labels[$subject] ?? $this->t('Другое');

    // Показываем сообщение об успешной отправке.
    $this->messenger()->addStatus(
      $this->t(
        'Спасибо, @name! Ваше обращение «@subject» отправлено. Ответ придёт на @email.',
        [
          '@name' => $name,
          '@subject' => $subject_label,
          '@email' => $email,
        ],
      ),
    );

    // Записываем информацию в журнал Drupal.
    $this->getLogger('my_module')->notice(
      'Contact form submitted by @name (@email). Subject: @subject.',
      [
        '@name' => $name,
        '@email' => $email,
        '@subject' => $subject_label,
      ],
    );

    // При необходимости здесь можно сохранить обращение в БД
    // или отправить его на электронную почту.

    // Перенаправляем пользователя на главную страницу модуля.
    $form_state->setRedirect('my_module.main_page');
  }

}

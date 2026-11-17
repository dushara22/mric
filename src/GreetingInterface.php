<?php

declare(strict_types=1);

namespace Drupal\my_module;

/**
 * Интерфейс для плагинов приветствий.
 */
interface GreetingInterface {

  /**
   * Возвращает текст приветствия.
   *
   * @param string $name
   *   Имя пользователя.
   *
   * @return string
   *   Текст приветствия.
   */
  public function greet(string $name): string;

}
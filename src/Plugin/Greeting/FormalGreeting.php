<?php

declare(strict_types=1);

namespace Drupal\my_module\Plugin\Greeting;

use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\my_module\Attribute\Greeting;
use Drupal\my_module\GreetingInterface;

/**
 * Формальное приветствие.
 */
#[Greeting(
  id: "formal",
  label: new TranslatableMarkup("Formal Greeting"),
  description: new TranslatableMarkup("A polite, formal greeting."),
)]
class FormalGreeting implements GreetingInterface {

  /**
   * {@inheritdoc}
   */
  public function greet(string $name): string {
    return sprintf('Добрый день, уважаемый %s!', $name);
  }

}
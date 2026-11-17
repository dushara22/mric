<?php

declare(strict_types=1);

namespace Drupal\my_module\Attribute;

use Drupal\Component\Plugin\Attribute\Plugin;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Атрибут для плагинов типа Greeting.
 */
#[\Attribute(\Attribute::TARGET_CLASS)]
class Greeting extends Plugin {

  public function __construct(
    public readonly string $id,
    public readonly TranslatableMarkup $label,
    public readonly TranslatableMarkup $description = new TranslatableMarkup(''),
  ) {}

}
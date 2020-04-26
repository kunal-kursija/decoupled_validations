<?php

namespace Drupal\decoupled_validations\Plugin\Validation\Constraint;

use Drupal\Core\Annotation\Translation;
use Symfony\Component\Validator\Constraint;

/**
 * Class YoutubeSummary.
 *
 * @Constraint(
 *   id = "YoutubeSummary",
 *   label = @Translation("Youtube Summary", context = "Validation"),
 * )
 */
class YoutubeSummary extends Constraint {

  /**
   * Invalid summary message.
   *
   * @var string
   */
  public $invalidSummaryError = '%value is invalid. Summary Length should be more than 10 characters.';

}
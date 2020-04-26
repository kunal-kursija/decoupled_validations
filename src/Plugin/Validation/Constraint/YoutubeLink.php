<?php

namespace Drupal\decoupled_validations\Plugin\Validation\Constraint;

use Drupal\Core\Annotation\Translation;
use Symfony\Component\Validator\Constraint;

/**
 * Class YoutubeLink.
 *
 * @Constraint(
 *   id = "YoutubeLink",
 *   label = @Translation("Youtube Link", context = "Validation"),
 * )
 */
class YoutubeLink extends Constraint {

  /**
   * Invalid link message.
   *
   * @var string
   */
  public $invalidLinkError = '%value is invalid. Please enter youtube URLs only.';

}
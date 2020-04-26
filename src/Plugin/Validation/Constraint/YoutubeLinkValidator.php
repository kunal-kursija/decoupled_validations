<?php

namespace Drupal\decoupled_validations\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the YoutubeLink constraint.
 */
class YoutubeLinkValidator extends ConstraintValidator {

  /**
   * {@inheritDoc}
   */
  public function validate($value, Constraint $constraint) {
    // Extract link uri from the submitted field value.
    $field_data = $value->first()->getValue();
    $link = $field_data['uri'];

    // Add violation if validation fails.
    if (!$this->isYoutubeLink($link)) {
      $this->context->addViolation($constraint->invalidLinkError, ['%value' => $link]);
    }
  }

  /**
   * Checks if the link is valid Youtube URL.
   *
   * @param string $link
   *   Input Link.
   *
   * @return bool
   *   Returns True/False.
   */
  public function isYoutubeLink($link) {
    // If the link contain text youtube, Validation passes.
    if (strpos($link, 'youtube') > 0) {
      return TRUE;
    }

    // Winter is here.
    return FALSE;
  }

}

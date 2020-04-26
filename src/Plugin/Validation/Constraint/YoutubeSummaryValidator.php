<?php

namespace Drupal\decoupled_validations\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the YoutubeSummary constraint.
 */
class YoutubeSummaryValidator extends ConstraintValidator {

  /**
   * {@inheritDoc}
   */
  public function validate($value, Constraint $constraint) {
    // NOTE: $value is node-entity here.
    // Extract summary from the submitted field value.
    if ($value->hasField('field_video_summary')) {
      $summary = $value->get('field_video_summary')->value;
      // Add violation if validation fails.
      if ($this->isInvalidSummary($summary)) {
        $this->context->addViolation($constraint->invalidSummaryError, ['%value' => $summary]);
      }
    }
  }

  /**
   * Checks if the summary is valid.
   *
   * @param string $summary
   *   Input Summary.
   *
   * @return bool
   *   Returns True/False.
   */
  public function isInvalidSummary($summary) {
    // If the summary length is less than 10 chars.
    if (strlen($summary) < 10) {
      return TRUE;
    }

    // Winter is here.
    return FALSE;
  }

}

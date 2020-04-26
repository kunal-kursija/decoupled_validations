<?php

namespace Drupal\decoupled_validations\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;

/**
 * Class CreateMovieTrailer.
 */
class CreateMovieTrailer extends ControllerBase {

  /**
   * Controller Callback.
   *
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function build() {
    // Setting Node Values.
    $node = Node::create(
      [
        'type' => 'movie_trailer',
        'title' => 'Soul - From Custom Route',
        'langcode' => 'en',
        'uid' => 1,
        'status' => 1,
        'field_video_url' => 'https://www.google.com/watch/one',
        'field_video_summary' => '12345'
      ]
    );

    /** @var \Drupal\Core\Entity\EntityConstraintViolationList $violations */
    $violations = $node->validate();

    // If we have any failed validations, Get Error.
    if ($violations->count() > 0) {
      $markup[] = '<p class="messages messages--error">Below Violations have been found while created the movie trailer...</p>';
      foreach ($violations as $violation_key => $violation_value) {
        $markup[] = ++$violation_key . ' ----> ' . $violation_value->getMessage();
      }
      $markup = implode('<br />', $markup);
    }
    else {
      $node->save();
      $markup = $this->t('Movie Trailer was created.');
    }

    // Return the markup.
    return [
      '#type' => 'markup',
      '#markup' => $markup,
    ];
  }

}
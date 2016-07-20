<?php

/**
 * @file
 * Definition of Drupal\views_bootstrap_complement\Plugin\views\style\ViewsBootstrapCarousel.
 */

namespace Drupal\views_bootstrap_complement\Plugin\views\style;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;

/**
 * Style plugin to render each item as a row in a Bootstrap Carousel.
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "views_bootstrap_carousel",
 *   title = @Translation("Bootstrap Carousel"),
 *   help = @Translation("Displays rows in a Bootstrap Carousel."),
 *   theme = "views_bootstrap_carousel",
 *   display_types = {"normal"}
 * )
 */
class ViewsBootstrapCarousel extends StylePluginBase {
  /**
   * Does the style plugin for itself support to add fields to it's output.
   *
   * @var bool
   */
  protected $usesFields = TRUE;
  
  /**
   * Definition.
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    
    $options['image_field'] = array('default' => array());
    $options['caption_field'] = array('default' => array());

    return $options;
  }

  /**
   * Render the given style.
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
    
    $form['image_field'] = array(
      '#type' => 'select',
      '#title' => $this->t('Image field'),
      '#options' => $this->displayHandler->getFieldLabels(TRUE),
      '#required' => TRUE,
      '#default_value' => $this->options['image_field'],
      '#description' => $this->t('Select the field that will be used as the image.'),
    );
    
    $form['caption_field'] = array(
      '#type' => 'select',
      '#title' => $this->t('Caption field'),
      '#options' => array_merge($this->displayHandler->getFieldLabels(TRUE), array(null => '- NONE -')),
      '#required' => FALSE,
      '#default_value' => $this->options['caption_field'],
      '#description' => $this->t('Select the field that will be used as the caption.'),
    );
  }
}

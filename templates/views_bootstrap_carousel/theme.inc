<?php
/**
 * @file
 * Preprocessors and helper functions to make theming easier.
 */
 
/**
 * Prepares variables for views carousel templates.
 *
 * Default template: views-bootstrap-carousel.html.twig.
 *
 * @param array $vars
 *   An associative array containing:
 *   - view: A ViewExecutable object.
 *   - rows: The raw row data.
 */
function template_preprocess_views_bootstrap_carousel(&$vars) {
  $image_field = $vars['view']->style_plugin->options['image_field'];
  $caption_field = $vars['view']->style_plugin->options['caption_field'];
  
  $vars['attributes']['class'][] = 'panel-group';
  
  foreach ($vars['rows'] as $id => $row) {
    $vars['rows'][$id] = array();
    $vars['rows'][$id]['content'] = $row;
    $vars['rows'][$id]['image'] = $vars['view']->style_plugin->getField($id, $image_field);
    $vars['rows'][$id]['caption'] = $vars['view']->style_plugin->getField($id, $caption_field);
  }
 
  //@TODO: Make sure that $vars['rows'] is rendered array.
  //@SEE: Have a look template_preprocess_views_view_unformatted() and views-view-unformatted.html.twig  
}

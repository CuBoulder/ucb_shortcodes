<?php

namespace Drupal\ucb_shortcodes\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "Button Shortcode" plugin.
 *
 * @CKEditorPlugin(
 *   id = "ucb_button_shortcode",
 *   label = @Translation("Button"),
 *   module = "ucb_shortcodes"
 * )
 */
class ButtonShortcode extends CKEditorPluginBase {
  /**
   * {@inheritdoc}
   *  @return - the path to the plugin file
   */
  public function getFile() {
    $path = drupal_get_path('module', 'ucb_shortcodes') . "/plugins/ucb_button_shortcode";
    return $path . "/plugin.js";
  }

  /**
   * {@inheritdoc}
   */
  public function isInternal() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function getButtons() {
    return [
      'ButtonGenerator' => [
        'label' => t('Button'),
        'image' =>  drupal_get_path('module', 'ucb_shortcodes') . "/plugins/ucb_button_shortcode/icons/ucb_button_shortcode.png",
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
    return [];
  }

}


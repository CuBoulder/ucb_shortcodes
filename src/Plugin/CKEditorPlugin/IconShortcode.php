<?php

namespace Drupal\ucb_shortcodes\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "Icon Shortcode" plugin.
 * plugin from https://github.com/ed3/ckeditorfa
 *
 * @CKEditorPlugin(
 *   id = "ckeditorfa5",
 *   label = @Translation("Insert Icon"),
 *   module = "ucb_shortcodes"
 * )
 */
class IconShortcode extends CKEditorPluginBase {
  /**
   * {@inheritdoc}
   *  @return - the path to the plugin file
   */
  public function getFile() {
    $path = drupal_get_path('module', 'ucb_shortcodes') . "/plugins/ckeditorfa5";
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
      'ckeditorfa' => [ 
        'label' => t('FontAwesome5 icons'),
        'image' =>  drupal_get_path('module', 'ucb_shortcodes') . "/plugins/ckeditorfa5/icons/ckeditorfa5.png",
      ]
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
    return [];
  }

}
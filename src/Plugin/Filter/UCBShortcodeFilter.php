<?php
namespace Drupal\ucb_shortcodes\Plugin\Filter;

use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;


/**
 * @Filter(
 *   id = "filter_ucb_shortcodes",
 *   title = @Translation("CU Shortcode Filter"),
 *   description = @Translation("Transform shortcodes into HTML"),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_MARKUP_LANGUAGE,
 * )
 */

class UCBShortcodeFilter extends FilterBase {
  public function process($text, $langcode){
    $new_text;
    $temp = [];
    $pattern = '/(\[([\w|-]+)[^\]]*\])(.*?)(\[\/\2\])/';
    preg_match_all($pattern, $text, $matches);
    for($i =0; $i < count($matches[0]); $i++){
      // change the shortcodes to the html tags
      $sc = [
        '[button', '[/button]',
        '[icon', '[/icon]',
        ']' // make sure this ] is last in the array
      ];
      $html = [
        '<a', '</a>',
        '<i', '</i>',
        '>' // make sure this > is last in the array
      ];
      $temp[] = str_replace( $sc, $html, $matches[0][$i]);
    }
    $new_text = str_replace( $matches[0], $temp, $text);
    return new FilterProcessResult($new_text);
  }
}
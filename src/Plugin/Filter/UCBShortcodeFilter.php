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
  /**
   * function to replace button shortcode with html
   */
  public function parseButtonShortcode($text){
    $pattern = '/\[button\surl="(.*)"\scolor="(.*?)"(?:\ssize="(.*?)")?(?:\sstyle="(.*?)")?(?:\sicon="(.*)")?\](.*)\[\/button]/';
    preg_match_all($pattern, $text, $matches, PREG_UNMATCHED_AS_NULL);
    if( !isset($matches[0][0]) ) return $text;
    $new_text = $text;
    for($i = 0; $i < count($matches[0]); $i++){
      /**
       * Capture Groups are as followed:
       * 1 => url, 2 => color, 3 => size, 4 => style, 5 => icon, 6 => text
       * 
       */
      $size = $matches[3][$i] ?? 'regular';
      $style = $matches[4][$i] ?? 'regular';
      $text = $matches[5][$i] ? "<i class='fas {$matches[5][$i]}'> </i> {$matches[6][$i]}" : $matches[6][$i] ;
      $tag = "<a href='{$matches[1][$i]}' class='button button-{$matches[2][$i]} button-{$size} button-{$style}'> {$text} </a>";
      $new_text = str_replace( $matches[0][$i], $tag, $new_text);
    }
    return $new_text;
  }

  /**
   * function to replace icon shortcode with html
   */
  public function parseIconShortcode($text){
    $pattern = '/\[icon\sshape="(.*?)"(?:\ssize="(.*?)")?(?:\spull="(.*?)")?(?:\scolor="(.*?)")?(?:\swrapper="(.*?)")?\s\/\]/';
    preg_match_all($pattern, $text, $matches, PREG_UNMATCHED_AS_NULL);
    if( !isset($matches[0][0]) ) return $text;
    $new_text = $text;
    for($i = 0; $i < count($matches[0]); $i++){
      /*
       * Capture Groups are as followed:
       * 1 => shape, 2 => size, 3 => pull, 4 => color, 5 => wrapper
       * 
       */
      $icon = $matches[1][$i];
      // tag doenst have the prefix
      if( strpos($icon, '/fa(b|s|r)/') === false){
        $icon = 'fas ' . $icon;
      }
      $size = $matches[2][$i] ?? 'fa-1x';
      $pull = '';
      $color= $matches[4][$i] ?? 'blue';
      $wrapper= '';
      $tag = "<i aria-hidden='true' class='{$icon} {$size} icon-color-{$color}'></i>";
      $new_text = str_replace( $matches[0][$i], $tag, $new_text);
    }
    return $new_text;
  }

  public function process($text, $langcode){
    $new_text = $this->parseButtonShortcode($text);
    $new_text = $this->parseIconShortcode( $new_text );
    return new FilterProcessResult($new_text);
  }
}

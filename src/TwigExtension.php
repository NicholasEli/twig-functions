<?php

namespace Drupal\twig_function;

class TwigExtension extends \Twig_Extension {

  public function getFunctions() {
    return [
      new \Twig_SimpleFunction('template_function', [$this, 'templateFunction'])
    ];
  }

  public function getName() {
    return 'twig_function';
  }

  public function templateFunction() {
    return 'template functions';
  }
}

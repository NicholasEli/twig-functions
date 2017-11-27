<?php

namespace Drupal\twig_function;

/* references for getting entities */
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Site\Settings;

class TwigExtension extends \Twig_Extension {

  protected $entityTypeManager;
  protected $token;
  protected $configFactory;
  protected $routeMatch;

  public function getFunctions() {
    return [
      new \Twig_SimpleFunction('template_function', [$this, 'templateFunction'])
    ];
  }

  public function getName() {
    return 'twig_function';
  }

  public function templateFunction($ref = NULL, $id = NULL, $name = NULL) {

    if($ref == 'block'){
      $block = \Drupal\block_content\Entity\BlockContent::load($id);
      $render = \Drupal::entityTypeManager()->getViewBuilder('block_content')->view($block);
      return $render;
    }

    if($ref == 'view'){
      $view = \Drupal\views\Views::getView($name);
      $view->setDisplay($id);
      $render = $view->render();
      return $render;
    }

    return NULL;
  }
}

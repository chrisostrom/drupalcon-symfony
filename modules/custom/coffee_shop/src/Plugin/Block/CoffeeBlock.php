<?php

namespace Drupal\coffee_shop\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'CoffeeBlock' block.
 *
 * @Block(
 *  id = "coffee_block",
 *  admin_label = @Translation("Coffee block"),
 * )
 */
class CoffeeBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    //Gotta do this the cheating way instead of dependency injecting....
    $configFactory = \Drupal::getContainer()->get('config.factory');
    $type = $configFactory->get('coffee_shop.default')->get('type');
    $Barista = \Drupal::getContainer()->get('coffee_shop.barista');
    $text = $Barista->prepareDrink($type);
    $build = [];
    $build['coffee_block']['#markup'] = $text;

    return $build;
  }

}

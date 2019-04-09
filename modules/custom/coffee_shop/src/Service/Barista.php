<?php
namespace Drupal\coffee_shop\Service;

//use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Config\ConfigFactoryInterface;

class Barista {

  protected $configFactory;

  public function __construct(ConfigFactoryInterface $configFactory) {
    $this->configFactory = $configFactory;
  }

  public function prepareDrink($type) {

    if (!$type || is_null($type)) {
      //config.factory
      //The wrong way to get it because the static method is analogous to global variable.
      //$configFactory = \Drupal::getContainer()->get('config.factory');

      //$type = $this->config('coffee_shop.default')->get('type');

      $type = $this->configFactory->get('coffee_shop.default')->get('type');
    }

    $sizes = ['small', 'medium', 'large', 'scary huge'];
    $statuses = ['for here', 'to go', 'to sip while standing pensively'];
    $template = 'A %size% %type% prepared %status%. Enjoy!';
    return strtr($template, [
      '%size%' => $sizes[array_rand($sizes)],
      '%type%' => $type,
      '%status%' => $statuses[array_rand($statuses)],
    ]);
  }
}

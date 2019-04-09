<?php
namespace Drupal\coffee_shop\Controller;

//use Drupal\coffee_shop\Service\Barista;
use Drupal\Core\Controller\ControllerBase;
//use Symfony\Component\HttpFoundation\Response;

class CoffeeController extends ControllerBase {
  //Controller method name isn't important. can be anything.
  public function brewCoffee($type) {

    //$Barista = new Barista();
    $Barista = \Drupal::getContainer()->get('coffee_shop.barista');
    $text = $Barista->prepareDrink($type);

    return [
      '#type' => 'markup',
      '#markup' => $text
    ];

    //Can return Response object, but more commonly return render array.
    //return new Response('Ding! ' . $type . ' is done!');
  }
}

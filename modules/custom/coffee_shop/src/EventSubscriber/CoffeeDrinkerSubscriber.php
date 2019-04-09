<?php
namespace Drupal\coffee_shop\EventSubscriber;

use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CoffeeDrinkerSubscriber implements EventSubscriberInterface {

  protected $messenger;

  public function __construct(MessengerInterface $messenger) {
    $this->messenger = $messenger;
  }


  public function onKernelRequest() {
    $this->messenger->addMessage('I am event listening!!!!');
    //drupal_set_message('I am event listening!!!!');
  }

  public static function getSubscribedEvents() {
    return [
      'kernel.request' => 'onKernelRequest',
    ];
  }
}

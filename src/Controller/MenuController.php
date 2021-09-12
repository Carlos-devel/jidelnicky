<?php
// src/Controller/MenuController.php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Repository\pubRepository;

class MenuController extends AbstractController {

  /**
  * @Route("/pubs", name="pubs")
  */
  public function renderListOfPubs(pubRepository $pubRepository) {

    $pubs = array();
    foreach($pubRepository->getListOfPubs() as $pub) {
      $pubs[] = array(
        "id"=>$pub->getId(),
        "name" => $pub->getName(),
        "address" => $pub->getAddress(),
        "url" => $pub->getUrl(),
        "gps" => $pub->getGPS(),
      );
    }




    return $this->render('menu/ListOfPubs.html.twig', [
      'pubs' => $pubs,
    ]);

  }


  /**
  * @Route("/pub/{id}", name="pub")
  */
  public function renderPubsMenu(string $id, pubRepository $pubRepository) {

    $menu = $pubRepository->getMenuForPub($id);

    return $this->render('menu/PubsMenu.html.twig');
  }

}

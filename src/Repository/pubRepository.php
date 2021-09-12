<?php
// src/Repository/pubRepository.php
namespace App\Repository;


use App\Entity\pub;


class pubRepository {


  public function getListOfPubs() : array {
    //pokud budeme brát data pripadne z DB, tak bude dotazeno polde objektu
    $returnArray = array();
    //zde se bude nacitat bud z remote serveru JSON
    $curl = curl_init("https://private-anon-3ba51a074f-idcrestaurant.apiary-mock.com/restaurant");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_HEADER, FALSE);
    //  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_TIMEOUT, 60);
    $content = (string)curl_exec($curl);
    curl_close($curl);

    //do we have something that we can convert to JSON?
    if($content = json_decode($content)) {
        foreach($content as $pub) {
                    $pubEntity = new pub();
                    $pubEntity->setId($pub->id);
                    $pubEntity->setName($pub->name);
                    $pubEntity->setAddress($pub->address);
                    $pubEntity->setUrl($pub->url);
                    $pubEntity->setGPS(['lat' => $pub->gps->lat, 'lng' => $pub->gps->lng]);

                    $returnArray[] = $pubEntity;
        }

    } else {
      //in case that server with API is unresponsive, we will load data from local DB and in theory we can send e-mail, or SMS to app admin.
    }

    return $returnArray;
  }



  public function getMenuForPub(int $pubID) {
    $curl = curl_init("https://private-anon-9308bc55be-idcrestaurant.apiary-mock.com/daily-menu?restaurant_id=".(string)$pubID);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_HEADER, FALSE);
    //  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_TIMEOUT, 60);
    $content = (string)curl_exec($curl);
    curl_close($curl);



  }


}

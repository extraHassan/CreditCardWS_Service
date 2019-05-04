<?php

require '../vendor/autoload.php';
use GuzzleHttp\Client;

class HandlerRequest
{
    private $uri = 'http://localhost:8080/creditws/resources/creditCard/';
    private $client ;


    public function __construct(){
        $this->client=new GuzzleHttp\Client(['base_uri'=>$this->uri]);
    }

    public function createCard($id,$number,$expiryDate,$controlNumber,$type){
        try{
            $response= $this->client->post('create',[
                GuzzleHttp\RequestOptions::JSON=>[
                    'id'=>(string)$id,
                    'number'=>(string)$number,
                    'expiryDate'=>$expiryDate,
                    'controlNumber'=>$controlNumber,
                    'type'=>$type,
                ]
            ]);
            header("Location: ../web/admin.php?create=true");
        }catch (\GuzzleHttp\Exception\RequestException $error){
            header("Location: ../web/admin.php?create=false");
        }
    }

    public function deleteCard($cardId){
        try{
            $response = $this->client->request('GET','delete/'.$cardId);
            if ($response->getStatusCode()==202){
                header("Location: ../web/admin.php?delete=true");
            }
        }catch (\GuzzleHttp\Exception\RequestException $error){
            if ($error->getCode()== 406)
                header("Location: ../web/admin.php?delete=false");
            else
                echo 'error from the server : '.$error->getCode().' => '.$error->getMessage();
        }
    }


    public function validCard($controlNumber){
        try{
            $response = $this->client->request('GET','validate/'.$controlNumber);
            if ($response->getStatusCode()==202){
                header("Location: ../web/admin.php?validation=true");
            }
        }catch (\GuzzleHttp\Exception\RequestException $error){
            if ($error->getCode()== 406)
                header("Location: ../web/admin.php?validation=false");
            else
                echo 'error from the server : '.$error->getCode().' => '.$error->getMessage();
        }
    }

    public function login($username,$password){
        try{
            $response=$this->client->post('login',[GuzzleHttp\RequestOptions::JSON=>['username'=>$username,'password'=>$password]]);
            header("Location: ../web/admin.php");
        }catch (\GuzzleHttp\Exception\RequestException $error){
            if ($error->getCode()== 406){
                header("Location: ../web/login.php?error=1");
            }
            else
                echo 'error from the server : '.$error->getCode();
        }
    }


}
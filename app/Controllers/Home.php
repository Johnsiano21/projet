<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ClientModel;
use App\Models\LogementModel;

class Home extends BaseController
{
    public function __construct(){
        helper(['url']);
        $this->user = new UserModel();
        $this->cli = new ClientModel();
        $this->log = new LogementModel();    
    }

    public function index()
    {
        echo view('/inc/header');
        $data['users'] = $this->user->findAll();
        echo view('home',$data);
        echo view('/inc/footer');
    }

    public function saveUser(){
       $username = $this->request->getVar('username');
       $email = $this->request->getVar('email');

       $this->user->save(["username" => $username , "email" => $email]);

       session()->setFlashdata("success","Data inserted successfully");
       return redirect()->to(base_url());
    }

  
    public function deleteUser(){
        $id = $this->request->getVar('id');
        $this->user->delete($id);
        echo 1;
        return redirect()->to(base_url('/'));
    }

    public function showClient(){
        echo view('/inc/header');
        $data['client'] = $this->cli->findAll();
        echo view('client',$data);
        echo view('/inc/footer');
    }

    public function saveClient(){
        $nom = $this->request->getVar('nom');
        $prenom = $this->request->getVar('prenom');
        $adrs = $this->request->getVar('adrs');
        $lieu_travail = $this->request->getVar('lieu_travail');

        $this->cli->save(["nom" => $nom , "prenom" => $prenom , "adrs" => $adrs, "lieu_travail" => $lieu_travail]);

        session()->setFlashdata("success","Client ajouté avec succes");
        return redirect()->to(base_url());
    }

    public function getSingleClient($id){
       $data = $this->cli->where('id',$id)->first();
       echo json_encode($data);
    }

    public function updateClient(){
        $id = $this->request->getVar('updateId');
        $nom = $this->request->getVar('nom');
        $prenom = $this->request->getVar('prenom');
        $adrs = $this->request->getVar('adrs');
        $lieu_travail = $this->request->getVar('lieu_travail');

        $data['nom'] = $nom;
        $data['prenom'] = $prenom;
        $data['adrs'] = $adrs;
        $data['lieu_travail'] = $lieu_travail;

        $this->cli->update($id,$data);
        return redirect()->to(base_url("/"));
    }

    public function deleteClient(){
        $id = $this->request->getVar('id');
        $this->cli->delete($id);
        echo 1;
    }

    public function showLogement(){
        echo view('/inc/header');
        $data['logement'] = $this->log->findAll();
        echo view('logement',$data);
        echo view('/inc/footer');
    }

   public function saveLogement(){
    $id = $this->request->getVar('id');
    $type_vente = $this->request->getVar('type_vente');
    $prix = $this->request->getVar('prix');
    $cite = $this->request->getVar('cite');
    $Date_achat = $this->request->getVar('Date_achat');

    $this->log->save(["id" => $id , "type_vente" => $type_vente , "prix" => $prix, "cite" => $cite, "Date_achat" => $Date_achat]);

    session()->setFlashdata("success","Logement ajouté avec succes");
    return redirect()->to(base_url("/logement"));
   }

   public function getSingleLogement($num){
    $data = $this->log->where('num',$num)->first();
    echo json_encode($data);
   }

   public function updateLogement(){
    $num = $this->request->getVar('updateId');
    $id = $this->request->getVar('id');
    $type_vente = $this->request->getVar('type_vente');
    $prix = $this->request->getVar('prix');
    $cite = $this->request->getVar('cite');
    $Date_achat = $this->request->getVar('Date_achat');

    $data['id'] = $id;
    $data['type_vente'] = $type_vente;
    $data['prix'] = $prix;
    $data['cite'] = $cite;
    $data['Date_achat'] = $Date_achat;

    $this->log->update($num,$data);
        return redirect()->to(base_url("/logement"));

   }

   public function showFacture(){
    echo view('facture');
   }


        

}

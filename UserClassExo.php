<?php

class User {
    private $prenom;
    private $nom;
    protected $username;

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getUsername() {
        return $this->username;
    }

    public function __construct($prenom, $nom) {
        $this->prenom = $prenom;
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getPrenom() {
        return $this->prenom;
    }
    public function getNom() {
        return $this->nom;
    }
    public function hello() {
        return 'Hello ' . $this->prenom . ' ' . $this->nom . '!';
    }
    public function getFullName() {
        return 'Prenom : ' . $this->prenom . ' ' . '<br>' . 'Nom de famille : ' . $this->nom;
    }
    public function stateYourRole(){

    }

}

class Admin extends User {
    public function expressYourRole(){
        return 'Admin';
    }
    public function sayHello($name){
        return 'Hello admin, ' . $name . '!';
    }
}

class Viewer extends User {

}


$user1 = new User('Suleyman', 'Tomruk');
echo $user1->hello();
echo '<br> <br>';
$user2 = new User('Jane', 'Doe');
echo $user2->hello();
echo '<br> <br>';
$user1->setPrenom('Joe');
echo $user1->getPrenom();
echo '<br> <br>';
echo $user2->getFullName();
echo '<br> <br>';
$user3 = new User('Arthur', 'Morgan');
echo $user3->getFullName();
echo '<br> <br>';
$admin1 = new Admin('Balthazar', 'Pikachu');
echo $admin1->getNom();
echo '<br> <br>';
echo $admin1->sayHello($admin1->getNom());
echo '<br> <br>';
?>

<fieldset>qsd</fieldset>



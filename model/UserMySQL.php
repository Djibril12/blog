<?php

class UserMySQL implements UserHandler {

    protected $pdo = null;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // cette fonction permet d'authentifier l'utilisateur
    public function authenticate($username, $password) {
        // recherche du username dans la bdd
        
        // verification du mot de passe avec la fonction password_verify 
    }

    public function add(User $user) {
//        echo 'add function <br>';
//        debug_value($user);
//
//        $res = $this->pdo->exec('INSERT INTO user (id, username, password,  email, created_at) '
//                . 'VALUES(null, \'alpha\', \'alpha@yengue.com\', \'password123\', \'2017-08-31 00:00:00\')');
//
//        echo $res . 'L\'utilisateur a bien été ajouté !';
//        die();
//        
        // hash du mot de passe avec l'algo BCRYPT
        $password = password_hash($user->getPassword(), PASSWORD_BCRYPT);
        
        // formatage de la date
        $date = $user->getCreatedAt()->format('Y-m-d h:i:s');
        // création de la requête
        $sql = 'INSERT INTO user VALUES(null, :name, :pass, :email, :date)';       
        //echo $sql;
 
        $stmt = $this->pdo->prepare($sql);
        $res =  $stmt->execute(array(
            'name' => $user->getUsername(),
            'pass' => $password,
            'email' => $user->getEmail(),
            'date' => $date,
        ));
        
        echo $res;
    }

    public function all() {
        
    }

    public function delete(User $user) {
        
    }

    public function findBy($id) {
        
    }

}

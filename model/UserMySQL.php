<?php

class UserMySQL implements UserHandler {

    protected $pdo = null;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // cette fonction permet d'authentifier l'utilisateur
    public function authenticate($username, $password) {
        // recherche du username dans la bdd
        $sql = "SELECT * FROM user WHERE username = :name";
        $stmt = $this->pdo->prepare($sql);
        echo $sql;
         //die();
        $result = $stmt->execute(array(
            'name' => $username
        ));

        echo $result;
        if ($result) {
            // recupération de l'utilisateur
            $userDB = $stmt->fetch(PDO::FETCH_ASSOC);

            // verification du mot de passe avec la fonction password_verify 
            if ($userDB && password_verify($password, $userDB['password'])) {
                // création d'un nouvel utilisateur
                $user = new User();

                //
                $user->setId($userDB['id']);
                $user->setUsername($userDB['name']);
                $user->setEmail($userDB['email']);
                $user->setCreatedAt(new DateTime($userDB['created_at']));

                // renvoi un objet user si l'authentification a reussie
                return $user;
            }
        }

        // renvoi false si l'authentification a échoué
        return false;
    }

    public function add(User $user) {

        // hash du mot de passe avec l'algo BCRYPT
        $password = password_hash($user->getPassword(), PASSWORD_BCRYPT);

        // formatage de la date
        $date = $user->getCreatedAt()->format('Y-m-d h:i:s');
        // création de la requête
        $sql = 'INSERT INTO user VALUES(null, :name, :pass, :email, :date)';
        //echo $sql;

        $stmt = $this->pdo->prepare($sql);

        $res = $stmt->execute(array(
            'name' => $user->getUsername(),
            'pass' => $password,
            'email' => $user->getEmail(),
            'date' => $date,
        ));

        return $res;
    }

    public function all() {
        $sql = 'SELECT * FROM user';
        //echo $sql;

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        debug_value($result);
        die();
    }

    public function delete(User $user) {
        $sql = 'SELECT * FROM user';
    }

    public function findBy($id) {
        $sql = 'SELECT * FROM user WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute(array(
            'id' => $d
        ));
    }

}

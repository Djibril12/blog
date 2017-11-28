<?php

interface UserHandler {

    public function add(User $user);
    public function all();
    public function delete(User $user);
    public function findBy($id);
  
    
    
    
}

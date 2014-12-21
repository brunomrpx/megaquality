<?php

App::uses("AppModel", "Model");

class User extends AppModel {
    public function isLogged() {
        $isLogged = is_null(CakeSession::read("Auth.User.id")) ? false : true;
        return $isLogged;
    }
}

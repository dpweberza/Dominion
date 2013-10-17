<?php

namespace DavidWeber\Dominion\Models;

/**
 * Dominion User Repository
 * 
 * @author David Weber
 */
class UserRepository implements UserRepositoryInterface {

    public function all() {
        return User::all();
    }

    public function find($id) {
        return User::find($id);
    }

    public function create($attributes) {
        return User::create($attributes);
    }

    public function paginate($perPage = null, $columns = null) {
        return User::paginate($perPage, $columns);
    }

}

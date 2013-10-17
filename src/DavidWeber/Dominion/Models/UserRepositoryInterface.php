<?php

namespace DavidWeber\Dominion\Models;

/**
 * User Repository Interface
 *
 * @author David
 */
interface UserRepositoryInterface {

    public function all();

    public function find($id);

    public function create($attributes);

    public function paginate($perPage = null, $columns = array());

    public function getStatuses();
    
    public function getValidationRules();
}

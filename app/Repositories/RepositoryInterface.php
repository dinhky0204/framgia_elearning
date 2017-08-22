<?php
namespace App\Repositories;

/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 21/08/2017
 * Time: 10:10
 */
interface RepositoryInterface
{
    public function getAll();

    public function find($id);

    public function create(array $attributes);

    public function update($id, array $attributes);

}

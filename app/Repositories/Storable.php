<?php
/**
 * Created by PhpStorm.
 * User: trask
 * Date: 6/9/18
 * Time: 9:56 AM
 */

namespace App\Repositories;


interface Storable
{
    public function get();

    public function fetch(int $id);

    public function create(object $object);

    public function edit(object $object);

    public function destroy(int $id);
}
<?php


namespace App\Repositories\Contracts;


interface TownshipRepository
{
    function search($q);

    function transformData($data);
}

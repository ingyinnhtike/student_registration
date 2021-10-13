<?php


namespace App\Helpers\ChartAdapters;


interface ChartAdapter
{
    function query();

    function title();

    function labels();

    function dataSets($data);
}

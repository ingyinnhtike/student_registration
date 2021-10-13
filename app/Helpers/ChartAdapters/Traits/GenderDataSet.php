<?php


namespace App\Helpers\ChartAdapters\Traits;


use App\Helpers\ChartAdapters\DataSet;

trait GenderDataSet
{
    function dataSets($models)
    {
        $male = new DataSet();
        $male->label = 'ကျား';
        $male->data = [];

        $female = new DataSet();
        $female->label = 'မ';
        $female->data = [];
        $labels = $this->getLabels();
        foreach ($labels as $label) {
            $model = $models->where('label', $label)->first();
            $male->data[] = $model->male_total??0;
            $female->data[] = $model->female_total??0;
        }

        return [$male, $female];
    }
}

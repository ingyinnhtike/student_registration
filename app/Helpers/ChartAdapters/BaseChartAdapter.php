<?php


namespace App\Helpers\ChartAdapters;


abstract class BaseChartAdapter implements ChartAdapter
{
    protected $collection;
    protected $labels;


    final function getLabels()
    {
        if ($this->labels === null) {
            $this->labels = $this->labels();
        }
        return $this->labels;
    }

    protected function collection()
    {
        if ($this->collection === null) {
            $this->collection = $this->query()->get();
        }

        return $this->collection;
    }

    public function toJson()
    {

        $data = [
            'title' => $this->title(),
            'labels' => $this->getLabels(),
        ];
        $models = $this->collection();
        $data['datasets'] = $this->dataSets($models);
        return json_encode($data);
    }

}

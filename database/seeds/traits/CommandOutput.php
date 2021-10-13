<?php


trait CommandOutput
{
    public function showFeedback($string, $new_line = true)
    {
        $post_fix = $new_line ? "\n" : '';
        echo $string . $post_fix;
    }

    public function progressStart($max = 0)
    {
        $this->command->getOutput()->progressStart($max);
    }

    public function progressAdvance($step = 1)
    {
        $this->command->getOutput()->progressAdvance($step);
    }

    public function progressFinish()
    {
        $this->command->getOutput()->progressFinish();
    }
}

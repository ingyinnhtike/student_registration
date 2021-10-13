<?php


namespace App\Helpers;

use Googlei18n\MyanmarTools\ZawgyiDetector;

class FontHelper
{

    private $detector;

    public function __construct()
    {
        $this->detector = new ZawgyiDetector();
    }

    /**
     * Determine whether the input string is zawgyi or not
     * @param string $input
     * @return bool
     */
    public function isZawgyi(string $input): bool
    {
        $score = $this->detector->getZawgyiProbability($input);
        /*
         * Generally, if the score is greater than or equal to 0.95,
         *  you can generally assume the string is Zawgyi.
         *  If the score is lower or equal to 0.05, you can assume it is Unicode.
         */
        return $score > 0.95;
    }

    /**
     * Determine whether the input string is unicode or not
     * @param string $input
     * @return bool
     */
    public function isUnicode($input): bool
    {
        $score = $this->detector->getZawgyiProbability($input);
        /*
         * Generally, if the score is greater than or equal to 0.95,
         *  you can generally assume the string is Zawgyi.
         *  If the score is lower or equal to 0.05, you can assume it is Unicode.
         */
        return $score < 0.05;
    }


    /**
     *
     * @param array|string $input
     * @param bool $isAlreadyChecked determine the string is already checked for zawgyi/unicode
     * @return array|string
     */
    public function convertToUnicode($input, $isAlreadyChecked = true)
    {
        $convert = function ($input) use ($isAlreadyChecked) {
            if($input) {
                //the input must be valid string ( not null, not empty string)
                if (!$isAlreadyChecked) {
                    //the string is not checked, so check now.
                    if ($this->isUnicode($input)) {
                        //the string is already unicode, so just return it.
                        return $input;
                    }
                }

                return \Rabbit::zg2uni($input);
            }
            return $input;
        };

        if (is_array($input)) {
            $output = [];
            foreach ($input as $key => $value) {
                $output[$key] = $convert($value);
            }
        } else {
            $output = $convert($input);
        }
        return $output;
    }
}

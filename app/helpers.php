<?php

use \Illuminate\Support\Str;

if (!function_exists('parse_phone_number')) {

    /**
     * For International Number Parsing
     *
     * @param string $number
     * @return string
     */
    function parse_phone_number($number)
    {
        $count = strlen($number);
        if ($count >= 10 && Str::startsWith($number, "959")) {
            return Str::after($number, "959");
        } elseif ($count >= 9 && Str::startsWith($number, "09")) {
            return Str::after($number, "09");
        } else {
            return $number;
        }
    }
}

if (!function_exists('extract_data_from_array')) {

    /**
     *
     *
     * @param array $haystack
     * @param string $prefix
     * @return string
     */
    function extract_data_from_array(array $haystack, string $prefix): array
    {

        $data = array_filter($haystack, function ($value, $key) use ($prefix) {
            /*if (is_array($key)) return false;*/
            return Str::startsWith($key, $prefix);
        }, ARRAY_FILTER_USE_BOTH);

        $new_array = [];
        foreach ($data as $key => $value) {
            $key = Str::after($key, $prefix . '_');
            $new_array[$key] = $value;
        }

        return $new_array;

    }
}

if (!function_exists('extract_value_from_array')) {

    /**
     * Extract value from the key from the array
     * If there is no value with that key, default value is return.
     * @param string $key
     * @param array $array
     * @param null $default
     * @return mixed|null
     */
    function extract_value_from_array(string $key, array $array, $default = null)
    {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        } else {
            return $default;
        }
    }


}


if (!function_exists('extract_additional_data')) {

    /**
     *
     *
     * @param array $haystack
     * @param string $needle
     * @return string
     */
    function extract_additional_data(array $haystack, array $needles): array
    {

        /*$data = array_filter($haystack, function ($value, $key) use ($needles) {
            return array_key_exists($key, $needles);
        }, ARRAY_FILTER_USE_BOTH);*/
        $data = array_intersect_key($haystack, array_flip($needles));
        return $data;

    }
}

if (!function_exists('get_approved_status')) {


    function get_approved_status($status)
    {
        if ($status == 0) {
            return 'မစစ်ရသေး';
        } elseif ($status == 1) {
            return 'စစ်ဆေးပြီး';
        } elseif ($status == 2) {
            return 'ပယ်';
        } else {
            return 'unknown';
        }
    }
}

if (!function_exists('get_payment_status')) {

    /**
     *
     *
     * @param array $haystack
     * @param string $needle
     * @return string
     */


    function get_payment_status($status)
    {
        if ($status == 0) {
            return 'ငွေမသွင်းရသေး';
        } elseif ($status == 1) {
            return 'ငွေသွင်းပြီး';
        } elseif ($status == 2) {
            return 'ပယ်';
        } else {
            return 'unknown';
        }

    }


}
if (!function_exists('get_config')) {

    /**
     *
     *
     * @param array $haystack
     * @param string $needle
     * @return string
     */


    function get_config($name, $default = null)
    {
        return config($name, $default);

    }


}


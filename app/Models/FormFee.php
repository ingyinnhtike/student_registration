<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Pivot model between form type and fee
 * Class FormFee
 * @package App\Models
 */
class FormFee extends Pivot
{
    protected $table = 'form_fee';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
}


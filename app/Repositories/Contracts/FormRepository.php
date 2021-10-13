<?php


namespace App\Repositories\Contracts;


use App\Models\Form;

interface FormRepository extends BaseRepository
{
    function findOrFail($id);

    /**
     * change approve status of form by logged user
     * @param $form
     * @param $status
     * @param null $remark
     * @return mixed
     */
    function approve($form, $status,$remark = null);

    /**
     * change payment status of form by logged user
     * @param $form
     * @param $status
     * @param null $remark
     * @return mixed
     */
    function approvePayment($form, $status,$remark = null);
}

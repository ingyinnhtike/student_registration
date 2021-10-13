<?php


namespace App\Repositories;


use App\Models\Enrollment;
use App\Models\Form;
use App\Repositories\Contracts\FormRepository;
use Carbon\Carbon;

class FormRepositoryImpl extends BaseRepositoryImpl implements FormRepository
{
    function model(): string
    {
        return Form::class;
    }

    function relationToOwner(): string
    {
        return 'forms';
    }

    function prefix()
    {
        return '';
    }


    public function create($data, $user = null)
    {
        if ($user === null) {
            $user = auth()->user();
        }
        $type = $data['form_type_id'];
        if ($type) {
            //type is set, unset it to exclude in json data
            unset($data['form_type_id']);
        } else {
            $type = 0;
        }

        $university_status = $data['university_status'];
        
        return $user->appliedForms()->create(['form_type_id' => $type, 'university_status' => $university_status, 'data' => $data]);
    }

    public function update($data, $model, $user = null)
    {
        if ($user === null) {
            $user = auth()->user();
        }

        if (array_key_exists('form_type_id',$data)) {
            //type is set, unset it to exclude in json data
            unset($data['form_type_id']);
        }
        $university_status = $data['university_status'];
        return $model->update([ 'university_status' => $university_status,'data' => $data]);
    }

    function updateOrCreate($data, $model_owner = null)
    {
        // TODO: Implement updateOrCreate() method.
    }


    public function findOrFail($id): Form
    {
        return Form::where('id', $id)->first();
    }

    public function hydrate($data)
    {

    }

    function approve($form, $status,$remark = null)
    {
        if (is_numeric($form)) {
            $form = Form::where('id', $form)->first();
        }

        $form->approved_status = $status;
        $form->approved_at = Carbon::now();
        $form->approved_message = $remark;
        $admin = auth()->user();
        return $admin->approvedForms()->save($form);
    }

    function approvePayment($form, $status,$remark = null)
    {
        if (is_numeric($form)) {
            $form = Form::where('id', $form)->first();
        }

        $form->payment_receive_status = $status;
        $form->payment_received_at = Carbon::now();
        $form->payment_receive_message = $remark;
        return auth()->user()->paidForms()->save($form);
    }


}

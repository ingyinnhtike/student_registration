<?php

namespace App\Http\Controllers\admin;

use App\DataTables\FormDataTable;
use App\DataTables\PaymentReceiveDataTable;
use App\DataTables\Scopes\AcceptanceTypeScope;
use App\DataTables\Scopes\DateDatatableScope;
use App\Helpers\Authorizable;
use App\Helpers\Forms\Contracts\EnrollmentFormHelper;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\AppliedCourseRepository;
use App\Repositories\Contracts\FormRepository;
use Illuminate\Http\Request;
use Auth;

class AcceptanceController extends Controller
{
    use Authorizable;

    public function index(FormDataTable $dataTable)
    {
        $status = -1;
        
       
        if ($dataTable->request()->has('accept_type')) {
            $dataTable->addScope(new AcceptanceTypeScope($dataTable->request()->all()));
            $status = $dataTable->request()->get('status');
            
        }
        if ($dataTable->request()->has('date_type')) {
            $dataTable->addScope(new DateDatatableScope($dataTable->request()->all()));
        }

       return $dataTable->render('admin.acceptances.index', ['status' => $status]);
    }

    public function approve(Request $request, FormRepository $formRepository,
                            EnrollmentFormHelper $formHelper, AppliedCourseRepository $appliedCourseRepository)
    {
        
        $status = $request->get('status');
        
        $form = $formRepository->findOrFail($request->get('id'));
        
        $message = $request->get('approved_message');
        
        $data = $form->data;
        if (!extract_value_from_array('course_id', $data)) {
            $course_id = $appliedCourseRepository->findAppliedCourse($data['major'][0], $data['year'], 'en')->id;
            $data['course_id'] = $course_id;
        }

        $formRepository->approve($form, $status, $message);

        if ($status == 2) {
            return redirect()->back()->withInput();
        }


        $user = $form->appliedUser;

        $formHelper->populate($data, $user);
        return redirect()->back()->withInput();
    }

    public function indexPayment(PaymentReceiveDataTable $dataTable)
    {
        $status = -1;
        if ($dataTable->request()->has('accept_type')) {
            $dataTable->addScope(new AcceptanceTypeScope($dataTable->request()->all()));
            $status = $dataTable->request()->get('status');
        }
        if ($dataTable->request()->has('date_type')) {
            $dataTable->addScope(new DateDatatableScope($dataTable->request()->all()));
        }
        return $dataTable->render('admin.payment.payment_receive_index', ['status' => $status]);
    }

    public function approvePayment(Request $request, FormRepository $formRepository,
                                   EnrollmentFormHelper $formHelper)
    {
        $id = $request->get('id');
        $status = $request->get('status');
        $message = $request->get('approved_message');

        $formRepository->approvePayment($id, $status, $message);
        $formHelper->saveInvoice($id, $status, $message);

        return redirect()->back()->withInput();
    }
}

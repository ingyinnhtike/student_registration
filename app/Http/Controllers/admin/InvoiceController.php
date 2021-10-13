<?php

namespace App\Http\Controllers\admin;

use App\DataTables\InvoiceDatatable;
use App\DataTables\Scopes\InvoiceTypeScope;
use App\Helpers\Authorizable;
use App\Http\Controllers\Controller;
use App\Models\FormType;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    use Authorizable;

    public function index(InvoiceDatatable $datatable)
    {
        $request = $datatable->request();
        $form_type = -1;
        if ($request->has('form_type')) {
            $form_type = $request->get('form_type');
            $datatable->addScope(new InvoiceTypeScope($request->all()));
        }
        return $datatable->render('admin.invoices.index', compact('form_type'));
    }

    public function summary(Request $request)
    {
        $formTypes = FormType::all();
        if ($request->has('type')) {
            $type = $request->get('type');

        }
        return view('admin.invoices.summary', compact('formTypes', 'invoices'));
    }
}

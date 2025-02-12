<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::latest()->get();
        return view('invoice', compact('invoices'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'employee_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'invoice' => 'required|file|mimes:pdf,jpg,png|max:2048'
        ]);

        if ($request->hasFile('invoice')) {
            $file = $request->file('invoice');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/invoices', $fileName);

            $invoice = Invoice::create([
                'employee_name' => $request->employee_name,
                'description' => $request->description,
                'file_name' => $fileName,
                'status' => 'pending'
            ]);

            return response()->json([
                'success' => true,
                'employee_name' => $invoice->employee_name,
                'description' => $invoice->description,
                'status' => $invoice->status
            ]);
        }

        return response()->json(['success' => false]);
    }
}

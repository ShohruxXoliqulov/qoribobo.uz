<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $audits = DB::table('audits')->orderBy('id', 'DESC')->paginate(10);
        return view('audits.index', compact('audits'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Audit $audit)
    {
        $decodedData = json_decode($audit->data, true);

        // Check if credit_data is present and decode it
        if (isset($decodedData['credit_data'])) {
            $decodedData['credit_data'] = json_decode($decodedData['credit_data'], true);
        }

        
        $audit->update(['status' => 1]);
        return view('audits.show', compact('audit', 'decodedData'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Audit $audit)
    {
        $audit->delete();
        return redirect()->route('audits.index');
    }
}

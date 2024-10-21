<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use App\Imports\ReviewsImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SurveyDataController extends Controller
{

    public function index()
    {
        $survey = Survey::query()
            ->simplePaginate(10);

        return view('data.index', compact(['survey']));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls',
        ]);
        // dd($request->file('file'));
        Excel::import(new ReviewsImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data berhasil diimpor.');
    }
}

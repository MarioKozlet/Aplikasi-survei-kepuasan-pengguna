<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WelcomeController extends Controller 
{
    public function index()
    {
        return view('welcome');
    }

    public function save(Request $request)
    {
        // $arr = [
        //     'email',
        //     'name',
        //     'ease_of_use',
        //     'interface_intuitiveness',
        //     'responsiveness',
        //     'feature_completeness',
        //     'feature_suitability',
        //     'stability',
        //     'ui_design',
        //     'customer_support',
        //     'security_and_privacy',
        //     'additional_feedback',
        // ];

        try {
            $validate = $request->validate([
                'email' => ['required', 'email:dns'],
                'name' => ['required'],
                'ease_of_use' => ['required'],
                'interface_intuitiveness' => ['required'],
                'responsiveness' => ['required'],
                'feature_completeness' => ['required'],
                'feature_suitability' => ['required'],
                'stability' => ['required'],
                'ui_design' => ['required'],
                'customer_support' => ['required'],
                'security_and_privacy' => ['required'],
                'additional_feedback' => ['nullable'],
            ]);

            Survey::create([
                'email' => $validate['email'],
                'name' => $validate['name'],
                'ease_of_use' => $validate['ease_of_use'],
                'interface_intuitiveness' => $validate['interface_intuitiveness'],
                'responsiveness' => $validate['responsiveness'],
                'feature_completeness' => $validate['feature_completeness'],
                'feature_suitability' => $validate['feature_suitability'],
                'stability' => $validate['stability'],
                'ui_design' => $validate['ui_design'],
                'customer_support' => $validate['customer_support'],
                'security_and_privacy' => $validate['security_and_privacy'],
                'additional_feedback' => $validate['additional_feedback'],
            ]);
            return redirect()->back()->with('succes', 'Berhasil');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal');
        }

    }
}

?>
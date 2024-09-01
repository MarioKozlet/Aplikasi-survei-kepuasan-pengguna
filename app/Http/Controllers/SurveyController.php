<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyController extends Controller 
{
    public function indexSurvey()
    {
    // Ambil semua data survei
        $surveys = Survey::all();

        // Inisialisasi array untuk menyimpan jumlah responden untuk setiap tingkat kepuasan
        $satisfactionLevels = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
        ];

        // Tentukan nama field survei yang relevan (ubah sesuai dengan field yang ada di tabel survei)
        $surveyFields = [
            'ease_of_use',
            'interface_intuitiveness',
            'responsiveness',
            'feature_completeness',
            'feature_suitability',
            'stability',
            'ui_design',
            'customer_support',
            'security_and_privacy'
        ];

        // Hitung jumlah responden untuk setiap tingkat kepuasan
        foreach ($surveys as $survey) {
            foreach ($surveyFields as $field) {
                if (isset($survey[$field])) {
                    $value = $survey[$field];
                    if (isset($satisfactionLevels[$value])) {
                        $satisfactionLevels[$value]++;
                    }
                }
            }
        }

        return view('survey.indexSurvey', [
            'satisfactionLevels' => $satisfactionLevels
        ]);
    }

    // Helper function to map field names if needed
    private function getSurveyField($level)
    {
        // Map field names based on your data structure
        return 'field_name_based_on_level_' . $level; // Adjust as needed
    }
}

?>
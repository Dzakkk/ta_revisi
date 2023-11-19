<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function filter(Request $request)
    {
        $gelar = $request->input('gelar');
    
        // Retrieve the filtered data based on the selected gelar
        $data = Pendidikan::where('gelar', $gelar)->paginate(8);
    
        // Pass the filtered data to the view
        return view('petugas.pendidikan.data_pendidikan',['user' => $data]);
    }
}

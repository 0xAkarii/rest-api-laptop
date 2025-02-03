<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $filePath = storage_path('app/data.json');
        $jsonData = file_get_contents($filePath);
        $data = json_decode($jsonData, true);
        $laptops = $data['laptops'];

        if ($search) {
            $laptops = collect($laptops)->filter(function($laptop) use ($search) {
                return strpos(strtolower($laptop['brand']), strtolower($search)) !== false ||
                    strpos(strtolower($laptop['model']), strtolower($search)) !== false;
            })->values()->all();
        }

        return response()->json([
            'success' => true,
            'message' => 'Data retrieved successfully',
            'laptops' => $laptops
        ]);
    }


    public function show($id)
    {
        $filePath = storage_path('app/data.json');
        $jsonData = file_get_contents($filePath);
        $data = json_decode($jsonData, true);
        $laptops = $data['laptops'];
        $laptop = collect($laptops)->firstWhere('id', $id);
        
        if ($laptop) {
            return response()->json([
                'success' => true,
                'message' => 'Data retrieved successfully',
                'laptop' => $laptop
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Laptop not found',
            ], 404);
        }
    }

}

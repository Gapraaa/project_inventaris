<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Inventaris;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    // InventarisController.php

    public function HomeIndex(Request $request)
    {
        // Mencari nama barang
        $query = $request->input('search');
        $inventaris = Inventaris::when($query, function ($query) use ($request) {
            return $query->where('nama_barang', 'like', '%' . $request->input('search') . '%');
        })->get();

        return view('home', compact('inventaris'));
    }
}

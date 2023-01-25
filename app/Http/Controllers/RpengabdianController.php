<?php

namespace App\Http\Controllers;

use App\Models\Rpengabdian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RpengabdianController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }


    public function index(Request $request)
    {
        $page = $request->page == null || $request->page == 0 ? 1 : $request->page;
        $size = $request->size;

        $data = DB::table('riwayat_pengabdian')
                ->where('deleted_at', null)
                ->orderBy('id', 'asc')
                ->limit($size)
                ->offset(($page - 1) * $size)
                ->get();

        $totalAll = Rpengabdian::where('deleted_by', null)->count();

        if (count($data) > 0) {
            $dataResponse = [
                'data' => $data,
                'size' => $size,
                'page' => $page,
                'total' => $totalAll,
                'error' => false,
            ];
        } else {
            $notfound = [
                'message' => 'Data Tidak Ada',
            ];
            $dataResponse = [
                'data' => $notfound,
                'error' => true,
            ];
        }
        
        return response()->json($dataResponse);
    }


    public function store(Request $request)
    {
        Rpengabdian::create($request->all());

        $dataResponse = [
            'data' => 'Data berhasil di tambahkan',
            'error' => false,
        ];

        return response()->json($dataResponse);
    }


    public function show($id)
    {
        $data = Rpengabdian::where('id', $id)->get();

        if (count($data) > 0) {
            $dataResponse = [
                'data' => $data,
                'error' => false,
            ];
        } else {
            $notfound = [
                'message' => 'Data Tidak Ada',
            ];
            $dataResponse = [
                'data' => $notfound,
                'error' => true,
            ];
        }

        return response()->json($dataResponse);
    }


    public function update(Request $request, $id)
    {
        $Rpengabdian = Rpengabdian::find($id);
        
        if (!$Rpengabdian) {
            $notfound = [
                'message' => 'Data Tidak Ada',
            ];
            
            $dataResponse = [
                'data' => $notfound,
                'error' => true,
            ];
            return response()->json($dataResponse);
        }

        Rpengabdian::where('id', $id)->update($request->all());

        $dataResponse = [
            'data' => 'Data berhasil di update',
            'error' => false,
        ];

        return response()->json($dataResponse);
    }


    public function destroy(Request $request, $id)
    {
        $now = date('d-m-Y H:i:s');
        $Rpengabdian = Rpengabdian::find($id);
        
        if (!$Rpengabdian) {
            $notfound = [
                'message' => 'Data Tidak Ada',
            ];
            
            $dataResponse = [
                'data' => $notfound,
                'error' => true,
            ];
            return response()->json($dataResponse);
        }

        Rpengabdian::where('id', $id)->update([
            'deleted_by' => 1,
            'deleted_at' => $now,
        ]);

        $dataResponse = [
            'data' => 'Data berhasil di hapus',
            'error' => false,
        ];

        return response()->json($dataResponse);

    }
}

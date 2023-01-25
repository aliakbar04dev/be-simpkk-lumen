<?php

namespace App\Http\Controllers;

use App\Models\Kaderpkk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KaderpkkController extends Controller
{
    public function __construct() {
        date_default_timezone_set('Asia/Jakarta');
    }


    public function index(Request $request) {
        $page = $request->page == null || $request->page == 0 ? 1 : $request->page;
        $size = $request->size;
        $noKader = $request->noKader;
        $nama = $request->nama;
        $kota = $request->kota;
        $kecamatan = $request->kecamatan;
        $kelurahan = $request->kelurahan;
        $rw = $request->rw;
        $rt = $request->rt;

        // var_dump(url());

        $data = DB::table('kader_pkk')
                ->when($noKader, function ($query, $noKader) {
                    return $query->where('no_kader', $noKader);
                })
                ->when($nama, function ($query, $nama) {
                    return $query->where('full_name', 'like', '%'.$nama.'%');
                })
                ->when($kota, function ($query, $kota) {
                    return $query->where('kota', $kota);
                })
                ->when($kecamatan, function ($query, $kecamatan) {
                    return $query->where('kecamatan', $kecamatan);
                })
                ->when($kelurahan, function ($query, $kelurahan) {
                    return $query->where('kelurahan', $kelurahan);
                })
                ->when($rw, function ($query, $rw) {
                    return $query->where('rw', $rw);
                })
                ->when($rt, function ($query, $rt) {
                    return $query->where('rt', $rt);
                })
                ->where('deleted_at', null)
                ->orderBy('id', 'asc')
                ->limit($size)
                ->offset(($page - 1) * $size)
                ->get();

        $totalAll = DB::table('kader_pkk')->where('deleted_at', null)->count();

        // var_dump($data);

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


    public function store(Request $request) {
        Kaderpkk::create($request->all());

        $dataResponse = [
            'data' => 'Data berhasil di tambahkan',
            'error' => false,
        ];

        return response()->json($dataResponse);
    }


    public function show($id) {
        $data = Kaderpkk::where('id', $id)->get();

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


    public function update(Request $request, $id) {
        $Kaderpkk = Kaderpkk::find($id);
        
        if (!$Kaderpkk) {
            $notfound = [
                'message' => 'Data Tidak Ada',
            ];
            $dataResponse = [
                'data' => $notfound,
                'error' => true,
            ];
            return response()->json($dataResponse);
        }

        Kaderpkk::where('id', $id)->update($request->all());

        $dataResponse = [
            'data' => 'Data berhasil di update',
            'error' => false,
        ];

        return response()->json($dataResponse);
    }


    public function destroy(Request $request, $id) {
        $now = date('d-m-Y H:i:s');
        $Kaderpkk = Kaderpkk::find($id);
        
        if (!$Kaderpkk) {
            $notfound = [
                'message' => 'Data Tidak Ada',
            ];
            $dataResponse = [
                'data' => $notfound,
                'error' => true,
            ];
            return response()->json($dataResponse);
        }

        Kaderpkk::where('id', $id)->update([
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

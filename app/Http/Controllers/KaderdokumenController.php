<?php

namespace App\Http\Controllers;

use App\Models\Kaderdokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class KaderdokumenController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }


    public function index(Request $request)
    {
        $page = $request->page == null || $request->page == 0 ? 1 : $request->page;
        $size = $request->size;

        $data = DB::table('kader_dokumen')
                ->where('deleted_at', null)
                ->orderBy('id', 'asc')
                ->limit($size)
                ->offset(($page - 1) * $size)
                ->get();

        $totalAll = Kaderdokumen::where('deleted_by', null)->count();

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
        // $rules = [
        //     'uri' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        // ];
    
        // $customMessages = [
        //     'required' => 'dokumen tidak boleh kosong',
        //     'image' => 'dokumen harus berupa gambar',
        //     'mimes' => 'dokumen harus berupa jpg, jpeg, png',
        //     'max' => 'maks. dokumen 2 MB',
        // ];
    
        // $this->validate($request, $rules, $customMessages);

        $validator = Validator::make($request->all(),  [
            'uri' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        if ($validator->fails()) {
            $notfound = [
                'message' => 'Terjadi kesalahan saat mengunggah file!',
            ];
    
            $responImage = [
                'data' => $notfound,
                'error' => true,
            ];
            return response()->json($responImage);
        }


        $uri = $request->file('uri')->getClientOriginalName();
        $namaFile = time().$uri;
        $request->file('uri')->move('upload', $namaFile);

        $data = [
            'kader_pkk_id' => $request->input('kader_pkk_id'),
            'tipe' => $request->input('tipe'),
            'uri' => url('upload/'.$namaFile),
            'created_by' => $request->input('created_by'),
        ];

        $Kaderdokumen = Kaderdokumen::create($data);

        $dataResponse = [
            'data' => 'Data berhasil di tambahkan',
            'error' => false,
        ];

        return response()->json($dataResponse);
    }


    public function show($id)
    {
        $data = Kaderdokumen::where('id', $id)->get();

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
        $Kaderdokumen = Kaderdokumen::find($id);
        
        if (!$Kaderdokumen) {
            $notfound = [
                'message' => 'Data Tidak Ada',
            ];
            
            $dataResponse = [
                'data' => $notfound,
                'error' => true,
            ];
            return response()->json($dataResponse);
        }

        $rules = [
            'uri' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    
        $customMessages = [
            'required' => 'dokumen tidak boleh kosong',
            'image' => 'dokumen harus berupa gambar',
            'mimes' => 'dokumen harus berupa jpg, jpeg, png',
            'max' => 'maks. dokumen 2 MB',
        ];
    
        $this->validate($request, $rules, $customMessages);

        $uri = $request->file('uri')->getClientOriginalName();
        $namaFile = time().$uri;
        $request->file('uri')->move('upload', $namaFile);

        $data = [
            'kader_pkk_id' => $request->input('kader_pkk_id'),
            'tipe' => $request->input('tipe'),
            'uri' => url('upload/'.$namaFile),
            'updated_by' => $request->input('updated_by'),
        ];

        Kaderdokumen::where('id', $id)->update($data);

        $dataResponse = [
            'data' => 'Data berhasil di update',
            'error' => false,
        ];

        return response()->json($dataResponse);
    }


    public function destroy(Request $request, $id)
    {
        $now = date('d-m-Y H:i:s');
        $Kaderdokumen = Kaderdokumen::find($id);
        
        if (!$Kaderdokumen) {
            $notfound = [
                'message' => 'Data Tidak Ada',
            ];
            
            $dataResponse = [
                'data' => $notfound,
                'error' => true,
            ];
            return response()->json($dataResponse);
        }

        Kaderdokumen::where('id', $id)->update([
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

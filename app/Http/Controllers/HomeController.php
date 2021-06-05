<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
        public function index()
        {
            $buku = DB::table('buku')
            ->get();
            //  print_r($buku);exit;
            return view('0248', ['buku' => $buku]);
        }

        public function search(Request $request)
        {
            $buku=$request->buku
            $buku = DB::table('buku')

                ->select('buku.judul','buku.tahun_terbit','jenis_buku.jenis','rak_buku.id_buku','rak_buku.id_jenis_code')
                ->get();
                // print_r($siswa);
                // exit;
            return view('0248', ['buku' => $buku]);
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('0248_home');
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $judul = $request->get('judul');
            $tahun = $request->get('tahun_terbit');
            /* Menyimpan data kedalam tabel */
            $save_buku = new \App\Models\buku;
            $save_buku->judul = $judul;
            $save_buku->tahun_terbit = $tahun;
            $save_buku->save();
            return redirect('guru');
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            print_r($id);exit;
            $buku = DB::table('buku')->where('buku',$id)->get();
            return view('buku_edit',['buku' => $buku]);
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }
}

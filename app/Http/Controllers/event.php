<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Modelevent;

class event extends Controller
{
        public function store(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'nama_event' => 'required',
            'tgl_pelaksana' => 'required',
            'info'=> 'required',
            'harga' => 'required',
            'jumlah_tiket' => 'required',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $event = Modelevent::create([
            'nama_event' => $req->nama_event,
            'tgl_pelaksana' => $req->tgl_pelaksana,
            'info'=> $req->info,
            'harga'=> $req->harga,
            'jumlah_tiket' => $req->jumlah_tiket,
        ]);
        if($event){
            return Response()->json(['status'=>1,'message'=>'Data event berhasil ditambahkan!']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data event tidak berhasil ditambahkan!']);
        }
    }

    public function update($id, Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_event' => 'required',
            'tgl_pelaksana' => 'required',
            'info'=> 'required',
            'harga' => 'required',
            'jumlah_tiket' => 'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $event=Modelevent::where('id',$id)->update([
            'nama_event' => $req->nama_event,
            'tgl_pelaksana' => $req->tgl_pelaksana,
            'info'=> $req->info,
            'harga'=> $req->harga,
            'jumlah_tiket' => $req->jumlah_tiket,
        ]);
        if($event){
            return Response()->json(['status'=>1,'message'=>'Data event berhasil diubah']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data event tidak berhasil diubah']);
        }
    }

    public function delete($id)
    {
        $event=Modelevent::where('id',$id)->delete();
        if($event){
            return Response()->json(['status'=>1,'message'=>'Data event berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data event tidak berhasil dihapus']);
        }
    }
    public function tampil()
    {
        $event=Modelevent::all();
        if($event){
            return Response()->json(['Data'=>$event,'status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }
}

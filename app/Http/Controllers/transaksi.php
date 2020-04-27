<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Modeltransaksi;
use App\Modelevent;
use App\Modeladmin;
use Auth;
use DB;

class transaksi extends Controller
{
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'id_admin' => 'required',
            'id_event' => 'required',

        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $event = Modeltransaksi::create([
            'id_admin' => $req->id_admin,
            'id_event' => $req->id_event,
          
        ]);
        if($event){
            return Response()->json(['status'=>1,'message'=>'Data Event berhasil ditambahkan!']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Event tidak berhasil ditambahkan!']);
        }
    }

    public function update($id, Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'id_admin' => 'required',
            'id_event' => 'required',
         
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $event=Modeltransaksi::where('id',$id)->update([
            'id_admin' => $req->id_admin,
            'id_event' => $req->id_event,
            
        ]);
        if($event){
            return Response()->json(['status'=>1,'message'=>'Data Event berhasil diubah']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Event tidak berhasil diubah']);
        }
    }

    public function delete($id)
    {
        $event=Modeltransaksi::where('id',$id)->delete();
        if($event){
            return Response()->json(['status'=>1,'message'=>'Data Event berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Event tidak berhasil dihapus']);
        }
    }
     public function tampil_transaksi()
    {
        $event=Modeltransaksi::all();
        if($event){
            return Response()->json(['Data'=>$event,'status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }
   
}

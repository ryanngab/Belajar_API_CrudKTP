<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use App\Helpers\apiFormatter;
use Exception;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Warga::all();

        if($data){
            return apiFormatter::createAPI(200, 'Succes', $data );
        } else{
             return apiFormatter::createAPI(400, 'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       try{
            $warga = Warga::create($request->all());

            $data = Warga::where('NIK', '=', $warga->NIK)->get();

            if($data){
                return apiFormatter::createAPI(200, 'Succes', $data );
            } else{
                return apiFormatter::createAPI(400, 'Failed');
            }
        }catch(Exception $error){
            return apiFormatter::createApi(400, 'Failed', $error);
    }}


//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Models\Warga  $warga
//      * @return \Illuminate\Http\Response
//      */
    public function show($id)
    {
        try{
            $data = Warga::where('id','=', $id)->first();

            if($data){
                return apiFormatter::createApi(200, 'berhasil', $data);
            }else{
                return apiFormatter::createApi(400, 'failed');
            }
        }catch(Exception $error){
            return apiFormatter::createApi(400, 'Gagal',$error);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function edit(Warga $warga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id) {
        try{
            $warga = Warga::findorfail($id);
            $warga->update($request->all());

            $data = Warga::where('id','=', $id)->first();

            if($data){
                return apiFormatter::createApi(200, 'berhasil', $data);
            }else{
                return apiFormatter::createApi(400, 'failed');
            }
        }catch(Exception $error){
            return apiFormatter::createApi(400, 'Gagal',$error);
        }}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $warga = Warga::findorfail($id);
            $data = $warga->delete();
            if($data){
                return apiFormatter::createApi(200, 'berhasil', $data);
            }else{
                return apiFormatter::createApi(400, 'failed');
            }
        }catch(Exception $error){
            return apiFormatter::createApi(400, 'Gagal',$error);
    }
}
}

<?php

namespace App\Http\Controllers;
use App\Visitors;
use App\Record;
use DB;
use Redirect;

use Illuminate\Http\Request;

class visitorsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('Visitors')
            ->where('status', '=', 1)
            ->get();

        $userFlux = DB::table('Records')
            ->get();
        
    
        return view('visitors', compact('user','userFlux'));
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
        $amountRoom = DB::table('Visitors')
            ->where('room', $request->room)   // buscar no banco todas as tuplas que contem a sala desejada
            ->where('status', 1)
            ->get(); 

        $result = count($amountRoom); // contar o tamanho do array
        if( $result < 3 ){

            $users = new Visitors();
            $users->name_user = $request->name_user;
            $users->cpf = $request->cpf;
            $users->room = $request->room;
            $users->email = $request->email;
            $users->status = 1;
            $users->save();

            $record = new Record();
            $record->name = $request->name_user;
            $record->roomRecords = $request->room;
            $record->data_flux = 'entrada'; // entrada é 1 e saida é 0
            $record->save();

            activity () -> log ('Entrada Visitante Sala' . $record);
            activity () -> log ('Cadastro Visitante' . $users);

            return redirect()->back();
        }

        $message = 'A sala ' . $request->room . ' está cheia, escolha outra.';
        return Redirect::back()->withErrors([$message]);
        
    }


    public function exit($id)
    {
        $validation = DB::table('Visitors')
            ->where('id', $id)
            ->update(['status' => 0]);
       
        $changeUser = DB::table('Visitors')
            ->where('id', $id)
            ->value('name_user');
        $changeVisitors = DB::table('Visitors')
            ->where('id', $id)
            ->value('room');
            
        $record = new Record();
            $record->name = $changeUser;
            $record->roomRecords = $changeVisitors;
            $record->data_flux = 'Saida';
            $record->save();
        activity () -> log ('Saida Visitante Sala' . $record);

        return redirect()->back();
       
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
        //
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

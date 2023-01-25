<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class EditUserRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        return view('editUserRecord', ['users'=>$users, 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(userRequest $request)
    {
        function FormatCpf($requestCpf){

            // Extrai somente os números
            $cpf = preg_replace( '/[^0-9]/is', '', $requestCpf );
            return $cpf;
        }

        DB::beginTransaction();
        try{
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->occupation = $request->occupation;
            $user->email = $request->email;
            $user->cpf = FormatCpf($request->cpf);
            $user->password = Hash::make($request->password);
            $user->save();

            DB::commit();
            return back()->with("success", "Usuário atualizado com sucesso!");

        } catch(\Exception $exception) {
            DB::rollBack();
            return 'Message:' . $exception->getMessage();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

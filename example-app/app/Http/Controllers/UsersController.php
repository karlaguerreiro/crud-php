<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    //

    public function testUser()
    {
        Log::info('Server is running');
        return "server is working";
    }

    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function create()
    {
        $name = request('name');
        $email = request('email');
        $password = request('password');
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        try{
            if($user->save()){
                return response()->json($user);
            }
        }catch(\Exception $e){
            //LOG ERROR TO LOGS
            Log::error($e->getMessage());
        }
       
        return response()->json(['error' => 'Erro ao criar usuário'], 500);
    }

    public function view($id){
        $user = User::find($id);
        if(!$user){
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }
        return response()->json($user);
    }

    public function edit($id){
        $user = User::find($id);
        if(!$user){
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }
        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
        try{
            if($user->save()){
                return response()->json($user);
            }
        }catch(\Exception $e){
            //LOG ERROR TO LOGS
            Log::error($e->getMessage());
        }
       
        return response()->json(['error' => 'Erro ao editar usuário'], 500);
    }

    public function delete($id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }
        try{
            if($user->delete()){
                return response()->json($user);
            }
        }catch(\Exception $e){
            //LOG ERROR TO LOGS
            Log::error($e->getMessage());
        }
       
        return response()->json(['error' => 'Erro ao deletar usuário'], 500);
    }
    

}

<?php

namespace App\Http\Controllers;

use App\Jabatan;
use App\Pangkat;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use Yajra\DataTables\DataTables;
class UserController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'], //untuk menvalidasi data user yaitu string dengan maximal 255 karakter
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'], //untuk menvalidasi data user yaitu string dengan maximal 255 karakter
            'password' => ['required', 'string', 'min:8', 'confirmed'],//untuk menvalidasi data user yaitu string dengan maximal 8 karakter
        ]);
    }

    //fungsi mengambil nilai data pada tabel user
    public function data()
    {
        $user = User::with(['role','pangkat'])->get(); // Mengambil nilai data user join dengan tabel role dan tabel pangkat
        return DataTables::of($user)->toJson();// mengembalikan nilai $user ke json
    }

    //fungsi untuk menambahkan data
    public function create(Request $request){
        $valid = User::where('user_nrp',$request->user_nrp)->count();      //unttuk mencek data telah ada

        if($valid != 0){
             $message = ['error' => 'Data Telah ada,Gagal menambahkan!'];  //unttuk mencek data telah ada
             return response()->json($message);                             //unttuk mencek data  telah ada
        } 

        else{

         $user = new User;                                // eloquent membuat nilai baru pada class user
         $user->user_nrp = $request->user_nrp;          //request input user_nrp
         $user->user_nama = $request->user_nama;        //request input user_nama
         $user->pangkat_id = $request->pangkat_id;      //request input pangkat_id
         $user->role_id = $request->role_id;            //request input role_id
         $user->password = Hash::make($request['password']);    //request input password dan meng enkripsi nilai yg di input


         $user->save();                   //menyimpan nilai yg di input
        }
    }

    //fungsi untun meng update nilai data pada tabel user
    public function update(Request $request,$id){ //update berdasarkan request nilai id

        $user = User::where('user_nrp',$id)->first();  //query eloquent select mengambil data pada user berdasarakan user nrp
        $user->user_nama = $request->user_nama;       //request input user_nrp
        $user->pangkat_id = $request->pangkat_id;     //request input pangkat_id
        $user->update();                              //menyimpan nilai yang di update
    }

    //fungsi untuk menghapus data
    public function delete($id)
    {

      User::where('user_nrp', $id)->delete();  // query eloquent menghapus data berdasarkan id

    }

    // fungsi untuk mengambil nilai role
    public function listrole(){
        $role = Role::whereIn('role_id',[2,3]) // query eloquent select role berdasar id 2 dan 3
        ->get();
        return json_encode($role); //mengembalikan nilai role ke json
    }

     // fungsi untuk mengambil nilai pangkat
    public function listpangkat(){
        $role = Pangkat::all(); // query eloquent select all pangkat
        return json_encode($role); ////mengembalikan nilai role ke json
    }

}

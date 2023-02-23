<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        return view('user/user');
    }

    public function viewAllUser()
    {
        $user = User::select('*')->get();


        return view('user/user', ['user' => $user]);
    }

    public function hapusUser($id_user)
    {
        $user = User::where('id_user', $id_user)
            ->delete();

        return redirect()->route('viewAllUser');
    }

    public function addUser(Request $request)
    {

        // $validator = Validator::make($request->all(), [
        //     'username' => 'required|min:5',
        //     'nama' => 'required|min:5',
        //     'email' => 'required',
        //     'alamat' => 'required|min:5',
        //     'password' => 'required|min:5'
        // ]);

        // if ($validator->fails()) {
        //     return redirect('user/addPage')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }

        // dd($request);

        $request->validate(
            [
                'username' => 'required|min:1',
                'nama' => 'required|min:1',
                'email' => 'required|email:dns',
                'alamat' => 'required|min:1',
                'password' => 'required|min:1'
            ]
        );

        $User = User::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'status' => ($request->status != "" ? "1" : "0"),


        ]);

        // return redirect()->route('viewuserdata')->with('message', 'Data update succeesfully');
        if ($User) {
            return redirect()->route('viewAllUser')->with('berhasilAdd', 'Data berhasil di tambahkan');
        } else {
            return redirect()->route('viewAllUser')->with('gagalAdd', 'Data gagal di tambahkan');
        }
    }

    public function deleteAllUser()
    {

        DB::table('user')->truncate();

        return redirect()->route('viewAllUser');
    }

    public function updateUser(Request $request)
    {

        // DB::table('user')
        //       ->where('id_user', $request->id)
        //       ->update(['nama'   => generateRandomString(),
        //                 'alamat' => generateRandomString()]);
        $request->validate(
            [
                'username' => 'required|min:1',
                'nama' => 'required|min:1',
                'email' => 'required|email:dns',
                'alamat' => 'required|min:1',
                'password' => 'required|min:1'
            ]
        );

        $User = User::where('id_user', $request->id_user)->update(
            [
                'username' => $request->username,
                'nama' => $request->nama,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'password' => ($request->password != "" ? Hash::make($request->password) : $request->password),
                'status' => $request->status
            ]
        );

        if ($User) {
            return redirect()->route('viewAllUser')->with('berhasilUpdate', 'Data berhasil di update');
        } else {
            return redirect()->route('viewAllUser')->with('gagalUpdate', 'Data gagal di update');
        }
    }

    public function openAddPage()
    {
        return view('user/add');
    }

    public function openUpdatePage($id)
    {
        // dd($id);

        // $user_data = UserdataModel::select('*')
        //     ->where('id', $id)
        //     ->first();

        $dataUpdate = User::select('*')->where('id_user', $id)->first();

        return view('user/update', ['data' => $dataUpdate]);
    }
}

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

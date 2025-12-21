<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function ajax(Request $request)
    {
        if ($request->ajax()) {
        //    $datas = User::whereDoesntHave('roles', function ($q) {
        //     $q->where('name', 'super-admin');
        //     })->get();
            // $datas = User::with('roles')->whereHas('roles', function ($q) {
            //     $q->where('name', '!=', 'super-admin');
            // })->get();
            $datas = User::All();
        }
        return Datatables::of($datas)
            ->addIndexColumn()
             ->addColumn('action', function ($user) {

                $deleteUrl = route('roles.destroy', $user->id);

                return '
                <a href="' .route('roles.edit', $user->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                
                
                <form action="' . $deleteUrl . '" method="POST" style="display:inline-block">
                ' . csrf_field() . '
                ' . method_field('DELETE') . '
                <button type="submit" class="btn btn-xs btn-danger show_confirm_delete">
                    <i class="fa fa-trash"></i> Delete
                </button>   
                    ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $roles = Role::select('id', 'name')->get();

        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Silahkan lengkapi semua data '. $validator->errors()->first());
            return redirect('/users/create')
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            $input = User::create([
                'name' => $request->name,
                'email'=>$request->email,
                'password' => Hash::make($request->password),
                
            ]);

            $input->assignRole($request->role);
            

        Alert::success('Success', 'Data berhasil disimpan');
        return redirect()->route('users.index');


        } catch (\throwable $th) {
            // DB::rollBack();
            return redirect()->back()->withInput($request->all());
            Alert::error('Error', 'Silahkan lengkapi semua data '. $th->getMessage());
            \Log::error($e->getMessage());
        } finally {
            DB::commit();
        }
    }

    public function edit($id)
    {
        return view('admin.users.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update an existing user
    }

    public function destroy($id)
    {
       try{
            DB::transaction(function () use ($id) {
            $user = User::findOrFail($id);

           
            $user->delete();
        });
        }
         catch (\throwable $th) {
            return redirect()->back();
        }
         

        return redirect()->back();
    }
}

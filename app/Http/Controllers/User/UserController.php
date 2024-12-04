<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list(Request $request)
    {
        $list = User::where('is_active','1')->get();
        return view('User.list', compact('list'));
    }
    public function addUserPage()
    {
        return view('User.add');
    }
    public function add(Request $request)
    {
        $data = $request->all();
        $is_admin = $request->has('is_admin') ? 1 : 0;
        User::query()->create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'is_admin' => $is_admin,
            'password' => bcrypt($data['password'])
        ]);
        session()->flash('success', 'User add successfully!');
        return redirect()->route('addUserPage');
    }

    public function get(int $id)
    {
        $user = User::query()->where('id', $id)->first();
        return view('User.get', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $is_admin = $request->has('is_admin') ? 1 : 0;

        $updateData = [
            'name' => $data['name'],
            'phone' => $data['phone'],
            'is_admin' => $is_admin,
        ];

        if (!empty($data['password'])) {
            $updateData['password'] = bcrypt($data['password']);
        }

        User::query()
            ->where('id', $id)
            ->update($updateData);

        session()->flash('success', 'User updated successfully!');

        return $this->get($id);
    }


    public function delete(int $id)
    {
        User::query()
            ->where('id',$id)
            ->update([
                'is_active' => '0',
            ]);
        session()->flash('success', 'User deleted successfully!');
        return redirect()->route('listBranch');
    }
}

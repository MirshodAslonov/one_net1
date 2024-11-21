<?php

namespace App\Http\Controllers\Organ;

use App\Http\Controllers\Controller;
use App\Models\Organ\Organ;
use Illuminate\Http\Request;

class OrganController extends Controller
{
    public function list(Request $request)
    {
        $list = Organ::where('is_active','1')->get();
        return view('Organ.list', compact('list'));
    }
    public function addOrganPage()
    {
//        session()->flash('success', 'Client add successfully!');
        return view('Organ.add');
    }
    public function add(Request $request)
    {
        $data = $request->all();
        Organ::query()->create([
            'name' => $data['name']
        ]);
        session()->flash('success', 'Organ add successfully!');
        return redirect()->route('addOrganPage');
    }

    public function get(int $id)
    {
        $organ = Organ::query()->where('id', $id)->first();
        return view('Organ.get', compact('organ'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        Organ::query()
            ->where('id',$id)
            ->update([
                'name' => $data['name'],
            ]);
        session()->flash('success', 'Organ updated successfully!');
        return  $this->get($id);
    }

    public function delete(int $id)
    {
        Organ::query()
            ->where('id',$id)
            ->update([
                'is_active' => '0',
            ]);
        session()->flash('success', 'Organ deleted successfully!');
        return redirect()->route('listOrgan');
    }
}

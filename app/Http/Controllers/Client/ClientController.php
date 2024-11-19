<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Branch\Branch;
use App\Models\Client\Client;
use App\Models\Organ\Organ;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function list(Request $request)
    {
        $list = Client::query()->where('is_active','1')->get();
        return view('Client.list', compact('list'));
    }

    public function addClientPage()
    {
        $branches = Branch::query()->where('is_active','1')->get();
        $organs = Organ::query()->where('is_active','1')->get();

//        session()->flash('success', 'Client add successfully!');
        return view('Client.add',[
            'branches' => $branches,
            'organs' => $organs
        ]);
    }

    public function add(Request $request)
    {
        dd($request->all());
        $data = $request->all();
        Client::query()->create([
            'name' => $data['name']
        ]);
        session()->flash('success', 'Client add successfully!');
        return redirect()->route('addClientPage');
    }

    public function get(int $id)
    {
        $client = Client::query()->where('id', $id)->first();
        return view('Client.get', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        Client::query()
            ->where('id',$id)
            ->update([
                'name' => $data['name'],
            ]);
        session()->flash('success', 'Client updated successfully!');
        return  $this->get($id);
    }

    public function delete(int $id)
    {
        Client::query()
            ->where('id',$id)
            ->update([
                'is_active' => '0',
            ]);
        session()->flash('success', 'Client deleted successfully!');
        return redirect()->route('listClient');
    }
}

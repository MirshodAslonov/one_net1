<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function list(Request $request)
    {
        $list = Client::where('is_active','1')->get();
        return view('Client.list', compact('list'));
    }

    public function add(Request $request)
    {
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

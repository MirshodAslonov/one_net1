<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branch\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function list(Request $request)
    {
        $list = Branch::where('is_active','1')->get();
        return view('Branch.list', compact('list'));
    }
    public function addBranchPage()
    {
//        session()->flash('success', 'Client add successfully!');
        return view('Branch.add');
    }
    public function add(Request $request)
    {
        $data = $request->all();
        Branch::query()->create([
            'name' => $data['name']
        ]);
        session()->flash('success', 'Branch add successfully!');
        return redirect()->route('addBranchPage');
    }

    public function get(int $id)
    {
        $branch = Branch::query()->where('id', $id)->first();
        return view('Branch.get', compact('branch'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        Branch::query()
        ->where('id',$id)
        ->update([
            'name' => $data['name'],
        ]);
        session()->flash('success', 'Branch updated successfully!');
        return  $this->get($id);
    }

    public function delete(int $id)
    {
        Branch::query()
            ->where('id',$id)
            ->update([
                'is_active' => '0',
            ]);
        session()->flash('success', 'Branch deleted successfully!');
        return redirect()->route('listBranch');
    }

}

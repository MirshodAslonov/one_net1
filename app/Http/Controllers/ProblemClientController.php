<?php

namespace App\Http\Controllers;

use App\Exports\ClientsExport;
use App\Http\Controllers\Client\ClientController;
use App\Models\Client\Client;
use App\Models\Problem\ProblemComment;
use App\Models\ProblemClient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProblemClientController extends Controller
{
    public function list(Request $request)
    {
        $list = ProblemClient::query()
            ->with('client')
            ->with('problem_user')
            ->with('answer_user')
            ->orderByDesc('created_at')
            ->get();
        return view('ProblemClient.list', [
            'list' => $list
        ]);
    }

    public function exelDownload(Request $request)
    {
        $clientIds = $request->input('client_ids');

        $idsArray = explode(',', $clientIds);
        $clients = Client::whereIn('id', $idsArray)->get();

        return Excel::download(new ClientsExport($clients), 'clients.xlsx');
    }

    public function addProblemClientPage(int $client_id)
    {
        $client = Client::query()->where('id',$client_id)->first();
//        session()->flash('success', 'Client add successfully!');
        return view('ProblemClient.add',[
            'client' => $client
        ]);
    }

    public function add(Request $request)
    {
        $data = $request->all();
        $data['problem_user_id'] = auth()->user()->id;
        if(isset($data['answer'])&& !is_null($data['answer'])){
            $status = 'finish';
            $answer_user_id = auth()->user()->id;
            $updated_at = carbon::now();
        }else{
            $status = 'active';
            $answer_user_id = null;
            $updated_at = null;
        }
        $problem = ProblemClient::query()->create([
            'client_id' => $data['client_id'],
            'status' => $status,
            'answer' => $data['answer']??null,
            'answer_user_id' => $answer_user_id,
            'problem_user_id' => $data['problem_user_id'],
            'updated_at' => $updated_at
        ]);

        ProblemComment::query()->create([
           'user_id' => $data['problem_user_id'],
           'problem' => $data['problem'],
            'problem_id' => $problem->id
        ]);

        if(isset($data['images'])) {
            (new ClientController())->addClientFiles([
                'client_id' => $data['client_id'],
                'images' => $data['images'],
                'problem_id' => $problem->id
            ]);
        }
        session()->flash('success', 'Client add successfully!');
        return redirect()->route('listProblemClient');
    }

    public function get(int $id)
    {
        $values = ProblemClient::query()->where('id', $id)
            ->with('image',function($query){
                $query->where('is_active','1');
            })
            ->with('problem_user')
            ->with('answer_user')
            ->with('client')
            ->with('problems',function ($q){
                $q->with('user');
            })
            ->first();


        if ($values && $values->image) {
            $values['images'] = collect($values->image)->keyBy('image_type')->toArray();
        }

        return view('ProblemClient.get', [
            'values' => $values
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
       if(isset($data['type']))
       {
           if($data['type'] == 'answer'){
               ProblemClient::query()
                   ->where('id',$id)
                   ->update([
                       'answer_user_id' => auth()->user()->id,
                       'answer' => $data['content'],
                       'status' => 'finish'
                   ]);
           }elseif($data['type'] == 'problem'){
               ProblemComment::query()
                   ->create([
                       'problem' => $data['content'],
                       'user_id' => auth()->user()->id,
                       'problem_id' => $id
                   ]);
           }
       }

        if(isset($data['images'])){
            if(isset($data['images'])){
                (new ClientController())->addClientFiles([
                    'client_id' => $data['client_id'],
                    'images' => $data['images'],
                    'problem_id' => $id
                ]);
            }
        }
        session()->flash('success', 'Client updated successfully!');
        return  $this->get($id);
    }

}

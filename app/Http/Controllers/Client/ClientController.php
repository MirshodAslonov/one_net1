<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Branch\Branch;
use App\Models\Client\Client;
use App\Models\Comment\Comment;
use App\Models\File;
use App\Models\Organ\Organ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $data = $request->all();
        $client = Client::query()->create($data);
        $this->addOrUpdateComment([
            'client_id' => $client->id,
            'comment' => $data['comment']
        ]);
        if(isset($data['images'])) {
            $this->addClientFiles([
                'client_id' => $client->id,
                'images' => $data['images']
            ]);
        }
        session()->flash('success', 'Client add successfully!');
        return redirect()->route('listClient');
    }

    public function get(int $id)
    {
        $branches = Branch::query()->where('is_active','1')->get();
        $organs = Organ::query()->where('is_active','1')->get();
        $values = Client::query()->where('id', $id)
            ->with('image',function($query){
                $query->where('is_active','1');
            })
            ->with('comment')
            ->first();

        if ($values && $values->image) {
            $values['images'] = collect($values->image)->keyBy('image_type')->toArray();
        }

        return view('Client.get', [
            'values' => $values,
            'branches' => $branches,
            'organs' => $organs
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        Client::query()
            ->where('id',$id)
            ->update([
                'branch_id' => $data['branch_id'],
                'organ_id' => $data['organ_id'],
                'name_organ' => $data['name_organ'],
                'mgmt_ip' => $data['mgmt_ip'],
                'ip' => $data['ip'],
                'vlan' => $data['vlan'],
                'vlan_ip' => $data['vlan_ip'],
                'zayafka' => $data['zayafka'],
                'stp_zayafka' => $data['stp_zayafka'],
                'atc' => $data['atc'],
                'port' => $data['port'],
                'speed' => $data['speed'],
                'client_name' => $data['client_name'],
                'client_number' => $data['client_number'],
                'date_connect' => $data['date_connect'],
                'location' => $data['location']
            ]);
        $this->addOrUpdateComment([
            'client_id' => $id,
            'comment' => $data['comment']
        ]);
        if(isset($data['images'])){
            if(isset($data['images'])){
                $this->addClientFiles([
                    'client_id' => $id,
                    'images' => $data['images']
                ]);
            }
        }
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

    public function addClientFiles(array $data)
    {
        foreach ($data['images'] as $key => $file)
        {
            $this->deleteClientFile([
                'client_id' => $data['client_id'],
                'image_type' => $key
            ]);
            $this->saveFile([
               'client_id' => $data['client_id'],
               'image_type' => $key,
               'file' => $file
            ]);
        }
    }

    public function saveFile(array $data)
    {
        $gen_path = Str::random(5);
        $path = $data['file']->storeAs("public/client_files/$gen_path", $data['file']->hashName());

        $new = new File();
        $new->path = Storage::path($path);
        $new->url = Storage::url($path);
        $new->size = $data['file']->getSize();
        $new->mime_type = $data['file']->getClientMimeType();
        $new->client_id = $data['client_id'];
        $new->image_type = $data['image_type'];
        $new->save();
    }

    public function deleteClientFile(array $data)
    {
        File::query()->where([
            'client_id' => $data['client_id'],
            'image_type' => $data['image_type']
        ])->update(['is_active' => '0']);
    }

    public function addOrUpdateComment(array $data)
    {
        $comment = Comment::query()->where('client_id',$data['client_id'])->first();
        if(is_null($comment)){
            Comment::query()->create($data);
        }else{
            $comment->update(['comment' => $data['comment']]);
        }
    }
}

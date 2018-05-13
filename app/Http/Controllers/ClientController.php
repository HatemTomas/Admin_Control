<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\CreateClientRequest;
use App\Services;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function getAdminIndex()
    {
        $clients = Client::paginate(5);
        return view('admin.index', ['clients' => $clients]);
    }

    public function getAddClient()
    {
        return view('client.addClient');
    }

    public function postAddClient(CreateClientRequest $request)
    {
        $client = Client::create($request->all());

        foreach ($request->service as $service) {
            $client->services()->create([
                'title' => $service
            ]);
        }

        return redirect()->route('AdminIndex')->with(['success' => 'Client Successfully Created']);
    }

    public function getEditClient($client_id)
    {
        $client = Client::find($client_id);
        return view('client.editClient', ['client' => $client]);
    }

    public function postEditClient(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'phone' => 'required',
            'contract_start_date' => 'required',
            'contract_end_date' => 'required'
        ]);

        $client = Client::find($request['client_id']);
        $client->title = $request['title'];
        $client->description = $request['description'];
        $client->status = $request['status'];
        $client->phone = $request['phone'];
        $client->contract_start_date = $request['contract_start_date'];
        $client->contract_end_date = $request['contract_end_date'];
        $client->update();
        return redirect()->route('AdminIndex')->with(['success' => 'Client Updated']);
    }

    public function getDeleteClient($client_id)
    {
        $client = Client::find($client_id);
        if (!$client) {
            return redirect()->route('AdminIndex')->with(['fail' => 'Client not found']);
        }
        $client->delete();
        return redirect()->route('AdminIndex')->with(['success' => 'Client deleted']);
    }

    public function getClient($client_id)
    {
        $client = Client::find($client_id);
        return view('client.singleClient', ['client' => $client]);
    }
}

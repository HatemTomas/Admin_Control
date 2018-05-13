<?php

namespace App\Http\Controllers;

use App\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function getServicesPage($client)
    {
        $services = Services::where('user_id', $client)->paginate(5);

        return view('services.viewServices', ['services' => $services, 'client' => $client]);
    }


    public function getAddServices($client)
    {
        return view('services.addServices', compact('client'));
    }

    public function postAddServices($client, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'type' => 'required',
            'link' => 'required',
            'description' => 'required',
        ]);

        $service = new Services();
        $service->title = $request['title'];
        $service->type = $request['type'];
        $service->user_id = $client;
        $service->link = $request['link'];
        $service->description = $request['description'];
        $service->save();

        return redirect()->route('ServicesPage', ['client' => $client])->with(['success' => 'Service Added']);
    }

    public function getEditService($client, $service_id)
    {
        $service = Services::find($service_id);
        return view('services.editServices', ['service' => $service, 'client' => $client]);
    }

    public function postEditServices($client, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'type' => 'required',
            'link' => 'required',
            'description' => 'required',
        ]);

        $service = Services::find($request['service_id']);
        $service->title = $request['title'];
        $service->type = $request['type'];
        $service->user_id = $client;
        $service->link = $request['link'];
        $service->description = $request['description'];
        $service->update();

        return redirect()->route('ServicesPage', ['client' => $client])->with(['success' => 'Service Updated']);
    }

    public function getDeleteServices($client, $service_id)
    {
        $service = Services::find($service_id);
        if (!$service) {
            return redirect()->route('ServicesPage')->with(['fail' => 'Service not found']);
        }
        $service->delete();
        return redirect()->route('ServicesPage', ['client' => $client])->with(['success' => 'Service deleted']);
    }

    public function getService($client, $service_id)
    {
        $service = Services::find($service_id);
        return view('services.singleService', ['service' => $service, 'client' => $client]);
    }
}

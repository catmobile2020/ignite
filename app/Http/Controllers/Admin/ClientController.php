<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Events\RemoveRegistersEvent;
use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClientRequest;
use App\Image;

class ClientController extends Controller
{
    use UploadImage;

    public function index()
    {
        $rows = Client::latest()->get();
        return view('admin.pages.client.index',compact('rows'));
    }


    public function create()
    {
        $client = new Client;
        return view('admin.pages.client.form',compact('client'));
    }


    public function store(ClientRequest $request)
    {
        $client = Client::create($request->all());
        if ($request->photo)
            $this->upload($request->photo,$client);
        return redirect()->route('admin.clients.create')->with('message','Done Successfully');
    }


    public function show($id)
    {

    }


    public function edit(Client $client)
    {
        return view('admin.pages.client.form',compact('client'));
    }


    public function update(ClientRequest $request, Client $client)
    {
        $client->update($request->all());
        if ($request->photo)
            $this->upload($request->photo,$client,null,true);
        return redirect()->route('admin.clients.index')->with('message','Done Successfully');
    }


    public function destroy(Client $client)
    {
        $client->trash();
        return redirect()->route('admin.clients.index')->with('message','Done Successfully');
    }

    public function destroyAll()
    {
        \DB::table("clients")->truncate();
        \DB::table("images")->truncate();
        \File::deleteDirectory(public_path('uploads'));
        return redirect()->route('admin.clients.index')->with('message','Done Successfully');
    }

    public function destroyRegistered()
    {
        Client::query()->update(['registered'=>false]);
        event(new RemoveRegistersEvent());
        return redirect()->route('admin.clients.index')->with('message','Done Successfully');
    }
}

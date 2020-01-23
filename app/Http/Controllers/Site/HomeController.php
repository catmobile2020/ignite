<?php

namespace App\Http\Controllers\Site;

use App\Client;
use App\Events\SearchEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('site.home',compact('clients'));
    }

    public function getSearch(Request $request)
    {
        if ($request->ajax())
        {
            $clients = Client::where('name','like',$request->name.'%')->get();
            if (count($clients))
            {
                $dropDown = '<ul class="m-p selectee">';
                foreach ($clients as $client)
                {
                    $dropDown .= '<li class="selectLi">'.$client->name.'</li>';
                }
                $dropDown .= '</ul>';
                return $dropDown;
            }
            return;

        }
        return view('site.search');
    }

    public function search(Request $request)
    {
        $client = Client::where('name',$request->name)->first();
        if ($client)
        {
            $client->update(['registered'=>true]);
            event(new SearchEvent($client->id));
            return redirect()->back()->with('message','Done Successfully');
        }
        return redirect()->back()->with('message','No User With This Name Try Again !');
    }
}

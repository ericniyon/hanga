<?php

namespace App\Http\Controllers\Frontend\Partners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurPartner;


class SavePartners extends Controller
{
    public function index()
    {
        return view('client.v2.our_partners');
    }
    public function show($id)
    {
        $partner = OurPartner::find($id);
        return view('client.v2.show_partners', compact('partner'));
    }
    public function update( Request $request ,$id)
    {


        if(isset($request->logo)){
            $extension = $request->logo->getClientOriginalExtension();
            $filename = date('YmdHis').rand(1, 99999).'.'.$extension;
            $request->logo->move(public_path('partners'), $filename);

        }

        else{
            $filename = '';
        }
                // $resource = Resources::find($)
        OurPartner::where('id', $request->id)->update([
            'name' => $request->name,
            'logo' => $filename
            ]);
        // session()->put('message', 'New record have been updated successfully');
        
        session()->forget('message');
        return redirect()->back();
    }

    public function store(Request $request)
    {
        if(isset($request->logo)){
            $extension = $request->logo->getClientOriginalExtension();
            $filename = date('YmdHis').rand(1, 99999).'.'.$extension;
            $request->logo->move(public_path('partners'), $filename);

        }

        else{
            $filename = '';
        }
        $partner = new OurPartner();

        $partner->logo = $filename;
        $partner->name = $request->name;
        $partner->save();

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\DSPRegistration;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\FeatureContent;
use App\Models\GoogleRatings;
use App\Models\GoogleRevers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->intended('dashboard');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                Auth::login($newUser);

                return redirect()->intended('dashboard');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }



    public function index()
    {
        return view('admin.google.index');
    }

    public function create()
    {
        $clients = DSPRegistration::all();
        return view('admin.google.new_entry', compact('clients'));
    }
    public function store(Request $request)
    {

        $ratings = new GoogleRatings();

        $ratings->client_id = $request->client_id;
        $ratings->rating = $request->rating;

        $ratings->save();


        if ($request->full_name  || $request->cuastomer_rating || $request->feedback || $request->review_date ) {
            $google = new GoogleRevers();
            $google->full_name = $request->full_name;
            $google->cuastomer_rating = $request->cuastomer_rating;
            $google->feedback = $request->feedback;
            $google->review_date = $request->review_date;
            $google->google_rating = $ratings->id;
            $google->save();
        }
        if ($request->full_name  || $request->cuastomer_rating || $request->feedback || $request->review_date ) {

            $merged_array1 = array_combine($request->full_name, $request->cuastomer_rating);
            $merged_array2 = array_combine($request->full_name, $request->cuastomer_rating);

            $array = array_merge($merged_array1, $merged_array2);

            foreach ($array as $key => $value) {

                GoogleRevers::create([
                    'full_name' => $key,
                    'cuastomer_rating' => $value,
                    'feedback' => $request->feedback,
                    'review_date' => $request->review_date,
                    'google_rating' => $ratings->id,

                ]);
            }
        }

        return redirect()->back()->with('success', 'Content created successfully');
    }

    public function update(Request $request ,$id)
    {
        $content = FeatureContent::find($id);

        $content->tab = $request->tab;
        $content->content = $request->content;

        $content->save();
        return redirect()->back()->with('success', 'Content updated successfully');
    }
    public function delete($id)
    {
        $content = FeatureContent::find($id);
        $content->delete();
        return redirect()->to('list-content')->with('success', 'Content deleted successfully');
    }
    public function edit($id)
    {
        $content = FeatureContent::find($id);
        return view('admin.google.single_rating', compact('content'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $allFeedback = Feedback::all();
        return view('admin.feedback', compact('allFeedback'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse|RedirectResponse
     */
    public function store(Request $request)
    {
        Feedback::create($request->except(["_token"]));
        session()->flash('success', 'Feedback submitted successfully');
        if ($request->ajax())
        {
            return response()->json(["status" => true]);
        }
        return back();
    }

    public function complant(Request $request)
    {

        return $request->all();
    }

}

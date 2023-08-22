<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeatureContent;

class ContentController extends Controller
{
    //
    public function index()
    {
        return view('admin.tabs.content');
    }
    public function create()
    {
        return view('admin.tabs.new_content');
    }
    public function store(Request $request)
    {
        $content = new FeatureContent();

        $content->tab = $request->tab;
        $content->content = $request->content;

        $content->save();
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
        return view('admin.tabs.single_content', compact('content'));
    }
}

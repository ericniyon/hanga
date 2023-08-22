<?php

namespace App\Http\Controllers;

use Throwable;
use App\FileManager;
use App\Models\Webinar;
use App\Models\WebinarDate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use App\DataTables\WebinarsDataTable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ValidateWebinarForm;
use App\Http\Requests\ValidateWebinarEditForm;
use Illuminate\Contracts\Foundation\Application;

class WebinarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $webinars = Webinar::select('*');
        $datatable = new WebinarsDataTable($webinars);
        return $datatable->render('admin.webinars.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.webinars.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(ValidateWebinarForm $request)
    {
        $input = $request->except(['proengsoft_jsvalidation','photo','start_time','end_time','attachment']);

        if ($request->hasFile('photo')) {
            $dir = FileManager::WEBINAR_IMAGES_PATH;

            $uuid = "webinar_image_" . Str::slug(Str::uuid(), '_');
            $file = $request->file('photo');
            $extension = $file->extension();
            $path = $file->storeAs($dir, "$uuid" . ".$extension");
            $input['photo'] = str_replace("$dir", '', $path);
        }

        if ($request->hasFile('attachment')) {
            $dir = FileManager::WEBINAR_ATTACHMENT_PATH;

            $uuid = "webinar_attachment_" . Str::slug(Str::uuid(), '_');
            $file = $request->file('attachment');
            $extension = $file->extension();
            $path = $file->storeAs($dir, "$uuid" . ".$extension");
            $input['attachment'] = str_replace("$dir", '', $path);
        }

        //
        // if ($photo = $request->file('photo')) {
        //     $destinationPath = 'public/webinars/photos';
        //     $path = 'webinars' . date('YmdHis') . "." . $photo->getClientOriginalExtension();
        //     $path = $request->file('photo')->store($destinationPath);
        //     $input['photo'] = "$path";
        // }
        // if ($attachment = $request->file('attachment')) {
        //     $destinationPath = 'public/webinars/attachments';
        //     $path = 'attachments' . date('YmdHis') . "." . $attachment->getClientOriginalExtension();
        //     $path = $request->file('attachment')->store($destinationPath);
        //     $input['attachment'] = "$path";
        // }
        $webinar = Webinar::create($input);
        if ($request->start_date || $request->end_date){
            WebinarDate::create([
                'webinar_id' =>$webinar->id,
                'start_date' =>$request->start_date,
                'end_date' =>$request->end_date,
            ]);
        }
        if ($request->start_time  || $request->end_time) {
            $merged_array = array_combine($request->start_time, $request->end_time);
            foreach ($merged_array as $key => $value) {
                WebinarDate::create([
                    'webinar_id' =>$webinar->id,
                    'start_date' =>$key,
                    'end_date' =>$value,
                ]);
            }
        }
        return redirect()->route('admin.webinars.index')->with('success', 'Event Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Webinar $webinar
     * @return Response
     */
    public function show(Webinar $webinar)
    {
        return view('admin.webinars.details', compact('webinar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Webinar $webinar
     * @return Response
     */
    public function edit(Webinar $webinar)
    {
        return view('admin.webinars.edit', compact('webinar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Webinar $webinar
     * @return Response
     */
    public function update(ValidateWebinarEditForm $request, Webinar $webinar)
    {
        // dd($webinar);
        $input = $request->except(['proengsoft_jsvalidation','photo','start_time','end_time','attachment']);
        if ($request->hasFile('photo')) {
            $dir = FileManager::WEBINAR_IMAGES_PATH;

            if ($webinar && $webinar->photo) {
                Storage::delete($dir . $webinar->photo);
            }

            $uuid = "webinar_image_" . Str::slug(Str::uuid(), '_');
            $file = $request->file('photo');
            $extension = $file->extension();
            $path = $file->storeAs($dir, "$uuid" . ".$extension");
            $input['photo'] = str_replace("$dir", '', $path);
        }

        if ($request->hasFile('attachment')) {
            $dir = FileManager::WEBINAR_ATTACHMENT_PATH;

            if ($webinar && $webinar->attachment) {
                Storage::delete($dir . $webinar->attachment);
            }

            $uuid = "webinar_attachment_" . Str::slug(Str::uuid(), '_');
            $file = $request->file('attachment');
            $extension = $file->extension();
            $path = $file->storeAs($dir, "$uuid" . ".$extension");
            $input['attachment'] = str_replace("$dir", '', $path);
        }
        // if ($photo = $request->file('photo')) {
        //     $destinationPath = 'public/webinars/photos';
        //     $path = 'webinars' . date('YmdHis') . "." . $photo->getClientOriginalExtension();
        //     $path = $request->file('photo')->store($destinationPath);
        //     $input['photo'] = "$path";
        // }
        // if ($attachment = $request->file('attachment')) {
        //     $destinationPath = 'public/webinars/attachments';
        //     $path = 'attachments' . date('YmdHis') . "." . $attachment->getClientOriginalExtension();
        //     $path = $request->file('attachment')->store($destinationPath);
        //     $input['attachment'] = "$path";
        // }
        $webinar->update($input);
        if ($request->start_date || $request->end_date){
            WebinarDate::create([
                'webinar_id' =>$webinar->id,
                'start_date' =>$request->start_date,
                'end_date' =>$request->end_date,
            ]);
        }
        if ($request->start_time  || $request->end_time) {
            $webinar->otherDates()->delete();
            $merged_array = array_combine($request->start_time, $request->end_time);
            foreach ($merged_array as $key => $value) {
                WebinarDate::create([
                    'webinar_id' =>$webinar->id,
                    'start_date' =>$key,
                    'end_date' =>$value,
                ]);
            }
        }
        return redirect()->route('admin.webinars.index')->with('success', 'Event Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Webinar $webinar
     * @return Response
     */
    public function delete($webinar)
    {
        try {
            $webinar = Webinar::find(decryptId($webinar));
            if ($webinar->photo) {
                \Storage::delete($webinar->getImage());
            }
            if ($webinar->attachment) {
                \Storage::delete($webinar->getAttachment());
            }
            $webinar->otherDates()->delete();
            $webinar->delete();
            return redirect()->back()->with('success', 'Event deleted successfully');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Event cant be deleted!');
             logger($th->getMessage());
        }
    }
    public function downloadAttachment($webinar)
    {
        $b = Webinar::query()->find($webinar);
            return Storage::download($b->attachment);
    }
}

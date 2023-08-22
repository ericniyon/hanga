<?php

namespace App\Http\Controllers;


use App\Models\BusinessSector;
use App\Models\CompanyCategory;
use App\Models\RegistrationType;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RegistrationTypeController extends Controller
{
    /**
     *function to display all Registration Types in backend
     */
    public function index()
    {
        $registrations = RegistrationType::query()->orderBy('id', 'DESC')->get();
        return view('admin.registration_types.create', compact('registrations'));
    }

    /**
     * function to store Registration Type
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {

        $registration = new RegistrationType();
        $registration->name = $request->name;
        $registration->name_kn = $request->name_kn;
        $registration->save();
        return redirect()->back()->with('success', 'Registration Type created successfully');
    }

    /**
     * function to update Registration Type
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {

        $registration = RegistrationType::findOrFail($request->input('RegistrationId'));
        $registration->name = $request->name;
        $registration->name_kn = $request->name_kn;
//        dd($request->all());
        $registration->save();

        return redirect()->back()->with('success', 'Registration Type updated successfully');
    }

    /**
     * function to delete Registration Type
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {

        $registration = RegistrationType::find($id);
        $registration->delete();

        return redirect()->back()->with('success', 'Registration Type deleted successfully');
    }

    public function addBusinessSectorsToRegistrationType($id)
    {
        $decryptId = decryptId($id);
        $registration_type = RegistrationType::find($decryptId);
        $business_sectors = BusinessSector::all();
        return view('admin.registration_types.business_sectors_to_registration_type', compact('registration_type', 'business_sectors'));
    }

    public function storeBusinessSectorsToRegistrationType(Request $request): \Illuminate\Http\RedirectResponse
    {
        $id = decryptId(request()->registration_type_id);
        $registration_type = RegistrationType::find($id);

        $registration_type->businessSectors()->sync($request->businessSectors);
        return redirect()->back()->with("success", "Business sector for $registration_type->name updated successfully!!!");
    }

    public function addServicesToRegistrationType($id)
    {
        $decryptId = decryptId($id);
        $registration_type = RegistrationType::find($decryptId);
        $services = Service::all();
        return view('admin.registration_types.services_to_registration_type', compact('registration_type', 'services'));
    }

    public function storeServicesToRegistrationType(Request $request): \Illuminate\Http\RedirectResponse
    {
        $id = decryptId(request()->service_id);
        $registration_type = RegistrationType::find($id);
        $registration_type->services()->sync($request->services);
        return redirect()->back()->with("success", "Services for $registration_type->name updated successfully!!!");
    }

    public function addCompanyCategoryToRegistrationType($id)
    {
        $decryptId = decryptId($id);
        $registration_type = RegistrationType::with('categories')->find($decryptId);

        $company_categories = CompanyCategory::all();


        return view('admin.registration_types.company_category_to_registration_type',
            compact('registration_type', 'company_categories'));
    }

    public function storeCompanyCategoryToRegistrationType(Request $request): \Illuminate\Http\RedirectResponse
    {
        $id = decryptId(request()->registration_type_id);
        $registration_type = RegistrationType::find($id);
        $registration_type->categories()->sync($request->categories);
        return redirect()->back()->with("success", "Company Category for $registration_type->name updated successfully!!!");
    }
}

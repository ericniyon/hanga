<?php

namespace App\Http\Livewire\V2\HomeTabs;

use Livewire\Component;
use Livewire\WithFileUploads;
use \App\Models\Discount;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DiscountTab extends Component
{

    use WithFileUploads;

    // public $discounts = [];
    public $discountCategories = [];
    public $search;
    public $category_name = [];
    public $services = [];
    public $category = [];
    public $title, $discount, $description, $cover_photo,  $from, $to, $service, $AllCoupons=1, $MyCoupons=0, $coupon, $selectedEventTypes, $showMyCoupons = 0, $showAllCoupons  = 1, $showDiscountDetail=0,$editDiscount=0, $discountDetail;


    // show discoiunt details
    public function showDiscountDetail($discountId){
    $getDetail= Discount::find($discountId);

        if($getDetail){
            $this->showDiscountDetail=1; // shwo tab
            // let's disable other tabs
            $this->showAllCoupons=0;
            $this->showMyCoupons=0;
            $this->discountDetail=$getDetail;
        }
        $time = time();
        if(!\File::exists(public_path('images'))) {
            \File::makeDirectory(public_path('images'), $mode = 0777, true, true);
        }
        $QR = QrCode::size(300)
                    //  ->backgroundColor(243,77,16)
                     ->generate('http://ihuzo.rw:8080/?tab=dsp');
        // \File::put(public_path('images/'), $QR);

        \Session::put('qrImage', $QR);

    }

    // download discoiunt details
    public function DownloadQrCode(){

        $QR = \Session::get('qrImage');

        $time = time();
        $image = $time.'.svg';
        $path = public_path('images/'.$image);
        \File::put($path, $QR);
        return response()->download($path);

    }

    // show discoiunt details
    public function editDiscount($discountId){
    $getDetail= Discount::find($discountId);
        if($getDetail){
            $this->editDiscount=1; // shwo tab
            // let's disable other tabs
            $this->showAllCoupons=0;
            $this->showMyCoupons=0;
            $this->discountDetail=$getDetail;
        }
    }
    // get service name

    public function getserviceName($serviceId){
            $service =\App\Models\Service::find($service);
            if($service){
                return $service->name;
            }else{
                return 'None';
            }

    }


    // end of service name
    public function resetDiscountForm(){
        $this->coupon = '';
        $this->from = '';
        $this->to = '';
        $this->title = '';
        $this->description = '';
        $this->services_lists='';
        $this->category = '';
    }
    // show tab
    public function showTab($tab){
        if($tab=='tab1'){
            $this->AllCoupons=1;
            $this->MyCoupons=0;
            $this->showMyCoupons = 0;
            $this->showAllCoupons = 1;
            $this->showDiscountDetail=0; // shwo tab

        }else if($tab=='tab2'){
            $this->AllCoupons=0;
            $this->MyCoupons=1;
            $this->showMyCoupons = 1;
            $this->showAllCoupons = 0;
            $this->showDiscountDetail=0; // shwo tab
        }else{
            // $this->AllCoupons=true;
            // $this->MyCoupons=false;
        }
    }


      // generating coupon code
    public function generatingCouponCode()
    {
        $code = mt_rand(1,9999999);
        if(couponsCodeCheck($code)){
            return generatingCouponCode();
        }
        return $code;
    }

    //store discount

    public function storeDiscount($status){
        $data = $this->services;
        $data_cat = $this->category;
        // dd($data_cat);
        $this->validate([
            'title' => 'required',
            'description' => 'required|max:255',
            'from'=>'required|date|date_format:Y-m-d',
            'to'=>'required|date|date_format:Y-m-d|after:from',
            'discount' => 'required|numeric',
            'services' => 'required',
            'coupon' => 'required',
            'category'=> 'required|array|min:1|max:30',
            'cover_photo' => 'sometimes|mimes:jpg,jpeg,bmp,png|max:10000',
        ]);
           // return $this->coverPhoto->getClientOriginalExtension();
        if($this->cover_photo){
            $extension = $this->cover_photo->getClientOriginalExtension();
            $file_name = $this->cover_photo->getClientOriginalName();
            $file_name = date('YmdHis').rand(1, 99999).'.'.$extension;
            $this->cover_photo->storeAs('public/discount_img', $file_name);
            // return $file_name;
        }
        else{
            $file_name = '';
        }
            $discount = new  Discount();
            $discount->title = $this->title;
            $discount->description = $this->description;
            $discount->discount = $this->discount;
            $discount->coupons = strtoupper(uniqid());
            $discount->from = $this->from;
            $discount->to = $this->to;
            $discount->cover_photo = $file_name;
            $discount->services = implode(',', (array)$data);
            $discount->category = implode(',', (array)$data_cat);
            // $discount->status = $status;

            $result=$discount->save();
            $this->resetDiscountForm();

            session()->flash('message', 'Records Has Been Inserted Successfully.');
            if($result){
                return true;
            }else{
                return false;
            }


    }

    // publish discount
    public function publishDiscount()
    {
      $this->storeDiscount(1);
    }

        // publish discount
    public function saveAsDraft()
    {
      $this->storeDiscount(0);
    }

    // end of store discount
    public function render()
    {
        $discounts = \App\Models\Discount::when($this->search, function($query){
            return $query->where('title', 'like','%'.$this->search.'%');
        })
            ->when($this->category_name, function($query){
                return $query->whereIn('category', $this->category_name);
            })
        ->orderByDesc('created_at')
        ->paginate(10);

        $this->services_lists = \App\Models\Service::all();
        $this->discountCategories = \App\Models\DiscountCategory::all();
        //   $this->showTab('tab1');


        $socialShareLink = \Share::page(
            config('app.url').'?tab=discounts',
            'Find Trusted Digital Commerce Partners For Your Business',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->whatsapp()
        ->telegram();

        // $qrcode = QrCode::size(200)->errorCorrection('H')
        //     ->backgroundColor(253,223,213)
        //     ->generate('Image qr code example');

        return view('livewire.v2.home-tabs.discount-tab', compact('discounts', 'socialShareLink'));
    }
}

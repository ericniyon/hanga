<?php

namespace App\Http\Livewire;

use App\Models\StrategicOriantation as ModelsStrategicOriantation;

use App\Models\ClusterAssociationCategory;
use App\Models\MembershipPackege;
use App\Models\Plan;
use App\Models\PlanFeatures;
use App\Models\ServiceBenefit;
use Livewire\Component;
use Illuminate\Support\Arr;

class PackegeWizard extends Component
{




    public $currentStep = 1;
    public $successMsg = '';
    public $name, $price, $detail, $status = 1;

    // packege information
    public $packege_name, $packege_description;

    // cluster information
    public $title, $description, $items = [[]], $clusterItemsLoop;
    //
    public $cluster_title, $clusterDescription;

    // oriantation of
    public $oriantationTitle, $oriantationColor, $oriantationDescription, $oriantationCategory, $oriantationItemsLoop;

    // benefits
    public $benefitColor, $benefitTitle, $benefitCategory, $benefitDescription, $benefitItemsLoop;

    public $levelFeeDescription, $plans = [];

    public $new_plan = false;
    public $plan_name;
    public $plan_price;



    public function mount()

    {
        $this->clusterItemsLoop = [[]];
        $this->oriantationItemsLoop = [[]];
        $this->benefitItemsLoop = [[]];
    }

    public function isNewPaln()
    {
        $this->new_plan = !$this->new_plan;
    }

    public function addPlan()
    {
        // dd($this->plan_name . ' ' . $this->plan_price);
        $this->validate([
            'plan_name' => 'required|string|max:255',
            'plan_price' => 'required|numeric',
        ]);
        Plan::create([
            'name' => $this->plan_name,
            'price' => $this->plan_price,
        ]);

        $this->new_plan = false;
        if($this->new_plan == false){
            $this->plan_name = '';
            $this->plan_price = '';
        }
    }

    public function addNewRow()
    {
        $this->clusterItemsLoop[] = [];
        $this->oriantationItemsLoop[] = [];
        $this->benefitItemsLoop[] = [];
    }

    public function removeRow($index)
    {
        unset($this->clusterItemsLoop[$index]);
        $this->clusterItemsLoop = array_values($this->clusterItemsLoop);


        unset($this->oriantationItemsLoop[$index]);
        $this->oriantationItemsLoop = array_values($this->oriantationItemsLoop);


        unset($this->benefitItemsLoop[$index]);
        $this->benefitItemsLoop = array_values($this->benefitItemsLoop);
    }

    public function render()
    {

        return view('livewire.packege-wizard');
    }

    public function firstStepSubmit()
    {
        // validating data first

        $firstValidatedData = $this->validate([
            'packege_name' => 'required',
            'packege_description' => 'required',
        ]);


        // basic information about the packege
        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {


        $secondValidatedData = $this->validate([
            'cluster_title' => 'required',
            'clusterDescription' => 'required',
        ]);

        // CLUSTERS & ASSOCIATIONS
        $this->currentStep = 3;
    }

    public function thirdStepSubmit()
    {
        $thirdValidatedData = $this->validate([
            'oriantationTitle' => 'required',
            'oriantationColor' => 'required',
            'oriantationDescription' => 'required'
        ]);
        // PROGRAMS, PROJECTS & STRATEGIC ORIENTATION
        $this->currentStep = 4;
    }

    public function fourthStepSubmit()
    {

        $thirdValidatedData = $this->validate([
            'benefitColor' => 'required',
            'benefitTitle' => 'required',
            'benefitCategory' => 'required',
            'benefitDescription' => 'required'
        ]);
        // MEMBERSHIP SERVICES & BENEFITS
        $this->currentStep = 5;
    }

    public function fifthStepSubmit()
    {
        // dd($this->plans);
        $fifthValidatedData = $this->validate([
            'levelFeeDescription' => 'required'
        ]);


        // MEMBERSHIP LEVELS AND FEES SERVICES
        $this->currentStep = 6;
    }

    public function submitForm()
    {

        $packege = MembershipPackege::create([
            'packege_name' => $this->packege_name,
            'packege_description' => $this->clusterDescription,
            'organization_description' => $this->clusterDescription,
        ]);


        // cluster and association fields
        $cluster = ClusterAssociationCategory::create([
            'title' => $this->cluster_title,
            'description' => $this->clusterDescription,
            'membership_packeges_id' => $packege->id,
        ]);

        foreach ($this->clusterItemsLoop as $key => $item) {
            $cluster->items()->create([
                'name' => $item['name'],
                'cluster_association_categories_id' => $cluster->id
            ]);
        }

        //$, $, $, $, $;
        $benefit = ServiceBenefit::create([
            'title' => $this->benefitTitle,
            'color' => $this->benefitColor,
            'category' => $this->benefitCategory,
            'description' => $this->benefitDescription,
            'membership_packeges_id' => $packege->id,

        ]);

        foreach ($this->benefitItemsLoop as $key => $item) {
            $benefit->items()->create([
                'name' => $item['name'],
                'strategic_oriantation_id' => $benefit->id
            ]);
        }

        // project oriantation benefits
        $oriantation = ModelsStrategicOriantation::create([
            'title' => $this->oriantationTitle,
            'color' => $this->oriantationColor,
            'description' => $this->oriantationDescription,
            'membership_packeges_id' => $packege->id,
        ]);

        foreach ($this->oriantationItemsLoop as $key => $item) {
            $oriantation->items()->create([
                'name' => $item['name'],
                'service_benefit_id' => $oriantation->id
            ]);
        }

        $features = PlanFeatures::create([
            'name' => $this->levelFeeDescription,
            'plan_id' => $this->plans,
            'membership_packeges_id' => $packege->id,

        ]);

        $features->plans()->attach($this->plans);


        $this->successMsg = 'Membership has been submitted';

        // $this->clearForm();
        $this->currentStep = 1;
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }
}

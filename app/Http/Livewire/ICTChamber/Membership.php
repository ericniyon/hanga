<?php

namespace App\Http\Livewire\ICTChamber;

use App\Models\AssociationItem;
use App\Models\ClusterAssociationCategory;
use App\Models\MembershipApplication;
use App\Models\MembershipPackege;
use App\Models\Plan;
use App\Models\PackegePromotion;
use App\Models\PlanFeatures;
use Livewire\Component;

class Membership extends Component
{
    public $packege;
    public $preview = false;
    public $clusters = [];
    public $clusters_output = [];

    public $cluster_items = [];
    public $cluster_items_output = [];

    public $data = [];
    public $output = [];
    public $bg = '#FFF';
    public $MemberPlan ='';
    public $filteredclusters;
    public $universities = [];
    public $oriantaion_background_colors = array('#E0E4FD', '#F2F6FE', '#F2FFF8', '#FFF1E2', '#E0E4FD');
    public $benefit_background_colors = array('#F2F6FE', '#FFF1E2', '#E0E4FD', '#F2FFF8');


    public $clustreItems = [], $StrategicOriantation = [], $StudentBenefitSubCategory = [], $StudentBenefitUniversity, $StudentServiceBenefits = [], $InnovatorInvesterSubCategory, $StartupsBenefitSubCategory, $StartupsServiceBenefits, $ICTMsmServiceBenefits = [], $ICTCOnsoltantSubCategory, $ICTConsultantItemService, $InvestorServiceBenefits,
        $iWorkerSubCategory,
        $iworkerSBenefitsServices,

        $ICTCommunitySubCategory,
        $communityPartnerBenefitsServices,

        $ignation,
        $acceleration = [],
        $takeoff = [],
        $cruise = [],
        $ignition = [];


    public function mount()
    {
        $this->data = PlanFeatures::all();
        $this->clusters = ClusterAssociationCategory::all();
        $this->cluster_items = ClusterAssociationCategory::take(10)->pluck('id');

        $this->universities = [
            'University of Rwanda',
            'Adventist University of Central Africa',
            'Kigali Independent University',
            'University of Kigali',
            'KIM University',
            'Carnegie Mellon University Africa',
            'Institute of Applied Sciences',
            'University of Lay Adventists of Kigali',
            'Institut Catholique de Kabgayi (Catholic Institute of Kabgayi)',
            "Institut d'Enséignement Supérieur de Ruhengeri-INES",
            'The University of Tourism Technology and Business Studies',
            'University of Kibungo  ',
            'Christian University of Rwanda ',
            'University of Gitwe',
        ];
    }
    public $selectedCrasterServices;
    public $selectedOrientationServices;
    public $selectedBenefitsServices;

    public function saveAsDraft()
    {
        dd($this->selectedCrasterServices);
    }

    public function store()
    {

        // $item = AssociationItem::whereIn('id', $this->clustreItems)->get();
        // dd($this->StudentServiceBenefits);

        // $this->output = array_merge($this->ignation, $this->cruise);

        // dd( $this->output);

        MembershipApplication::create([
            'clustre_items' =>  $this->clustreItems,
            'strategic_oriantation' =>  $this->StrategicOriantation,

            'student_benefit_sub_category' =>  $this->StudentBenefitSubCategory,
            'student_benefit_university' => $this->StudentBenefitUniversity,
            'student_service_benefits' => $this->StudentServiceBenefits,

            'innovator_invester_sub_category' => $this->InnovatorInvesterSubCategory,
            'investor_service_benefits' => $this->InvestorServiceBenefits,

            'startups_benefit_sub_category' => $this->StartupsBenefitSubCategory,
            'startups_service_benefits' => $this->StartupsServiceBenefits,

            'ict_msm_service_benefits' =>   $this->ICTMsmServiceBenefits,

            'ict_consoltant_sub_category' => $this->ICTCOnsoltantSubCategory,
            'ict_consultant_item_service' => $this->ICTConsultantItemService,

            'iWorker_sub_category' => $this->iWorkerSubCategory,
            'iworkers_benefitsServices' => $this->iworkerSBenefitsServices,

            'ict_ommunity_sub_category' => $this->ICTCommunitySubCategory,
            'community_partner_benefits_services' => $this->communityPartnerBenefitsServices,

            'membership_levels' => $this->MemberPlan,
            'applicant_id' => auth('client')->user()->id
        ]);
    }

    public function render()
    {
        // $this->filteredclusters = ClusterAssociationCategory::where('membership_packeges_id', $this->packege->id)->where(function($query){
        //     $query->whereIn('id', $this->clustreItems);
        // })->get();


        $packege = MembershipPackege::where('id', $this->packege->id)->firstOrFail();

        $promotions = $packege->promotions->count();
        if ($promotions > 0) {
            # code...
            $promotion = PackegePromotion::where('membership_packeges_id', $this->packege->id)->first();
            $promotion_rate = $promotion->promotion;
        } else {
            # code...
            $promotion_rate = 100;
        }



        return view('livewire.i-c-t-chamber.membership',['promotion_rate'=> $promotion_rate]);
    }

    public function changePreview()
    {
        $this->preview = true;
    }
    public function rechangePreview()
    {
        if($this->preview){

            $this->preview = false;
        }

    }
}

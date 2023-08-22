<?php

namespace App\Http\Livewire;

use App\Mail\MembershipPayLatter;
use App\Models\ClusterAssociationCategory;
use App\Models\PlanFeatures;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\WizardComponent;
use Paypack\Paypack;

use Livewire\Component;
use Mail;
use Illuminate\Support\Facades\Http;
class PaymentModal extends Component
{
    public $packege;
    public $plan_price;
    public $order_nr;
    public $clusters = [];
    public $clusters_output = [];

    public $cluster_items = [];
    public $cluster_items_output = [];

    public $data = [];
    public $output = [];
    public $bg = '#FFF';
    public $MemberPlan = '';
    public $message;

    public $universities = [];

    public $phoneNumnmber;

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



    protected $rules = [
        'phoneNumnmber' => 'required|min:10',
    ];



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
    public $term;

    public function payLeter()
    {
        $terms = session()->get('terms');
        $this->term = $terms;
        if($terms){
            $name = $this->packege->packege_name;
            $tax = $this->plan_price * 0.18;
            $total = $this->plan_price + $tax;
            Mail::to(Auth('client')->user()->email)->send(new MembershipPayLatter($name, $this->plan_price, $this->plan_price ,$tax,$total));
            return redirect()->back();
        }else{
            session()->flash('msg_terms', 'Please accept the terms and conditions');
        }
    }

    public function doPayment()
    {
        $this->validate();

        $this->waiting = true;
        $handler = new \App\Handlers\PaypackHandler();
        $response = $handler->cashin($this->phoneNumnmber,100);
        $this->transaction_id = $response['ref'];

        dd($response['ref']);
        Transaction::create([
            'user_id' => auth()->user()->id,
            'ref' => $response['ref'],
            'transaction_id' => $response['ref'],
            'status' => $response['status'],
        ]);

        return $response;
    }
    public function render()
    {
        $this->order_nr = '#'.str_pad($this->packege->id + 1, 8, "0", STR_PAD_LEFT);
        return view('livewire.payment-modal');
    }


}




// class ITSController extends Controller
// {
//     /**
//      * Write code on Method
//      *
//      * @return response()
//      */
//     public function index()
//     {
//         $apiURL = 'https://api.mywebtuts.com/api/users';
//         $postInput = [
//             'first_name' => 'Hardik',
//             'last_name' => 'Savani',
//             'email' => 'example@gmail.com'
//         ];

//         $headers = [
//             'X-header' => 'value'
//         ];

//         $response = Http::withHeaders($headers)->post($apiURL, $postInput);

//         $statusCode = $response->status();
//         $responseBody = json_decode($response->getBody(), true);

//         dd($responseBody);
//     }
// }

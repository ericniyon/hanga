<?php

namespace App\Http\Livewire\V2\Ratings;

use App\Models\DSPRegistration;
use App\Models\GoogleRatings;
use App\Models\GoogleRevers;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;


class NewRating extends Component
{
    public $cuastomer_rating, $full_name, $review_date, $feedback;
    public $updateMode = false;
    public $google_rate_id;
    public $inputs = [];
    public $i = 1;
    public $client_id;
    public $rating;
    public $link;


    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function render()
    {
        $clients = DSPRegistration::all();
        return view('livewire.v2.ratings.new-rating', compact('clients'));
    }
    public function rules()
    {
        return [
            'full_name.0' => 'required',
            // 'cuastomer_rating.0' => 'required',
            // 'review_date.0' => 'required',
            // 'feedback.0' => 'required',
            'full_name.*' => 'required',
            // 'cuastomer_rating.*' => 'required|cuastomer_rating',
            // 'review_date.*' => 'required|review_date',
            // 'feedback.*' => 'required|feedback',
        ];
    }
    private function resetInputFields()
    {
        $this->full_name = '';
        $this->cuastomer_rating = '';
        $this->review_date = '';
        $this->feedback = '';
    }
    public function store()
    {


        // $validatedDate = $this->validate(
        //     [
        //         'full_name.0' => 'required',
        //         'cuastomer_rating.0' => 'required',
        //         'review_date.0' => 'required',
        //         'feedback.0' => 'required',
        //         'full_name.*' => 'required',
        //         'cuastomer_rating.*' => 'required|cuastomer_rating',
        //         'review_date.*' => 'required|review_date',
        //         'feedback.*' => 'required|feedback',
        //     ],
        //     [
        //         'full_name.0.required' => 'full_name field is required',
        //         'cuastomer_rating.0.required' => 'cuastomer_rating field is required',
        //         'review_date.0.review_date' => 'The review_date must be a valid review_date address.',
        //         'feedback.0.feedback' => 'The feedback must be a valid feedback address.',
        //         'full_name.*.required' => 'full_name field is required',
        //         'cuastomer_rating.*.required' => 'cuastomer_rating field is required',
        //         'review_date.*.review_date' => 'The review_date must be a valid review_date address.',
        //         'feedback.*.feedback' => 'The feedback must be a valid feedback address.',
        //     ]
        // );

        $ratings = new GoogleRatings();

        $ratings->client_id = $this->client_id;
        $ratings->rating = $this->rating;
        $ratings->link = $this->link;

        $ratings->save();


        $this->google_rate_id = $ratings->id;
        $this->validate();

        foreach ($this->full_name as $key => $value) {

            GoogleRevers::create([
                'full_name' => $this->full_name[$key],
                'cuastomer_rating' => $this->cuastomer_rating[$key],
                'review_date' => $this->review_date[$key],
                'feedback' => $this->feedback[$key] ? $this->feedback[$key] : 'null',
                'google_rating' => $this->google_rate_id,
            ]);
        }

        $this->inputs = [];

        $this->resetInputFields();

        session()->flash('message', 'Record Has Been Created Successfully.');
    }
}

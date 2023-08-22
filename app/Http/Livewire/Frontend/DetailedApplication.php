<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\ApplicantInfo;

class DetailedApplication extends Component
{
        public $full_name;
        public $email;
        public $phone_number;
        public $gender;
        public $age;
        public $education_level;
        public $university;
        public $devices_owned;
        public $internet_access;
        public $physical_tranning_attendence;
        public $physical_attendence_district;
        public $skills = [];
        public $attend_digtal_tranning;
        public $comment;
        public $application_id;
        public $application_title;

        public $application;

    public $totalSteps = 3;
    public $currentStep = 1;


    public function mount($application){
        $this->currentStep = 1;
        $this->application = $application;
    }


    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
         $this->currentStep++;
         if($this->currentStep > $this->totalSteps){
             $this->currentStep = $this->totalSteps;
         }
    }

    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function validateData(){

        if($this->currentStep == 1){
            $this->validate([
                'full_name' => 'required',
                'email' => 'required',
                'phone_number' => 'required',
                'gender' => 'required',
                'age' => 'required',
                'education_level' => 'required',
                'university' => 'required'

            ]);
        }
        elseif($this->currentStep == 2){
              $this->validate([
                'devices_owned' => 'required',
                'internet_access' => 'required',
                'physical_tranning_attendence' => 'required',
                'physical_attendence_district' => 'required',
                'attend_digtal_tranning' => 'required',
                'application_id' => 'required',
              ]);
        }
        elseif($this->currentStep == 3){
              $this->validate([
                'skills'=>'required|array|min:1|max:30',
                'comment' => 'required|min:30',
              ]);
        }
    }

    public function register(){
        $data = $this->skills;
          $this->resetErrorBag();
              $values = array(
                    'full_name' =>$this->full_name,
                    'email' =>$this->email,
                    'phone_number' =>$this->phone_number,
                    'gender' =>$this->gender,
                    'age' =>$this->age,
                    'education_level' =>$this->education_level,
                    'university' =>$this->university,
                    'devices_owned' =>$this->devices_owned,
                    'internet_access' =>$this->internet_access,
                    'physical_tranning_attendence' =>$this->physical_tranning_attendence,
                    'physical_attendence_district' =>$this->physical_attendence_district,
                    'skills' => implode(',', (array) $data),
                    'attend_digtal_tranning' =>$this->attend_digtal_tranning,
                    'comment' => $this->comment,
                    'application_id' => $this->application
              );
            //   dd($this->skills);
              ApplicantInfo::insert($values);
            //   $this->reset();
            //   $this->currentStep = 1;
            $data = ['name'=>$this->full_name,'email'=>$this->email];
            return redirect()->route('v2.application.success', $data);

    }


    public function render()
    {
        $array = array(
            array('name' => 'UI Design'),
           array('name' => 'IT Business Analysis and Consultacy'),
           array('name' => 'Photography'),
           array('name' => 'Videography'),
           array('name' => 'Content Creation'),
           array('name' => 'IT Support'),
           array('name' => 'Digital marketing (door to door)'),
           array('name' => 'CopyWriting'),
           array('name' => 'Sales and marketing (door to door)'),
           array('name' => 'Mobile application development'),
           array('name' => 'Web development'),
        );
        $skills_set = array_pluck($array, 'name');
        return view('livewire.frontend.detailed-application', compact('skills_set'))
                ->extends('client.v2.layout.app')
                ->section('content')
        ;
    }
}

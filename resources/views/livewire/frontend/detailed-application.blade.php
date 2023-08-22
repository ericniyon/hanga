<div>
    <style>


h1{
  background-color: tomato;
  color: white;
  text-align: center;
  padding:6px;
}
.column{
  width:50%;
  float:left;
  padding:2%;
  box-sizing:border-box;
}
.column{
  padding:3%;
}
/*clear-fix the parent of column because it collapsed!  */
form:after{
  content:'';
  display:block;
  clear:both;
}

/* FORM STUFF BEGINS HERE */

label{
  display:block;
  color:saddlebrown;
  margin:16px 0 3px;
}



input[type=text],
input[type=email],
input[type=tel],
textarea,
select{

  box-sizing:border-box;
}
textarea{
  resize: vertical;
  min-height: 70px;
}

legend{
  color:white;
  background-color:#FC8004;
  display:block;
  width:100%;
  padding:3px;
}
input[type=checkbox]{
  background-color:red;
  border: solid 1px red;
  color:red;
  outline:red;
}
/* BUTTONS */

/* Reset Button: minimize the appearance */
input[type=reset]{
  background-color:transparent;
  border:none;
  text-decoration:underline;
  cursor:pointer;
  margin:20px 0;
  color:#FDDFD5;
}

/* hovers and tabs */
input[type=text]:hover,
input[type=email]:hover{
  background-color:#FDDFD5;
}
input[type=text]:focus,
input[type=email]:focus{
  outline: 2px solid #FDDFD5;
}

/* responsive bonus round */
@media screen and (min-width:450px){
/*  2col  */
  .column{
    width:50%;
    float:left;
    padding:3%;
    box-sizing:border-box;
  }
}



    </style>


    <div class="container mt-5 mb-5 shadow" >
        <form wire:submit.prevent="register">
  {{-- <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum numquam soluta provident.</p> --}}
  <div class="column">

    <div class="form-group">
            <label for="">Full name </label>
            <input type="text" class="form-control" placeholder="Enter Full name" wire:model="full_name">
            <span class="text-danger">@error('full_name'){{ $message }}@enderror</span>
    </div>
    <div class="form-group">
                                <label for="">email</label>
                                <input type="email" class="form-control" placeholder="Enter email" wire:model="email">
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                 <label for="">Phone Number</label>
                                 <input type="phone" class="form-control" wire:model="phone_number">
                                 <span class="text-danger">@error('university'){{ $message }}@enderror</span>
                             </div>
                             <div class="" style="display: flex">
                                  <div class="form-group " style="margin-right: 20em">
                             <label for="">Age range</label>
                             <div class="frameworks d-flex flex-column align-items-left mt-2">
                         <label for="15-35">
                             <input type="radio" id="15-35" value="15-35"  wire:model="age"> 15-35
                         </label>
                         <label for="above">
                            <input type="radio" id="above" value="35-Above"  wire:model="age"> 35-Above
                        </label>
                             </div>
                     </div>
                     <div class="form-group">
                                 <label for="">Gender</label>
                                 <div class="frameworks d-flex flex-column align-items-left mt-2">
                                <label for="male">
                                    <input type="radio" id="male" value="Male" wire:model="gender"> Male
                                </label>
                                <label for="female">
                                    <input type="radio" id="female" value="Female" wire:model="gender"> Female
                                </label>
                            </div>
                                 <span class="text-danger">@error('gender'){{ $message }}@enderror</span>
                             </div>
                             </div>
                             <div class="form-group">
                                 <label for="">Do you own computer or smartphone ?</label>
                                 <span class="text-danger">@error('devices_owned'){{ $message }}@enderror</span>
                                 <div class="frameworks d-flex flex-column align-items-left mt-2">
                                <label for="pc">
                                    <input type="radio" id="pc" value="pc" wire:model="devices_owned"> Personal Computer(laptop)
                                </label>
                                <label for="phone">
                                    <input type="radio" id="phone" value="phone" wire:model="devices_owned"> Smartphone(or tablet)
                                </label>
                                <label for="both">
                                    <input type="radio" id="both" value="both" wire:model="devices_owned"> Both
                                </label>
                            </div>
                             </div>
                             <div class="form-group">
                                <label for="">Do you have internet access</label>
                                <span class="text-danger">@error('internet_access'){{ $message }}@enderror</span>
                                <div class="frameworks d-flex flex-column align-items-left mt-2">
                                <label for="inter_yes">
                                    <input type="radio" id="inter_yes" value="Yes" wire:model="internet_access"> Yes
                                </label>
                                <label for="inter_no">
                                    <input type="radio" id="inter_no" value="No" wire:model="internet_access"> No
                                </label>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="">Are you able to attend physical training that can last for two days ?</label>
                                <span class="text-danger">@error('internet_access'){{ $message }}@enderror</span>
                                <div class="frameworks d-flex flex-column align-items-left mt-2">
                                <label for="pt_yes">
                                    <input type="radio" id="pt_yes" value="Yes" wire:model="physical_tranning_attendence"> Yes
                                </label>
                                <label for="pt_no">
                                    <input type="radio" id="pt_no" value="No" wire:model="physical_tranning_attendence"> No
                                </label>
                            </div>
                            </div>
<div class="form-group">
                                <label for="">Do you love to attend digital marketing ?</label>
                                <span class="text-danger">@error('internet_access'){{ $message }}@enderror</span>
                                <div class="frameworks d-flex flex-column align-items-left mt-2">
                                <label for="mrk_yes">
                                    <input type="radio" id="mrk_yes" value="Yes" wire:model="attend_digtal_tranning"> Yes
                                </label>
                                <label for="mrk_no">
                                    <input type="radio" id="mrk_no" value="No" wire:model="attend_digtal_tranning"> No
                                </label>
                            </div>
                            </div>

                            <div class="form-group">
                                 <label for="">Please specify district which you can prefer to attend physical training </label>
                                 <input type="text" class="form-control" placeholder="physical_attendence_district" wire:model="physical_attendence_district">
                                <span class="text-danger">@error('physical_attendence_district'){{ $message }}@enderror</span>
                                 <span class="text-danger">@error('country'){{ $message }}@enderror</span>
                             </div>
</div>

  <div class="column">

    <!-- use fieldset to group related inputs -->
    <fieldset>
    <legend>Education level:</legend>
    <div class="form-group">
                                 <div class="frameworks d-flex flex-column align-items-left mt-2">
                         <label for="High School">
                             <input type="radio" id="High School" value="High School"  wire:model="education_level"> High School
                         </label>
                         <label for="Student(University)">
                             <input type="radio" id="Student(University)" value="Student(University)"  wire:model="education_level"> Student(University)
                         </label>
                         <label for="Gradutes">
                             <input type="radio" id="Gradutes" value="Gradutes"  wire:model="education_level"> Gradutes
                         </label>
                         <label for="Masters">
                            <input type="radio" id="Masters" value="Masters"  wire:model="education_level"> Masters
                        </label>
                     </div>
                             </div>
    </fieldset>
<div class="form-group">
                                 <label for="">From Which University</label>
                                 <input type="text" class="form-control" placeholder="Enter university" wire:model="university">
                                 <span class="text-danger">@error('university'){{ $message }}@enderror</span>
                             </div>
    <fieldset>
    <legend>Please select your skills (you can select more than one response)</legend>
    <div class="form-group">
                                 <span class="text-danger">@error(''){{ $message }}@enderror</span>
                                 <div class="form-group">
                                <span class="text-danger">@error('internet_access'){{ $message }}@enderror</span>
                                <div class="frameworks d-flex flex-column align-items-left mt-2">

                                @forelse ($skills_set as $item)

                                <label for="{{ $item }}">
                                    <input type="checkbox" name="skills[]" id="{{ $item }}" value="{{ $item }}" wire:model="skills"> {{ $item }}
                                </label>
                                @empty
                                <p>No data found</p>
                                @endforelse
                            </div>
                            </div>
                             </div>

    </fieldset>

    <div class="form-group">
                                 <label for="">Please add any comment (if any)</label>
                            <textarea name="" id="" cols="45" rows="8" name="comment" wire:model="comment"></textarea>
                             </div>
                 <button type="submit" class="btn btn-sm rounded btn-info font-weight-bolder px-6">Submit</button>

  </div>

</form>
    </div>



</div>

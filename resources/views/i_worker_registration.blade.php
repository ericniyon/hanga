@extends("layouts.app")


@section("content")

    <div class="container">
        <div class="p-1">
            <h2>Digital services agent</h2>
        </div>
        <div class="card">
            <div class="card-body">
                <nav>
                    <div class="nav nav-pills" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                           role="tab" aria-controls="nav-home" aria-selected="true">Personal Information</a>
{{--                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"--}}
{{--                           role="tab" aria-controls="nav-profile" aria-selected="false">Business Details</a>--}}
                        {{--                   <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">More Business Details</a>--}}
                    </div>
                </nav>
                <div class="tab-content mt-4" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email_address">Email Address</label>
                                    <input type="text" class="form-control" name="email_address" id="email_address"
                                           placeholder="Email Address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number">Phone number</label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number"
                                           placeholder="Phone number">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="full_name">Full name</label>
                                    <input type="text" class="form-control" name="full_name" id="full_name"
                                           placeholder="Full name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number">You are in which category</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="category" id="category1"
                                                   value="1" checked>
                                            <label class="form-check-label" for="category1">
                                                KLab freelancers
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="category" id="category2"
                                                   value="0" checked>
                                            <label class="form-check-label" for="category2">
                                                Digital services agent
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="district_id">District</label>
                                    <select type="text" class="form-control" name="district_id" id="district_id">
                                        <option value="">-- select --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="education_level">Education level</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="education_level" id="none"
                                                   value="none" checked>
                                            <label class="form-check-label" for="none">
                                                None
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="education_level" id="primary"
                                                   value="primary" checked>
                                            <label class="form-check-label" for="primary">
                                                Primary school
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="education_level" id="high_school"
                                                   value="high_school" checked>
                                            <label class="form-check-label" for="high_school">
                                                High school
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="education_level" id="university"
                                                   value="university" checked>
                                            <label class="form-check-label" for="university">
                                                University
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="digital_literacy">Digital literacy</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="digital_literacy" type="radio"
                                                   value="smart_phone" id="digital_smart_phone">
                                            <label class="form-check-label" for="digital_smart_phone">
                                                Smart phone
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="digital_literacy" type="radio"
                                                   value="computer" id="digital_computer">
                                            <label class="form-check-label" for="digital_computer">
                                                Computer
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="own_computer">Do you own a computer</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="own_computer" type="radio" value="1"
                                                   id="own_computer_yes">
                                            <label class="form-check-label" for="own_computer_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="own_computer" type="radio" value="0"
                                                   id="own_computer_no">
                                            <label class="form-check-label" for="own_computer_no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="has_access_internet">Has access to internet</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="has_access_internet" type="radio"
                                                   value="1" id="has_access_internet_yes">
                                            <label class="form-check-label" for="has_access_internet_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="has_access_internet" type="radio"
                                                   value="0" id="has_access_internet_no">
                                            <label class="form-check-label" for="has_access_internet_no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="online_attendance">Are yo able to attend an online class that last for
                                        an hour or two? </label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="online_attendance" type="radio"
                                                   value="1" id="online_attendance_yes">
                                            <label class="form-check-label" for="online_attendance_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="online_attendance" type="radio"
                                                   value="0" id="online_attendance_no">
                                            <label class="form-check-label" for="online_attendance_no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="has_bank_account">Has a bank account</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="has_bank_account" type="radio"
                                                   value="1" id="has_bank_account_yes">
                                            <label class="form-check-label" for="has_bank_account_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="has_bank_account" type="radio"
                                                   value="0" id="has_bank_account_no">
                                            <label class="form-check-label" for="has_bank_account_no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="has_credit">Has access to credit</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="has_credit" type="radio" value="1"
                                                   id="has_credit_yes">
                                            <label class="form-check-label" for="has_credit_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="has_credit" type="radio" value="0"
                                                   id="has_credit_yes">
                                            <label class="form-check-label" for="has_credit_yes">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="credit_source">Credit sources </label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="credit_source" type="radio"
                                                   value="bank" id="credit_source_bank">
                                            <label class="form-check-label" for="credit_source_bank">
                                                Bank
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="credit_source" type="radio"
                                                   value="association" id="credit_source_association">
                                            <label class="form-check-label" for="credit_source_association">
                                                Association
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="credit_source" type="radio"
                                                   value="friends" id="credit_source_association">
                                            <label class="form-check-label" for="credit_source_association">
                                                Family and friends
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="income_per_month">Income per month</label>
                                    <input type="number" class="form-control" name="income_per_month"
                                           id="income_per_month">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="digital_payment">Digital payments used</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="digital_payment[]" type="checkbox"
                                                   value="momo" id="digital_payment_momo">
                                            <label class="form-check-label" for="digital_payment_momo">
                                                MoMo and Airtel Money
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="digital_payment[]" type="checkbox"
                                                   value="bank" id="digital_payment_bank">
                                            <label class="form-check-label" for="digital_payment_bank">
                                                Banks
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="digital_payment[]" type="checkbox"
                                                   value="none" id="digital_payment_none">
                                            <label class="form-check-label" for="digital_payment_none">
                                                None
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sells_good">Sells goods and services over digital platforms </label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="sells_good" type="radio" value="1"
                                                   id="sells_good_yes">
                                            <label class="form-check-label" for="sells_good_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="sells_good" type="radio" value="0"
                                                   id="sells_good_no">
                                            <label class="form-check-label" for="sells_good_no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="platform_used">Platforms used</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="platform_used[]" type="checkbox"
                                                   value="momo" id="whatsapp">
                                            <label class="form-check-label" for="whatsapp">
                                                Whatsapp
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="platform_used[]" type="checkbox"
                                                   value="bank" id="fb_id">
                                            <label class="form-check-label" for="fb_id">
                                                Facebook
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="platform_used[]" type="checkbox"
                                                   value="none" id="ig_id">
                                            <label class="form-check-label" for="ig_id">
                                                Instagram
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Gender </label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="gender" type="radio" value="1"
                                                   id="male">
                                            <label class="form-check-label" for="male">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="gender" type="radio" value="0"
                                                   id="female">
                                            <label class="form-check-label" for="female">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birth_date">Date of birth </label>
                                    <input type="date" name="birth_date" id="birth_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="membership">Choose you membership </label>
                                    <select name="membership" id="membership" class="form-control">
                                        <option value="">-- select --</option>
                                        <option value="klab">KLAB</option>
                                        <option value="impact_hub">Impact Hub</option>
                                        <option value="250_startups">250 Startups</option>
                                        <option value="none">None of the above</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="free_lance_category">If you are a freelancer, which category do you find
                                        yourself in?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="free_lance_category[]" type="checkbox"
                                                   value="it" id="it_computer">
                                            <label class="form-check-label" for="it_computer">
                                                IT & Computer
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="free_lance_category[]" type="checkbox"
                                                   value="marketing" id="marketing_manager">
                                            <label class="form-check-label" for="marketing_manager">
                                                Marketing/PR services or social media manager
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="free_lance_category[]" type="checkbox"
                                                   value="marketing" id="accounting_finance">
                                            <label class="form-check-label" for="accounting_finance">
                                                Accounting & Finance
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="web_capabilities">What is your capabilities?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="web_capabilities[]" type="checkbox"
                                                   value="it" id="basic_web">
                                            <label class="form-check-label" for="basic_web">
                                                Basic website development
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="web_capabilities[]" type="checkbox"
                                                   value="marketing" id="web_app">
                                            <label class="form-check-label" for="web_app">
                                                Web application
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="web_capabilities[]" type="checkbox"
                                                   value="marketing" id="mobile_android">
                                            <label class="form-check-label" for="mobile_android">
                                                Mobile application (Android)
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="web_capabilities[]" type="checkbox"
                                                   value="marketing" id="mobile_ios">
                                            <label class="form-check-label" for="mobile_ios">
                                                Mobile application (iOS)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="web_link">Do you have a link to your web portfolio</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="web_link" type="radio" value="1"
                                                   id="web_link_yes">
                                            <label class="form-check-label" for="web_link_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="web_link" type="radio" value="0"
                                                   id="web_link_no">
                                            <label class="form-check-label" for="web_link_no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="portfolio_link">Link to your portfolio</label>
                                    <input type="text" class="form-control" id="portfolio_link" name="portfolio_link"
                                           placeholder="Link to your portfolio">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="international_freelancer">Do you have an profile on any international freelancer platform</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="international_freelancer" type="radio" value="1"
                                                   id="international_freelancer_yes">
                                            <label class="form-check-label" for="international_freelancer_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="international_freelancer" type="radio" value="0"
                                                   id="international_freelancer_no">
                                            <label class="form-check-label" for="international_freelancer_no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="international_freelancer_link">If yes, share a link to that portfolio</label>
                                    <input type="text" class="form-control" id="international_freelancer_link" name="international_freelancer_link"
                                           placeholder="If yes, share a link to that portfolio">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="in_use_project">Have you worked on any project that is currently in
                                        use?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="in_use_project" type="radio" value="1"
                                                   id="in_use_project_yes">
                                            <label class="form-check-label" for="in_use_project_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="in_use_project" type="radio" value="0"
                                                   id="in_use_project_no">
                                            <label class="form-check-label" for="in_use_project_no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="list_works">If Yes, list up you works</label>
                                    <input type="text" class="form-control" id="list_works" name="list_works"
                                           placeholder="If Yes, list up you works">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="previous_work">Links to your previous work (Currently in use)</label>
                                    <input type="text" class="form-control" id="previous_work" name="previous_work" placeholder="Links to your previous work (Currently in use)">
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="portfolio_certificate">Please upload your portfolio or certificate you have got</label>
                                    <input type="file" class="form-control" id="portfolio_certificate" name="portfolio_certificate" placeholder="Please upload your portfolio or certificate you have got">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="klab_freelancer_interest">Would you be interested in Joining KLAB freelancer program?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="klab_freelancer_interest" type="radio" value="1"
                                                   id="klab_freelancer_interest_yes">
                                            <label class="form-check-label" for="klab_freelancer_interest_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="klab_freelancer_interest" type="radio" value="0"
                                                   id="klab_freelancer_interest_no">
                                            <label class="form-check-label" for="klab_freelancer_interest_no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="float-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">


                        <div class="float-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

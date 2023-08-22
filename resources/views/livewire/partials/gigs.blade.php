<div class="col-lg-9 p-5">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="card">
        <div class="card-header rounded-md bg-[#2A337E]" style="background: #2A337E">
            <h1 class="text-white font-bold">Create Job</h1>
        </div>
        <div class="card-body">
            <form action="">
                <div class="mb-3">
                    <label for="cName" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="cName" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="sDescription" class="form-label">Service Description</label>
                    <textarea class="form-control" id="sDescription" rows="3"></textarea>
                </div>

                <div class="row my-5">
                    <div class="col-lg-12">
                        <h6 class="" style="color: #2A337E; font-weight: 600">Fees</h6>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="cName" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="cName" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="tFee" class="form-label">Transaction Fee</label>
                            <input type="text" class="form-control" id="tFee" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="rIncome" class="form-label">Retention Incentive</label>
                            <input type="text" class="form-control" id="rIncome" placeholder="">
                        </div>
                    </div>
                </div>
                {{-- ========================== --}}

                <div class="row my-5">
                    <div class="col-lg-12">
                        <h6 class="" style="color: #2A337E; font-weight: 600">Agent Commission Rates</h6>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="Minimum" class="form-label">Minimum</label>
                            <input type="text" class="form-control" id="Minimum" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="Maximum" class="form-label">Maximum</label>
                            <input type="text" class="form-control" id="Maximum" placeholder="">
                        </div>
                    </div>

                </div>
                {{-- ========================== --}}

                <div class="row my-5">
                    <div class="col-lg-12">
                        <h6 class="" style="color: #2A337E; font-weight: 600">Assumptions for onboarding per day
                        </h6>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="NofOnboarding" class="form-label">Number of onboarding Per day</label>
                            <input type="text" class="form-control" id="NofOnboarding" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="PotentialDay" class="form-label">Potential Earnings per day</label>
                            <input type="text" class="form-control" id="PotentialDay" placeholder="">
                        </div>
                    </div>

                </div>

                {{-- ============== --}}
                {{-- ========================== --}}

                <div class="row my-5">
                    <div class="col-lg-12">
                        <h6 class="" style="color: #2A337E; font-weight: 600">Agent - On Target Earnings (OTE)
                        </h6>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="MonthlyOTE" class="form-label">Monthly OTE</label>
                            <input type="text" class="form-control" id="MonthlyOTE" placeholder="">
                        </div>
                    </div>


                </div>

                {{-- ============== --}}

                {{-- ========================== --}}

                <div class="row my-5">
                    <div class="col-lg-12">
                        <h6 class="" style="color: #2A337E; font-weight: 600">Business to be Linked with</h6>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="RevenueStrim" class="form-label">Company Revenue Stream</label>
                            <select type="text" class="form-control" id="RevenueStrim">
                                <option value="">Business Revenue</option>
                                <option value="">Business Revenue</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="Geographical" class="form-label">Geographical Location</label>
                            <input type="text" class="form-control" id="Geographical" placeholder="">
                        </div>
                    </div>

                </div>
                {{-- ========================== --}}

                <div class="row my-5">
                    <div class="col-lg-12">
                        <small class="font-lg" style=" font-weight: 800">Select Industries</small>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Type 2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">Type 2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3"
                                >
                            <label class="form-check-label" for="inlineCheckbox3">Type 2 </label>
                        </div>
                    </div>


                </div>

                {{-- ============== --}}
                {{-- ========================== --}}

                <div class="row my-5">
                    <div class="col-lg-12">
                        <small class="font-lg" style=" font-weight: 800">Select Business Type</small>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Type 2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">Type 2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3"
                                >
                            <label class="form-check-label" for="inlineCheckbox3">Type 2 </label>
                        </div>
                    </div>


                </div>

                {{-- ============== --}}

                 {{-- ========================== --}}

                 <div class="row my-5">
                    <div class="col-lg-12">
                        <h6 class="" style="color: #2A337E; font-weight: 600">My Product & Services
                        </h6>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                    <label for="cName" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="cName" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="sDescription" class="form-label">Service Description</label>
                    <textarea class="form-control" id="sDescription" rows="3"></textarea>
                </div>

                <div class="row my-5">

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="cName" class="form-label">Product Price</label>
                            <input type="text" class="form-control" id="cName" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="tFee" class="form-label">Product Commission Rate</label>
                            <input type="text" class="form-control" id="tFee" placeholder="">
                        </div>
                    </div>



                </div>
                <button class="btn py-2 px-64" style="background: #2A337E;float: right;color:#fff; border-radius: 50px">Add Product</button>
                    </div>


                </div>


                <div class="row">
                <div class="col-md-2">
                    <span>Attach Document</span>

                </div>
                <div class="col-md-4">
                    <div class="custom-file" >
                        <input type="file" class="custom-file-input" id="file"
                            onchange="javascript:updateList()" style="background: #ddd">
                        <img width="30"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAQlBMVEX///8AAABhYWFlZWWSkpL19fW9vb01NTXf398kJCTw8PBRUVGdnZ1dXV3m5uZ0dHR8fHzExMSMjIzU1NSxsbEhISGIc9b1AAADv0lEQVR4nO2d607jMBhEa1pa6AVaLu//qgixq2+XxmlSe+IZa85vazQjhZMCarJaGWOMMcYYc8WxdQE0m7RpXQHLNqW0bV0CyVP65ql1DRyP6YfH1kVg7P4s3LUugmKd/rJuXQXDJgVdCnWb/qVDoT6l/+lOqI/pN70JdXe1sDOhrq8GdibUzcDAroS6HRzYkVB/a7Q7oV5rtDehXms06EKoQxoNOhDqsEYDeaHmNBqICzWv0UBaqGMaDZSFOqbRQFio4xoNZIV6S6OBqFBvazSQFOoUjQaCQp2m0UBPqNM0GsgJdapGAzGhTtdoICXUORoNhIQ6T6OBjFDnajRQEepcjQYiQp2v0UBCqPdoNBAQ6n0aDeiFeq9GA3Kh3q/RgFuo92s0oBZqiUYDYqGWaTSgFWqpRgNSoZZrNKAUag2NBoxCraHRgFCodTQa0Am1lkYDMqHW02hAJdSaGg2IhFpXowGPUOtqNKARam2NBiRCra/RgEKoCI0GBELFaDRoLlSURoPWQkVpNGgsVJxGg6ZCRWo0aChUrEaDZkJFazRoJFS8RoM2QsVrNGgi1NOCA1M6LT9we3iYzPp5sPXzenrEgeDj2xjDt02S3xyq8DC48KF1rYp4oT5eqI8X6uOF+nihPl6ojxfq44X6eKE+XqiPF+rjhfp4oT5eqI8X6uOF+nihPl6ojxfq44X6eKE+XqiPF+rjhfp4oT5eqI8XLsVhsMehQjJu4bzOuB4sySw9cMksPXDJLD1wySw9cMksPXDJLD1wySw9cMksPXDJLD1wySw9cMksPXDJLD1wySw9cMksPXDJLD1wySw9cMksPXDJLD1wySw9cMksPXDJLD1wySw9cMksPXDJLD1wySw9cMksPXDJLD1wySw9cMksPXDJLD1wybgew8/nq/EcPZaFb6eBx+id3ioksyzE4YUlpznwwpLTHHhhyWkOvLDkNAdeWHKaAy8sOc2BF5ac5sALS05z4IUlpznwwpLTHNRYyP2OhuH3SsxbOOc9G4uTeTdIbuESr6dahtx1d25drBrnzMJj62LVOGYWXloXq8Yls3Dfulg19pmFq8/WzSrxnBu40Kvw8ORftvfSulolXrILM99XVGPsO6HvrctV4X1k4cKvi8Mw/s/zHm4Y2VvFDx+t+xXzMT5wtXpt3bCQ11sD1X066bv1yhMnPjxA90KdcIn+oKqbm5IJ9or3xdON28Qv3tV+Gg+jn2QGedkM/5WHkc/NyIftMfaX45n5L23frM/Hy7zL0xhjjDHGEPIFcc477O4fZUsAAAAASUVORK5CYII=" />
                        Upload Files
                    </div>
                </div>
            </div>
            
                {{-- ============== --}}


                <div class="row justify-content-center">
                    <button style="border-radius: 50px; padding: .6rem 6rem; float: center" class="btn btn-primary ">Post Job</button>


            </div>
            </form>
        </div>
    </div>
</div>

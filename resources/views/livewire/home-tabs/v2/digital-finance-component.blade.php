<style>
    img.logo-bank {
        object-fit: contain;
        height: 35px;
    }

    .card-footer {
        padding: 0 !important;
    }

    .left {
        padding-left: 80px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">

</script>

<div class="container my-4">
    <div class="row">



        <div class="mb-4 col-md-3">
            <ul class="nav custom-navs md-pills pills-primary d-flex flex-column">
                <li class="nav-item-tab">
                    <a class="nav-link rouned-0 active" data-toggle="tab" href="#panel11" role="tab">Loans</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-0" data-toggle="tab" href="#panel12" role="tab">Savings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-0" data-toggle="tab" href="#panel13" role="tab">Paymants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-0" data-toggle="tab" href="#panel14" role="tab">Insurance</a>
                </li>
            </ul>
        </div>
        <div class="mb-4 col-md-9">

            <div class="pt-0 tab-content">

                <div class="tab-pane fade in show active" id="panel11" role="tabpanel">

                    <div class="row">
                        <div class="col">
                            <div class="card" style="width: 18rem;">

                                <div class="card-body">
                                  <h5 class="card-title">iWorker loan</h5>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="{{ route('v2.home-tabs.comparison')}}">Compare</a>
                                </div>
                              </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width: 18rem;">

                                <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                              </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width: 18rem;">

                                <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Compare</a>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>

                    <div class="tab-pane fade" id="panel12" role="tabpanel">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est repellat enim animi quae atque qui officiis deserunt minima, in nostrum, voluptate voluptatibus expedita, esse vitae suscipit molestias veniam eaque delectus.
                    </div>

                    <div class="tab-pane fade" id="panel13" role="tabpanel">
                        <br>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta
                            doloribus
                            reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora,
                            placeat
                            ratione
                            porro voluptate odit minima.</p>

                    </div>

                    <div class="tab-pane fade" id="panel14" role="tabpanel">
                        <br>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta
                            doloribus
                            reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora,
                            placeat
                            ratione
                            porro voluptate odit minima.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta
                            doloribus
                            reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora,
                            placeat
                            ratione
                            porro voluptate odit minima.</p>

                    </div>


                </div>


            </div>

        </div>
    </div>

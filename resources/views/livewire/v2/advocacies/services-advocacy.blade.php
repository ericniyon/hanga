

<div>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.css" rel="stylesheet">
    <style>
        .form-check>input {
            width: 25px;
            height: 25px;
        }

        .form-check>label {
            font-size: 1.2rem
        }

        .form-check {
            margin: 1rem 1.2rem
        }

        .custom-file {
            position: relative;
            overflow: hidden;
            margin-bottom: 10px;
            display: inline-block;

        }

        .custom-file-input {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
            opacity: 0;
            z-index: 100;
        }

        .custom-file img {
            display: inline-block;
            vertical-align: middle;
            margin-right: 5px;
        }

        ul.file-list {
            font-family: arial;
            list-style: none;
            padding: 0;
        }

        ul.file-list li {
            border-bottom: 1px solid #ddd;
            padding: 5px;
        }

        .remove-list {
            cursor: pointer;
            margin-left: 10px;
        }
    </style>
    <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordion12"">


        <div class="card shadow-none rounded-1 p-4 my-2 border overflow-hidden" style="background: #FFEDDD"">
            <div class="card-header">
                <div class="card-title pr-3 collapsed" data-toggle="collapse" data-target="#collapse3"
                    aria-expanded="false">
                    <div class="card-label pl-4">
                        <span style="color: #2A337E; font-weight: bold; font-size: 18px">

                            Access to MArket

                        </span>
                        <p>IHUZO advocacy aims to bring about positive change in ICT sector. By advocating for a particular cause or issue, individuals can help bring attention to a problem and work towards a solution.</p>

                    </div>
                    <span class="svg-icon svg-icon-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-chevron-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </div>



    <div class="row p-5">
        <h5>Select your interest in market services</h5>

    </div>



    <div class="row m-5 p-5">
        <div class="form-check form-check-inline custom-switch-xl">
            <input class="form-check-input" type="checkbox" name="Events" id="Events" value="Events">
            <label class="form-check-label" for="Events">Events</label>
        </div>

        <div class="form-check checkbox-lg form-check-inline">
            <input class="form-check-input checkbox-lg" type="checkbox" name="Exhibitions" id="Exhibitions" value="Exhibitions">
            <label class="form-check-label" for="Exhibitions">Exhibitions</label>
        </div>
        <div class="form-check checkbox-lg form-check-inline">
            <input class="form-check-input checkbox-lg" type="checkbox" name="Business to Business Matching" id="Business to Business Matching"
                value="Business to Business Matching">
            <label class="form-check-label" for="Business to Business Matching">Business to Business Matching</label>
        </div>
        <div class="form-check checkbox-lg form-check-inline">
            <input class="form-check-input checkbox-lg" type="checkbox" name="Product Listing"
                id="Product Listing" value="Product Listing">
            <label class="form-check-label" for="Product Listing">Product Listing</label>
        </div>


    </div>
    <div class="row p-5">
        <div class="col-md-12">

            <h5 class="text-bold"><strong>Didn’t find financial services you’re looking for ?</strong></h5>
        </div>
        <div class="col-md-12">
            <p>Fell free to give suggestion, IHUZO Team will review your suggestions.</p>
        </div>

        <div class="col-md-12">
            <textarea name="" id="" cols="30" rows="10" class="summernote"></textarea>
            <br>

        </div>
        <div class="col-md-12 ">
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
            <div class="row justify-between">
                <div class="col-md-4">
                    <form class="form-horizontal dropzone dz-clickable">
                        @csrf
                        {{-- <h3></h3> --}}
                        <div class="dz-default dz-message "><span class="text-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    fill="currentColor" class="bi bi-file-arrow-up" viewBox="0 0 16 16">
                                    <path
                                        d="M8 11a.5.5 0 0 0 .5-.5V6.707l1.146 1.147a.5.5 0 0 0 .708-.708l-2-2a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L7.5 6.707V10.5a.5.5 0 0 0 .5.5z" />
                                    <path
                                        d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                                </svg>
                                <br>
                                Drag document</span></div>
                    </form>
                </div>

            </div>
            <button style="float: right; border-radius: 50px" class="btn btn-primary px-20 py-3 ">Submit</button>
            {{-- <ul id="fileList" class="file-list"></ul> --}}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

<script>
        $('.summernote').summernote({
            height: 200
            });

    </script>
</div>


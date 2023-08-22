<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3KGMYL68K7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-3KGMYL68K7');
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import excel</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css' integrity='sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==' crossorigin='anonymous'/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="p-5 mx-auto mt-5 border col-md-6">
                @include('partials._alerts')
            <form method="POST" action="{{ route('import.excel.data') }}" enctype="multipart/form-data">
                <h3 class="mb-4 lead">Import Excel Data</h3>
           @csrf
            <div class="form-group">
                <label for="excel">Select type</label>
                <select required name="type" id="type" class="form-control">
                    <option value="">--select--</option>
                    <option value="Iworkers">Iworkers</option>
                    <option value="MSMEs">MSMEs</option>
                    <option value="digital_platforms">Digital Platforms</option>

                </select>
            </div>
            <div class="form-group">
                <label for="excel">Import Excel</label>
                <input required type="file" name="file" class="form-control">
            </div>
            <button class="mt-3 btn btn-outline-primary ">import</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

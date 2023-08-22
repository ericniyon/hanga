<html>
<style>
button{
  color:#fff;
  text-align: center;
  padding: 20px;
}



.button-one, .button-two, .button-three{
  text-align: center;
  cursor: pointer;
  font-size:24px;
  margin: 0 0 0 100px;
}

/*Button Two*/
.button-two {
  border-radius: 4px;
  background-color:#d35400;
  border: none;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
}


.button-two span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button-two span:after {
  content: '»';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button-two:hover span {
  padding-right: 25px;
}

.button-two:hover span:after {
  opacity: 1;
  right: 0;
}


</style>
<body
    style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
    <table
        style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px #FFEDDD;">
        <thead>
            <tr>
                <th style="text-align:left;">
                    <img style="max-width: 150px;" src="https://ihuzo.rw/frontend/assets/logo.png" alt="iHuzo">
                <th style="text-align:right;font-weight:400;">27th Oct, 2020</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="height:35px;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
                    <p style="font-size:14px;margin:0 0 6px 0;"><span
                            style="font-weight:bold;display:inline-block;min-width:150px">Subject</span><b
                            style="color:green;font-weight:normal;margin:0">Membership subscription invoice</b></p>
                    {{-- <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Referance ID</span> abcd1234567890</p> --}}
                </td>
            </tr>
            <tr>
                <td style="height:35px;"></td>
            </tr>
            <tr>
                <td style="width:100%;padding:20px;vertical-align:top">
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px">Packege Name</span>{{ $name }}
                    </p>
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px;">Packege
                            Plan</span>{{ $plan }}</p>
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px;">Duration</span> </p>

                </td>

            </tr>
            <tr>
                <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Descriptions:</td>
            </tr>
            <tr>
                <td colspan="2" style="padding:15px;">
                    <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
                        <span style="display:block;font-size:13px;font-weight:normal;">Subtotal</span>
                        {{ $subtotal }}
                    </p>
                    <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span
                            style="display:block;font-size:13px;font-weight:normal;">Discount</span> 0.00frwf </p>
                    <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span
                            style="display:block;font-size:13px;font-weight:normal;">Tax included (18%) :</span>
                        {{ $tax }} </p>
                    <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span
                            style="display:block;font-size:13px;font-weight:normal;">Total</span> {{ $total }}
                    </p>

                </td>
            </tr>
            <tr>
                <td><button class="button-two"><span>Pay Now</span></button></td>
            </tr>
        </tbody>

        <tfooter>

            <!-- Footer goes here -->

        </tfooter>
    </table>
</body>

</html>

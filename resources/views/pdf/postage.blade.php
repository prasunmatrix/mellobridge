<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <div style="width:600px; border:1px solid #cacaca;">
        <div style=" padding: 20px; float:left; width:560px;">
            <div style="float: left;"><img src="{{ public_path('frontenduser/assets/images/logo.svg')}}" alt=""/></div>
            <div style="float: right; max-width: 200px; padding: 10px; border: 1px solid #000; font-family: Arial, Helvetica, sans-serif; font-size: 12px; text-transform: uppercase;">
               Mello Bridge<br/>
                U.S. Postage Paid<br/>
                Mello Bridge, Inc.
            </div>
        </div>
        <div style="clear:both;"></div>

        <div style="padding: 10px; margin-top:15px; margin-bottom:15px; float:left; width:580px; border: 1px solid #000; font-family: Arial, Helvetica, sans-serif; font-size: 23px; text-transform: uppercase; text-align: center; border-left: none; border-right: none; font-weight: 700;">
        Mello Bridge first-class pkg
        </div>
        <div style="clear:both;"></div>
        <div style=" padding: 10px;float:left; width:580px;">
            <div style="float: left; width: 300px; font-family: Arial, Helvetica, sans-serif; font-size: 15px; text-transform: uppercase; line-height: 20px;">
            Mello Bridge<br/>
            701 Harrison Ave<br/>
            Blaine, WA 98230
            </div>
            <div style="float: right; width: 250px; padding: 10px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; text-align: right;">
                Mailed Form 98230
            </div>
        </div>
        <div style="clear:both;"></div>

        <div style=" padding: 10px;float:left; width:580px;">
            <div style="float: left; width: 300px; font-family: Arial, Helvetica, sans-serif; font-size: 15px; text-transform: uppercase; line-height: 20px;"></div>
            <div style="float: right; width: 250px; padding: 10px; font-family: Arial, Helvetica, sans-serif; font-size: 15px; text-align: right;">
               
            </div>
        </div>

        <div style="clear:both;"></div>
        <div style=" padding: 10px;float:left; width:580px;">
            <div style="float: left; width: 300px; font-family: Arial, Helvetica, sans-serif; font-size: 15px; text-transform: uppercase; line-height: 20px;">
            {{$to_address['line1']}}<br/>
            {{$to_address['city']}}<br/>
            {{$to_address['state_province']}}, {{$to_address['iso_country_code']}} {{$to_address['postal_code']}}
            </div>
            <div style="float: right; width: 50px; padding: 10px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; text-align: right;">
                <span style="border:1px solid #000; padding: 5px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; margin-bottom: 10px; display: block; text-align: center;">C005</span>
                
            </div>
        </div>
        <div style="clear:both;"></div>

        <div style="padding: 10px; font-family: Arial, Helvetica, sans-serif; font-size: 23px; text-transform: uppercase; text-align: center; border-left: none; border-right: none; font-weight: 700;">
           <img src="{{ public_path('frontenduser/assets/images/codes.jpg')}}" alt="" style="width:100%;">
        </div>


    </div>
</body>
</html>
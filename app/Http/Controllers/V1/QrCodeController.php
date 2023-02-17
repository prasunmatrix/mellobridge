<?php
namespace App\Http\Controllers\V1;
use App\Http\Controllers\Controller;
use QrCode;
use Mail;
use PDF;




use Illuminate\Http\Request;
class QrCodeController extends Controller
{
    public function index()
    {
        //  $text = "GEEKS FOR GEEKS";
        //  $qrcode= QrCode::size(300)->generate('RemoteStack') ;
        //  echo $qrcode;
        $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate('string'));

        //  $data['qrcode']=  $qrcode;
        ob_end_clean();
        // Send data to the view using loadView function of PDF facade
        
        $pdf = PDF::loadView('admin.qr_pdf', compact('qrcode'));
        // Finally, you can download the file using download function
        // return $pdf->download('qr' . '.pdf');

         $toUser='souravbanerjee@matrixnmedia.com';
         $fromUser = env('MAIL_FROM_ADDRESS'); // getting data form .env file
         $subject = 'Qr code';
         $mailData = array('image' => '');
         // Send mail
         Mail::send('email.qr-link', $mailData, function ($sent) use ($toUser, $fromUser, $subject,$pdf) {
             $sent->from($fromUser)->subject($subject);
             $sent->to($toUser);
             $sent->attachData($pdf->output(),'qrcode.pdf');
             

         });

    //   return view('admin.qrcode');
    }
}

<?php

namespace App\Http\Controllers;

use Route;
// use Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Illuminate\Http\Request;
use App\Models\DaftarHadir;

class DaftarHadirController extends Controller
{
    public function __construct()
    {
    	$route_name       = explode('.', Route::currentRouteName());
        $this->folder     = ((isset($route_name[0])) ? ($route_name[0]) : (''));
        $this->controller = ((isset($route_name[1])) ? ($route_name[1]) : (''));
        $this->function   = ((isset($route_name[2])) ? ($route_name[2]) : (''));
    }

    public function index()
    {
    	return view($this->folder . '.' . $this->controller);
    }

    public function store(Request $request)
    {
        $saveData   = $request->all();
        DaftarHadir::create($saveData);

        $this->sendEmail($request);

        return redirect()->route($this->folder . '.' . $this->controller)->with('alert-success', 'Data has been saved!');
    }

    public function sendEmail($request){
        $email = $request->email;
        $name  = $request->name;
        $subject = 'thanks';
        $message = '
           <div style="width: 800px;margin: auto;">
                <img src="cid:header" style="width: 800px;">
                
                <p>Dear  ' . $name . '</p> 

                <p>Terimakasih atas kunjungannya ke stand kami, besar harapan kami bapak/ibu sudah mendapat penjelasan dari tim kami terhadap semua produk yang kami miliki. Dan jika memerlukan penjelasan lebih lanjut dan lengkap terhadap produk – produk yang bapak/ibu inginkan silahkan untuk menghubungi kami : </p>

                <p><b>Produk dan Kontak Kami :</b></p>

                <table style="border: 1px solid #ddd;text-align: left;border-collapse: collapse;width: 800px;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #ddd;background-color: yellow;text-align: left;padding: 15px;width: 205px;">Perangkat Digital</th>
                            <th style="border: 1px solid #ddd;background-color: yellow;text-align: left;padding: 15px;width: 185px;">Layanan Sistem</th>
                            <th style="border: 1px solid #ddd;background-color: yellow;text-align: left;padding: 15px;width: 200px;">Smartcity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border: 1px solid #ddd;text-align: left;padding: 15px;">1.  Led Display Videotron Sistem</td>
                            <td style="border: 1px solid #ddd;text-align: left;padding: 15px;">1.  Proyek Informasi Manajemen Sistem ( E-prov Monev )</td>
                            <td style="border: 1px solid #ddd;text-align: left;padding: 15px;">1.  Smartcity ( Matakota )</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #ddd;text-align: left;padding: 15px;">2.  LCD Video Wall Sistem</td>
                            <td style="border: 1px solid #ddd;text-align: left;padding: 15px;">2.  Sistem Informasi Rumah Sakit ( SIM RS)</td>
                            <td style="border: 1px solid #ddd;text-align: left;padding: 15px;">2.  Reporting Informasi Sistem</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #ddd;text-align: left;padding: 15px;">3.  Digital Signage Sistem</td>
                            <td style="border: 1px solid #ddd;text-align: left;padding: 15px;"></td>
                            <td style="border: 1px solid #ddd;text-align: left;padding: 15px;"></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #ddd;text-align: left;padding: 15px;">4.  Digital Lab Bahasa</td>
                            <td style="border: 1px solid #ddd;text-align: left;padding: 15px;"></td>
                            <td style="border: 1px solid #ddd;text-align: left;padding: 15px;"></td>
                        </tr>
                    </tbody>
                </table><br>

                <table style="border: 1px solid #ddd;text-align: left;border-collapse: collapse;width: 800px;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #ddd;background-color: lightgreen;text-align: left;padding: 15px;width: 200px;">Sales Perangkat Digital</th>
                            <th style="border: 1px solid #ddd;background-color: lightgreen;text-align: left;padding: 15px;width: 200px;">Sales Layanan Sistem</th>
                            <th style="border: 1px solid #ddd;background-color: lightgreen;text-align: left;padding: 15px;width: 200px;">Sales SmartCity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border: 1px solid #ddd;text-align: left;padding: 15px;">Rinto Setiawan<br>+62 812-3320-1275</td>
                            <td style="border: 1px solid #ddd;text-align: left;padding: 15px;">Tedy Yanleksana<br>+6281287591630</td>
                            <td style="border: 1px solid #ddd;text-align: left;padding: 15px;">Henry Karya Nugraha<br>+62 812-3457-1775</td>
                        </tr>
                    </tbody>
                </table><br>

                <table style="border: 1px solid #ddd;text-align: left;border-collapse: collapse;width: 800px;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #ddd;background-color: lightblue;text-align: left;padding: 15px;width: 200px;">Perangkat Digital</th>
                            <th style="border: 1px solid #ddd;background-color: lightblue;text-align: left;padding: 15px;width: 200px;">Layanan Sistem</th>
                            <th style="border: 1px solid #ddd;background-color: lightblue;text-align: left;padding: 15px;width: 200px;">Smartcity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border: 1px solid #ddd;text-align: left;padding: 15px;">Jl Lodan No. 129 Malang<br>+62 341 478773<br>info@arionindonesia.com</td>
                            <td style="border: 1px solid #ddd;text-align: left;padding: 15px;">Jl Langgar II No 105, Kelapa Tiga<br> Jagakarsa – Jakarta Selatan <br> +62 21 2237 3347 <br> info@duaz-solusi.co.id </td>
                            <td style="border: 1px solid #ddd;text-align: left;padding: 15px;">Jl. Gayungsari VIII No.2,<br> Gayungan – Surabaya <br> +62 31  8299905 <br> info@matakota.id </td>
                        </tr>
                    </tbody>
                </table><br>

                <p>
                Terima kasih Atas waktu dan kesempatannya bapak/ibu yang sudah berkunjung ke stand kami. <br><br>
                <b>Salam,</b><br>
                Arion Indonesia | MataKota | Duaz Solusi
                </p><br><br>

                <img src="cid:body1" style="width: 118px;margin-bottom: 10px;">
                <img src="cid:body2" style="width: 88px;">
                <img src="cid:body3" style="width: 157px;margin-bottom: 25px;"><br>
                <img src="cid:footer" style="width: 800px;">

            </div>
        ';

        // dd($message);
        $mail = new PHPMailer(true);

        $mail->isSMTP();// Set mailer to use SMTP
        $mail->CharSet = "utf-8";// set charset to utf8
        $mail->SMTPAuth = true;// Enable SMTP authentication
        $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted

        $mail->Host = 'smtp.gmail.com';// Specify main and backup SMTP servers
        $mail->Port = 587;// TCP port to connect to
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->isHTML(true);// Set email format to HTML

        $mail->Username = 'impact.event2019@gmail.com';// SMTP username
        $mail->Password = 'sambelbo';// SMTP password
        $mail->AddEmbeddedImage('image/body1.jpeg', 'body1');
        $mail->AddEmbeddedImage('image/body2.jpeg', 'body2');
        $mail->AddEmbeddedImage('image/body3.jpeg', 'body3');
        $mail->AddEmbeddedImage('image/footer.jpeg', 'footer');
        $mail->AddEmbeddedImage('image/header.jpeg', 'header');

        $mail->setFrom('impact.event2019@gmail.com', 'Arion Indonesia');//Your application NAME and EMAIL
        $mail->Subject = 'Terimakasi atas kehadiran di stand kami Arion Indonesia | matakota | duaz solusi';//Message subject
        $mail->MsgHTML($message);// Message body
        $mail->addAddress($email, $name);// Target email


        $mail->send();
    }
}

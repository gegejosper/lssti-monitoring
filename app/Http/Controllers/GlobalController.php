<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;


class GlobalController extends Controller
{
    //
    public static function get_user_name(){
        if (Auth::check())
        {
            $name = Auth::user()->name;
        }
        return $name;
    }
    public static function get_user_id(){
        if (Auth::check())
        {
            $id = Auth::user()->id;
        }
        return $id;
    }
    public function search_town(Request $request){
        if($request->ajax())
        {   
            //dd($request->province);
            $search = $request->search;
            
            $output="";
            $municipalities = DB::table('citymunicipalities')
                ->where('provCode', '=',$search)
                ->get();
                //dd($municipalities);
            if($municipalities)
            {
                foreach ($municipalities as $municipality) {
                    $output.='<option value="'.$municipality->citymunCode.'">'.$municipality->citymunDesc.'</option>';
                }
                return response($output);
            }
        }
    }
    public function search_barangay(Request $request){
        if($request->ajax())
        {   
            //dd($request->province);
            $search = $request->search;
            
            $output="";
            $barangays = DB::table('barangays')
                ->where('citymunCode', '=',$search)
                ->get();
                //dd($municipalities);
            if($barangays)
            {
                foreach ($barangays as $barangay) {
                    $output.='<option value="'.$barangay->brgyCode.'">'.$barangay->brgyDesc.'</option>';
                }
                return response($output);
            }
        }
    }
    public static function random_characters($length_letters){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomCharacters = '';
        for ($i = 0; $i < $length_letters; $i++) {
            $randomCharacters .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomCharacters;
    }
    public function generateQrCode($text)
    {
        // Create an Imagick image backend
    $imageBackend = new ImagickImageBackEnd();

    // Create a renderer with a style (adjust as needed)
    $renderer = new ImageRenderer(
        new RendererStyle(400),
        $imageBackend
    );

    // Create a writer with the renderer
    $writer = new Writer($renderer);

    // Generate the QR code and save it to a file
    $filename = 'qrcode.png';
    $writer->writeFile($text, $filename);

    // Get the binary data of the QR code image
    $imageData = file_get_contents($filename);

    // Return the QR code image as a response with the appropriate content type
    return response($imageData)->header('Content-Type', 'image/png');
    }
    public function qrcode_print($text){
        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new ImagickImageBackEnd()
        );
        $writer = new Writer($renderer);
        $imageData = $writer->writeString($text);
    
        // Return the QR code image data
        return view('employees.qr-code', compact('imageData'));
    }
}

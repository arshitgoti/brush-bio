<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserVcard extends Model
{
    use HasFactory;

    protected $vCard;

    public function generate()
    {
        $this->vCard = "BEGIN:VCARD" . "\r\n";
        $this->vCard .= "VERSION:3.0" . "\r\n";
        $this->vCard .= "N:". $this->last_name .";".$this->first_name.";;;" . "\r\n";
        $this->vCard .= "FN:".$this->first_name." ".$this->last_name."" . "\r\n";
        $this->vCard .= "X-PHONETIC-FIRST-NAME:". $this->first_name . "\r\n";
        $this->vCard .= "X-PHONETIC-LAST-NAME:". $this->last_name . "\r\n";
        $this->vCard .= "ORG:". $this->organization . "\r\n";
        $this->vCard .= "TITLE:". $this->title . "\r\n";
        $this->vCard .= "NOTE:". $this->note . "\r\n";
        $this->vCard .= "TEL;type=Home:". $this->telephone_home . "\r\n";
        $this->vCard .= "item1.TEL:". $this->telephone_mobile . "\r\n";
        $this->vCard .= "item1.X-ABLabel:Mobile" . "\r\n";
        $this->vCard .= "TEL;type=Work:". $this->telephone_work . "\r\n";
        $this->vCard .= "item2.URL:". $this->other_url . "\r\n";
        $this->vCard .= "item2.X-ABLabel:OTHER" . "\r\n";
        $this->vCard .= "EMAIL;TYPE=Home:". $this->email_home . "\r\n";
        $this->vCard .= "EMAIL;TYPE=Work:". $this->email_work . "\r\n";
        $this->vCard .= "item3.ADR;type=". $this->address_home . "\r\n";
        $this->vCard .= "item3.X-ABADR:ac" . "\r\n";
        $this->vCard .= "item4.ADR;type=". $this->address_work . "\r\n";
        $this->vCard .= "item4.X-ABADR:ac" . "\r\n";

        if ($this->dob) {
            $this->vCard .= "BDAY;value=date:". $this->dob . "\r\n";
        }

        if ($this->photo) {
            $path = Storage::path($this->photo);
            $getPhoto               = file_get_contents($path);
            $b64vcard               = base64_encode($getPhoto);
            $b64mline               = chunk_split($b64vcard,74,"\n");
            $b64final               = preg_replace('/(.+)/', ' $1', $b64mline);
            $photo                  = $b64final;

            $this->vCard .= "PHOTO;ENCODING=b;TYPE=JPEG:";
            $this->vCard .= $photo . "\r\n";
        }

        $this->vCard .= "END:VCARD";

        return $this;
    }

    public function download()
    {
        header('Content-Type: text/x-vcard');
        header('Content-Disposition: inline; filename= "'. $this->first_name . "_" . $this->last_name . "_vcard" .'.vcf"');
        echo $this->vCard;
        exit;
    }

    public function address_parts($type = 'home')
    {
        if ($type === 'home') {
            $str = $this->address_home;
        }else{
            $str = $this->address_work;
        }

        $arr = explode(";", $str);
        return $arr;
    }
}

<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   function seo_title($s) {
        $c = array (' ');
        $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','<p>');

        $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
        
        $s = str_replace($c, '-', $s); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
        return $s;
    }

    function datenow()
    {
    	return date ("Y-m-d");
    }


    function namahari($hari)
    {
        $dayList = array(
           'Sun' => 'Minggu',
           'Mon' => 'Senin',
           'Tue' => 'Selasa',
           'Wed' => 'Rabu',
           'Thu' => 'Kamis',
           'Fri' => 'Jumat',
           'Sat' => 'Sabtu'
        );

        return $dayList[$hari];
    }

    function karakter_limit($karakter, $panjang)
    {
        if (strlen($karakter) <= $panjang) {
            return $karakter;
        } else {
            $string = substr($karakter, 0, $panjang);
            return $string . '...';
        }
    }

    function getsrc($string)
    {
         if( strpos( $string, 'img' ) !== false ) 
          {
            // libxml_use_internal_errors(true);
            // $doc = new DOMDocument();
            // $doc->loadHTML( $string );
            // $xpath = new DOMXPath($doc);
            // $imgs = $xpath->query("//img");
            // $img = $imgs->item(0);
            // $src = $img->getAttribute("src");
            
            // $doc = new DOMDocument();
            // $doc->loadHTML($string);
            // $xpath = new DOMXPath($doc);
            // $src = $xpath->evaluate("string(//img/@src)");

            $xpath = new DOMXPath(@DOMDocument::loadHTML($string));
            $src = $xpath->evaluate("string(//img/@src)");
          } else {
            $src = base_url()."assets/img/default.png";
          }
        return $src;
    }

    function priview_isi($data)
    {
        $filter = preg_replace("/<img[^>]+\>/i", "", $data); 
        return strip_tags($filter);
    }

    function isi_artikel($data)
    {
         return  $data = preg_replace('/<img(.*)>/i','',$data,1);
    }   

    function findmenu($data)
    {
        $submenu=$this->db->get_where('submenu',array('id_mainmenu'=>$data))->result();
        foreach ($submenu as $s)
           {
            if($this->uri->segment('2') == $s->link){
                return $data=$s->link;
            }
           }
    }

   function timeAgo($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        return "Baru saja";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            return "Satu menit yang lalu";
        }
        else{
            return "$minutes menit yang lalu";
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            return "Satu jam yang lalu";
        }else{
            return "$hours jam yang lalu";
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            return "Kemarin";
        }else{
            return "$days hari yang lalu";
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            return "Satu minggu yang lalu";
        }else{
            return "$weeks minggu yang lalu";
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            return "Satu bulan yang lalu";
        }else{
            return "$months bulan yang lalu";
        }
    }
    //Years
    else{
        if($years==1){
            return "Satu tahun yang lalu";
        }else{
            return "$years tahun yang lalu";
        }
    }
}
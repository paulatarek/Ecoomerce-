<?php

namespace App\Traits;




trait UplodePhoto{

    public function imageupload($image,$folder)
    {
        $photoname = uniqid() . '.' . $image->extension() ;

        // dd($photoname);

        $image->move(public_path("dist/img/$folder"),$photoname);

        return    $photoname ;
    }
}


?>

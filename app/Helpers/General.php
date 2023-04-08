<?php

// save images
function uploadImage($folder,$image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
    $path = URL::to('/') .'/img/' . $folder . '/' . $filename;
    return $path;
}


function uploadMusic($folder,$music)
{
    $music->store('/', $folder);
    $filename = $music->hashName();
    $path = URL::to('/') .'/music' . '/' . $filename;
    return $path;
}





<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Exception;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class HomeController extends Controller
{
    function obtenerMeme(){
        $meme= HTTP::get('https://api.humorapi.com/memes/random?api-key=205dd8bbfc884600bd27332e2005bae9&include-tags=animal')['url'];
        return view('home', compact('meme'));
    }
}

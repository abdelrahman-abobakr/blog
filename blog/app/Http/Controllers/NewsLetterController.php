<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;
use App\Services\INewsLetter;

class NewsLetterController extends Controller
{
    public function __invoke(INewsLetter $newsLetter){

        request()->validate([
            'email'=> 'required|email',
        ]);

        try
        {
            // $newsletter = new Newsletter();
            // $newsletter -> subscribe(request('email'));
            $newsLetter-> subscribe(request('email'));
        }
        catch(Exception $e)
        {
            throw ValidationException::withMessages([
                'email' => "this email couldn't be added to our newsletter list."
            ]);
        }

        return redirect('/')
        ->with('success','you are now signed up for our newsletter!');

    }
}

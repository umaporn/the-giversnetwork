<?php
/**
 * Language controller
 */

namespace App\Http\Controllers;

use App\Support\Facades\Utility;
use Illuminate\Http\Request;

/**
 * Language Controller
 * @package App\Http\Controllers
 */
class LanguageController extends Controller
{
    /**
     * Change system language.
     *
     * @param Request $request      HTTP request object
     * @param string  $languageCode Language code
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse HTTP redirect response
     */
    public function changeLanguage( Request $request, string $languageCode )
    {
        $redirectedUrl = Utility::getRedirectedUrl( $languageCode );

        $request->session()->put( 'url.intended', $redirectedUrl );

        return redirect( $redirectedUrl );
    }
}

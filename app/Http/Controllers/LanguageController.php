<?php
/**
 * Language controller
 */

namespace App\Http\Controllers;

use App\Libraries\Utility;
use Illuminate\Http\Request;

/**
 * Class LanguageController
 * @package App\Http\Controllers
 */
class LanguageController extends Controller
{
    /**
     * Change system language.
     *
     * @param string $languageCode Language code
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function changeLanguage( Request $request, string $languageCode )
    {
        return redirect( Utility::getRedirectedUrl( $request, $languageCode ) );
    }
}

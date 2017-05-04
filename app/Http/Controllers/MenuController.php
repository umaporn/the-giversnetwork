<?php
/**
 * Menu controller
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;

/**
 * Class MenuController
 * @package App\Http\Controllers
 */
class MenuController extends Controller
{
    /**
     * The Filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    private $disk;

    /**
     * Available translations.
     *
     * @var array
     */
    private $translations = [];

    /**
     * Manager constructor.
     *
     * @param \Illuminate\Filesystem\Filesystem $disk
     */
    public function __construct( Filesystem $disk )
    {
        $this->disk = $disk;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\View Menu page
     */
    public function index()
    {
        $menu_list = $this->getTranslations();

        return view( 'menu.index', compact( 'menu_list' ) );
    }

    /**
     * Get all menu translation.
     *
     * @return array
     */
    private function getTranslations()
    {
        collect( $this->disk->allFiles( realpath( base_path( 'resources/lang' ) ) ) )
            ->filter( function( $file ){
                return $this->disk->extension( $file ) === 'json';
            } )
            ->each( function( $file ){
                $this->translations[ str_replace( '.json', '', $file->getFilename() ) ]
                    = json_decode( $file->getContents() );
            } );

        return $this->translations;
    }
}

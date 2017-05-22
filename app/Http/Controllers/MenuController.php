<?php
/**
 * Menu controller
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use App;
use PhpParser\Node\Expr\Array_;

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
    private $translations_list = [];

    /**
     * Path to the language files.
     *
     * @var string
     */
    private $languageFilesPath;

    /**
     * Manager constructor.
     *
     * @param \Illuminate\Filesystem\Filesystem $disk
     */
    public function __construct( Filesystem $disk )
    {
        $this->disk             = $disk;
        $this->translations     = $this->getTranslationsFromJsonFile();
        $this->translation_list = $this->getTranslationKey( '', $this->translations[ App::getLocale() ] );;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\View Menu page
     */
    public function index( Request $request )
    {

        /*$translations = $this->getTranslationsFromJsonFile();

        $translation_list = $translations[ App::getLocale() ];

        $this->getTranslationKey( '', $translation_list );
        $translation_key = $this->translations_list;*/
        $translation_list = $this->translations[ App::getLocale() ];
        $translation_key  = $this->translations_list;

        if( $request->ajax() ){
            return response()->json( [
                                         'data' => view( 'menu.datalist', compact( 'translation_list', 'translation_key' ) )->render(),
                                     ] );
        } else {
            return view( 'menu.index', compact( 'translation_list', 'translation_key' ) );
        }
    }

    private function getTranslationKey( string $prefix = '', array $translations )
    {
        $keys = [];
        foreach( $translations as $key => $value ){
            $keys[]    = $key;
            $newPrefix = $key;

            if( is_array( $value ) ){
                $values[] = $value;
                if( $prefix !== '' ){
                    $newPrefix = $prefix . '.' . $newPrefix;
                }
                $keys = array_merge( $keys, $this->getTranslationKey( $newPrefix, $value ) );
            } else {
                array_push( $this->translations_list, [
                    'key'   => $prefix . '.' . $key,
                    'value' => $value,
                ] );
            }
        }

        return $keys;
    }

    public function getOriginalTranslationlist()
    {
        $this->setTranslationsFromPHPToJsonFile( 'en' );
        $this->setTranslationsFromPHPToJsonFile( 'th' );
    }

    /**
     * Get all translation list from files (except validation file).
     *
     * @param string $languages Language code
     *
     * @return array
     */
    private function getTranslationsFromPHPFile( string $languages )
    {
        collect( $this->disk->allFiles( realpath( base_path( 'resources/lang/' . $languages ) ) ) )
            ->filter( function( $file ){
                return ( $this->disk->extension( $file ) === 'php' && $file->getFilename() !== 'validation.php' );
            } )
            ->each( function( $file ){
                $this->translations[ str_replace( '.php', '', $file->getFilename() ) ] = include $file;
            } );

        return $this->translations;
    }

    private function getTranslationsFromJsonFile()
    {

        collect( $this->disk->allFiles( realpath( base_path( 'resources/lang/' ) ) ) )
            ->filter( function( $file ){
                return ( $this->disk->extension( $file ) === 'json' );
            } )
            ->each( function( $file ){
                $this->translations[ str_replace( '.json', '', $file->getFilename() ) ] = json_decode( $file->getContents(), true );
            } );

        return $this->translations;
    }

    private function setTranslationsFromPHPToJsonFile( string $languages )
    {
        $save = file_put_contents( $this->getJsonFilename( $languages ), json_encode( $this->getTranslationsFromPHPFile( $languages ) ) );

        return $save;
    }

    private function getJsonFilename( string $languages )
    {
        return realpath( base_path( 'resources/lang/' . $languages . '.json' ) );
    }

    public function edit( Request $request )
    {
        $key = $request->input( 'key' );

        return view( 'menu.edit', compact( 'key' ) );
    }

    public function update( Request $request )
    {

        $translations = $this->getTranslationsFromJsonFile();

        $translation_list = json_encode( $translations[ App::getLocale() ] );

        $translation_key = $this->translations_list;
        $newValue        = $request->input( 'value' );
        $oldValue        = $request->input( 'oldValue' );
        $translations    = str_replace( $oldValue, $newValue, $translation_list );
        //echo $request->input( 'value' );
        $test     = explode( ".", $request->input( 'key' ) );
        $filename = $this->getJsonFilename( App::getLocale() );
        //echo $filename;
        file_put_contents( $filename, $translations );

        //dd ( in_array( $request->input('key'), $translation_key ) );

    }

}

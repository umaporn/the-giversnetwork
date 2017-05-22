<?php
/**
 * Menu controller
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use App;

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
     * Manager constructor.
     *
     * @param \Illuminate\Filesystem\Filesystem $disk
     */
    public function __construct( Filesystem $disk )
    {
        $this->disk         = $disk;
        $this->translations = $this->getTranslationsFromJsonFile();
    }

    /**
     * Show menu management page.
     *
     * @param Request $request request object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index( Request $request )
    {

        $translation_list = $this->getTranslationsFromJsonFile();
        $translation      = $translation_list[ App::getLocale() ];

        if( $request->ajax() ){

            $translation_key         = $request->input( 'translation_key' );
            $search                  = ( $request->input( 'search' ) ) ? $request->input( 'search' ) : ' ';
            $translation_key_pattern = "/^" . $translation_key . "/";
            $search_pattern          = "/^" . $search . "/";

            $this->translations = [];
            array_walk_recursive( $translation, function( $value, $key ) use ( $translation_key_pattern, $search_pattern, $translation ){
                if( preg_match( $translation_key_pattern, $key ) || preg_match( $search_pattern, $value ) ){
                    array_push( $this->translations, [ $key => $value ] );
                }
            } );

            $translation = $this->translations;

            return response()->json( [
                                         'data' => view( 'menu.datalist', compact( 'translation' ) )->render(),
                                     ] );
        } else {
            return view( 'menu.index', compact( 'translation' ) );
        }
    }

    /**
     * Get translation key.
     *
     * @param string $prefix       prefix string
     * @param array  $translations array of translations
     *
     * @return array
     */
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
                    $prefix . '.' . $key => $value,
                ] );
            }
        }

        return $keys;
    }

    /**
     * Get original translation string from php languages file.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOriginalTranslationlist()
    {
        $this->setTranslationsFromPHPToJsonFile( App::getLocale() );

        return response()->json( [ 'success' => true, 'redirectedUrl' => route( 'menu.index' ) ], 302 );
    }

    /**
     * Get all translation list from files (except validation file).
     *
     * @param string $languages Language code
     *
     * @return array array of translations
     */
    private function getTranslationsFromPHPFile( string $languages )
    {
        collect( $this->disk->allFiles( realpath( base_path( 'resources/lang/' . $languages . '/' ) ) ) )
            ->filter( function( $file ){
                return ( $this->disk->extension( $file ) === 'php' && $file->getFilename() !== 'validation.php' );
            } )
            ->each( function( $file ){
                $this->translation[ str_replace( '.php', '', $file->getFilename() ) ] = include $file;
            } );

        $this->getTranslationKey( '', $this->translation );
        $translation_key = $this->translations_list;

        return $translation_key;
    }

    /**
     * Get translation from JSON file.
     *
     * @return string translation JSON string
     */
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

    /**
     * Set translation string from PHP file to JSON file.
     *
     * @param string $languages
     *
     * @return bool|int Result of setting translation string from PHP file to JSON file
     */
    private function setTranslationsFromPHPToJsonFile( string $languages )
    {
        $save = file_put_contents( $this->getJsonFilename( $languages ), json_encode( $this->getTranslationsFromPHPFile( $languages ) ) );

        return $save;
    }

    /**
     * Get JSON file name from resource directory.
     *
     * @param string $languages locale language string
     *
     * @return bool|string path of language file
     */
    private function getJsonFilename( string $languages )
    {
        return realpath( base_path( 'resources/lang/' . $languages . '.json' ) );
    }

    /**
     * Show editable menu form.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit( Request $request )
    {
        $keyInput = $request->input( 'key' );

        $translation_list = $this->getTranslationsFromJsonFile();
        $translation      = $translation_list[ App::getLocale() ];
        array_walk_recursive( $translation, function( $value, $key ) use ( $keyInput ){
            if( $keyInput === $key ){
                $this->value = $value;
            }
        } );

        $value = $this->value;

        return view( 'menu.edit', compact( 'keyInput', 'value' ) );

    }

    /**
     * Update the translation string.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request )
    {

        $translations     = $this->getTranslationsFromJsonFile();
        $translation_list = $translations[ App::getLocale() ];
        $keyInput         = $request->input( 'key' );
        $newValue         = $request->input( 'value' );

        $index = 0;
        foreach( $translation_list as $list ){
            foreach( $list as $key => $value ){

                if( $keyInput === $key ){
                    $translation_list[ $index ][ $key ] = $newValue;
                }
                $index++;
            }
        }

        $filename = $this->getJsonFilename( App::getLocale() );
        file_put_contents( $filename, json_encode( $translation_list ) );

        return response()->json( [ 'success' => true, 'redirectedUrl' => route( 'menu.index' ) ], 302 );

    }

}

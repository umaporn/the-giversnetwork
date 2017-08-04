<?php
/**
 * Manage menus of this application.
 */

namespace App\ViewComposers;

use App\Libraries\Utility;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

/**
 * A class for generating all menus.
 *
 * Each menu choice input of this class is an array pair of rootName, menuText, class, and childMenu.
 */
class MenuComposer
{
    /** @var array Main menu */
    private $mainMenu;

    /**
     * Initialize MenuComposer class.
     */
    public function __construct()
    {
        $this->mainMenu = config( 'menu.mainMenu' );
    }

    /**
     * Authorize a menu choice.
     *
     * @param array $menuChoice Menu choice
     *
     * @return boolean true = authorized, false = unauthorized
     */
    private function authorize( array $menuChoice )
    {
        $authorized = true;

        if( isset( $menuChoice['class'] ) ){
            $gate       = empty( $menuChoice['gate'] ) ? 'view' : $menuChoice['gate'];
            $authorized = Gate::allows( $gate, new $menuChoice['class']() );
        }

        return $authorized;
    }

    /**
     * Get active style of a menu choice.
     *
     * @param string $menuChoice
     *
     * @return string Active style
     */
    private function getActiveStyle( string $menuChoice )
    {
        $pattern = '@^' . preg_quote( $menuChoice ) . '(/(create|\d+/edit))?$@i';
        $active  = false;

        if( preg_match( $pattern, url()->current() ) ){
            $active = true;
        } else if( preg_match( '@^' . preg_quote( Utility::getBaseUrl() ) . '/\w+/\d+/(\w+)$@i', url()->current(), $matches ) ){

            $newUrl = Utility::getBaseUrl() . '/' . $matches[1];

            if( $newUrl === $menuChoice ){
                $active = true;
            }

        }

        return $active ? 'active' : '';
    }

    /**
     * Create a menu choice with active style.
     *
     * @param array $menuChoice Menu choice
     *
     * @return array A menu choice with active style
     */
    private function createMenuChoice( array $menuChoice )
    {
        $menuItem = [ 'childMenu' => [] ];

        if( $menuChoice['routeName'] === '#' ){
            $menuItem['url']    = '#';
            $menuItem['active'] = '';
        } else {
            $parameters         = isset( $menuChoice['parameters'] ) ? $menuChoice['parameters'] : [];
            $menuItem['url']    = route( $menuChoice['routeName'], $parameters );
            $menuItem['active'] = $this->getActiveStyle( $menuItem['url'] );
        }

        $menuItem['menuText'] = __( $menuChoice['menuText'] );

        if( isset( $menuChoice['childMenu'] ) ){
            foreach( $menuChoice['childMenu'] as $childMenuChoice ){
                if( $this->authorize( $childMenuChoice ) ){
                    array_push( $menuItem['childMenu'], $this->createMenuChoice( $childMenuChoice ) );
                }
            }
        }

        return $menuItem;
    }

    /**
     * Get the main menu.
     *
     * @return array Main menu
     */
    private function getMainMenu()
    {
        $mainMenu = [];

        foreach( $this->mainMenu as $menuChoice ){
            if( $this->authorize( $menuChoice ) ){
                array_push( $mainMenu, $this->createMenuChoice( $menuChoice ) );
            }
        }

        return $mainMenu;
    }

    /**
     * Compose view with all menus.
     *
     * @param View $view Current view
     *
     * @return View Composed view
     */
    public function compose( View $view )
    {
        return $view->with( [ 'mainMenu' => $this->getMainMenu() ] );
    }
}

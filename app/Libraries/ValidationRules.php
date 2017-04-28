<?php
/**
 * Manage extended validation rules.
 */

namespace App\Libraries;

use Validator;
use Auth;
use Hash;
use Illuminate\Http\Request;

/**
 * This class keeps all extended validation rules.
 */
class ValidationRules
{
    /**
     * Initialize class.
     *
     * @param Request $request Request object
     *
     * @return void
     */
    public function __construct( Request $request )
    {
        $this->request = $request;
    }

    /**
     * Validate whether data is zero or exists in the database.
     *
     * @param string $attribute  Input field name to validate
     * @param string $value      Input's value
     * @param array  $parameters Rule's parameters
     *
     * @return boolean Validation result
     */
    public function validateZeroOrExistsRule( string $attribute, string $value, array $parameters )
    {
        if( $value == 0 ){
            return true;
        } else {
            $newValidator = Validator::make(
                [ $attribute => $value ],
                [ $attribute => 'exists:' . implode( ",", $parameters ) ]
            );

            return $newValidator->passes();
        }
    }

    /**
     * Validate password against the current password.
     *
     * @param string $attribute  Input field name to validate
     * @param string $value      Input's value
     * @param array  $parameters Rule's parameters
     *
     * @return boolean Validation result
     */
    public function validatePassword( string $attribute, string $value, array $parameters )
    {
        return Hash::check( $value, Auth::user()->password );
    }

    /**
     * Validate whether data from checkbox input is in the given list of rule's parameters.
     *
     * @param string $attribute  Input field name to validate
     * @param string $value      Input's value
     * @param array  $parameters Rule's parameters
     *
     * @return boolean Validation result
     */
    public function validateCheckboxInRule( string $attribute, array $values, array $parameters )
    {
        foreach( $values as $value ){
            $newValidator = Validator::make(
                [ $attribute => $value ],
                [ $attribute => 'in:' . implode( ",", $parameters ) ]
            );
            if( $newValidator->fails() ){
                return false;
            }
        }

        return true;
    }
}
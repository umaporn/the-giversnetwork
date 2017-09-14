<?php
/**
 * Add prefix to resource's route name.
 *
 * @param string $prefix Prefix
 */
function addPrefixRouteName( $prefix )
{
    return [
        'index'   => $prefix . '.index',
        'create'  => $prefix . '.create',
        'store'   => $prefix . '.store',
        'show'    => $prefix . '.show',
        'edit'    => $prefix . '.edit',
        'update'  => $prefix . '.update',
        'destroy' => $prefix . '.destroy',
    ];
}
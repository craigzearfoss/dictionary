<?php

namespace App\Http\Controllers;

use Enforcer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Enforcer::addPermissionForUser('eve', 'articles', 'read');
        //Enforcer::addRoleForUser('eve', 'writer');
        //Enforcer::addPolicy('writer', 'articles','edit');

        $data = [
            'getAllRoles' => Enforcer::getAllRoles(),
            'getUsersForRole' => [
                'writer' => Enforcer::getUsersForRole('writer')
            ],
            'getPolicy' => Enforcer::getPolicy(),
            'getRolesForUser' => [
                'eve' => Enforcer::getRolesForUser('eve')
            ],
            'getPermissionsForUser' => [
                'eve' => Enforcer::getPermissionsForUser('eve')
            ]
        ];
        //dd(Enforcer::getAllRoles());
        //dd(Enforcer::getPolicy());
        //dd(Enforcer::getRolesForUser('eve'));
        //dd(Enforcer::getUsersForRole('writer'));
        //dd(Enforcer::getPermissionsForUser('eve'));
        return response()->json($data, 201);
    }

}

<?php

namespace App\Http\Controllers;


use LeadMax\TrackYourStats\System\Company;
use LeadMax\TrackYourStats\System\Session;
use LeadMax\TrackYourStats\User\Permissions;

class DashboardController extends Controller
{

    public function home()
    {

        $with = [
            'canViewPostback' => Session::permissions()->can(Permissions::VIEW_POSTBACK),
            'postBackURL' => getWebRoot()."?uid=".Company::loadFromSession()->getUID()."&clickid=",
            'userId' => Session::userID(),
            'firstName' => Session::userData()->first_name,
            'email' => Session::userData()->email,
            'username' => Session::userData()->user_name,
            'phone' => Session::userData()->cell_phone,
            'skype' => Session::userData()->skype,
        ];


        return view('home', $with);
    }

}
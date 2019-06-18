<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class socialNetwork extends Model
{
    public function showSocialNetwork()
    {
        try {
            foreach (socialNetwork::distinct()->get(['url', 'name']) as $network) {


                echo '<a href="' . $network->url . '">' . $network->name . '</a> <br>';
            }
        } catch (Exception $e) {
            Debugbar::addException($e);
        }


    }
}

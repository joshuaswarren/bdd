<?php
namespace App;

if(file_exists('bootstrap/app.php')) {
    require_once('bootstrap/app.php');
} else {
    require_once('../bootstrap/app.php');
}

use Rhumsaa\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class Timeoff
{

    public function create($name, $reason)
    {
        $uuid1 = Uuid::uuid1();
        $uuid = $uuid1->toString();
        DB::table('requests')->insert([
            'name' => $name,
            'reason' => $reason,
            'uuid' => $uuid,
        ]);
        return $uuid;
    }

    public function load($uuid) {
        $results = DB::select('select * from requests WHERE uuid = ?', [$uuid]);
        return $results;
    }

    public function loadAll()
    {
        $results = DB::select('select * from requests');
        return $results;
    }

    public function loadPending()
    {
        $results = DB::select('select * from requests WHERE reviewed = ?', [0]);
        return $results;
    }

    public function approve($uuid)
    {
        DB::update('update requests set reviewed = 1, approved = 1 where uuid = ?', [$uuid]);
        return true;
    }

    public function deny($uuid)
    {
        DB::update('update requests set reviewed = 1, approved = 0 where uuid = ?', [$uuid]);
        return true;
    }

    public function decrement($hrmsApi, $uuid, $daysOff = 1)
    {
        $results = DB::select('select * from requests WHERE uuid = ?', [$uuid]);
        $result = $results[0];
        $name = $result->name;
        $hrmsUserId = $hrmsApi->getUser($name);
        $response = $hrmsApi->decrement($hrmsUserId, $daysOff);
        return $response;
    }
}

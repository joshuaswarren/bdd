<?php
namespace App;

include_once('../bootstrap/app.php');

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
}

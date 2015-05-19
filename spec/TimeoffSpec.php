<?php

namespace spec\App;

if(file_exists('bootstrap/app.php')) {
    require_once('bootstrap/app.php');
} else {
    require_once('../bootstrap/app.php');
}


use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rhumsaa\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class TimeoffSpec extends ObjectBehavior
{
    private $prophet;
    private $uuid;

    function before()
    {
        $name = "Phpspec";
        $reason = "I'm a robot";
        $uuid1 = Uuid::uuid1();
        $uuid = $uuid1->toString();
        DB::table('requests')->insert([
            'name' => $name,
            'reason' => $reason,
            'uuid' => $uuid,
        ]);
        $this->uuid = $uuid;
    }

    function after()
    {
        DB::delete('delete from requests where uuid = ?', [$this->uuid]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('App\Timeoff');
    }

    function it_creates_timeoff_requests() {
        $this->create("Name", "reason")->shouldBeString();
    }

    function it_loads_all_timeoff_requests() {
        $this->loadAll()->shouldBeArray();
    }

    function it_loads_a_timeoff_request() {
        $this->load("uuid")->shouldBeArray();
    }

    function it_loads_pending_timeoff_requests() {
        $this->loadPending()->shouldBeArray();
    }

    function it_approves_timeoff_requests() {
        $this->approve("id")->shouldReturn(true);
    }

    function it_denies_timeoff_requests() {
        $this->deny("id")->shouldReturn(true);
    }

    function it_decrements_remaining_balance() {
        $this->before();
        $this->prophet = new \Prophecy\Prophet;
        $prophecy = $this->prophet->prophesize('App\HrmsApi');
        $prophecy->getUser(Argument::type('string'))->willReturn('name');
        $prophecy->decrement('name', Argument::type('integer'))->willReturn(true);
        $dummyApi = $prophecy->reveal();
        $this->decrement($dummyApi, $this->uuid)->shouldReturn(true);
        $this->after();
    }

}

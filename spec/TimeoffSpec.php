<?php

namespace spec\App;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TimeoffSpec extends ObjectBehavior
{
    private $prophet;

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
        $this->prophet = new \Prophecy\Prophet;
        $prophecy = $this->prophet->prophesize();
        $prophecy->getUser(Argument::type('string'))->willReturn(Argument::type('string'));
        $prophecy->decrement(Argument::type('string'), Argument::type('integer'))->willReturn(true);
        $dummyApi = $prophecy->reveal();
        $this->decrement($dummyApi, "uuid")->shouldReturn(true);
    }

}

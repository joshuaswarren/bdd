<?php

namespace spec\App;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TimeoffSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('App\Timeoff');
    }

    function it_creates_timeoff_requests() {
        $this->create("Name", "reason")->shouldReturnAnInstanceOf('String');
    }

    function it_loads_all_timeoff_requests() {
        $this->loadAll()->shouldReturnAnInstanceOf('Array');
    }

    function it_loads_pending_timeoff_requests() {
        $this->loadPending()->shouldReturnAnInstanceOf('Array');
    }

    function it_approves_timeoff_requests() {
        $this->approve("id")->shouldReturn(true);
    }

    function it_denies_timeoff_requests() {
        $this->deny("id")->shouldReturn(true);
    }

}

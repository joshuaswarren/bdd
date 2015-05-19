<?php

namespace spec\App;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HrmsApiSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('App\HrmsApi');
    }

    function it_returns_a_user()
    {
        $this->getUser("Name")->shouldBeString();
    }

    function it_decrements()
    {
        $this->decrement("Name", 1)->shouldReturn(true);
    }
}

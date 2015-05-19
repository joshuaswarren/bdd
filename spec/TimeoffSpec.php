<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TimeoffSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Timeoff');
    }
}

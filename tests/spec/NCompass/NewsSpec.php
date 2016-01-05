<?php

namespace spec\NCompass;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NewsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NCompass\News');
    }
}

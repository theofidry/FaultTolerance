<?php

namespace spec\FaultTolerance\WaitStrategy;

use FaultTolerance\Waiter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ExponentialSpec extends ObjectBehavior
{
    function it_waits_an_exponential_amount_of_time_each_time_its_called(Waiter $waiter)
    {
        $this->beConstructedWith($waiter, 1);

        $waiter->wait(exp(1))->shouldBeCalled();
        $this->wait();

        $waiter->wait(exp(2))->shouldBeCalled();
        $this->wait();

        $waiter->wait(exp(3))->shouldBeCalled();
        $this->wait();
    }
}

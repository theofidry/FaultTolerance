<?php
namespace FaultTolerance\OperationBuffer;

use FaultTolerance\Operation;
use FaultTolerance\OperationBuffer;

class InMemoryOperationBuffer implements OperationBuffer
{
    /**
     * @var Operation[]
     */
    private $operations = [];

    /**
     * {@inheritdoc}
     */
    public function add(Operation $operation)
    {
        $this->operations[] = $operation;
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        if (false !== ($operation = current($this->operations))) {
            return $operation;
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function pop()
    {
        return array_shift($this->operations);
    }
}

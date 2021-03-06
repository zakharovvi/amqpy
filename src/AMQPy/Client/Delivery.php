<?php


namespace AMQPy\Client;

class Delivery
{
    private $body;
    private $envelope;
    private $properties;

    public function __construct($body, Envelope $envelope, Properties $properties)
    {
        $this->body       = $body;
        $this->envelope   = $envelope;
        $this->properties = $properties;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return \AMQPy\Client\Envelope
     */
    public function getEnvelope()
    {
        return $this->envelope;
    }

    /**
     * @return \AMQPy\Client\Properties
     */
    public function getProperties()
    {
        return $this->properties;
    }
    
    
}
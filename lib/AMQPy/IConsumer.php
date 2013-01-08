<?php
/**
 * @author Ben Pinepain <pinepain@gmail.com>
 * @url https://github.com/pinepain/amqpy
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AMQPY;

use \AMQPEnvelope;
use \Exception;


interface IConsumer {
    /**
     * Pre-consume hook
     *
     * Use it to make some additional bindings or other consume-specific actions
     *
     * @param Queue $queue Queue on which consumer will be listening for new messages
     *
     * @return mixed | bool Return FALSE to break consuming (post-hook will not be called in this case)
     */
    public function preConsume(Queue $queue);

    /**
     * Post-consume hook
     *
     * Use it to cleanup after consuming
     *
     * @param Queue $queue Queue on which consumer was listening for new messages
     *
     * @return mixed
     */
    public function postConsume(Queue $queue);

    /**
     * Process received data from queued message.
     *
     * @param mixed        $payload  Payload data from the message
     * @param AMQPEnvelope $envelope An instance representing the message pulled from the queue
     * @param Queue        $queue    Queue from which the message was consumed
     *
     * @return mixed | boolean Return FALSE to break the consumption event loop
     */
    public function consume($payload, AMQPEnvelope $envelope, Queue $queue);




    /**
     * Handle any exception during queued message data processing.
     *
     * @param Exception    $e        Exception thrown during consumption
     * @param AMQPEnvelope $envelope An instance representing the message pulled from the queue
     * @param Queue        $queue    Queue from which the message was consumed
     *
     * @return mixed | boolean Return FALSE to break the consumption event loop
     */
    public function except(Exception $e, AMQPEnvelope $envelope, Queue $queue);
}

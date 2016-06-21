<?php
/**
 * Payment gateway interface
 */

namespace League\Omnipay\Common;

/**
 * Payment gateway interface
 *
 * This interface class defines the standard functions that any
 * Omnipay gateway needs to define.
 *
 * @see AbstractGateway
 *
 * @method Message\ResponseInterface authorize(array $options = array())         (Optional method)
 *         Authorize an amount on the customers card
 * @method Message\ResponseInterface completeAuthorize(array $options = array()) (Optional method)
 *         Handle return from off-site gateways after authorization
 * @method Message\ResponseInterface capture(array $options = array())           (Optional method)
 *         Capture an amount you have previously authorized
 * @method Message\ResponseInterface purchase(array $options = array())          (Optional method)
 *         Authorize and immediately capture an amount on the customers card
 * @method Message\ResponseInterface completePurchase(array $options = array())  (Optional method)
 *         Handle return from off-site gateways after purchase
 * @method Message\ResponseInterface refund(array $options = array())            (Optional method)
 *         Refund an already processed transaction
 * @method Message\ResponseInterface void(array $options = array())              (Optional method)
 *         Generally can only be called up to 24 hours after submitting a transaction
 * @method Message\ResponseInterface createCard(array $options = array())        (Optional method)
 *         The returned response object includes a cardReference, which can be used for future transactions
 * @method Message\ResponseInterface updateCard(array $options = array())        (Optional method)
 *         Update a stored card
 * @method Message\ResponseInterface deleteCard(array $options = array())        (Optional method)
 *         Delete a stored card
*/
interface GatewayInterface
{
    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     */
    public function getName();

    /**
     * Define gateway parameters, in the following format:
     *
     * array(
     *     'username' => '', // string variable
     *     'testMode' => false, // boolean variable
     *     'landingPage' => array('billing', 'login'), // enum variable, first item is default
     * );
     */
    public function getDefaultParameters();

    /**
     * Initialize gateway with parameters
     */
    public function initialize(array $parameters = array());

    /**
     * Get all gateway parameters
     *
     * @return array
     */
    public function getParameters();
}

<?php
namespace Shopware\Plugins\StripePayment\Subscriber;

use Enlight\Event\SubscriberInterface;

/**
 * The subscriber for adding the custom StripePaymentMethod path.
 *
 * @copyright Copyright (c) 2015, VIISON GmbH
 */
class Payment implements SubscriberInterface
{
    /**
     * @inheritdoc
     */
    public static function getSubscribedEvents()
    {
        return array(
            'Shopware_Modules_Admin_InitiatePaymentClass_AddClass' => 'onAddPaymentClass'
        );
    }

    /**
     * Adds the path to the Stripe payment method class to the return value.
     *
     * @param \Enlight_Event_EventArgs $args
     */
    public function onAddPaymentClass(\Enlight_Event_EventArgs $args)
    {
        $dirs = $args->getReturn();
        $dirs['StripePaymentCard'] = 'Shopware\Plugins\StripePayment\Components\PaymentMethods\Card';
        $args->setReturn($dirs);
    }
}

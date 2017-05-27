<?php

class paymentstripe
{

  const APIKey = "";

  function __construct()
  {
    \Stripe\Stripe::setApiKey(self::APIKey);
  }

  //charge user with credit card on file
  function ChargePayment($amount, $customer_id)
  {
    $charge = \Stripe\Charge::create(array(
      "amount" => $amount, // $15.00 this time
      "currency" => "usd", //always USD for now
      "customer" => $customer_id
    ));
  }

  //returns new customer_id that should be saved into user table
  function CreatePayment($token)
  {
    return \Stripe\Customer::create(array(
      "source" => $token
    ));
  }

  //updates customer's passed in credit card information
  function UpdateCardInformation($customer_id, $card_id, $card_name, $expr_month, $expr_year)
  {
    $cu = \Stripe\Customer::retrieve($customer_id);
    $card = $customer->sources->retrieve($card_id);
    $card->name = $card_name;
    $card->exp_month = $expr_month;
    $card->exp_year = $expr_year;
    $card->save();
  }

  //Adds new customer credit card information
  function AddPaymentSource($customer_id, $token)
  {
    $cu = \Stripe\Customer::retrieve($customer_id);
    $cu->source = $token;
    $cu->save();
  }

  //removes passed in card id source
  function DeletePaymentSource($customer_id, $card_id)
  {
    $customer = \Stripe\Customer::retrieve($customer_id);
    $customer->sources->retrieve($card_id)->delete();
  }

  //return object of all card sources
  function ListAllCards($customer_id)
  {
    return json_decode(\Stripe\Customer::retrieve($customer_id)->sources->all(array(
     'object' => 'card')));
  }
}


 ?>

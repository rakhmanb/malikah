<?php
class payment
{
  protected $paymentType

  function __construct($paymentObject)
  {
    $this->$paymentType = $paymentObject;
  }

  //charge user with credit card on file
  function ChargePayment($customer_id)
  {
    $this->$paymentType->ChargePayment($customer_id);
  }

  //returns new customer_id that should be saved into user table
  function CreatePayment($token)
  {
    return $this->$paymentType->CreatePayment($token);
  }

  //updates customer's credit card information on file
  function UpdatePayment($customer_id, $token)
  {
    $this->$paymentType->UpdatePayment($customer_id, $token);
  }

}

?>

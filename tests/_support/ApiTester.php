<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class ApiTester extends \Codeception\Actor
{
    use _generated\ApiTesterActions;

   /**
    * Define custom actions here
    */

   public function checkResponseWithData($response){
		$I = $this;
		$I->assertNotEmpty('$response','Response contains data');
		$I->assertEquals(true,$response->response->status, "Checking if they are equal");
		$I->assertNotEmpty('$reseller->response->data','Response contains data');
	}



	



public function AddUser($desc,$name,$email,$password,$phone,$status,$respCode)
{
    $I = $this;
     //$I->amHttpAuthenticated();
    $I->amGoingTo($desc);
    $I->haveHttpHeader('accept', 'application/json', 'Content-Type', 'application/json');
    $I->sendPOST('api/users/', 
      array('name' => $name,
        'email' => $email,
        'password' => $password,
          'phone' =>$phone,
          'status' => $status
        ));
    
    $I->seeResponseCodeIs($respCode);
    $response = $I->grabResponse();
      //codecept_debug($response);
    $I->assertNotEmpty('$response','Response contains data');
    $I->amGoingTo($response);
   // $I->seeResponseContains($response_contains);
    
   }


public function LoginUser($desc,$email,$password,$respCode)
{
    $I = $this;
     //$I->amHttpAuthenticated();
    $I->amGoingTo($desc);
    $I->haveHttpHeader('accept', 'application/json', 'Content-Type', 'application/json');
    $I->sendPOST('api/users/login', 
      array('email' => $email,
        'password' => $password
        ));
    
    $I->seeResponseCodeIs($respCode);
    $response = $I->grabResponse();
      //codecept_debug($response);
    $I->assertNotEmpty('$response','Response contains data');
    $I->amGoingTo($response);
   // $I->seeResponseContains($response_contains);
    
   }






public function AddUserCards($desc,$token,$card_number,$status,$respCode){
    $I = $this;
     //$I->amHttpAuthenticated();
    $I->amGoingTo($desc);
    $I->haveHttpHeader('accept', 'application/json', 'Content-Type', 'application/json');
    $I->haveHttpHeader('token', 'Bearer '.$token);
    $I->sendPOST('api/userCards/', 
      array('card_number' => $card_number,
        'status' => $status));
    $I->seeResponseCodeIs($respCode);
    $response = $I->grabResponse();
    $I->assertNotEmpty('$response','Response contains data');
    $I->amGoingTo($response);

    
   }



  


   public function EditUserCards($desc,$token,$id,$card_number,$status,$respCode){
    $I = $this;

    $I->amGoingTo($desc);
    $I->haveHttpHeader('accept', 'application/json', 'Content-Type', 'application/json');
    $I->haveHttpHeader('token', 'Bearer '.$token);
    $I->sendPUT('api/userCards/'.$id, 
      array('card_number' => $card_number,
        'status' => $status));
    $I->seeResponseCodeIs($respCode);
    $response = $I->grabResponse();
    $I->assertNotEmpty('$response','Response contains data');
    $I->amGoingTo($response);
    
   }


   public function AddVendor($desc,$token,$name,$status,$email,$phone,$is_primary,$reward_method_id,$reward_status,$respCode){

    $I = $this;
    $I->amGoingTo($desc);
    $I->haveHttpHeader('accept', 'application/json', 'Content-Type', 'application/json');
    $I->haveHttpHeader('token', 'Bearer '.$token);
    $I->sendPOST('api/vendors/', 
      array('name' => $name,
        'status' => $status,
        'vendor_contacts' => array('email' => $email,
          'phone' =>$phone,
          'is_primary' => $is_primary),
        'vendor_reward_types' => array( array('reward_method_id' => $reward_method_id,
          'status' => $reward_status))
        ));
    
    $I->seeResponseCodeIs($respCode);
    $response = $I->grabResponse();
    $I->assertNotEmpty('$response','Response contains data');
    $I->amGoingTo($response);
    
   }



public function EditVendor($desc,$token,$id,$name,$status,$email,$phone,$is_primary,$reward_method_id,$reward_status,$respCode){
    $I = $this;
    $I->amGoingTo($desc);
    $I->haveHttpHeader('accept', 'application/json', 'Content-Type', 'application/json');
    $I->haveHttpHeader('token', 'Bearer '.$token);
    $I->sendPUT('api/vendors/'.$id, 
      array('name' => $name,
        'status' => $status,
        'vendor_contacts' => array('email' => $email,
          'phone' =>$phone,
          'is_primary' => $is_primary),
        'vendor_reward_types' => array( array('reward_method_id' => $reward_method_id,
          'status' => $reward_status))
        ));
    
    $I->seeResponseCodeIs($respCode);
    $response = $I->grabResponse();
    $I->assertNotEmpty('$response','Response contains data');
    $I->amGoingTo($response);
    
   }


 public function AllocatePoints($desc,$token,$vendor_id,$attribute,$attribute_type,$points,$reward_type,$respCode){
    $I = $this;
      $I->amGoingTo($desc);
      $I->haveHttpHeader('accept', 'application/json','Content-Type','application/json');
      $I->haveHttpHeader('token', 'Bearer '.$token);
      $I->sendPOST('api/RewardCredits/', 
        array('vendor_id' => $vendor_id,
          'attribute' => $attribute,
          'attribute_type' => $attribute_type,
            'points' =>$points,
            'reward_type' => $reward_type));
      $I->seeResponseCodeIs($respCode);
    $response = $I->grabResponse();
    $I->assertNotEmpty('$response','Response contains data');
    $I->amGoingTo($response);
      
    }



public function AllocatePoints_billing($desc,$vendor_id,$user_id,$attribute,$attribute_type,$points,$reward_type,$date,$respCode){
    $I = $this;



        $I->amGoingTo('Get Auth Token of a reseller');
        $I->haveHttpHeader('accept', 'application/json','Content-Type','application/json');
        $I->haveHttpHeader('token','Basic '.base64_encode('123456789:123456789'));
        $I->sendPOST('api/resellers/token');
        $I->seeResponseCodeIs(200);
        $resellerTokenResponse = json_decode($I->grabResponse());
        $I->checkResponseWithData($resellerTokenResponse);
        $I->assertNotEmpty('$resellerTokenResponse->response->data->token','Token available');
        $reseller_token = $resellerTokenResponse->response->data->token;

      $I->amGoingTo($desc);
      $I->haveHttpHeader('accept', 'application/json','Content-Type','application/json');
      $I->haveHttpHeader('testToken','test@ts.co');
      $I->haveHttpHeader('token', 'Bearer '.$reseller_token);
      $I->sendPOST('api/RewardCredits/', 
        array('vendor_id' => $vendor_id,
          'user_id' => $user_id,
          'attribute' => $attribute,
          'attribute_type' => $attribute_type,
            'points' =>$points,
            'reward_type' => $reward_type,
            'created' => $date));
      $I->seeResponseCodeIs($respCode);
    $response = $I->grabResponse();
    $I->assertNotEmpty('$response','Response contains data');
    $I->amGoingTo($response);
    /*$status = $I->grabDataFromResponseByJsonPath('$.response.status');
    $I->assertEquals(true, $status[0], "Checking if they are equal");*/
      
    }


public function RedeemWalletPoints_billing($desc,$service,$date,$respCode,$email,$password){
    $I = $this;




    $I->amGoingTo('Login');
        $I->haveHttpHeader('accept', 'application/json','Content-Type','application/json');
        $I->sendPOST('api/users/login', 
                    array('email' => $email,
                          'password' => $password));
      $I->seeResponseCodeIs(200);
      $Login_response = json_decode($I->grabResponse());
      //$I->assertNotEmpty('$Login_response','Response contains data');
     // $Login_status = $I->grabDataFromResponseByJsonPath('$.response.status');
     // $I->assertEquals(true,$Login_status[0], "Checking if they are equal");
      $token = $Login_response->response->data->token;
      codecept_debug($token);



      $I->amGoingTo($desc);
      $I->haveHttpHeader('accept', 'application/json','Content-Type','application/json');
      $I->haveHttpHeader('testToken','test@ts.co');
      $I->haveHttpHeader('token', 'Bearer '.$token);
      $I->sendPOST('api/RedeemedCredits/', 
        array('service' => $service,
          'created' =>$date));
      $I->seeResponseCodeIs($respCode);
    $response = $I->grabResponse();
    $I->assertNotEmpty('$response','Response contains data');
    $I->amGoingTo($response);
   // $I->seeResponseContains($response_contains);
    /*$status = $I->grabDataFromResponseByJsonPath('$.response.status');
    $I->assertEquals(true, $status[0], "Checking if they are equal");*/
      
    }





public function RedeemWalletPoints($desc,$token,$service,$respCode){
    $I = $this;
      $I->amGoingTo($desc);
      $I->haveHttpHeader('accept', 'application/json','Content-Type','application/json');
      $I->haveHttpHeader('token', 'Bearer '.$token);
      $I->sendPOST('api/RedeemedCredits/', 
        array('service' => $service));
      $I->seeResponseCodeIs($respCode);
    $response = $I->grabResponse();
    $I->assertNotEmpty('$response','Response contains data');
    $I->amGoingTo($response);
      
    }


    public function RedeemStoreCredit($desc,$token,$vendor_id,$attribute,$attribute_type,$respCode){
    $I = $this;
      $I->amGoingTo($desc);
      $I->haveHttpHeader('accept', 'application/json','Content-Type','application/json');
      $I->haveHttpHeader('token', 'Bearer '.$token);
      $I->sendPOST('api/RedeemedCredits/', 
       array('vendor_id' => $vendor_id,
                'attribute' =>$attribute,
                'attribute_type' => $attribute_type));
      $I->seeResponseCodeIs($respCode);
    $response = $I->grabResponse();
    $I->assertNotEmpty('$response','Response contains data');
    $I->amGoingTo($response);
      
    }


public function vendorBill($desc,$token,$vendor_id,$month,$respCode){
    $I = $this;
      $I->amGoingTo($desc);
      $I->haveHttpHeader('accept', 'application/json','Content-Type','application/json');
      $I->haveHttpHeader('token', 'Bearer '.$token);
      $I->sendPOST('api/vendorBillings/', 
       array('vendor_id' => $vendor_id,
                'month' =>$month ));
      $I->seeResponseCodeIs($respCode);
    $response = $I->grabResponse();
    $I->assertNotEmpty('$response','Response contains data');
    $I->amGoingTo($response);
      
    }


public function resellerBill($desc,$token,$month,$respCode){
    $I = $this;
      $I->amGoingTo($desc);
      $I->haveHttpHeader('accept', 'application/json','Content-Type','application/json');
      $I->haveHttpHeader('token', 'Bearer '.$token);
      $I->sendPOST('api/vendorBillings/', 
       array(
                'month' =>$month ));
      $I->seeResponseCodeIs($respCode);
    $response = $I->grabResponse();
    $I->assertNotEmpty('$response','Response contains data');
    $I->amGoingTo($response);
      
    }

public function Register_new_patient_negative($desc,$token,$name,$email,$phone,$username,$password,$respCode)
    {
      $I = $this;

        $I->amGoingTo($desc);
        $I->haveHttpHeader('token', 'Bearer '.$token);
        $I->sendPOST('api/vendor/add-user', 
                   json_encode( array('name' => $name,
                          'email' => $email,
                          'phone' => $phone,
                           'username' => $username,
                          'password' => $password)));
        $I->seeResponseCodeIs($respCode);
        $response = $I->grabResponse();
     ////   $I->assertNotEmpty('$response','Response contains data');
      //  $I->amGoingTo('see response which is'.$response);

    }

public function reward_credit_negative($desc,$token,$attribute,$attribute_type,$points,$reward_type,$respCode){
    $I = $this;

      $I->amGoingTo($desc);

      $I->haveHttpHeader('token', 'Bearer '.$token);
      $I->sendPOST('api/vendor/rewardCredits/', 
       json_encode( array(
          'attribute' => $attribute,
          'attribute_type' => $attribute_type,
            'points' =>$points,
            'reward_type' => $reward_type)));
      $I->seeResponseCodeIs($respCode);
    $response1 = $I->grabResponse();
   // $I->assertNotEmpty('$response1','Response contains data');
    $I->amGoingTo($response1);
      
    }



    public function instant_redemption_negative($desc,$token,$amount,$user_id,$description,$service,$respCode){
    $I = $this;
    
      $I->amGoingTo($desc);

      $I->haveHttpHeader('token', 'Bearer '.$token);
      $I->sendPOST('api/vendor/UserInstantRedemptions/', 
        json_encode(array(
          'amount' => $amount,
          'user_id' => $user_id,
            'description' =>$description,
            'service' => $service)));
      $I->seeResponseCodeIs($respCode);
    $response1 = $I->grabResponse();
   // $I->assertNotEmpty('$response1','Response contains data');
    $I->amGoingTo($response1);
      
    }


     public function redeem_store_credit_negative($desc,$token,$attribute,$attribute_type,$points,$reward_type,$respCode){
    $I = $this;
    
      $I->amGoingTo($desc);

      $I->haveHttpHeader('token', 'Bearer '.$token);
      $I->sendPOST('api/vendor/redeemedCredits/', 
       json_encode( array(
          'attribute' => $attribute,
          'attribute_type' => $attribute_type,
            'reward_type' =>$reward_type,
            'points' => $points)));
      $I->seeResponseCodeIs($respCode);
    $response1 = $I->grabResponse();
   // $I->assertNotEmpty('$response1','Response contains data');
    $I->amGoingTo($response1);
      
    }

    public function redeem_wallet_credit_negative($desc,$token,$user_id,$service,$reward_type,$respCode){
    $I = $this;
    
      $I->amGoingTo($desc);

      $I->haveHttpHeader('token', 'Bearer '.$token);
      $I->sendPOST('api/vendor/redeemedCredits/', 
        json_encode( array(
          'user_id' => $user_id,
          'service' => $service,
            'reward_type' =>$reward_type)));
      $I->seeResponseCodeIs($respCode);
    $response1 = $I->grabResponse();
   // $I->assertNotEmpty('$response1','Response contains data');
    $I->amGoingTo($response1);
      
    }

    public function vendor_token_negative($desc,$vendor_id,$respCode){
    $I = $this;
    
      $I->amGoingTo($desc);
$base_encode=base64_encode('123456789:123456789');
        $I->haveHttpHeader('token','Basic '.$base_encode);
      $I->sendPOST('api/vendor/token/', 
        json_encode( array(
          'vendor_id' => $vendor_id)));
      $I->seeResponseCodeIs($respCode);
    $response1 = $I->grabResponse();
   // $I->assertNotEmpty('$response1','Response contains data');
    $I->amGoingTo($response1);
      
    }

     public function update_vendor_negative($desc,$token,$vendor_id,$name,$email,$phone,$respCode){
    $I = $this;
    
      $I->amGoingTo($desc);

      $I->haveHttpHeader('token', 'Bearer '.$token);
      $I->sendPUT('api/vendor/vendors/'.$vendor_id, 
        json_encode( array('name' => $name,
                          'status' => '1',
                          'vendor_contacts' => array('email' => $email,
                                                      'phone' => $phone,
                                                      'is_primary' => '1'))));
      $I->seeResponseCodeIs($respCode);
    $response1 = $I->grabResponse();
   // $I->assertNotEmpty('$response1','Response contains data');
    $I->amGoingTo($response1);
      
    }






}

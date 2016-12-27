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
class PeopleHubTester extends \Codeception\Actor
{
    use _generated\PeopleHubTesterActions;

   /**
    * Define custom actions here
    */


   public function add_vendor($reseller_token, $name, $email, $phone, $reward_id1, $reward_id2, $reward_id3, $status)
   {
   		$reseller_token = $reseller_token[0];
   		$I = $this;
   		$I->amGoingTo('add vendor');
        $I->haveHttpHeader('token ','Bearer '.$reseller_token);
        $I->sendPOST('api/reseller/vendors', json_encode(['name'=> $name, 'vendor_contacts'=>array('email'=>$email, 'phone' => $phone), 'vendor_reward_types'=>array(array('reward_method_id'=>$reward_id1,'status'=>$status),array('reward_method_id'=>$reward_id2,'status'=>$status),array('reward_method_id'=>$reward_id3,'status'=>$status))]));
        $I->seeResponseCodeIs(200);
        $new_vendor = $I->grabResponse();

   }

   public function register_new_user($name, $token, $username, $email, $phone, $status)
   {
   		$I = $this;
   		$I->amGoingTo('register new user');
        $I->haveHttpHeader('token ','Bearer '.$token);
        $I->sendPOST('api/vendor/add-user', json_encode(['name' => $name,'username'=>$username, 'email'=>$email, 'phone'=>$phone, 'status' => $status]));
        $I->seeResponseCodeIs(200);
        $new_user = $I->grabResponse();
   }

   public function search_user($type, $token, $value)
   {
   		$I = $this;
   		$I->amGoingTo('search user');
        $I->haveHttpHeader('token ','Bearer '.$token);
        $I->sendGET('api/vendor/user-search?attributeType='.$type.'&value='.$value);
        $I->seeResponseCodeIs(200);
        $search_user_response = $I->grabResponse();
   }

   public function update_vendor($name, $vendor_id, $token, $reward_id1, $reward_id2, $reward_id3, $status)
   {
   		$I = $this;
   		$vendor_id = $vendor_id[0];
   		$I->amGoingTo('update existing vendor details');
        $I->haveHttpHeader('token ','Bearer '.$token);
        //$I->sendPUT('api/vendor/vendors/21',json_encode(['name'=> 'vishakha1','vendor_reward_types'=>array(array('reward_method_id'=>1,'status'=>1),array('reward_method_id'=>2,'status'=>1),array('reward_method_id'=>3,'status'=>1))]));
        $I->sendPUT('api/vendor/vendors/'.$vendor_id,json_encode(['name'=> $name,'vendor_reward_types'=>array(array('reward_method_id'=>$reward_id1,'status'=>$status),array('reward_method_id'=>$reward_id2,'status'=>$status),array('reward_method_id'=>$reward_id3,'status'=>$status))]));
        $I->seeResponseCodeIs(200);
        $update_vendor = $I->grabResponse();
   }
   public function view_loggedin_vendor($token)
   {
   		$I = $this;
   		$I->amGoingTo("view loggedIn vendor details");
        $I->haveHttpHeader('token ','Bearer '.$token);
        $I->sendGET('api/vendor/me');
        $I->seeResponseCodeIs(200);
        $loggedIn_vendor = $I->grabResponse();
   }

   public function view_user_activities($user_id, $token)
   {
   		$I = $this;
   		$I->amGoingTo('view users activities');
        $I->haveHttpHeader('token ','Bearer '.$token);
        $I->sendGET('api/vendor/activities?user_id='.$user_id);
        $I->seeResponseCodeIs(200);
        $user_activities = $I->grabResponse();
        $I->amGoingTo($user_activities);
   }
   public function view_vendor_activities($token)
   {
   		$I = $this;
   		$I->amGoingTo('view vendors activities');
        $I->haveHttpHeader('token ','Bearer '.$token);
        $I->sendGET('api/vendor/activities');
        $I->seeResponseCodeIs(200);
        $user_activities = $I->grabResponse();
        $I->amGoingTo($user_activities);
   }
   public function instant_redemption($amount, $token, $user_id, $description, $service)
   {
		$I = $this;   	
   		$I->amGoingTo("instant redemption");
        $I->haveHttpHeader('token ','Bearer '.$token);
        $I->sendPOST('api/vendor/UserInstantRedemptions/', json_encode(['amount' => $amount, 'user_id' => $user_id, 'description' =>$description, 'service' =>  $service]));
        $I->seeResponseCodeIs(200);
        $instant_redeem = $I->grabResponse();
   }
   public function view_instant_redemption($token)
   {
   		$I = $this;
   		$I->amGoingTo('view all instant redemption');
        $I->haveHttpHeader('token ','Bearer '.$token);
        $I->sendGET('api/vendor/UserInstantRedemptions/');
        $I->seeResponseCodeIs(200);
        $redemption = $I->grabResponse();
        $I->amGoingTo($redemption);
   }
   public function available_rewards($token)
   {	
   		$I = $this;
		$I->amGoingTo('get all available awards and details');
	    $I->haveHttpHeader('token ','Bearer '.$token);
	    $I->sendGET('api/vendor/rewardCredits/');
	    $I->seeResponseCodeIs(200);
	    $rewards = $I->grabResponse();
	    $I->amGoingTo($rewards);
   }
   public function reward_store_credits($type, $token, $value, $reward_type, $points)
   {	
   		$I = $this;
   		 $I->amGoingTo('reward credit to user');
         $I->haveHttpHeader('token ','Bearer '.$token);
         $I->sendPOST('api/vendor/rewardCredits/', json_encode(['attribute_type' => $type, 'attribute' => $value, 'reward_type' => $reward_type, 'points' => $points]));
         $I->seeResponseCodeIs(200);
         $reward_credit = $I->grabResponse();
   }
   public function reward_wallet_credits($type, $token, $value, $reward_type, $points)
   {	
   		$I = $this;
   		 $I->amGoingTo('reward credit to user');
         $I->haveHttpHeader('token ','Bearer '.$token);
         $I->sendPOST('api/vendor/rewardCredits/', json_encode(['attribute_type' => $type, 'attribute' => $value, 'reward_type' => $reward_type, 'points' => $points]));
         $I->seeResponseCodeIs(200);
         $reward_wallet_credit = $I->grabResponse();
   }
   public function redeem_store_credit($type, $token, $value, $reward_type, $points)
   {
   		$I = $this;
   		$I->amGoingTo('redeem store credit of a user');
        $I->haveHttpHeader('token ','Bearer '.$token);
        $I->sendPOST('api/vendor/redeemedCredits/', json_encode(['attribute_type' => $type, 'attribute' => $value, 'reward_type' => $reward_type, 'points' => $points]));
        $I->seeResponseCodeIs(200);
        $redeem_store = $I->grabResponse();
   }
   public function redeem_wallet_credit($user_id, $token, $reward_type, $service)
   {
   		$I = $this;
   		$I->amGoingTo('redeem wallet credit of a user');
        $I->haveHttpHeader('token ','Bearer '.$token);
        $I->sendPOST('api/vendor/redeemedCredits/', json_encode(["user_id"=>$user_id,'reward_type' => $reward_type, 'service' => $service]));
        $I->seeResponseCodeIs(200);
        $redeem_wallet = $I->grabResponse();
        $I->amGoingTo($redeem_wallet);
   }  

}

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
class BuzzyApiTester extends \Codeception\Actor
{
    use _generated\BuzzyApiTesterActions;

   /**
    * Define custom actions here
    */
   public function BuzzyDoc_Add_Vendor($desc,$orgName,$isLegacy,$minDeposit,$rewardsTemplateId,$firstName,$lastName,$userName,$phone,$email,$password,$respCode)
    {
    	$I = $this;

        $I->amGoingTo($desc);
        $I->haveHttpHeader('accept', 'application/json','Content-Type','application/json');
        $I->sendPOST('/api/vendors/', 
                    array('org_name' => $orgName,
                          'is_legacy' => $isLegacy,
                          'min_deposit' => $minDeposit ,

                          'rewardstemplate_id' => $rewardsTemplateId,
                          'users' => array('first_name' => $firstName ,
                            'last_name' => $lastName,
                            'username' => $userName,
                            'phone' => $phone,
                            'email' => $email,
                            'password' => $password)
                          ));
        $I->seeResponseCodeIs($respCode);
        $response = $I->grabResponse();
        $I->assertNotEmpty('$response','Response contains data');
        $status = $I->grabDataFromResponseByJsonPath('$.response.status');
        $I->assertEquals(true,$status[0], "Checking if they are equal");
        $I->amGoingTo('see response which is'.$response);

    }


public function BuzzyDoc_Add_Vendor_Negative($desc,$orgName,$isLegacy,$minDeposit,$threshold,$rewardsTemplateId,$firstName,$lastName,$userName,$phone,$email,$password,$respCode)
    {
    	$I = $this;

        $I->amGoingTo($desc);
        $I->haveHttpHeader('accept', 'application/json','Content-Type','application/json');
        $I->sendPOST('/api/vendors/', 
                    array('org_name' => $orgName,
                          'is_legacy' => $isLegacy,
                          'min_deposit' => $minDeposit ,
                           'threshold_value' => $threshold,
                          'reward_template_id' => $rewardsTemplateId,
                          'users' => array('first_name' => $firstName ,
                            'last_name' => $lastName,
                            'username' => $userName,
                            'phone' => $phone,
                            'email' => $email,
                            'password' => $password)
                          ));
        $I->seeResponseCodeIs($respCode);
        $response = $I->grabResponse();
     ////   $I->assertNotEmpty('$response','Response contains data');
      //  $I->amGoingTo('see response which is'.$response);


    }

    public function login($user, $password) {
    $I = $this;
    

  $I->wantTo('Login to super admin dashboard');
  $I->amOnPage('users/login');
  $I->fillField('#username', $user);
        $I->fillField('#password', $password);
        $I->click('Login');
      //  $I->wait(3);
       // $I->click('html body.gray-bg div.loginColumns.animated.fadeInDown div.row div.col-md-6 button.btn.btn-primary.block.full-width.m-b');
      //  $I->see('Users');
  //S      $I->seeInCurrentUrl('admin');
  
  //$I->click('//*[@id="page-wrapper"]/div[3]/div[3]/div[3]/div/div[2]/a');

    
        
   }


}

<?php
use \Codeception\Util\Locator;

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
class TierTester extends \Codeception\Actor
{
    use _generated\TierTesterActions;

   /**
    * Define custom actions here
    */
   public function BuzzyDoc_validations($desc,$input, $attribute,$expected,$message)
    {
		$I = $this;
		$I->amGoingTo($desc);
		$temp= $I->grabAttributeFrom($input, $attribute);
		$I->assertEquals($expected, $temp, $message);
	}

   public function login($username,$password)
	{
	   $I = $this;
       $I->wantTo('Login to super admin dashboard');
       $I->amOnPage('users/login');
       $I->maximizeWindow();
       $I->fillField('#username', $username);
	   $I->fillField('#password', $password);
	   $I->click('Login');
	   $I->wait(3);
	}

	public function logout()
	{
	    $I = $this;

	    $I->click(Locator::find('a', ['class' => 'fa fa-sign-out']));
	    $I->wait(3);
	    $I->seeInCurrentUrl('/users/login');

	}

	public function Search($searchInput,$option,$status_check,$pressEnter)
    {
      $I = $this;
      $I->maximizeWindow();
      $I->click('Dashboard');
      $I->waitForElementVisible('#search-patient-input',3);
      $I->makeScreenshot('user_page');
      $I->see('Search Patient');
      $I->seeInCurrentUrl('users/dashboard');
      $I->wait(1);
      $I->fillField('#search-patient-input',$searchInput);
      $I->wait(5);
      if($status_check=='0')
        {$I->checkOption($option);
        }
      if($pressEnter=='0')
        { $I->pressKey('#search-patient-input',WebDriverKeys::ENTER);}
    	else
	    {	
	   		$I->click('#search-patient-btn');
	   	}
	   	$I->wait(5);
	  //  	$heading = $I->grabTextFrom(Locator::find('div', ['class' => 'alert alert-success ng-binding']));
	  //  	codecept_debug($heading);
	  //   if($heading=='0 results found')
   //      {$I->wait(4);}
   //      else{
   //        $I->wait(4);
	  //     $I->click(Locator::elementAt('//table/tbody/tr', 1));
	  //     $I->wait(4);
	  // }
        
    }

    public function register_new_patient($name, $username, $guardian_email,$reason,$guardain_phone,$email, $phoneno, $see_good,$see, $no_email, $good_plan ){
       
        $I = $this;
        $I->click(Locator::find('a', ['href' => '/staging/users/dashboard'])); //dashboard
        $I->waitForElementVisible(Locator::find('a', ['class' => 'btn btn-primary']),5);
        $I->click(Locator::find('a', ['href' => '#!/addPatient']));
        $I->wait(2);
        $I->fillField(Locator::find('input', ['ng-model' => 'register.name']), $name);
        $I->wait(2);
        if($no_email=='1'){
           $I->checkOption(Locator::find('input', ['ng-model' => 'register.noEmail']));
           $I->wait(2);
           $I->fillField(Locator::find('input', ['ng-model' => 'register.username']), $username);
           $I->wait(3);
           $I->fillField(Locator::find('input', ['ng-model' => 'register.guardian_email']), $guardian_email);
           $I->wait(2);
           $I->selectOption(Locator::find('select', ['ng-model' => 'register.relationship_id']), 'Father');
           $I->wait(2);
           $I->fillField(Locator::find('input', ['ng-model' => 'register.reason']), $reason);
           $I->wait(2);
           $I->fillField(Locator::find('input', ['ng-model' => 'register.phone']), $guardain_phone);
           $I->wait(2);
           $I->click(Locator::find('button', ['class' => 'btn btn-success']));
       }else{
            $I->fillField(Locator::find('input', ['ng-model' => 'register.email']), $email);
            $I->wait(2);
            $I->fillField(Locator::find('input', ['ng-model' => 'register.phone']), $phoneno);
            $I->wait(2);
            $I->click(Locator::find('button', ['class' => 'btn btn-success']));
       }
      
        if($good_plan=='0')
          {
            $I->waitForElementVisible(Locator::find('button' ,['class' =>'btn btn-primary']));
            $I->see($see_good);
          }
        else{
        $I->waitForElementVisible(Locator::find('a' ,['href' =>'#!/patient']));
        $I->see($see);
      }   
        $I->wait(5);
    }

    // public function register_new_patient($name, $username, $email, $phoneno, $password,$good_plan,$see_good,$see)
    // {
        
    //     $I = $this;
    //     $I->click('Dashboard');
    //     $I->waitForElementVisible(Locator::find('a', ['class' => 'btn btn-primary']),5);
    //     $I->click(Locator::find('a', ['href' => '#!/addPatient']));
    //     $I->wait(5);
    //     $I->fillField(Locator::find('input', ['ng-model' => 'register.name']), $name);
    //     $I->wait(5);
    //     $I->fillField(Locator::find('input', ['ng-model' => 'register.username']), $username);
    //     $I->wait(5);
    //     $I->fillField(Locator::find('input', ['ng-model' => 'register.email']), $email);
    //     $I->wait(5);
    //     $I->fillField(Locator::find('input', ['ng-model' => 'register.phone']), $phoneno);
    //     $I->wait(5);
    //     $I->fillField(Locator::find('input', ['type' => 'password']), $password);
    //     $I->wait(5);
    //     $I->click(Locator::find('button', ['class' => 'btn btn-success']));
    //     if($good_plan=='0')
    //       {
    //         $I->waitForElementVisible(Locator::find('button' ,['class' =>'btn btn-primary']));
    //       }
    //     else
    //     {
    //         $I->waitForElementVisible(Locator::find('a' ,['href' =>'#!/patient']));
    //         $I->see($see);
    //     }
    //     $I->wait(5);
    // }

   	public function positive_case_for_add_view_tiers($name, $upperbound, $multiplier, $giftcoupon, $option)
   	{
   		//Add 

      $I = $this;
      $I->amGoingTo('Ad Tiers');
      $I->wait(5);
      $I->click('Settings');
      $I->wait(4);
      $I->click('Tier Program');
      $I->wait(5);
      $I->click('Tiers');
      $I->wait(10);
      $I->click('Add New Tier');
      $I->wait(5);
      $I->waitForElementVisible('#name',5);
      $I->fillField('#name', $name);
      $I->fillfield('#upperbound' , $upperbound);
      $I->fillField('#multiplier', $multiplier);
      $I->selectOption("select[class=form-control]", $giftcoupon);
      $I->waitForElementVisible(Locator::find('button', ['class' => 'btn btn-primary']));
      $I->click('Submit');
      $I->wait(5);
      $I->seeInCurrentUrl('/tiers');


   		//view

   		$I->wait(5);
   		$I->amGoingTo('view tiers');
      $I->selectOption("select[name = DataTables_Table_0_length]", $option);
      $I->wait(5);
   		$I->click(Locator::lastElement(Locator::find('a', ['class'=>'btn btn-xs btn-success'])));
   		$I->wait(5);
   		$I->see($name);
   		$I->see($upperbound);
   		$I->see($multiplier);
      $I->see($giftcoupon);
   		$I->wait(5);
   		$I->click('Back');
   		$I->wait(5);

   	}

   	public function positive_case_for_edit_delete_tiers($name, $upperbound, $multiplier, $giftcoupon, $option)
   	{
   		// Edit Tiers
   		$I = $this;
   		$I->amGoingTo('edit tiers');
      $I->wait(5);
      $I->click('Settings');
      $I->wait(5);
   		$I->click('Tier Program');
      $I->wait(5);
   		$I->click('Tiers');
      $I->wait(5);
      $I->selectOption("select[name = DataTables_Table_0_length]", $option);
   		$I->waitForElementVisible((Locator::find('a', ['class'=>'btn btn-xs btn-warning'])), 5);
   		$I->click(Locator::lastElement(Locator::find('a', ['class'=>'btn btn-xs btn-warning'])));
   		$I->waitForElementVisible('#name',5);
      $I->fillField('#name', $name);
      $I->fillfield('#upperbound' , $upperbound);
      $I->fillField('#multiplier', $multiplier);
   		$I->selectOption("select[class=form-control]", $giftcoupon);
   		$I->waitForElementVisible(Locator::find('button', ['class' => 'btn btn-primary']));
   		$I->click(Locator::find('button', ['class' => 'btn btn-primary']));
   		$I->wait(5);

   		// Delete Tier

        $I->wait(2);
        $I->selectOption("select[name = DataTables_Table_0_length]", $option);
        $I->wait(5);   
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-sm btn-danger fa fa-trash-o fa-fh'])));//click on Delete button 
        $I->seeInPopup('Are you sure you want to delete');
        $I->wait(3);
        $I->acceptPopup();
        $I->wait(3);

   	}

   	public function positive_case_for_add_view_tier_perk($tier, $perk, $option)
   	{
   		//Add
  		$I = $this;
   		$I->amGoingTo('add tier perk');
      $I->wait(5);
      $I->click('Settings');
      $I->wait(5);
   		$I->click('Tier Program');
   		$I->wait(5);
   		$I->click('Tier Perks');
   		$I->waitForElementVisible(Locator::find('a', ['class' => 'btn btn-success']), 10);
   		$I->click('Add New Tier Perk');
   		$I->waitForElementVisible('#tier-id', 5);
   		$I->selectOption('#tier-id', $tier);
   		$I->fillField('#perk', $perk);
   		$I->waitForElementVisible(Locator::find('button', ['type'=> 'submit']));
   		$I->click('Submit');
   		$I->wait(5);

   		//view
   		$I->wait(5);
   		$I->amGoingTo('view tier perk');
      $I->selectOption("select[name = DataTables_Table_0_length]", $option);
      $I->wait(5);
   		$I->click(Locator::lastElement(Locator::find('a', ['class'=>'btn btn-xs btn-success'])));
   		$I->wait(5);
   		$I->see($tier);
   		$I->see($perk);
   		$I->waitForElementVisible(Locator::find('a', ['class'=>'btn btn-warning']));
   		$I->click('Back');
   		$I->wait(5);

   	}

   	public function positive_case_for_edit_delete_tier_perk($tier, $perk, $option)
   	{
   		//Edit Tier Perks
   		$I = $this;
   		$I->amGoingTo('edit tier perk');
   		$I->wait(10);
      $I->click('Settings');
      $I->wait(5);
      $I->click('Tier Program');
      $I->wait(5);
      $I->click('Tier Perks');
      $I->wait(5);
      $I->selectOption("select[name = DataTables_Table_0_length]", $option);
   		$I->waitForElementVisible(Locator::find('a', ['class' => 'btn btn-success']),5);
   		$I->click(Locator::lastElement(Locator::find('a', ['class'=>'btn btn-xs btn-warning'])));
   		$I->waitForElementVisible('#tier-id', 5);
   		$I->selectOption('#tier-id', $tier);
   		$I->fillField('#perk', $perk);
   		$I->waitForElementVisible(Locator::find('button', ['type'=> 'submit']));
   		$I->click('Submit');
   		$I->wait(5);

   		//Delete Tier Perks
   		$I->wait(2);
      $I->selectOption("select[name = DataTables_Table_0_length]", $option);
      $I->wait(5);   
      $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-sm btn-danger fa fa-trash-o fa-fh'])));//click on Delete button 
      $I->seeInPopup('Are you sure you want to delete');
      $I->wait(3);
      $I->acceptPopup();
      $I->wait(3);
   	}

   	//tier rewards

    public function case_for_tier_rewards($transaction_amount)
    {
    	$I = $this;
    	$I->amGoingTo('tier rewards');
    	$I->click(Locator::find('a', ['ng-click' => 'tabSwitch(2)']));
    	$I->waitForElementVisible(Locator::find('input' , ['ng-model' => 'request.amount']),5);
      $I->BuzzyDoc_validations('check required validation for tier reward', Locator::find('input' , ['ng-model' => 'request.amount']) , 'required', 'true', 'verified validation for  tier name');
    	$I->fillField(Locator::find('input' , ['ng-model' => 'request.amount']), $transaction_amount);
    	$I->waitForElementVisible('#tierSubmit', 5);
    	$I->click('#tierSubmit');
    	$I->waitForText('Congrats!', 5);
    	$I->click('OK');
    	$I->wait(5);

    }

    public function negative_case_for_add_tiers($name, $upperbound, $multiplier, $giftcoupon, $option)
    {
    	$I = $this;
      $I->amGoingTo('Ad Tiers');
      $I->wait(5);
      $I->click('Settings');
      $I->wait(4);
      $I->click('Tier Program');
      $I->wait(5);
      $I->click('Tiers');
      $I->wait(10);
   		$I->click('Add New Tier');
   		$I->waitForElementVisible('#name',5);
   		$I->click('Submit');
   		$I->wait(5);
   		$I->BuzzyDoc_validations('check required validation for tier name', '#name' , 'required', 'true', 'verified validation for  tier name');
   		$I->BuzzyDoc_validations('check maximum length validation for tier name', '#name' , 'maxlength', 255, 'verified maximum length validation for  tier name');
   		$I->fillField('#name', $name);
   		$I->click('Submit');
   		$I->waitForElementVisible('#upperbound', 5);
   		$I->BuzzyDoc_validations('check required validation for upperbound value', '#upperbound' , 'required', 'true', 'verified validation for  upperbound value');
   		$I->BuzzyDoc_validations('check minimum value validation for upperbound value', '#upperbound' , 'min', 0, 'verified maximum length validation for  upperbound value');
   		$I->fillField('#upperbound', $upperbound);
   		$I->click('Submit');
   		$I->waitForElementVisible('#multiplier', 5);
   		$I->BuzzyDoc_validations('check required validation for multiplier value', '#multiplier' , 'required', 'true', 'verified validation for  multiplier value');
   		$I->BuzzyDoc_validations('check minimum value validation for multiplier value', '#multiplier' , 'min', 0, 'verified maximum length validation for  multiplier value');
   		$I->fillField('#multiplier', $multiplier);
      $I->selectOption("select[class=form-control]", $giftcoupon);
   		$I->waitForElementVisible(Locator::find('button', ['class' => 'btn btn-primary']));
   		$I->click('Submit');
   		$I->wait(5);

        //view

      $I->wait(5);
      $I->amGoingTo('view tiers');
      $I->selectOption("select[name = DataTables_Table_0_length]", $option);
      $I->wait(5);
      $I->click(Locator::lastElement(Locator::find('a', ['class'=>'btn btn-xs btn-success'])));
      $I->wait(5);
      $I->see($name);
      $I->see($upperbound);
      $I->see($multiplier);
      $I->see($giftcoupon);
      $I->wait(5);
      $I->click('Back');
      $I->wait(5);
    }

    public function negative_case_for_edit_delete_tiers($name, $upperbound, $multiplier, $giftcoupon, $option)
    {
    	//Edit

    	$I = $this;
      $I->amGoingTo('edit tiers');
      $I->wait(5);
      $I->click('Settings');
      $I->wait(5);
      $I->click('Tier Program');
      $I->wait(5);
      $I->click('Tiers');
      $I->wait(5);
      $I->selectOption("select[name = DataTables_Table_0_length]", $option);
      $I->waitForElementVisible((Locator::find('a', ['class'=>'btn btn-xs btn-warning'])), 5);
   		$I->click(Locator::lastElement(Locator::find('a', ['class'=>'btn btn-xs btn-warning'])));
   		$I->waitForElementVisible('#name',5);
   		$I->BuzzyDoc_validations('check required validation for tier name', '#name' , 'required', 'true', 'verified validation for  tier name');
   		$I->BuzzyDoc_validations('check maximum length validation for tier name', '#name' , 'maxlength', 255, 'verified maximum length validation for  tier name');
   		$I->fillField('#name', $name);
   		$I->waitForElementVisible('#upperbound', 5);
   		$I->BuzzyDoc_validations('check required validation for upperbound value', '#upperbound' , 'required', 'true', 'verified validation for  upperbound value');
 
   		$I->fillField('#upperbound', $upperbound);
   		$I->waitForElementVisible('#multiplier', 5);
   		$I->BuzzyDoc_validations('check required validation for multiplier value', '#multiplier' , 'required', 'true', 'verified validation for  multiplier value');
   		$I->fillField('#multiplier', $multiplier);
      $I->selectOption("select[class=form-control]", $giftcoupon);
      $I->waitForElementVisible(Locator::find('button', ['class' => 'btn btn-primary']));
      $I->click(Locator::find('button', ['class' => 'btn btn-primary']));
      $I->wait(5);


      // Delete Tier

        $I->wait(2);
        $I->selectOption("select[name = DataTables_Table_0_length]", $option);
        $I->wait(5);   
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-sm btn-danger fa fa-trash-o fa-fh'])));//click on Delete button 
        $I->seeInPopup('Are you sure you want to delete');
        $I->wait(3);
        $I->cancelPopup();
        $I->wait(3);
 
    }

    public function negative_case_for_add_tier_perks($tier, $perk, $option)
    {
    	$I = $this;
      $I->amGoingTo('add tier perk');
      $I->wait(5);
      $I->click('Settings');
      $I->wait(5);
      $I->click('Tier Program');
      $I->wait(5);
      $I->click('Tier Perks');
      $I->waitForElementVisible(Locator::find('a', ['class' => 'btn btn-success']), 10);
   		$I->click('Add New Tier Perk');
   		$I->waitForElementVisible('#tier-id', 5);
   		$I->BuzzyDoc_validations('check required validation for tier name', '#tier-id' , 'required', 'true', 'verified validation for  tier name');
   		$I->selectOption('#tier-id', $tier);
   		$I->BuzzyDoc_validations('check required validation for perk', '#perk' , 'required', 'true', 'verified validation for  perk');
   		$I->fillField('#perk', $perk);
   		$I->waitForElementVisible(Locator::find('button', ['type'=> 'submit']));
   		$I->click('Submit');
   		$I->wait(5);

      //view

      $I->wait(5);
      $I->amGoingTo('view tier perk');
      $I->selectOption("select[name = DataTables_Table_0_length]", $option);
      $I->wait(5);
      $I->click(Locator::lastElement(Locator::find('a', ['class'=>'btn btn-xs btn-success'])));
      $I->wait(5);
      $I->see($tier);
      $I->see($perk);
      $I->waitForElementVisible(Locator::find('a', ['class'=>'btn btn-warning']));
      $I->click('Back');
      $I->wait(5);
    }

    public function negative_case_for_edit_delete_tier_perks($tier, $perk, $option)
    {
    	//Edit Tier Perks
      $I = $this;
      $I->amGoingTo('edit tier perk');
      $I->wait(10);
      $I->click('Settings');
      $I->wait(5);
      $I->click('Tier Program');
      $I->wait(5);
      $I->click('Tier Perks');
      $I->wait(5);
      $I->selectOption("select[name = DataTables_Table_0_length]", $option);
      $I->waitForElementVisible(Locator::find('a', ['class' => 'btn btn-success']),5);
   		$I->click(Locator::lastElement(Locator::find('a', ['class'=>'btn btn-xs btn-warning'])));
   		$I->waitForElementVisible('#tier-id', 5);
   		$I->BuzzyDoc_validations('check required validation for tier name', '#tier-id' , 'required', 'true', 'verified validation for  tier name');
   		$I->selectOption('#tier-id', $tier);
   		$I->BuzzyDoc_validations('check required validation for perk', '#perk' , 'required', 'true', 'verified validation for  perk');
   		$I->fillField('#perk', $perk);
   		$I->waitForElementVisible(Locator::find('button', ['type'=> 'submit']));
   		$I->click('Submit');
   		$I->wait(5);

      //Delete Tier Perks
      $I->wait(2);
      $I->selectOption("select[name = DataTables_Table_0_length]", $option);
      $I->wait(5);   
      $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-sm btn-danger fa fa-trash-o fa-fh'])));//click on Delete button 
      $I->seeInPopup('Are you sure you want to delete');
      $I->wait(3);
      $I->cancelPopup();
      $I->wait(3);

    }

    public function negative_case_for_tier_rewards($transaction_amount)
    {
    	$I = $this;
    	$I->amGoingTo('tier rewards');
    	$I->click(Locator::find('a', ['ng-click' => 'tabSwitch(2)']));
    	$I->waitForElementVisible(Locator::find('input' , ['ng-model' => 'request.amount']),5);
    	$I->waitForElementVisible('#tierSubmit', 5);
    	$I->click('#tierSubmit');
    	$I->BuzzyDoc_validations('check required validation for tier reward', Locator::find('input' , ['ng-model' => 'request.amount']) , 'required', 'true', 'verified validation for  tier name');
    	$I->fillField(Locator::find('input' , ['ng-model' => 'request.amount']), $transaction_amount);
    	$I->waitForElementVisible('#tierSubmit', 5);
    	$I->click('#tierSubmit');
    	$I->waitForText('Congrats!', 5);
    	$I->click('OK');
    	$I->wait(5);
    }

    public function positive_case_for_add_view_gift_coupons($description, $points, $expiry_duration, $option)
    {
    	//Add Gift Coupons

    	$I = $this;
    	$I->amGoingTo('add gift coupons');
      $I->wait(5);
      $I->click('Settings');
      $I->wait(5);
    	$I->click('Rewards');
    	$I->waitForText('Gift Coupons', 5);
    	$I->click('Gift Coupons');
    	$I->waitForText('Add Coupons', 5);
    	$I->click('Add Coupons');
    	$I->waitForElementVisible('#description', 5);
    	$I->fillField('#description', $description);
    	$I->waitForElementVisible('#points', 5);
    	$I->fillField('#points', $points);
    	$I->waitForElementVisible('#expiry-duration', 5);
    	$I->fillField('#expiry-duration', $expiry_duration);
    	$I->waitForElementVisible(Locator::find('button', ['type'=>'submit']), 5);
    	$I->click('Submit');
    	$I->wait(5);

    	//View Gift Coupons

   		$I->amGoingTo('view gift coupons');
   		$I->waitForElementVisible(Locator::find('a', ['class'=>'btn btn-xs btn-success']), 5);
      $I->selectOption("select[name = DataTables_Table_0_length]", $option);
   		$I->click(Locator::lastElement(Locator::find('a', ['class'=>'btn btn-xs btn-success'])));
   		$I->wait(5);
   		$I->see($description);
   		$I->see($points);
   		$I->see($expiry_duration);
   		$I->waitForElementVisible(Locator::find('a', ['class'=>'btn btn-warning']), 5);
   		$I->click('Back');
   		$I->wait(5);
    }

    public function positive_case_for_edit_delete_gift_coupons($description, $points, $expiry_duration, $option)
    {
    	//Edit Gift Coupans
    	$I = $this;
    	$I->amGoingTo('edit gift coupons');
      $I->wait(5);
      $I->click('Settings');
      $I->wait(5);
    	$I->click('Rewards');
    	$I->waitForText('Gift Coupons', 5);
    	$I->click('Gift Coupons');
    	$I->wait(5);
    	$I->click(Locator::find('a', ['href' => '/staging/gift-coupons']));
    	$I->wait(5);
      $I->selectOption("select[name = DataTables_Table_0_length]", $option);
      $I->wait(5);
   		$I->click(Locator::lastElement(Locator::find('a', ['class'=>'btn btn-xs btn-warning'])));
   		$I->wait(10);
   		$I->waitForElementVisible('#description', 5);
   		$I->fillField('#description', $description);
   		$I->waitForElementVisible('#points', 5);
   		$I->fillField('#points', $points);
   		$I->waitForElementVisible('#expiry-duration', 5);
   		$I->fillField('#expiry-duration', $expiry_duration);
   		$I->waitForElementVisible(Locator::find('button', ['type' =>'submit']), 5);
   		$I->click('Submit');
   		$I->wait(5);

   		//Delete Gift Coupans

 		  $I->selectOption("select[name = DataTables_Table_0_length]", $option);   
      $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-sm btn-danger fa fa-trash-o fa-fh'])));//click on Delete button 
      $I->seeInPopup('Are you sure you want to delete');
      $I->wait(3);
      $I->acceptPopup();
      $I->wait(3);
    }

    public function negative_case_for_add_gift_coupons($description, $points, $expiry_duration, $option)
    {
    	//Add Gift Coupons

    	$I = $this;
      $I->amGoingTo('add gift coupons');
      $I->wait(5);
      $I->click('Settings');
      $I->wait(5);
      $I->click('Rewards');
      $I->wait(5);
    	$I->click('Gift Coupons');
    	$I->wait(10);
    	$I->click('Add Coupons');
    	$I->wait(10);
    	$I->waitForElementVisible('#description', 10);
    	$I->BuzzyDoc_validations('check required validation for gift coupon description', '#description' , 'required', 'true', 'verified validation for  gift coupons  decription');
    	$I->fillField('#description', $description);
    	$I->waitForElementVisible(Locator::find('button', ['type'=>'submit']), 5);
    	$I->click('Submit');
    	$I->BuzzyDoc_validations('check required validation for gift coupon points', '#points' , 'required', 'true', 'verified validation for  gift coupons  points');
    	$I->BuzzyDoc_validations('check minimum value validation for gift coupon points', '#points' , 'min', 1, 'verified validation for  gift coupons  points');
    	$I->fillField('#points', $points);
    	$I->waitForElementVisible(Locator::find('button', ['type'=>'submit']), 5);
    	$I->click('Submit');
    	$I->BuzzyDoc_validations('check required validation for gift coupon expiry-duration', '#expiry-duration' , 'required', 'true', 'verified validation for  gift coupons  expiry-duration');
    	$I->BuzzyDoc_validations('check minimum value validation for gift coupon expiry-duration', '#expiry-duration' , 'min', 1, 'verified validation for  gift coupons  expiry-duration');
    	$I->fillField('#expiry-duration', $expiry_duration);
    	$I->waitForElementVisible(Locator::find('button', ['type'=>'submit']), 5);
    	$I->click('Submit');

      //View Gift Coupons

      $I->amGoingTo('view gift coupons');
      $I->waitForElementVisible(Locator::find('a', ['class'=>'btn btn-xs btn-success']), 5);
      $I->selectOption("select[name = DataTables_Table_0_length]", $option);
      $I->click(Locator::lastElement(Locator::find('a', ['class'=>'btn btn-xs btn-success'])));
      $I->wait(5);
      $I->see($description);
      $I->see($points);
      $I->see($expiry_duration);
      $I->waitForElementVisible(Locator::find('a', ['class'=>'btn btn-warning']), 5);
      $I->click('Back');
      $I->wait(5);
    }

    public function negative_case_for_edit_delete_gift_coupons($description, $points, $expiry_duration, $option)
    {
    	//Edit Gift Coupans
    	$I = $this;
      $I->amGoingTo('edit gift coupons');
      $I->wait(5);
      $I->click('Settings');
      $I->wait(5);
      $I->click('Rewards');
      $I->waitForText('Gift Coupons', 5);
      $I->click('Gift Coupons');
      $I->wait(5);
      $I->click(Locator::find('a', ['href' => '/staging/gift-coupons']));
      $I->wait(5);
      $I->selectOption("select[name = DataTables_Table_0_length]", $option);
      $I->wait(5);
   		$I->click(Locator::lastElement(Locator::find('a', ['class'=>'btn btn-xs btn-warning'])));
   		$I->wait(10);
   		$I->waitForElementVisible('#description', 5);
   		$I->BuzzyDoc_validations('check required validation for gift coupon description', '#description' , 'required', 'true', 'verified validation for  gift coupons  decription');
    	$I->fillField('#description', $description);
    	$I->BuzzyDoc_validations('check required validation for gift coupon points', '#points' , 'required', 'true', 'verified validation for  gift coupons  points');
    	$I->BuzzyDoc_validations('check minimum value validation for gift coupon points', '#points' , 'min', 1, 'verified validation for  gift coupons  points');
    	$I->fillField('#points', $points);
    	$I->BuzzyDoc_validations('check required validation for gift coupon expiry-duration', '#expiry-duration' , 'required', 'true', 'verified validation for  gift coupons  expiry-duration');
    	$I->BuzzyDoc_validations('check minimum value validation for gift coupon expiry-duration', '#expiry-duration' , 'min', 1, 'verified validation for  gift coupons  expiry-duration');
    	$I->fillField('#expiry-duration', $expiry_duration);
    	$I->waitForElementVisible(Locator::find('button', ['type'=>'submit']), 5);
    	$I->click('Submit');


    	//Delete Gift Coupons

      $I->wait(2);
      $I->selectOption("select[name = DataTables_Table_0_length]", $option);
      $I->wait(5);   
      $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-sm btn-danger fa fa-trash-o fa-fh'])));//click on Delete button 
      $I->seeInPopup('Are you sure you want to delete');
      $I->wait(3);
      $I->cancelPopup();
      $I->wait(3);
    }

    public function case_for_award_redeem_gift_coupons()
    {
    	$I = $this;
    	$I->amGoingTo('redeem gift coupons');
    	$I->click('Redeem');
    	$I->waitForElementVisible(Locator::find('a', ['ng-click' => 'RdmCtrl.tabSwitch(4)']), 5);
    	$I->click(Locator::find('a', ['ng-click' => 'RdmCtrl.tabSwitch(4)']));
    	$I->wait(10);
    	$I->click('#2');
    	$I->waitForText('Are you sure you want to award the gift coupon?' , 10);
    	$I->click('Yes');
    	$I->waitForText('Awarded Successfully', 10);
    	$I->click('OK');
    	$I->wait(10);
    	$I->click('Award Points');
    	$I->waitForElementVisible('#2', 5);
    	$I->click('#2');
    	$I->waitForText('Are you sure you want to redeem the gift coupon?', 10);
    	$I->click('Yes');
    	$I->waitForText('Awarded Successfully', 10);
    	$I->click('OK');
    	$I->wait(10);

    }
    public function case_for_manual_points($enterpoints, $description)
    {
    	$I = $this;
    	$I->amGoingTo('give manual points');
    	$I->click(Locator::find('a', ['ng-click' =>'tabSwitch(3)']));
    	$I->wait(5);
    	$I->makeScreenshot('Manual Points');
      $I->BuzzyDoc_validations('check required validation for points', Locator::find('input', ['ng-model' =>'request.points']) , 'required', 'true', 'verified validation for  points');
      $I->BuzzyDoc_validations('check minimum value validation for points', Locator::find('input', ['ng-model' =>'request.points']) , 'min', '1', 'verified validation for  points');
    	$I->fillField(Locator::find('input', ['ng-model' => 'request.points']), $enterpoints);
      $I->BuzzyDoc_validations('check required validation for description', Locator::find('input', ['ng-model' =>'request.points']) , 'required', 'true', 'verified validation for  description');
    	$I->fillField(Locator::find('textarea', ['ng-model' => 'request.description']), $description);
    	$I->wait(10);
    	$I->click('#manualSubmit');
    	$I->wait(5);


    }
}

<?php

use Codeception\Util\Locator;
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
class BuzzyUiTester extends \Codeception\Actor
{
    use _generated\BuzzyUiTesterActions;

   /**
    * Define custom actions here
    */



public function login($user, $password) {
    $I = $this;
    $I->wantTo('Login');
    $I->amOnPage('/');
    $I->fillField('#username', $user);
    $I->fillField('#password', $password);
    $I->click('Login');
    $I->waitForElementVisible('#search-patient-input',3);
       // $I->click('html body.gray-bg div.loginColumns.animated.fadeInDown div.row div.col-md-6 button.btn.btn-primary.block.full-width.m-b');
      //  $I->see('Users');
  //S      $I->seeInCurrentUrl('admin');
    
    //$I->click('//*[@id="page-wrapper"]/div[3]/div[3]/div[3]/div/div[2]/a');
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




    public function gift_coupon_issue($gift_coupon_id)
{
   $I = $this;
        $I->click(Locator::find('button', ['ng-class' => "getClass('/redeem')"]));
        $I->wait (2);
        $I->see('Redeem');
        $I->seeInCurrentUrl('users/dashboard#!/redeem');
        $I->click(Locator::find('a', ['ng-click' => "RdmCtrl.tabSwitch(4)"]));
        $I->wait (2);
        $I->click(Locator::find('button', ['id' => $gift_coupon_id]));
        $I->wait (2);
        $I->see('Are you sure you want to award the gift coupon?');
        $I->wait (2);
        $I->click('Yes');
        $I->wait (5);
        $I->click('OK');
  
}

public function gift_coupon_redemption()
{
   $I = $this;
        $I->click(Locator::find('button', ['class' => "btn btn-success btn-outline btn-md btn-block ng-binding"]));
        $I->wait (2);
        $I->see('Are you sure you want to redeem the gift coupon?');
        $I->wait (2);
        $I->click('Yes');
        $I->wait (5);
        $I->click('OK');
        $I->dontSee(Locator::find('button', ['class' => "btn btn-success btn-outline btn-md btn-block ng-binding"]));
        $I->wait(4);
        
  
}


public function gift_coupon_issue_neg($gift_coupon_id)
{
   $I = $this;
        $I->click(Locator::find('button', ['ng-class' => "getClass('/redeem')"]));
        $I->wait (2);
        $I->see('Redeem');
        $I->seeInCurrentUrl('users/dashboard#!/redeem');
        $I->click(Locator::find('a', ['ng-click' => "RdmCtrl.tabSwitch(4)"]));
        $I->wait (2);
        $I->click(Locator::find('button', ['id' => $gift_coupon_id]));
        $I->wait (2);
        $I->see('Are you sure you want to award the gift coupon?');
        $I->wait (2);
        $I->click('Cancel');
        $I->wait (5);
  
}

public function gift_coupon_redemption_neg()
{
   $I = $this;
        $I->click(Locator::find('button', ['class' => "btn btn-success btn-outline btn-md btn-block ng-binding"]));
        $I->wait (2);
        $I->see('Are you sure you want to redeem the gift coupon?');
        $I->wait (2);
        $I->click('Cancel');
        $I->wait (5);
       // $I->see(Locator::find('button', ['class' => "btn btn-success btn-outline btn-md btn-block ng-binding"]));
        $I->wait(4);
        
  
}



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

public function send_welcome_email()
{
   $I = $this;
   $I->click(Locator::find('button', ['class' => 'btn btn-sm btn-success']));
   $I->wait(5);
   $I->see('Welcome Email Sent');
   $I->click('OK');
   $I->wait(3);
  
}
    //Marketing flow
    public function marketing_promotions(){
        $I = $this;
        $I->see('users');
        $I->seeInCurrentUrl('users/dashboard#!/patient');
        $I->checkOption(Locator::firstElement(Locator::find('input', ['ng-model' => 'selectedpromo'])));
        $I->wait (2);
        $I->click(Locator::find('button', ['ng-click' => 'postPatientMgmt()']));
        $I->wait (2);
        $I->see('Are you sure you want to award the points?');
        $I->wait (2);
        $I->click('Yes');
        $I->wait (3);
        $I->see('The points have been awarded.');
        $I->wait (2);
        $I->click('OK');
        $I->see('Users');
        $I->seeInCurrentUrl('users/dashboard#!/patient');      
}


public function amazon_tango(){
        $I = $this;
        $I->click(Locator::find('button', ['ng-class' => "getClass('/redeem')"]));
        $I->wait (2);
        $I->see('Redeem');
        $I->seeInCurrentUrl('users/dashboard#!/redeem');
        $I->click(Locator::find('a', ['ng-click' => "RdmCtrl.tabSwitch(2)"]));
        $I->wait (2);
        $I->click(Locator::find('button', ['ng-click' => "RdmCtrl.walletCredits(instantReward.label)"]));
        $I->wait (2);
        $I->see('Are you sure?');
        $I->wait (2);
        $I->click('Yes');
        $I->wait (5);
        $I->click('OK');
}

public function review_rating($new_review, $searchInput, $pressEnter){
        $I = $this;
        
            $I->click('Action');
            $I->wait(3);
            $I->click('Request Review');
            $I->wait(3);
            $I->see('No Vendor Locations Exists.');
            $I->seeInCurrentUrl('users/dashboard#!/requestReview');
            $I->click('Settings');
            $I->wait(2);
            $I->click('Vendor Locations');
            $I->wait(2);
            $I->click('Add Vendor Location');
            $I->wait(2);
            $I->fillField('#address','Test Address');
            $I->fillField('#fb-url','https://www.facebook.com');
            $I->wait(3);
            $I->fillField('#google-url','https://www.gmail.com');
            $I->wait(3);
            $I->fillField('#yelp-url','https://www.yelp.com');
            $I->wait(3);
            $I->fillField('#ratemd-url','https://www.ratemd.com');
            $I->wait(3);
            $I->fillField('#healthgrades-url','https://www.healthgrades.com');
            $I->wait(3);
            $I->fillField('#hash-tag','Testing');
            $I->checkOption('Default Location');
            $I->click('Submit');
            $I->click(Locator::find('a', ['href' => '/staging/users/dashboard']));//click on dashboard
            $I->waitForElementVisible('#search-patient-input',3);
            $I->see('Search Patient');
            $I->seeInCurrentUrl('users/dashboard');
            $I->wait(1);//wait to start
            $I->fillField(Locator::find('input',['ng-model' => 'query']),$searchInput); //fill the value you want to serach
            $I->wait(2);
            if($pressEnter=='0'){
                $I->pressKey('#search-patient-input',WebDriverKeys::ENTER);}//for testing search using enter button
            else
              {$I->click('#search-patient-btn');}//testing serach using search button
              $I->wait(4);
            $I->click(Locator::elementAt('//table/tbody/tr', 1)); 
            $I->click('Action');
            $I->wait(3);
            $I->click('Request Review');
            $I->wait(3);
            $I->click(Locator::find('button', ['ng-click' => "Reviews.refreshVendor()"]));
            $I->wait(3);
            $I->click('Send Request');
        }


 public function negative_case_for_add_view_promotions($promotion_name, $description, $points, $frequency, $option)
   
    {
        $I = $this;
        $I->amGoingTo('Add Promotions');
        $I->wait(3);
        $I->click('Settings');
        $I->wait(3);
        $I->click('Vendor Promotions');
        $I->wait(4);
        $I->click('Add Promotions');
        $I->wait(2);
        $I->click('Submit');
        $I->wait(3);
        $I->BuzzyDoc_validations('check required validation for promotion name', '#name', 'required', 'true', 'verified validation for promotion name');
        $I->fillField('#name', $promotion_name);
        $I->click('Submit');
        $I->wait(3);
        $I->BuzzyDoc_validations('check required validation for description', '#description', 'required', 'true', 'verified validation for description');
        $I->fillField('#description', $description);
        $I->click('Submit');
        $I->BuzzyDoc_validations('check required validation for points', '#points', 'required', 'true', 'verified validation for points');
        $I->BuzzyDoc_validations('check minimum value validation for points', '#points', 'min', 1, 'verified minimum value validation for points');
        $I->BuzzyDoc_validations('check integer value validation for points', '#points', 'type', 'number' , 'verified integer value validation for points');
        $I->fillField('#points', $points);
        $I->click('Submit');
        $I->BuzzyDoc_validations('check required validation for frequency', '#frequency', 'required', 'true', 'verified validation for points');
        $I->BuzzyDoc_validations('check minimum value validation for frequency', '#frequency', 'min', 0, 'verified minimum value validation for points');
        $I->BuzzyDoc_validations('check integer value validation for frequency', '#frequency', 'type', 'number' , 'verified integer value validation for points');
        $I->fillField('#frequency', $frequency);
        $I->click('Submit');
        $I->wait(3);
        $I->selectOption("select[name = DataTables_Table_0_length]", $option);
        $I->seeCheckboxIsChecked(Locator::lastElement(Locator::find('input', ['type' => 'checkbox'])));

        //View Method
         $I->wait(4);
         $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-success'])));
         $I->wait(5);
         $I->see($promotion_name);
         $I->see($description);
         $I->see($points);
         $I->see($frequency);
         $I->wait(3);
         $I->click('Back');
    }

    public function negative_case_for_edit_delete_vendor_promotions($points, $option)
    {
        //Edit

        $I = $this;
        $I->amGoingTo('Edit Vendor Promotions');
        $I->wait(3);
        $I->click('Settings');
        $I->wait(4);
        $I->click('Vendor Promotions');
        $I->wait(3);
        $I->selectOption("select[name = DataTables_Table_0_length]", $option);
        $I->wait(3);
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-warning edit'])));
        $I->wait(5);
        $I->BuzzyDoc_validations('check disabled validation for promotion name ','#promotion-id','disabled','true','disabled validation verified for promotion name');
        $I->BuzzyDoc_validations('check required validation for points', '#points', 'required', 'true', 'verified validation for points');
        $I->BuzzyDoc_validations('check minimum value validation for points', '#points', 'min', 1, 'verified minimum value validation for points');
        $I->BuzzyDoc_validations('check integer value validation for points', '#points', 'type', 'number' , 'verified integer value validation for points');
        $I->fillField('#points', $points);
        $I->click('Submit');

        //Delete
        $I->wait(3);
        $I->selectOption("select[name = DataTables_Table_0_length]", $option);
        $I->wait(3);
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-sm btn-danger fa fa-trash-o fa-fh'])));//click on Delete button in Vendor Promotions
        $I->wait(3);
        $I->seeInPopup('Are you sure you want to delete');
        $I->wait(3);
        $I->cancelPopup();
        $I->wait(3);

    }

    public function positive_case_for_add_view_promotions($promotion_name, $description, $points, $frequency, $option)
    {
        //Add method

        $I = $this;
        $I->amGoingTo('Add Promotions');
        $I->wait(3);
        $I->click('Settings');
        $I->wait(4);
        $I->click('Vendor Promotions'); //Promotions
        $I->wait(4);
        $I->click(Locator::find('a', ['class' => 'btn btn-success']));
        // $I->waitForElementVisible('#name', 4);
        $I->wait(4);
        $I->seeInCurrentUrl('promotions/add');
        $I->wait(3);
        $I->fillField('#name', $promotion_name);
        $I->fillField("#description", $description);
        $I->fillField("#points", $points);
         $I->fillField("#frequency", $frequency);
        $I->click('Submit');
        $I->wait(5);
        $I->see('Vendor Promotions');
        $I->seeInCurrentUrl('vendor-promotions');
        $I->wait(3);
        $I->selectOption("select[name = DataTables_Table_0_length]", $option);
        $I->seeCheckboxIsChecked(Locator::lastElement(Locator::find('input', ['type' => 'checkbox'])));

        //View Method
         $I->wait(4);
         $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-success'])));
         $I->wait(5);
         $I->see($promotion_name);
         $I->see($description);
         $I->see($points);
         $I->see($frequency);
         $I->wait(3);
         $I->click('Back');


    }
    public function positive_case_for_edit_delete_promotions($points, $option)
    {
        //Edit method

        $I = $this;
        $I->amGoingTo('Edit Vendor Promotions');
        $I->wait(3);
        $I->click('Settings');
        $I->wait(4);      
         $I->click('Vendor Promotions'); //Vendor Promotions
        $I->wait(3);
        $I->selectOption("select[name = DataTables_Table_0_length]", $option);
        $I->wait(4);
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-warning edit'])));
        $I->fillField("#points", $points);
        $I->wait(4);
        $I->click('Submit');
        $I->wait(5);
        $I->see('Vendor Promotions');
        $I->seeInCurrentUrl('vendor-promotions');
        $I->see($points);

        // Delete Vendor

        $I->wait(2);
        $I->selectOption("select[name = DataTables_Table_0_length]", $option);
        $I->wait(5);  
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-sm btn-danger fa fa-trash-o fa-fh'])));//click on Delete button in Vendor Promotions
        $I->wait(3);
        $I->seeInPopup('Are you sure you want to delete');
        $I->wait(3);
        $I->acceptPopup();
        $I->wait(3);
    
    }

    public function positive_vendor_promotions_checkboxChecked_edit($points)
    {
        $I = $this;
        $I->amGoingTo('Edit Vendor Promotions');
        $I->wait(3);
        $I->click('Settings');
        $I->wait(4);      
         $I->click('Vendor Promotions'); //Vendor Promotions
        $I->wait(4);
        $I->checkOption("/descendant::input[@type='checkbox'][2]");
        $I->wait(4);
        $I->seeCheckboxIsChecked("/descendant::input[@type='checkbox'][2]");
        $I->wait(4);
        $I->click(Locator::elementAt(Locator::find('a', ['class' => 'btn btn-xs btn-warning edit']),2));
        $I->wait(4);
        $I->fillField("#points", $points);
        $I->wait(4);
        $I->click('Submit');
        $I->wait(5);
        $I->see('Vendor Promotions');
        $I->seeInCurrentUrl('vendor-promotions');
        $I->see($points);
        $I->wait(2);
        $I->uncheckOption("/descendant::input[@type='checkbox'][2]");
        $I->wait(4);
        $I->dontSeeCheckboxIsChecked("/descendant::input[@type='checkbox'][2]");
        $I->wait(4);

    }

    public function add_creditCardCharge($cardNum, $expiryDate, $cvv, $firstNameID, $lastNameID, $countryID, $zipID, $billingAddressID, $cityID, $stateID, $phonenumberID)
    {
        $I = $this;
        $I->amGoingTo('Add Credit Card');
        $I->wait(3);
        $I->click('Settings');
        $I->wait(4);
        $I->click('Credit Card Management');
        $I->wait(5);
        //$I->waitForElementVisible(Locator::find('a', ['href' => '/buzzyadmin/authorize-net-profiles']), 10);
        $I->click('Payment');
        $I->wait(5);
        //$I->waitForText("You have no payment card setup. Please click the button below to add the card.", 20);
        $I->see("You have no payment card setup. Please click the button below to add the card.");
        $I->waitForElementVisible(Locator::find('input', ['value' => 'Add New Payment Details']),8);
        $I->click("Add New Payment Details");
        $I->wait(5);
        $I->fillField('#cardNum', $cardNum);
        $I->fillField('#expiryDate', $expiryDate);
        $I->fillField('#cvv', $cvv);
        $I->fillField('#firstNameID', $firstNameID);
        $I->fillField('#lastNameID' , $lastNameID);
        //$I->fillField('#countryID', $countryID);
        $I->selectOption("select[id=countryID]", $countryID);
        $I->fillField('#zipID', $zipID);
        $I->fillField('#billingAddressID', $billingAddressID);
        $I->fillField('#cityID', $cityID);
        $I->fillField('#stateID', $stateID);
        $I->fillField('#phonenumberID', $phonenumberID);
        $I->click('#saveBtn');
        $I->wait(5);
        $I->click('#btnContinue');
        $I->wait(5);

    }

    public function edit_credictCardSetUp($cvv, $phonenumberID)
    {
       $I = $this;
        $I->amGoingTo('Edit Credit Card');
        $I->wait(3);
        $I->click('Settings');
        $I->wait(4);
        $I->click('Credit Card Management');
        $I->wait(5);
        //$I->waitForElementVisible(Locator::find('a', ['href' => '/buzzyadmin/authorize-net-profiles']), 10);
        $I->click('Payment');
        $I->wait(5);
        //$I->waitForText("You have no payment card setup. Please click the button below to add the card.", 20);
        $I->click(Locator::find('input', ['value' => 'Edit Payment Details']));
        $I->wait(5);
        //$I->fillField('#cvv', $cvv);
        $I->fillField('#phonenumberID', $phonenumberID);
        $I->wait(5);
        $I->click('#saveBtn');
        $I->wait(5);
        $I->see('Your information has been saved.');
        $I->click('#btnContinue');
        $I->wait(5);
    }



public function Search($searchInput,$option,$status_check,$pressEnter)
    {
      $I = $this;
      $I->maximizeWindow();//for phantonjs
      $I->click(Locator::find('a', ['href' => '/buzzyadmin/users/dashboard']));//click on dashboard
      $I->waitForElementVisible('#search-patient-input',3);
      $I->see('Search Patient');
      $I->seeInCurrentUrl('users/dashboard');
      $I->wait(1);//wait to start
      $I->fillField(Locator::find('input',['ng-model' => 'query']),$searchInput); //fill the value you want to serach 
      $I->wait(2);
      if($status_check=='0');//for testing the raadio buttons 
        {$I->checkOption($option);}
      if($pressEnter=='0'){ 
        $I->pressKey('#search-patient-input',WebDriverKeys::ENTER);}//for testing search using enter button
      else
      {$I->click('#search-patient-btn');}//testing serach using search button
      $I->wait(4);

        
    }
    public function Search_negative($searchInput,$option,$status_check,$pressEnter)
    {
        $I = $this;
        $I->maximizeWindow();//for phantomjs
        $I->click(Locator::find('a', ['href' => '/buzzyadmin/users/dashboard']));//click dashboard
        $I->waitForElementVisible('#search-patient-input',3);
        $I->see('Search Patient');
        $I->seeInCurrentUrl('users/dashboard');
        $I->wait(1);//wait to start 
        $I->fillField('#search-patient-input',$searchInput);//fill the value you want to to search
        if($status_check=='0')//for testing the radio buttons i.e phone , email, card, all
          {$I->checkOption($option);
          }
        if($pressEnter=='0')
          { $I->pressKey('#search-patient-input',WebDriverKeys::ENTER);}//for testing the serach functionality using enter button 
        else
        {$I->click('#search-patient-btn');}//testing the serach functionality using search button 
         $I->see('Kindly enter a value to search');
         $I->wait(4);//wait before starting the next function
    }


    public function staffhistory($start_date,$end_date,$find,$dontsee)
{
   $I = $this;
   $I->click('Reports');
   $I->waitForElementVisible(Locator::find('a', ['href' => '/buzzyadmin/reports/staffreport']),4);
   $I->click(Locator::find('a', ['href' => '/buzzyadmin/reports/staffreport']));
   $I->waitForElementVisible(Locator::find('button', ['class' => 'btn btn-primary']),5);
   $I->see('Staff History');
   $I->see('Redeemer Name');

// search box

   $I->fillField(Locator::find('input', ['class' => 'form-control input-sm']),$find);//tier awards
   $I->wait(5);
   //$I->dontSee('Promotion Award');//promotion awards*/
   /*$xpath=Locator::elementAt('/html/body/div[2]/div/div[3]/div[1]/div/div/div/div[2]/div/div/table/tfoot/tr/th[1]/select', 2);
      codecept_debug($xpath);
   $I->selectOption($xpath, 'User 3 Best vendor');
   $I->dontSee('Best v user User');
*/
//Date range
   $I->click(Locator::find('input', ['class' => 'form-control']));//for date filter
   $I->see('Apply');
   $I->see('Cancel');
   $I->fillField(Locator::find('input', ['name' => 'daterangepicker_start']),$start_date);
   $I->fillField(Locator::find('input', ['name' => 'daterangepicker_end']),$end_date);
   $I->click(Locator::find('button', ['class' => 'applyBtn btn btn-small btn-sm btn-success']));
   $I->click(Locator::find('button', ['class' => 'btn btn-primary']));
   $I->$I->dontSee('Awarded');
}


    public function activityhistory($plan_id)
    {

        $I = $this;
        $I->click('Activity History');
        $I->waitForElementVisible(Locator::find('a', ['ng-click' => 'History.tabSwitch(1)']),4);
        if($plan_id=='1')
        {
            $I->see('Reviews & Ratings');
            $I->see('review');
            $I->see('rating');
            $I->click(Locator::find('a', ['ng-click' => 'History.tabSwitch(3)']));
            $I->see('Redeemptions');
            $I->see('In house');
            $I->see('Custom Gift Card');


        }
        elseif($plan_id=='2')
        {
            $I->wait(1);
            $I->see('Reviews & Ratings');
            $I->see('review');
            $I->see('rating');
            $I->click(Locator::find('a', ['ng-click' => 'History.tabSwitch(2)']));
            $I->see('Marketing Flow');
            $I->see('1');
            $I->click(Locator::find('a', ['ng-click' => 'History.tabSwitch(3)']));
            $I->see('Redeemptions');
            $I->see('In house');
            $I->see('Custom Gift Card');
            $I->click(Locator::find('a', ['ng-click' => 'History.tabSwitch(5)']));
            $I->see('Compliance Survey');
           // $I->see('In house');
            //$I->see('Custom Gift Card');
            $I->click(Locator::find('a', ['ng-click' => 'History.tabSwitch(6)']));
            $I->see('Manual Points');
            $I->see('1');
        }
        else
        {
            $I->wait(1);
            $I->see('Reviews & Ratings');
            $I->see('review');
            $I->see('rating');
            $I->click(Locator::find('a', ['ng-click' => 'History.tabSwitch(2)']));
            $I->see('Marketing Flow');
            $I->see('1');
            $I->click(Locator::find('a', ['ng-click' => 'History.tabSwitch(3)']));
            $I->see('Redeemptions');
            $I->see('In house');
            $I->see('Custom Gift Card');
            $I->click(Locator::find('a', ['ng-click' => 'History.tabSwitch(5)']));
            $I->see('Compliance Survey');
           // $I->see('In house');
            //$I->see('Custom Gift Card');
            $I->click(Locator::find('a', ['ng-click' => 'History.tabSwitch(6)']));
            $I->see('Manual Points');
            $I->see('1');
            $I->click(Locator::find('a', ['ng-click' => 'History.tabSwitch(4)']));
            $I->see('Tiers');
            $I->see('1');
            $I->click(Locator::find('a', ['ng-click' => 'History.tabSwitch(7)']));
            $I->see('Gift Coupons');
            $I->see('Issued');
        }
    }

// vendor survey questions

    public function vendor_survey_questions()
{
   $I = $this;
   $I->click(Locator::find('a', ['href' => '/buzzyadmin/vendor-survey-questions']));
   $I->waitForElementVisible(Locator::find('input', ['class' => 'form-control index changepoints']),4);
   $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-warning'])));
  // $I->waitForElementVisible('#input-points',3);
   $I->fillField('#input-points', 2);
   $I->wait(9);
   $I->click(Locator::find('button', ['class' => 'btn btn-primary']));
   $I->wait(4);
   $I->seeInField(Locator::lastElement(Locator::find('input', ['class' => 'form-control index changepoints'])),'2');
   $I->wait(5);
   $I->fillField(Locator::firstElement(Locator::find('input', ['class' => 'form-control index changepoints'])),78);
   $I->pressKey(Locator::firstElement(Locator::find('input', ['class' => 'form-control index changepoints'])),WebDriverKeys::ENTER);
   $I->wait(10);
   $I->seeInField(Locator::firstElement(Locator::find('input', ['class' => 'form-control index changepoints'])),'78');
   }






//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Super admin finctions

   public function questions_crud_add($text,$type,$frequency,$pointsforquestions)
{
   $I = $this;
   $I->click('Questions');
   $I->wait(2);
   $I->click(Locator::find('a', ['href' => '/buzzyadmin/questions/add']));
   $I->waitForElementVisible('#text',4);
   $I->fillField('#text', $text);
   $I->selectOption('#question-type-id', $type);
   $I->fillField('#frequency', $frequency);
   $I->fillField('#points',$pointsforquestions);
   $I->click('Submit');
  // $I->waitForElementVisible(Locator::find('a', ['href' => '/buzzyadmin/questions/add']));
   $I->wait(3);
}

public function questions_crud_view($see1,$see2)
{
   $I = $this;
   $I->click('Questions');
   $I->wait(2);
   $I->click(Locator::find('a', ['href' => '/buzzyadmin/questions']));
  // $I->waitForElementVisible(Locator::find('a', ['href' => '/buzzyadmin/questions/add']),4);
   $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-success'])));
   $I->wait(3);
   $I->see($see1);
   $I->see($see2);
   $I->click('Back');
   //$I->waitForElementVisible(Locator::find('a', ['href' => '/buzzyadmin/questions/add']));
   $I->wait(3);
}

public function questions_crud_edit($text,$pointsedit)
{
   $I = $this;
   $I->click('Questions');
   $I->wait(2);
   $I->click(Locator::find('a', ['href' => '/buzzyadmin/questions']));
  // $I->waitForElementVisible(Locator::find('a', ['href' => '/buzzyadmin/questions/add']),4);
   $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-warning'])));
   $I->waitForElementVisible('#text',4);
   $I->fillField('#text', $text);
   $I->fillField('#points',$pointsedit);
   $I->click('Submit');
   $I->wait(3);
   //$I->waitForElementVisible(Locator::find('a', ['href' => '/buzzyadmin/questions/add']));
   $I->see($text);
   $I->see($pointsedit);
   $I->wait(3);
}

public function questions_crud_delete($text)
{
   $I = $this;
   $I->click('Questions');
   $I->wait(2);
   $I->click(Locator::find('a', ['href' => '/buzzyadmin/questions']));
  // $I->waitForElementVisible(Locator::find('a', ['href' => '/buzzyadmin/questions/add']),4);
   $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-sm btn-danger fa fa-trash-o fa-fh'])));
   $I->wait(3);
   $I->acceptPopup();
   $I->wait(3);
   $I->dontSee($text);
   $I->wait(3);
}



public function questions_crud_add_negative($text,$type,$frequency,$pointsforquestions)
{
   $I = $this;
   $I->click('Questions');
   $I->wait(2);
   $I->click(Locator::find('a', ['href' => '/buzzyadmin/questions/add']));
   $I->waitForElementVisible('#text',4);
   $I->click('Submit');
   $I->BuzzyDoc_validations('Required validation verified for question','#text','required','true','Required validation verified for question');
   $I->fillField('#text', $text);
   $I->click('Submit');
   $I->BuzzyDoc_validations('Required validation verified for question-type-id','#question-type-id','required','true','Required validation verified for question-type-id');
   
   $I->BuzzyDoc_validations('Required validation verified for frequency','#frequency','required','true','Required validation verified for frequency');
   $I->BuzzyDoc_validations('type validation verified for frequency','#frequency','type','number','type validation verified for frequency');
   $I->BuzzyDoc_validations('min validation verified for frequency','#frequency','min','1','min validation verified for frequency');
   $I->fillField('#frequency',$frequency);
   $I->click('Submit');
   $I->BuzzyDoc_validations('required validation verified for points','#points','required','true','required validation verified for points');
   $I->BuzzyDoc_validations('type validation verified for points','#points','type','number','type validation verified for points');
   $I->BuzzyDoc_validations('min validation verified for points','#points','min','1','min validation verified for points');
   $I->click('Cancel');
   $I->wait(3);

}

public function questions_crud_edit_negative($text,$frequency,$pointsedit)
{
   $I = $this;
   $I->click('Questions');
   $I->wait(2);
   $I->click(Locator::find('a', ['href' => '/buzzyadmin/questions']));
  // $I->waitForElementVisible(Locator::find('a', ['href' => '/buzzyadmin/questions/add']),4);
   $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-warning'])));
   $I->fillField('#text','');
   $I->fillField('#frequency', '');
   $I->fillField('#points','');
   $I->click('Submit');

   $I->BuzzyDoc_validations('Required validation verified for question','#text','required','true','Required validation verified for question');
   $I->fillField('#text', $text);
   $I->click('Submit');
   $I->BuzzyDoc_validations('Required validation verified for question-type-id','#question-type-id','required','true','Required validation verified for question-type-id');
   
   $I->BuzzyDoc_validations('Required validation verified for frequency','#frequency','required','true','Required validation verified for frequency');
   $I->BuzzyDoc_validations('type validation verified for frequency','#frequency','type','number','type validation verified for frequency');
   $I->BuzzyDoc_validations('min validation verified for frequency','#frequency','min','1','min validation verified for frequency');
   $I->fillField('#frequency',$frequency);
   $I->click('Submit');

   $I->BuzzyDoc_validations('required validation verified for points','#points','required','true','required validation verified for points');
   $I->BuzzyDoc_validations('type validation verified for points','#points','type','number','type validation verified for points');
   $I->BuzzyDoc_validations('min validation verified for points','#points','min','1','min validation verified for points');
   $I->fillField('#points', $pointsedit);

   $I->click('Cancel');
   $I->wait(3);
   $I->wait(3);
}

public function questions_crud_delete_negative($text)
{
   $I = $this;
   $I->click('Questions');
   $I->wait(2);
   $I->click(Locator::find('a', ['href' => '/buzzyadmin/questions']));
  // $I->waitForElementVisible(Locator::find('a', ['href' => '/buzzyadmin/questions/add']),4);
   $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-sm btn-danger fa fa-trash-o fa-fh'])));
   $I->wait(3);
   $I->cancelPopup();
   $I->wait(3);
   $I->see($text);
   $I->wait(3);
}


//Validation Function
      public function BuzzyDoc_validations($desc,$input, $attribute,$expected,$message)
    {
        $I = $this;

        $I->amGoingTo($desc);
        $temp= $I->grabAttributeFrom($input, $attribute);
        codecept_debug($temp);
        $I->assertEquals($expected, $temp, $message);
        

    }
     public function redemptions($redemption_status)
    {
      $I = $this;
        $I->click('Reports');
        $I->wait(3);
        $I->click('Redemptions');
        $I->wait(3);
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-warning'])));
        $I->wait(1);
        $I->selectOption('form select[name=legacy_redemption_status_id]', $redemption_status);
        $I->click('Submit');
        $I->wait(1);
        $I->seeInCurrentUrl('legacy-redemptions');
        $I->wait(3);
    }

     public function redemptions_bulkUpdate($redemption_status, $id)
    {
      $I = $this;
        $I->click('Reports');
        $I->wait(3);
        $I->click('Redemptions');
        $I->wait(3);
        $I->checkOption(Locator::lastElement(Locator::find('input', ['name' => 'selected_redemptions'])));
        // $I->checkOption(Locator::elementAt('//table/tbody/tr/td',2));
        $I->wait(10);
        $I->selectOption(Locator::find('select',['redemption_id'=>$id]), $redemption_status);
        $I->wait(1);
        $I->seeInCurrentUrl('legacy-redemptions');
        $I->wait(3);
    }

    public function positive_add_vendor_email_setting($layout, $template, $event, $subject, $body, $status)
    {
        $I = $this;
        $I->click('Settings');
        $I->wait(3);
        $I->click('Vendor Email Settings');
        $I->wait(2);
        $I->click('Add Vendor Email');
        $I->wait(2);
        $I->selectOption('form select[name=email_layout_id]', $layout);
        $I->wait(2);
        $I->selectOption('form select[name=email_template_id]', $template);
        $I->wait(2);
        $I->selectOption('select#event-id', $event);
        $I->wait(2);
        $I->fillField('#subject',$subject); 
        $x = $I->grabAttributeFrom('//iframe', 'id');
        $I->switchToIframe($x); 
        $I->fillField('#tinymce', $body);
        $I->wait(2);
        $I->switchToIframe();
        $I->wait(3);
        $I->click('Submit');
        $I->wait(3);
        $I->seeInCurrentUrl('vendor-email-settings');
        
    }

    public function positive_edit_vendor_email_setting($layout, $template, $event, $subject, $body, $status)
    {
        $I = $this;
        $I->wait(4);
        $I->click('Settings');
        $I->wait(3);
        $I->click('Vendor Email Settings');
        $I->wait(2);
        $I->click(Locator::find('a', ['href' => '/staging/vendor-email-settings'])); //Edit Vendor Email Settings  
        $I->wait(4);
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-warning']))); 
        $I->wait(4);  
        $I->selectOption('form select[name=email_layout_id]', $layout);
        $I->wait(2);
        $I->selectOption('form select[name=email_template_id]', $template);
        $I->wait(2);
        $I->selectOption('select#event-id', $event);
        $I->wait(2);
        $I->fillField('#subject',$subject); 
        $x = $I->grabAttributeFrom('//iframe', 'id');
        $I->switchToIframe($x); 
        $I->fillField('#tinymce', $body);
        $I->wait(2);
        $I->switchToIframe();
        $I->wait(3);
        $I->click('Submit');
        $I->wait(3);
        $I->seeInCurrentUrl('vendor-email-settings');
    }

    public function positive_view_vendor_email_setting()
    {
        $I = $this;
        $I->wait(4);
        $I->click('Settings');
        $I->wait(3);
        $I->click('Vendor Email Settings');
        $I->wait(2);
        $I->click(Locator::find('a', ['href' => '/staging/vendor-email-settings'])); //View Vendor Email Settings
        $I->wait(4);
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-success'])));   
        $I->wait(3);
        $I->click('Back');
        $I->seeInCurrentUrl('vendor-email-settings');
    }

    public function positive_delete_vendor_email_setting()
    {
        $I = $this;
        $I->wait(4);
        $I->click('Settings');
        $I->wait(3);
        $I->click('Vendor Email Settings');
        $I->wait(2);
        $I->click(Locator::find('a', ['href' => '/staging/vendor-email-settings'])); //Delete Vendor Email Settings
        $I->wait(4);
        $I->click(Locator::elementAt(Locator::find('a', ['class' => 'btn btn-sm btn-danger fa fa-trash-o fa-fh']),-1));
        $I->wait(2);
        $I->seeInPopup('Are you sure you want to delete');
        $I->wait(3);
        $I->acceptPopup();  
    }

    public function negative_add_vendor_email_setting($layout, $template, $event, $subject, $body, $status)
    {
        $I = $this;
        // $I->wait(4);
        $I->click('Settings');
        $I->wait(3);
        $I->click('Vendor Email Settings');
        $I->wait(2);
        $I->click('Add Vendor Email');
        $I->wait(2);
        $I->click('Submit');
        $I->selectOption('form select[name=email_layout_id]', $layout);
        $I->click('Submit');
        $I->selectOption('form select[name=email_template_id]', $template);
        $I->click('Submit');
        $I->BuzzyDoc_validations('required validation verified for event id ','#event-id','required','true','required validation verified for event id ');
        $I->click('Submit');
        $I->selectOption('select#event-id', $event);
        $I->click('Submit');
        $I->BuzzyDoc_validations('required validation verified for subject ','#subject','required','true','required validation verified for subject');
        $I->click('Submit');
        $I->wait(4);
        $I->fillField('#subject',$subject);
        $I->click('Submit');
        $I->wait(4); 
        $I->see('This field cannot be left empty');
        $I->click('Cancel');

    }

    public function negative_edit_vendor_email_setting()
    {
        $I = $this;
        $I->wait(4);
        $I->click('Settings');
        $I->wait(3);
        $I->click('Vendor Email Settings');
        $I->wait(2);
        $I->click(Locator::find('a', ['href' => '/staging/vendor-email-settings'])); //Edit Vendor Email Settings  
        $I->wait(4);
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-warning']))); 
        $I->wait(4);
        $I->BuzzyDoc_validations('required validation verified for event id ','#event-id','required','true','required validation verified for event id ');


    }

    public function positive_add_referrals($vendorId, $referFrom, $referTo, $templateName, $subject, $description, $name, $phone )
    {
        $I = $this;
        $I->wait(4);
        /*$I->click('Reports');
        $I->wait(2);
        $I->click('Referred People');
        $I->click(Locator::find('a', ['href' => '/staging/referrals/add']));
        $I->wait(8);*/
        $I->amOnPage('/referrals/add');
        $I->selectOption('form select[name=vendor_id]', $vendorId);
        $I->wait(2);
        $I->fillField('#refer-from',$referFrom);
        $I->wait(2);
        $I->fillField('#refer-to',$referTo);
        $I->wait(2);
        $I->selectOption('form select[name=get_template_name]', $templateName); 
        $I->wait(2);
        $I->fillField('#subject',$subject);
        $I->wait(2);
        $I->fillField('#description',$description);
        $I->wait(2);
        $I->fillField('#name',$name);
        $I->wait(2);
        $I->fillField('#phone',$phone);
        $I->click('Submit');
        $I->wait(3);
        
    }

    public function positive_view_referrals()
    {
        $I = $this;
        // $I->wait(4);
        // $I->click('Reports');
        // $I->wait(3);
        // $I->click('Referral Settings');
        // $I->wait(2);
        // $I->click(Locator::find('a', ['href' => '/staging/referrals'])); //View Referrals
        // $I->wait(4);
        $I->amOnPage('/referrals');
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-success'])));   
        $I->wait(3);
        $I->click('Back');
        $I->seeInCurrentUrl('referrals');
    }

    public function negative_add_referrals($vendorId, $referFrom, $referTo, $templateName, $subject, $description, $name, $phone )
    {
        $I = $this;
        $I->wait(4);
        /*$I->click('Reports');
        $I->wait(2);
        $I->click('Referred People');
        $I->click(Locator::find('a', ['href' => '/staging/referrals/add']));
        $I->wait(8);*/
        $I->amOnPage('/referrals/add');
        $I->selectOption('form select[name=vendor_id]', $vendorId);
        $I->wait(2);
        $I->click('Submit');
        $I->BuzzyDoc_validations('required validation verified for refer from ','#refer-from','required','true','required validation verified for refer from ');
        $I->click('Submit');
        $I->fillField('#refer-from',$referFrom);
        $I->wait(2);
        $I->click('Submit');
        $I->BuzzyDoc_validations('required validation verified for refer from ','#refer-from','required','true','required validation verified for refer from ');
        $I->click('Submit');
        $I->fillField('#refer-to',$referTo);
        $I->wait(2);
        $I->click('Submit');
        $I->selectOption('form select[name=get_template_name]', $templateName); 
        $I->wait(2);
        $I->click('Submit');
        $I->BuzzyDoc_validations('required validation verified for subject ','#subject','required','true','required validation verified for subject');
        $I->click('Submit');
        $I->fillField('#subject',$subject);
        $I->click('Submit');
        $I->wait(2);
        $I->BuzzyDoc_validations('required validation verified for description ','#description','required','true','required validation verified for description');
        $I->click('Submit');
        $I->fillField('#description',$description);
        $I->click('Submit');
        $I->wait(2);
        $I->BuzzyDoc_validations('required validation verified for name ','#name','required','true','required validation verified for name');
        $I->click('Submit');
        $I->fillField('#name',$name);
        $I->wait(2);
        $I->click('Cancel');
        $I->wait(3);
        
    }

     public function positive_referral_leads($id, $referralSetting)
    {
      $I = $this;
      $I->wait(4);
      /*$I->click('Reports');
        $I->wait(2);
        $I->click('Referred Leads');
        $I->click(Locator::find('a', ['href' => '/staging/referral-leads']));
        $I->wait(2);*/
        $I->amOnPage('/referral-leads');
        $I->wait(3);
        $I->selectOption(Locator::find('select',['referral_lead_id'=>$id]), $referralSetting);
        $I->seeInCurrentUrl('referral-leads');
        $I->wait(3);
    }

    public function positive_view_referral_leads()
    {
        $I = $this;
        $I->wait(4);
        /*$I->click('Reports');
        $I->wait(2);
        $I->click('Referred Leads');
        $I->click(Locator::find('a', ['href' => '/staging/referral-leads']));
        $I->wait(2);*/
        $I->amOnPage('/referral-leads');
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-success'])));   
        $I->wait(3);
        $I->click('Back');
        $I->seeInCurrentUrl('referral-leads');
    }

    public function positive_delete_referral_leads()
    {
        $I = $this;
        $I->wait(4);
        /*$I->click('Reports');
        $I->wait(2);
        $I->click('Referred Leads');
        $I->click(Locator::find('a', ['href' => '/staging/referral-leads']));
        $I->wait(2);*/
        $I->amOnPage('/referral-leads');
        $I->wait(2);
        $I->click(Locator::elementAt(Locator::find('a', ['class' => 'btn btn-sm btn-danger fa fa-trash-o fa-fh']),-1));
        $I->wait(2);
        $I->seeInPopup('Are you sure you want to delete');
        $I->wait(3);
        $I->acceptPopup();  
    }

    public function positive_add_referral_templates($subject, $description)
    {
         $I = $this;
        $I->click('Settings');
        $I->wait(3);
        $I->click('Referrals');
        $I->wait(2);
        $I->amOnPage('/referral-templates/add');
        $I->seeInCurrentUrl('referral-templates/add');
        // $I->click('Add New Template');
        $I->wait(2);
        $I->fillField('#subject',$subject);
        $I->wait(2);
        $I->fillField('#description',$description); 
        $I->wait(2);
        $I->click('Submit');
        $I->wait(3);
        
    }

    public function positive_edit_referral_templates($subject, $description)
    {
        $I = $this;
        $I->wait(3);
        $I->click('Settings');
        $I->wait(3);
        $I->click('Referrals');
        $I->wait(2);
        $I->click(Locator::find('a', ['href' => '/staging/referral-templates'])); //Edit Referral Templates  
        $I->wait(4);
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-warning']))); 
        $I->wait(4);  
        $I->fillField('#subject',$subject);
        $I->wait(2);
        $I->fillField('#description',$description); 
        $I->wait(3);
        $I->click('Submit');
        $I->wait(3);
        $I->seeInCurrentUrl('referral-templates');
    }

     public function positive_view_referral_templates()
    {
        $I = $this;
        $I->wait(4);
        $I->click('Settings');
        $I->wait(3);
        $I->click('Referrals');
        $I->wait(2);
        $I->click(Locator::find('a', ['href' => '/staging/referral-templates'])); //View Vendor Email Settings
        $I->wait(4);
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-success'])));   
        $I->wait(3);
        $I->click('Back');
        $I->seeInCurrentUrl('referral-templates');
    }

    public function negative_add_referral_templates($subject, $description)
    {
        $I = $this;
        $I->click('Settings');
        $I->wait(3);
        $I->click('Referrals');
        $I->wait(2);
        $I->amOnPage('/referral-templates/add');
        $I->seeInCurrentUrl('referral-templates/add');
        // $I->click('Add New Template');
        $I->wait(2);
        $I->click('Submit');
        $I->BuzzyDoc_validations('required validation verified for subject ','#subject','required','true','required validation verified for subject');
        $I->click('Submit');
        $I->fillField('#subject',$subject);
        $I->click('Submit');
        $I->wait(2);
        $I->click('Submit');
        $I->BuzzyDoc_validations('required validation verified for description ','#description','required','true','required validation verified for description');
        $I->click('Submit');
        $I->fillField('#description',$description); 
        $I->wait(3);
        $I->click('Cancel');
        $I->wait(3);
        
    }

     public function negative_edit_referral_templates($subject, $description)
    {
        $I = $this;
        $I->click('Settings');
        $I->wait(3);
        $I->click('Referrals');
        $I->wait(2);
        $I->click(Locator::find('a', ['href' => '/staging/referral-templates'])); //Edit Referral Templates  
        $I->wait(2);
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-warning'])));
         $I->wait(2);
        $I->click('Submit');
        $I->BuzzyDoc_validations('required validation verified for subject ','#subject','required','true','required validation verified for subject');
        $I->click('Submit');
        $I->fillField('#subject',$subject);
        $I->click('Submit');
        $I->wait(2);
        $I->BuzzyDoc_validations('required validation verified for description ','#description','required','true','required validation verified for description');
        $I->click('Submit');
        $I->fillField('#description',$description); 
        $I->wait(3);
        $I->click('Cancel');
        $I->wait(3);
        
    }

    public function positive_add_referral_settings($referral_level_name, $referrer_award_points, $referree_award_points)
    {
        $I = $this;
        $I->click('Settings');
        $I->wait(3);
        $I->click('Referrals');
        $I->wait(2);
        $I->amOnPage('/vendor-referral-settings/add');
        $I->seeInCurrentUrl('vendor-referral-settings/add');
        $I->wait(2);
        $I->fillField('#referral-level-name',$referral_level_name);
        $I->wait(2);
        $I->fillField('#referrer-award-points',$referrer_award_points); 
        $I->wait(2);
        $I->fillField('#referree-award-points',$referree_award_points); 
        $I->wait(2);
        $I->click('Submit');
        $I->wait(3);
        
    }

    public function positive_edit_referral_settings($referral_level_name, $referrer_award_points, $referree_award_points)
    {
        $I = $this;
        $I->wait(4);
        $I->click('Settings');
        $I->wait(3);
        $I->click('Referrals');
        $I->wait(2);
        $I->click(Locator::find('a', ['href' => '/staging/vendor-referral-settings'])); //Edit Referral Templates  
        $I->wait(4);
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-warning']))); 
        $I->wait(2);
        $I->fillField('#referral-level-name',$referral_level_name);
        $I->wait(2);
        $I->fillField('#referrer-award-points',$referrer_award_points); 
        $I->wait(2);
        $I->fillField('#referree-award-points',$referree_award_points); 
        $I->wait(2);
        $I->click('Submit');
        $I->wait(3);
        
    }

    public function positive_view_referral_settings()
    {
        $I = $this;
        $I->wait(4);
        $I->click('Settings');
        $I->wait(3);
        $I->click('Referrals');
        $I->wait(2);
        $I->click(Locator::find('a', ['href' => '/staging/vendor-referral-settings'])); //View Vendor Email Settings
        $I->wait(4);
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-success'])));   
        $I->wait(3);
        $I->click('Back');
        $I->seeInCurrentUrl('vendor-referral-settings');
    }

    public function negative_add_referral_settings($referral_level_name, $referrer_award_points, $referree_award_points)
    {
        $I = $this;
        $I->wait(3);
        $I->click('Settings');
        $I->wait(3);
        $I->click('Referrals');
        $I->wait(2);
        $I->amOnPage('/vendor-referral-settings/add');
        $I->seeInCurrentUrl('vendor-referral-settings/add');
        $I->wait(2);
        $I->click('Submit');
        $I->BuzzyDoc_validations('required validation verified for referral-level-name ','#referral-level-name','required','true','required validation verified for referral-level-name');
        $I->click('Submit');
        $I->fillField('#referral-level-name',$referral_level_name);
        $I->click('Submit');
        $I->BuzzyDoc_validations('required validation verified for referrer-award-points ','#referrer-award-points','required','true','required validation verified for referrer-award-points');
        $I->click('Submit');
        $I->fillField('#referrer-award-points',$referrer_award_points);
        $I->click('Submit');
        $I->BuzzyDoc_validations('required validation verified for referree-award-points ','#referree-award-points','required','true','required validation verified for referree-award-points');
        $I->click('Submit');
        $I->fillField('#referree-award-points',$referree_award_points); 
        $I->wait(3);
        $I->click('Cancel');
        $I->wait(3);
        
    }

    public function Logout()
    {
        $I = $this;
        $I->wait(3);
       // $I->click('/html/body/div[2]/div/div[1]/nav/ul/li/a');
        $I->click('Logout');
        $I->waitForElementVisible('#password',3);
        $I->see('Our patients love the rewards program. ');
        $I->seeInCurrentUrl('users/login');

    }
}
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
class BuzzyDTester extends \Codeception\Actor
{
    use _generated\BuzzyDTesterActions;

   /**
    * Define custom actions here
    */





   public function login($user, $password) {
   	$I = $this;
    

	$I->wantTo('Login to super admin dashboard');
	$I->amOnPage('users/login');
	$I->fillField('#username', $user);
    $I->fillField('#password', $password);
    $I->click('Login');
    $I->wait(3);
       
   }



   public function BuzzyDoc_validations($desc,$input, $attribute,$expected,$message)
    {
    	$I = $this;

        $I->amGoingTo($desc);
        $temp= $I->grabAttributeFrom($input, $attribute);
        codecept_debug($temp);
        $I->assertEquals($expected, $temp, $message);
        

    }

    

public function Add_vendor($orgname,$mindeposit, $threshold,$lastname,$firstname,$email,$username,$password,$phone)
    {
      $I = $this;
      $I->wait(3);
       // $I->amOnPage('admin');
        $I->click('/html/body/div[2]/nav/div/ul/li[3]/a');//vendors
      //$I->wait(3);
        $I->click('Vendors');
        $I->wait(3);
        $I->click('/html/body/div[2]/nav/div/ul/li[3]/ul/li[2]/a'); //Add Vendors
      //  $I->click('Add Vendor');
        $I->see('Vendors');
        $I->seeInCurrentUrl('vendors/add');
        $I->wait(3);
        $I->fillField('#org-name', $orgname); //Vendor Organization Name
        $I->fillField('#min-deposit', $mindeposit); //Reward Template
        $I->fillField('#threshold-value', $threshold);
        $I->wait(1);
        //$I->seeCheckboxIsChecked('#checkbox[type=checkbox]'); 
       // $I->uncheckOption('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[10]/div/label/input[2]');
       // $I->dontSeeCheckboxIsChecked('#agree');
        $I->fillField('#user-last-name', $lastname);
        $I->wait(1);
        $I->fillField('#user-first-name', $firstname);
        $I->wait(1);
        $I->fillField('#user-email', $email);
        $I->wait(1);
        $I->fillField('#user-username', $username);
        $I->wait(1);
        $I->fillField('#user-password', $password);
        $I->wait(1);
        $I->fillField('#user-phone', $phone);
        $I->wait(3);
        $I->click('Submit');
      //  $I->click('html body.pace-done div#wrapper div#page-wrapper.gray-bg div.wrapper.wrapper-content.animated.fadeIn div.row div.col-lg-12 div.ibox.float-e-margins div.ibox-content form.form-horizontal div.form-group div.col-sm-4.col-sm-offset-2 button.btn.btn-primary.disabled');
        $I->wait(3);
        $I->see('vendors');
        $I->seeInCurrentUrl('vendors');
        $I->wait(3);
        /*$I->click('/html/body/div[2]/div/div[1]/nav/ul/li/a');
        $I->wait(3);
        $I->see('Our patients love the rewards program. ');
        $I->seeInCurrentUrl('users/login');*/
    }


    public function vendor_delete($delete_button_link,$dontsee)
    {
        $I = $this;
      ////  $I->login();
//$I->amOnPage('admin');
       // $I->click('/html/body/div[2]/nav/div/ul/li[4]/a'); //Users
        $I->click('Vendors');
        $I->wait(3);
        $I->click('.active li:first-child');
//       $I->click('/html/body/div[2]/nav/div/ul/li[4]/ul/li[1]/a');//View All Users
      //  $I->see($);
        $I->seeInCurrentUrl('vendors');
        $I->wait(3);
        $I->click($delete_button_link);
        $I->seeInPopup('Are you sure you want to delete');
        $I->wait(3);
        $I->acceptPopup();
        $I->wait(3);
        $I->dontSee($dontsee);
        $I->wait(3);
        $I->seeInCurrentUrl('vendors');
        $I->wait(3);
        //$I->wait(3);
        /*$I->click('/html/body/div[2]/div/div[1]/nav/ul/li/a');
        $I->wait(5);
        $I->see('Our patients love the rewards program.');
        $I->seeInCurrentUrl('users/login');*/
    }
     
    

public function Add_user($vendor,$role,$firstname,$lastname, $email, $phone,$username, $password)
    {
      $I = $this;
      
     //   $I->amOnPage('admin');
       // $I->click('/html/body/div[2]/nav/div/ul/li[4]/a'); //Users/html/body/div[2]/nav/div/ul/li[3]/a
      $I->click('Users');
        $I->wait(3);
      //  $I->click('/html/body/div[2]/nav/div/ul/li[4]/ul/li[2]/a'); //Add Users
        $I->click('Add User');
        $I->wait(3);
        $I->see('Users');
        $I->seeInCurrentUrl('users/add');
        $I->wait(3);
        /*$I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[2]/div/div/select/option[2]');
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[2]/div/div/select/option[3]');
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[4]/div/div/select/option[2]');*/

        $I->selectOption('form select[name=vendor_id]', $vendor);
        $I->selectOption('form select[name=role_id]', $role);

        $I->fillField('#first-name', $firstname);
        $I->wait(1);
        $I->fillField('#last-name', $lastname);
        $I->wait(1);
        $I->fillField('#email', $email);
        $I->wait(1);
        $I->fillField('#phone', $phone);
        $I->wait(1);
        $I->fillField('#username', $username);
        $I->wait(1);
        $I->fillField('#password', $password);
        $I->wait(3);
       // $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[18]/div/button');
        $I->click('Submit');
        $I->wait(3);
        $I->see($email);
        $I->seeInCurrentUrl('users');
        $I->wait(3);
        /*$I->click('/html/body/div[2]/div/div[1]/nav/ul/li/a');
        $I->wait(3);
        $I->see('Our patients love the rewards program. ');
        $I->seeInCurrentUrl('users/login');
        */
    }

    public function User_view($view_button_link,$vendor,$email) 
    {
      $I = $this;
      //  $I->click('/html/body/div[2]/nav/div/ul/li[4]/a'); //Users
        $I->click('Users');
        $I->wait(3);
       // $I->click('/html/body/div[2]/nav/div/ul/li[4]/ul/li[1]/a');//View All Users
        $I->click('.active li:first-child');
        $I->see('Users');
        $I->seeInCurrentUrl('users');
        $I->wait(3);
        $I->click($view_button_link);//click on view button in Users
        $I->wait(3);
        $I->see($vendor);
        $I->wait(3);
        $I->see($email);
        $I->wait(3);
        //$I->see('+1(617)899-6218');
        $I->wait(3);
        //$I->seeInCurrentUrl('users/view/5');//view user
        $I->wait(2);
        //$I->click('/html/body/div[2]/div/div[3]/div/div/div/div/div[3]/div/a');//back
        $I->click('Back');
        $I->see('Users');
        $I->seeInCurrentUrl('users');
        $I->wait(3);
        /*$I->click('/html/body/div[2]/div/div[1]/nav/ul/li/a');
        $I->wait(3);
        $I->see('Our patients love the rewards program. ');
        $I->seeInCurrentUrl('users/login');*/

    }

    public function User_edit($edit_button_link,$lastname,$email,$username,$password,$status_check,$status)
    {
      $I = $this;
       // $I->click('/html/body/div[2]/nav/div/ul/li[4]/a'); //Users
      $I->click('Users');
        $I->wait(3);
        $I->click('.active li:first-child');
        //$I->click('/html/body/div[2]/nav/div/ul/li[4]/ul/li[1]/a');//View All Users
        $I->see('Users');
        //$I->seeInCurrentUrl('users');
        $I->wait(3);   
        $I->click($edit_button_link);
        $I->wait(3); 
        $I->see('Edit User');
        //$I->seeInCurrentUrl('users/edit/');//give link
        $I->wait(3); 
      //  $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[2]/div/div/select/option[2]');
       // $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[4]/div/div/select/option[3]');
        $I->wait(1);
        $I->fillField('#last-name', $lastname);
        $I->wait(1);
        $I->fillField('#email', $email);
        $I->wait(1);
        //$I->fillField('#phone', '+1(617)660-6218');
        $I->wait(1);
        $I->fillField('#username', $username);
        $I->wait(1);
        $I->fillField('#password', $password);
        $I->wait(3);
        if($status_check=='0')
          {$I->uncheckOption($status);}
       // $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[18]/div/button');
        $I->click('Submit');
        $I->wait(3);
        //$I->see('+1(617)660-6218');
        //$I->wait(2);
        $I->seeInCurrentUrl('users');
        $I->wait(3);
        /*$I->click('/html/body/div[2]/div/div[1]/nav/ul/li/a');
        $I->wait(3);
        $I->see('Our patients love the rewards program. ');
        $I->seeInCurrentUrl('users/login');*/
    }
    //tbody tr:nth-child(2)


public function User_delete($delete_button_link,$dontsee)
    {
$I = $this;
      ////  $I->login();
//$I->amOnPage('admin');
       // $I->click('/html/body/div[2]/nav/div/ul/li[4]/a'); //Users
$I->click('Users');
        $I->wait(3);
        $I->click('.active li:first-child');
//       $I->click('/html/body/div[2]/nav/div/ul/li[4]/ul/li[1]/a');//View All Users
      //  $I->see($);
        $I->seeInCurrentUrl('users');
        $I->wait(3);
        $I->click($delete_button_link);
        $I->seeInPopup('Are you sure you want to delete');
        $I->wait(3);
        $I->acceptPopup();
        $I->wait(3);
        $I->dontSee($dontsee);
        $I->wait(3);
        $I->seeInCurrentUrl('users');
        $I->wait(3);
        //$I->wait(3);
        /*$I->click('/html/body/div[2]/div/div[1]/nav/ul/li/a');
        $I->wait(5);
        $I->see('Our patients love the rewards program.');
        $I->seeInCurrentUrl('users/login');*/
    }

public function Add_referrals_templates($vendor,$subject,$description)
    {
      $I = $this;
        $I->click('Referral Templates');
        $I->wait(3);
        $I->click('.active li:nth-child(2)');
        $I->wait(3);
        $I->see('Referral Templates');
        $I->seeInCurrentUrl('referral-templates/add');
        $I->wait(1);
        $I->selectOption('form select[name=vendor_id]', $vendor);

        $I->fillField('#subject', $subject);
        $I->wait(1);
        $I->fillField('#description', $description);
        $I->wait(1);
        if($status_check=='0')
          {$I->uncheckOption($status);}
        $I->click('Submit');
        $I->wait(1);
        $I->see($description);
        $I->seeInCurrentUrl('referral-templates');
        $I->wait(3);
    }

    public function View_referrals_templates($view_button_link,$vendor,$description)
    {
      $I = $this;
        $I->click('Referral Templates');
        $I->wait(3);
        $I->click('.active li:first-child');
        $I->wait(3);
        $I->see('Referral Templates');
        $I->seeInCurrentUrl('referral-templates');
        $I->wait(1);
        $I->click($view_button_link);
        $I->wait(3);
        $I->see($vendor);
        $I->wait(3);
        $I->see($description);
        $I->wait(3);
        $I->click('Back');
        $I->see('Referral Templates');
        $I->seeInCurrentUrl('referral-templates');
        $I->wait(3);
    }

    public function Edit_referrals_templates($edit_button_link,$vendor,$subject,$description,$status_check,$status)
    {
      $I = $this;
        $I->click('Referral Templates');
        $I->wait(3);
        $I->click('.active li:first-child');
        $I->wait(3);
        $I->see('Referral Templates');
       // $I->seeInCurrentUrl('referral-templates');
        $I->wait(1);
        $I->click($edit_button_link);
        $I->wait(1);
        $I->selectOption('form select[name=vendor_id]', $vendor);
        $I->fillField('#subject', $subject);
        $I->wait(1);
        $I->fillField('#description', $description);
        $I->wait(1);
        if($status_check=='0')
          {$I->uncheckOption($status);}
        $I->click('Submit');
        $I->wait(1);
        $I->see($description);
        $I->seeInCurrentUrl('referral-templates');
        $I->wait(3);
    }

    public function Delete_referrals_templates($delete_button_link,$dontsee)
    {
        $I = $this;
        $I->click('Referral Templates');
        $I->wait(3);
        $I->click('.active li:first-child');
        $I->see('Referral Templates');
        $I->seeInCurrentUrl('referral-templates');
        $I->wait(3);
        $I->click($delete_button_link);
        $I->seeInPopup('Are you sure you want to delete');
        $I->wait(3);
        $I->acceptPopup();
        $I->wait(3);
        $I->dontSee($dontsee);
        $I->wait(3);
        $I->seeInCurrentUrl('referral-templates');
        $I->wait(3);
    }

    public function Add_referrals_settings($vendor,$level,$referrer,$referree,$status_check,$status)
    {
      $I = $this;
        $I->click('Vendor Referral Setting');
        $I->wait(3);
        $I->click('.active li:nth-child(2)');
        $I->wait(3);
        $I->see('Vendor Referral Settings');
        $I->seeInCurrentUrl('vendor-referral-settings/add');
        $I->wait(1);
        $I->selectOption('form select[name=vendor_id]', $vendor);

        $I->fillField('#referral-level-name', $level);
        $I->wait(1);
        $I->fillField('#referrer-award-points', $referrer);
        $I->wait(1);
         $I->fillField('#referree-award-points', $referree);
        $I->wait(1);
        if($status_check=='0')
          {$I->uncheckOption($status);}
        $I->click('Submit');
        $I->wait(1);
        $I->see($level);
        $I->see('Vendor Referral Settings');
        $I->seeInCurrentUrl('vendor-referral-settings');
        $I->wait(3);
    }

    public function View_referrals_settings($view_button_link,$vendor,$level)
    {
      $I = $this;
        $I->click('Vendor Referral Setting');
        $I->wait(3);
        $I->click('.active li:first-child');
        $I->wait(3);
        $I->see('Vendor Referral Settings');
        $I->seeInCurrentUrl('vendor-referral-settings');
        $I->wait(1);
        $I->click($view_button_link);
        $I->wait(3);
        $I->see($vendor);
        $I->wait(3);
        $I->see($level);
        $I->wait(3);
        $I->click('Back');
        $I->see('Vendor Referral Settings');
        $I->seeInCurrentUrl('vendor-referral-settings');
        $I->wait(3);
    }

    public function Edit_referrals_settings($edit_button_link,$vendor,$level,$referrer,$referree,$status_check,$status)
    {
      $I = $this;
        $I->click('Vendor Referral Setting');
        $I->wait(3);
        $I->click('.active li:first-child');
        $I->wait(3);
        $I->see('Vendor Referral Settings');
       // $I->seeInCurrentUrl('vendor-referral-settings');
        $I->wait(1);
        $I->click($edit_button_link);
        $I->wait(1);
        $I->selectOption('form select[name=vendor_id]', $vendor);
        $I->fillField('#referral-level-name', $level);
        $I->wait(1);
        $I->fillField('#referrer-award-points', $referrer);
        $I->wait(1);
        $I->fillField('#referree-award-points', $referree);
        $I->wait(1);
        if($status_check=='0')
          {$I->uncheckOption($status);}
        $I->click('Submit');
        $I->wait(1);
        $I->see($level);
        $I->see('Vendor Referral Settings');
        $I->seeInCurrentUrl('vendor-referral-settings');
        $I->wait(3);
    }

    public function Delete_referrals_settings($delete_button_link,$dontsee)
    {
        $I = $this;
        $I->click('Vendor Referral Setting');
        $I->wait(3);
        $I->click('.active li:first-child');
        $I->see('Vendor Referral Settings');
        $I->seeInCurrentUrl('vendor-referral-settings');
        $I->wait(3);
        $I->click($delete_button_link);
        $I->seeInPopup('Are you sure you want to delete');
        $I->wait(3);
        $I->acceptPopup();
        $I->wait(3);
        $I->dontSee($dontsee);
        $I->wait(3);
        $I->seeInCurrentUrl('vendor-referral-settings');
        $I->wait(3);
    }

    public function Add_referrals_form($vendor,$from,$to,$template,$subject,$description,$name,$phone,$status_check,$status)
    {
      $I = $this;
        $I->click('Referral Form');
        $I->wait(3);
        $I->click('.active li:nth-child(2)');
        $I->wait(3);
        $I->see('Referrals');
        $I->seeInCurrentUrl('referrals/add');
        $I->wait(1);
        $I->selectOption('form select[name=vendor_id]', $vendor);

        $I->fillField('#refer-from', $from);
        $I->wait(1);
        $I->fillField('#refer-to', $to);
        $I->wait(1);
        $I->selectOption('form select[name=get_template_name]', $template);
        $I->wait(1);
        $I->fillField('#subject', $subject);
        $I->wait(1);
        $I->fillField('#description', $description);
        $I->wait(1);
        $I->fillField('#name', $name);
        $I->wait(1);
        $I->click('#phone', $phone);
        if($status_check=='0')
          {$I->uncheckOption($status);}
        $I->click('Submit');
        $I->wait(1);
        $I->see($subjectl);
        $I->see('Referrals');
        $I->seeInCurrentUrl('referrals');
        $I->wait(3);
    }


public function View_referrals($view_button_link,$vendor,$level)
    {
      $I = $this;
        $I->click('Referral Form');
        $I->wait(3);
        $I->click('.active li:first-child');
        $I->wait(3);
        $I->see('Referrals');
        $I->seeInCurrentUrl('referrals');
        $I->wait(1);
        $I->click($view_button_link);
        $I->wait(3);
        $I->see($vendor);
        $I->wait(3);
        $I->see($name);
        $I->wait(3);
        $I->click('Back');
        $I->see('Referrals');
        $I->seeInCurrentUrl('referrals');
        $I->wait(3);
    }

    public function Add_Lead_form($view_button_link,$vendor,$name,$email,$time,$status)
    {
      $I = $this;
        $I->click('Referral Form');
        $I->wait(3);
        $I->click('.active li:first-child');
        $I->wait(3);
        $I->see('Referrals');
        $I->seeInCurrentUrl('referrals');
        $I->wait(1);
        $I->click($view_button_link);
        $I->wait(3);
        $I->see($vendor);
        $I->wait(3);
        $I->see($name);
        $I->wait(3);
        $I->click('Click Here');
        $I->see($name);
        $I->wait(3);
        $I->see($email);
        $I->wait(3);
        $I->selectOption('form select[name=preferred_talking_time]', $time);
        $I->wait(1);
        $I->checkOption($status);
        $I->click('Submit');
        $I->wait(3);


    }

    public function View_Lead_form($view_button_link,$vendor,$name)
    {
      $I = $this;
      $I->amOnPage('vendor-referral-settings');
        $I->click('Referral Leads');
        $I->wait(3);
        $I->click('.active li:first-child');
        $I->wait(3);
        $I->see('Referral Leads');
        $I->seeInCurrentUrl('referral-leads');
        $I->wait(1);
        $I->click($view_button_link);
        $I->wait(3);
        $I->see($vendor);
        $I->wait(3);
        $I->see($name);
        $I->wait(3);
        $I->click('Back');
        $I->see('Referral Leads');
        $I->seeInCurrentUrl('referral-leads');
        $I->wait(3);
        
    }

public function Edit_Lead_form($level,$changed_level)
    {
      $I = $this;
        $I->click('Referral Leads');
        $I->wait(3);
        $I->click('.active li:first-child');
        $I->wait(3);
        $I->see('Referral Leads');
        $I->seeInCurrentUrl('referral-leads');
        $I->wait(1);
        $I->selectOption('form select[name=vendor_referral_settings_id]', $level);
        $I->wait(3);
        $I->reloadPage();
        $I->see('Referral Leads');
        $I->seeInCurrentUrl('referral-leads');
        $I->wait(3);
        $I->see($changed_level);
        $I->wait(3);
        
    }


public function Delete_lead_form($delete_button_link,$dontsee)
    {
        $I = $this;
        $I->click('Referral Leads');
        $I->wait(3);
        $I->click('.active li:first-child');
        $I->wait(3);
        $I->see('Referral Leads');
        $I->seeInCurrentUrl('referral-leads');
        $I->wait(1);
        $I->click($delete_button_link);
        $I->seeInPopup('Are you sure you want to delete');
        $I->wait(3);
        $I->acceptPopup();
        $I->wait(3);
        $I->dontSee($dontsee);
        $I->wait(3);
        $I->seeInCurrentUrl('referral-leads');
        $I->wait(3);
    }
    //$I->Search('james','james','1','0');
    public function Search($searchInput,$option,$status_check,$pressEnter)
    {
      $I = $this;
      //$I->maximizeWindow();//for phantonjs
      //$I->click(Locator::find('a', ['href' => '/staging/users/dashboard']));//click on dashboard
      $I->waitForElementVisible('#search-patient-input',3);
      $I->see('Search Patient');
      $I->seeInCurrentUrl('users/dashboard');
      $I->wait(1);//wait to start
      $I->fillField(Locator::find('input',['ng-model' => 'query']),$searchInput); //fill the value you want to serach 
      $I->wait(2);
      // if($status_check=='0');//for testing the radio buttons 
      //   {$I->checkOption($option);}
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

    public function cc_positive($cardNum, $expdate,$cvv,$firstName,$lastname,$country,$zip,$address,$city,$state,$phone)
    {
      $I = $this;
        $I->click('Credit Card Management');//click on credit card management
        $I->wait(2);//wait to start
        $I->click(Locator::find('a', ['href' => '/buzzyadmin/authorize-net-profiles']));//click on payemet
        $I->wait(2);
        $I->click('Add New Payment Details');
        $I->wait(4);
        $I->executeJS('$("#lnkPaymentAdd").click()');
        $I->wait(2);
        $I->fillField('#cardNum', $cardNum);
        $I->fillField('#expiryDate', $expdate);
        $I->fillField('#cvv',$cvv);
        $I->fillField('#firstNameID',$firstName);
        $I->fillField('#lastNameID',$lastname);
       // $option = $I->grabTextFrom('select#countryID option:nth-child(10)');
        //codecept_debug($option);
        $I->selectOption("select#countryID", $country);
       // $I->selectOption('form select[id=countryID]', 'United States of America');
        $I->fillField('#zipID',$zip);
        $I->fillField('#billingAddressID',$address);
        $I->fillField('#cityID',$city);
        $I->fillField('#stateID',$state);
        $I->fillField('#phonenumberID',$phone);
        $I->wait(2);
        $I->click('SAVE');
        $I->wait(5);
        $I->click('#btnContinue');
        $I->wait(2);
        
    }



Public function cc_edit($expdate,$phone)
{
    $I = $this;
        $I->click('Credit Card Management');
        $I->wait(2);
        $I->click('Payment');
        $I->wait(2);
        $I->click('Manage Payment Details');
        $I->executeJS('$("#lnkEditExpDateLine0").click()');
        $I->fillField('#txtExpDateLine0',$expdate);
        $I->click('#btnSaveExpDateLine0');
        $I->wait(1);
       $I->executeJS("$('#collapsePayment0').addClass('in');");
       $I->wait(3);
        
        $I->executeJS('$("#lnkEditPaymentItem0").click()');
        $I->wait(3);
        $I->fillField('#cardNum','378282246310005');
        $I->fillField('#phonenumberID',$phone);
        $I->wait(2);
        $I->click('#saveBtn');
        $I->wait(3);
        $I->click('#btnContinue');
        $I->seeInCurrentUrl('authorize-net-profiles');
        $I->see('**** **** **** 0005');

    





} 
Public function cc_delete()
{
    $I = $this;
        $I->click('Credit Card Management');
        $I->wait(2);
        $I->click('Payment');
        $I->wait(2);
        $I->click('Manage Payment Details');
         $I->executeJS("$('#collapsePayment0').addClass('in');");
        $I->click('#lnkDeletePaymentItem0');
        $I->acceptPopup();
        $I->wait(3);
        $I->click('#btnContinue');
        $I->seeInCurrentUrl('authorize-net-profiles');
        $I->see('Add New Payment Details');
        $I->wait(2);
} 


public function add_template($name,$review_points,$rating_points,$fb_points,$gplus_points,$yelp_points,$ratemd_points,$healthgrades_points,$level,$referrer_award_points,$referree_award_points,$level1,$refAwrdPts1,$reAwrdPts1)
{
    $I = $this;
    $I->maximizeWindow(); 
    $I->click('Templates');
    $I->waitForText('View All', 3);
    $I->click('Add Template');
    $I->seeInCurrentUrl('templates/add');
    $I->waitForElementVisible('#name',3);
    $I->fillField('#name',$name);
    $I->click('Submit');
    $I->wait(5);
    
    $I->waitForElement('#review-points',5);
    //$I->see($name);
    $I->makeScreenshot('user_page');
    $I->fillField('#review-points',$review_points);
    $I->fillField('#rating-points',$rating_points);
    $I->fillField('#fb-points',$fb_points);
    $I->fillField('#gplus-points',$gplus_points);
    $I->fillField('#yelp-points',$yelp_points);
    $I->fillField('#ratemd-points',$ratemd_points);
    $I->fillField('#healthgrades-points',$healthgrades_points);
    $I->click('Save');
    $I->waitForText('The template has been saved.');
    $r=Locator::find('a', ['href' => '#tab-2']);
    $I->click($r);
    $I->waitForElementVisible('#submit',4);
    $I->fillField('#referral-level-name',$level);
    $I->fillField('#referrer-award-points',$referrer_award_points);
    $I->fillField('#referree-award-points',$referree_award_points);
    $I->click('#submit');
 //   $I->waitForElementVisible('refName1',5);
    $r=Locator::find('input', ['name' => 'refName1']);
    $I->fillField($r,$level1);
    $r=Locator::find('input',  ['name' => 'refAwrdPts1']);
    $I->fillField($r,$refAwrdPts1);
    $r=locator::find('input', ['name' =>'reAwrdPts1']);
    $I->fillField($r,$reAwrdPts1);

    $I->wait(4);
    $I->click('');
}

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
        if ($new_review == '1'){
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
            $I->fillField(Locator::find('input',['ng-model' => 'query']),$searchInput); //fill the value you want to search 
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
        else{
            $I->click(Locator::find('a', ['href' => '/staging/users/dashboard']));//click on dashboard
            $I->waitForElementVisible('#search-patient-input',3);
            $I->see('Search Patient');
            $I->seeInCurrentUrl('users/dashboard');
            $I->wait(1);//wait to start
            $I->fillField(Locator::find('input',['ng-model' => 'query']),$searchInput); //fill the value you want to search 
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

    public function vendor_deposit_balance($vendor_name){

        $I = $this;
        $I->click('Reports');
        $I->wait(3);
        $I->click('Vendor Deposit Balance');
        $I->wait(3);
        $I->see($vendor_name);
        $I->seeInCurrentUrl('vendor-deposit-balances');

    }

    public function credit_card_charge($vendor_name, $response_code, $org_name){

        $I = $this;
        $I->click('Reports');
        $I->wait(3);
        $I->click('Credit Card Charge');
        $I->wait(3);
        $I->see($vendor_name);
        $I->see($response_code);
        $I->seeInCurrentUrl('credit-card-charges');
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-success'])));
        $I->see($org_name);
        $I->click('Back');
    }

    public function InHouse_rewards_add_view($name, $category,$product_type,$points,$amount)
    {
        $I = $this;
        $I->amGoingTo('Add In-House Rewards');
        $I->click('Settings'); 
        $I->wait(3);
        $I->click('Rewards'); 
        $I->wait(3);
        $I->click('In-House Rewards'); 
        $I->wait(3);
        $I->click('Add Rewards'); 
        $I->wait(3);
        $I->see('Add Reward');
        $I->seeInCurrentUrl('legacy-rewards/add');
        $I->wait(3);
        $I->fillField('#name', $name);
        $I->wait(1);
        $I->selectOption('select#reward-category-id', $category);
        $I->wait(1);
        if($product_type == '1'){
            $I->selectOption('select#product-type-id', 'Amazon/Tango');
            $I->fillField('#input-points', $points);   
        }else{
            $I->selectOption('select#product-type-id', 'e-gift card');
            $I->fillField('#input-amount', $amount);
        }
        $I->wait(1);
        $I->attachFile('input[type="file"]', '37353480-image.png'); //Image must upload in the _data folder 
        $I->uncheckOption(Locator::find('input' ,['name' =>'status']));
        $I->click('Submit');
        $I->wait(5);
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-success'])));
        $I->see($name);
        $I->see($category);
        $I->click('Back');
    }

    
    public function InHouse_rewards_edit_delete($name,$category,$product_type, $points,$amount)
    {
        $I = $this;
        $I->amGoingTo('Edit In-House Rewards');
        $I->click('Settings'); 
        $I->wait(3);
        $I->click('Rewards'); 
        $I->wait(3);
        $I->click('In-House Rewards'); 
        $I->wait(3);
        $I->click(Locator::find('a', ['href' => '/staging/legacy-rewards'])); 
        $I->wait(3);
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-warning'])));
        $I->see('Rewards');
        $I->wait(3);
        $I->fillField('#name', $name);
        $I->wait(1);
        $I->selectOption('select#reward-category-id', $category);
        $I->wait(1);
        if($product_type == '1'){
            $I->selectOption('select#product-type-id', 'Amazon/Tango');
            $I->fillField('#input-points', $points);   
        }else{
            $I->selectOption('select#product-type-id', 'e-gift card');
            $I->fillField('#input-amount', $amount);
        }
        $I->wait(1);
        $I->attachFile('input[type="file"]', '37353480-image.png'); //Image must upload in the _data folder 
        //$I->uncheckOption(Locator::find('input' ,['name' =>'status']));
        $I->click('Submit');
        $I->wait(5);
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-sm btn-danger fa fa-trash-o fa-fh'])));
        $I->seeInPopup('Are you sure you want to delete');
        $I->wait(3);
        $I->acceptPopup();
        $I->wait(3);
    }  

    public function vendor_location_add_view($address,$fbUrl,$googleUrl,$yelpUrl, $ratemdUrl,$healthgradesUrl,  $hashTag )
    {
        $I = $this;
        $I->amGoingTo('Add Vendor Location');
        $I->click('Settings'); 
        $I->wait(1);
        $I->click('Vendor Locations'); 
        $I->wait(1);
        $I->click('Add Vendor Location'); 
        $I->wait(3);
        $I->fillField('#address', $address);
        $I->wait(1);
        $I->fillField('#fb-url', $fbUrl);
        $I->wait(1);
        $I->fillField('#google-url', $googleUrl);
        $I->wait(1);
        $I->fillField('#yelp-url', $yelpUrl);
        $I->wait(1);
        $I->fillField('#ratemd-url', $ratemdUrl);
        $I->wait(1);
        $I->fillField('#healthgrades-url', $healthgradesUrl);
        $I->wait(1);
        $I->fillField('#hash-tag', $hashTag);
        $I->wait(1);
        $I->checkOption('Default Location');
        $I->wait(1); 
        $I->click('Submit');
        $I->see('Vendor Locations');
        $I->seeInCurrentUrl('vendor-locations');
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-success'])));
        $I->see($address);
        $I->see($fbUrl);
        $I->click('Back');
        $I->see('Vendor Locations');
        $I->seeInCurrentUrl('vendor-locations');

    }

        public function vendor_location_edit_delete($address,$fbUrl,$googleUrl,$yelpUrl, $ratemdUrl,$healthgradesUrl,  $hashTag )
    {
        $I = $this;
        $I->amGoingTo('Edit Vendor Location');
        $I->click('Settings'); 
        $I->wait(1);
        $I->click('Vendor Locations'); 
        $I->wait(1);
        $I->click(Locator::find('a', ['href' => '/staging/vendor-locations'])); 
        $I->wait(3);
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-warning id='])));
        $I->fillField('#address', $address);
        $I->wait(1);
        $I->fillField('#fb-url', $fbUrl);
        $I->wait(1);
        $I->fillField('#google-url', $googleUrl);
        $I->wait(1);
        $I->fillField('#yelp-url', $yelpUrl);
        $I->wait(1);
        $I->fillField('#ratemd-url', $ratemdUrl);
        $I->wait(1);
        $I->fillField('#healthgrades-url', $healthgradesUrl);
        $I->wait(1);
        $I->fillField('#hash-tag', $hashTag);
        $I->wait(1);
        $I->checkOption('Default Location');
        $I->wait(1); 
        $I->click('Submit');
        $I->see('Vendor Locations');
        $I->seeInCurrentUrl('vendor-locations');
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-sm btn-danger fa fa-trash-o fa-fh'])));
        $I->seeInPopup('Are you sure you want to delete');
        $I->wait(3);
        $I->acceptPopup();

    }

    // public function vendor_reviews($id){
    //     $I = $this;
    //     $I->amGoingTo('Review Requests');
    //     $I->click('Reports'); 
    //     $I->wait(1);
    //     $I->click('Vendor Reviews'); 
    //     // $I->wait(1);   
    //     // $I->click(Locator::find('button', ['class' => "btn btn-sm btn-danger fa fa-google-plus ng-scope"]), 3);
    //     // $I->wait(1);
    //     // $I->click('Yes');
    //     // $I->wait (3);
    //     // $I->click('OK');
    //     $I->wait(1);   
    //     $I->click(Locator::find('img', ['class' => "fa fa-fw fa-lg"]), 3);
    //     $I->wait(1);
    //     $I->click('Yes');
    //     $I->wait (3);
    //     $I->click('OK');
    //     $I->wait(1);   
    //     $I->click(Locator::find('img', ['class' => "fa fa-fw fa-lg"]), 3);
    //     $I->wait(1);
    //     $I->click('Yes');
    //     $I->wait (3);
    //     $I->click('OK');
    //     $I->wait(1);   
    //     $I->click(Locator::find('img', ['class' => "fa fa-fw fa-lg"]), 3);
    //     $I->wait(1);
    //     $I->click('Yes');
    //     $I->wait (3);
    //     $I->click('OK');     
    // }  

    public function users_add($role,$first_name,$last_name,$email,$phone,$name,$password)
    {
        $I = $this;
        $I->amGoingTo('Add Users');
        $I->wait(2);
        $I->click('Settings');
        $I->wait(1);
        $I->click('Users'); 
        $I->wait(1);
        $I->click('Add User');
        $I->wait(1); 
        $I->selectOption('select#role-id', $role);
        $I->fillField('#first-name', $first_name);
        $I->wait(1);
        $I->fillField('#last-name', $last_name);
        $I->wait(1);
        $I->fillField('#email', $email);
        $I->wait(1);
        $I->fillField('#phone', $phone);
        $I->wait(1);
        $I->fillField('#username', $name);
        $I->wait(1);
        $I->fillField('#password', $password);
        $I->wait(3);
        $I->click('Submit');
        $I->wait(5);
        $I->see($email);
        $I->seeInCurrentUrl('users');


        // //Users View
        // $I->click('Users'); //Vendors
        // $I->wait(2);
        // $I->click(Locator::find('a', ['href' => '/buzzyadmin/users']));
        // $I->wait(2); 
        // $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-success'])));//click on Edit button in Vendors
        // $I->wait(3);
        // $I->see($first_name);
        // $I->see($last_name);
        // $I->see($email);
        // $I->see($phone);
        // $I->see($name);
        // $I->see($password);
        // $I->wait(3);
        // $I->click('Back');
    }

    public function users_next(){
        $I = $this;
        $I->amGoingTo('Check Menu In Settings');
        $I->wait(2);
        $I->click('Settings');
        $I->wait(2);
        $I->dontSee('Tier Program');
        $I->dontSee('Credit Card Management');
        $I->wait(2);
        $I->click('Reports');
        $I->wait(2);
        $I->dontSee('Vendor Deposit Balance');
        $I->dontSee('Staff History');

    }

    public function users_Uncheck_status(){
        $I = $this;
        $I->amGoingTo('Status Uncheck for the Staff Manager');
        $I->wait(2);
        $I->click('Settings');
        $I->wait(1);
        $I->click('Users'); 
        $I->wait(1);
        $I->click(Locator::find('a', ['href' => '/staging/users']));
        $I->wait(1); 
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-warning'])));
        $I->wait(3);
        $I->uncheckOption('Active');
        $I->click('Submit');

    }

    public function users_check_status(){
        $I = $this;
        $I->amGoingTo('Status Uncheck for the Staff Manager');
        $I->wait(2);
        $I->click('Settings');
        $I->wait(1);
        $I->click('Users'); 
        $I->wait(1);
        $I->click(Locator::find('a', ['href' => '/staging/users']));
        $I->wait(1); 
        $I->click(Locator::lastElement(Locator::find('a', ['class' => 'btn btn-xs btn-warning'])));
        $I->wait(3);
        $I->checkOption('Active');
        $I->click('Submit');

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

public function staffhistory($start_date,$end_date,$find,$dontsee)
{
   $I = $this;
   $I->click('Reports');
   $I->waitForElementVisible(Locator::find('a', ['href' => '/buzzyadmin/reports/staffreport']),4);
   $I->click(Locator::find('a', ['href' => '/buzzyadmin/reports/staffreport']));
   $I->waitForElementVisible(Locator::find('button', ['class' => 'btn btn-primary']),5);
   $I->see('Staff History');
   $I->see('Redeemer Name');

   /*$I->fillField(Locator::find('input', ['class' => 'form-control input-sm']),$find);//tier awards
   $I->wait(5);
   $I->dontSee('Promotion Award');//promotion awards*/
   $xpath=Locator::elementAt('/html/body/div[2]/div/div[3]/div[1]/div/div/div/div[2]/div/div/table/tfoot/tr/th[1]/select', 2);
      codecept_debug($xpath);
   $I->selectOption($xpath, 'User 3 Best vendor');
   $I->dontSee('Best v user User');

  /*  $I->click(Locator::find('input', ['class' => 'form-control']));//for date filter
   $I->see('Apply');
   $I->see('Cancel');
   $I->fillField(Locator::find('input', ['name' => 'daterangepicker_start']),$start_date);
   $I->fillField(Locator::find('input', ['name' => 'daterangepicker_end']),$end_date);
   $I->click(Locator::find('button', ['class' => 'applyBtn btn btn-small btn-sm btn-success']));
   $I->click(Locator::find('button', ['class' => 'btn btn-primary']));
   $I->$I->dontSee('Awarded');
*/


   //$I->wait(2);




}

public function survey()
{
   $I = $this;
   $I->click(Locator::find('a', ['ng-click' => 'tabSwitch(4); surveyInit()']));
  // $I->waitForElementVisible(Locator::find('input', ['class' => 'ng-pristine ng-untouched ng-valid ng-not-empty']),4);
  // $u=Locator::contains('label', 'No');
   //codecept_debug($u);
  // $I->checkOption($u);
  //  $I->executeJS("$('#collapsePayment0').addClass('in');");
   //$I->click('//*[@id="swiperNext"]');
   $I->seeInSource('<div id="swiperNext" class="swiper-button-next"></div>');
 //  $I->click(Locator::find('div', ['id' => 'swiper-button-next']));
   
   $I->wait(4);
   /*$I->click(Locator::find('a', ['href' => '/buzzyadmin/reports/staffreport']));
   $I->waitForElementVisible(Locator::find('button', ['class' => 'btn btn-primary']),5);
   $I->see('Staff History');
   $I->see('Redeemer Name');*/


}


public function vendor_survey()
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


public function survey_questions_crud_add($text,$type,$frequency,$pointsforquestions)
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

public function survey_questions_crud_view($see1,$see2)
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

public function survey_questions_crud_edit($text,$pointsedit)
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

public function survey_questions_crud_delete($text)
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



public function survey_questions_crud_add_negative($text,$type,$frequency,$pointsforquestions)
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

public function survey_questions_crud_edit_negative($text,$frequency,$pointsedit)
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

public function survey_questions_crud_delete_negative($text)
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







    public function Logout()
    {
        $I = $this;
        $I->wait(3);
        $I->click(Locator::find('a', ['class' => "fa fa-sign-out"]));
        $I->wait(3);
        $I->see('Our patients love the rewards program.');
        $I->seeInCurrentUrl('/');
    }

}

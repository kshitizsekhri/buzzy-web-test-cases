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
class BuzzyDocTester extends \Codeception\Actor
{
    use _generated\BuzzyDocTesterActions;

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






	public function logout()
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

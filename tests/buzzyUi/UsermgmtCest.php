<?php

use Codeception\Util\Locator;

class UsermgmtCest
{
    public function _before(BuzzyUiTester $I)
    {
    }

    public function _after(BuzzyUiTester $I)
    {
    }

    // tests
    

    public function positive_staffmgmt(BuzzyUiTester $I)
    {
        $I->login('admin','123456');

        $I->Add_vendor('Test Organisation',3000, 1500,'one','admin','staffadmin1@org.com','useradmin1','123456789','');

        $I->Add_user('Test Organisation','staff_admin','admin','two', 'staffadmin2@org.com','','useradmin2','123456789');

        $I->Add_user('Test Organisation','staff_manager','staff','one', 'staff1@org.com','','userstaff1','123456789');

        $I->Add_user('Test Organisation','staff_manager','staff','two', 'staff2@org.com','','userstaff2','123456789');

        $I->Logout();

        $I->login('useradmin2','123456789');//Login as a staff admin
        $I->see('Users');
        $I->seeInCurrentUrl('users');

        /*$I->click('Users'); //Users
        $I->wait(3);
        $I->click('View All'); //View Users
        $I->see('Users');
        $I->seeInCurrentUrl('users');*/

       $I->Add_user('Venasaur','staff_manager','staff','three', 'staff3@org.com','','userstaff3','123456789');
    //    $I->User_view('tbody tr:nth-child(6) a .fa-eye','Venasaur','stafftwo@org.com');

        $I->User_edit('tbody tr:nth-child(5) a .fa-pencil','Edited','staff3edited@org.com','userstaff3edited','123456789098','0','Active');
       $I->Logout();
//Disabled user cannot login
        $I->login('userstaff3edited','123456789098');

        $I->dontsee('Users');
         $I->seeInCurrentUrl('users/login');

        $I->login('useradmin2','123456789');

        $I->User_delete('tbody tr:nth-child(5) a:last-child','staff3dited@org.com');

        $I->Logout();
//deleted user cannot login
        $I->login('userstaff3edited','123456789098');

        $I->dontsee('Users');
         $I->seeInCurrentUrl('users/login');

        $I->login('userstaff1','1234567890989');//Login as a staff manager

        $I->User_view('tbody tr:nth-child(1) a .fa-eye','Venasaur','staffone@org.com');

        $I->User_edit('tbody tr:nth-child(1) a .fa-pencil','Edited','staffoneedited@org.com','userstaff1edited','1234567890989','1','Active');

        $I->Logout();
//disabled vendor user cannot login
        $I->login('admin','12345678');

        $I->seeInCurrentUrl('users/login');
        $I->click('Vendors');
        $I->click('.active li:first-child');
        

        



// deleted vendor user cannot login 
$I->login('admin','12345678');

        $I->seeInCurrentUrl('users/login');

        $I->vendor_delete($delete_button_link,'Test Organisation');
        $I->Logout();
        $I->login('useradmin2','123456789');
        $I->seeInCurrentUrl('users/login');
       
    }

     public function positive_referrals(BuzzyUiTester $I)
    {

        $I->login('admin','123456');

        $I->Add_referrals_settings('Test Organisation','Level 1','20','50','1','#check_status');

        $I->Add_referrals_settings('Test Organisation','Level 2','50','70','1','#check_status');

        $I->View_referrals_settings('tbody tr:nth-child(9) a .fa-eye','Test Organisation','Level 1');

        $I->Edit_referrals_settings('tbody tr:nth-child(1) a .fa-pencil','Test Organisation','Level 1 edited','30','55','1','#check_status');

        $I->Add_referrals_templates('Test Organisation','Test template','Test Template Description');

        $I->View_referrals_templates('tbody tr:nth-child(9) a .fa-eye','Test Organisation','Test Template Description');

        $I->Edit_referrals_templates('tbody tr:nth-child(9) a .fa-pencil','Test Organisation','Test Subject','Test Description','1','#status');

       $I-> Add_referrals_form('Test Organisation','abc@def.com','lmn@pqr.com','Test Template','Test subject','Hi this is test description for test template for test organisation vendor','lmn','1(800)678-3412','1','check_status');

       $I->View_referrals('tbody tr:first a .fa-eye','Test Organisation','lmn');

       $I->Add_Lead_form('tbody tr:nth-child(9) a .fa-eye','Test Organisation','lmn','lmn@pqr.com','2PM - 4PM','#check_status');
       $I->moveBack();

       $I->View_Lead_form('tbody tr:first-child a .fa-eye','Test Organisation','lmn');

       $I->Edit_Lead_form('Level 1','Level 2');

       $I->wait(4);

       $I->Delete_lead_form('tbody tr:nth-child(1) a:last-child','lmn');

       $I->Delete_referrals_templates('tbody tr:nth-child(5) a:last-child','Hi this is test description for test template for ');

       $I->Delete_referrals_settings('tbody tr:nth-child(3) td:last-child a:last-child','Level 1');

       $I->Logout();



    }


public function referralsettings_negative(BuzzyUiTester $I)
    {

        $I->login('user','123456789');
//Add referral setting
        $I->click('Referrals');
        $I->wait(3);
        $I->click('Vendor Referral Settings');
        $I->wait(3);
        $I->see('Vendor Referral Settings');
        $I->click('Vendor Referral Settings Form');
        $I->seeInCurrentUrl('vendor-referral-settings/add');
        $I->wait(1);

        $I->click('#check_submit');

        $I->BuzzyDoc_validations('Required validation verified for vendor','#vendor-id','required','true','Required validation verified for vendor');

        $I->selectOption('form select[name=vendor_id]', 'Venasaur');

        $I->click('#check_submit');

        $I->BuzzyDoc_validations('Required validation verified for referral-level-name','#referral-level-name','required','true','Required validation verified for referral-level-name');

        $I->fillField('#referral-level-name', 'Level negative');

        $I->click('#check_submit');

        $I->BuzzyDoc_validations('Required validation verified for referrer-award-points','#referrer-award-points','required','true','Required validation verified for referrer-award-points');

        $I->BuzzyDoc_validations('Number validation verified for referrer-award-points','#referrer-award-points','type','number','Required validation verified for referrer-award-points');

        $I->BuzzyDoc_validations('Min value validation verified for referrer-award-points','#referrer-award-points','min','0','Required validation verified for referrer-award-points');

        $I->fillField('#referrer-award-points', '12');

        $I->click('#check_submit');

        $I->BuzzyDoc_validations('Required validation verified for referree-award-points','#referree-award-points','required','true','Required validation verified for referree-award-points');

        $I->BuzzyDoc_validations('Number validation verified for referree-award-points','#referree-award-points','type','number','Required validation verified for referree-award-points');

        $I->BuzzyDoc_validations('Min value validation verified for referree-award-points','#referree-award-points','min','0','Required validation verified for referree-award-points');

         $I->fillField('#referree-award-points', '25');

        $I->click('#check_cancel');
        $I->wait(1);

        $I->amGoingTo('Edit a referral setting');


        $I->click('Referrals');
        $I->wait(3);
        $I->click('Vendor Referral Settings');
        $I->wait(3);
        $I->see('Vendor Referral Settings');
       // $I->seeInCurrentUrl('vendor-referral-settings');
        $I->wait(1);
        $I->click('tbody tr td:last-child a:nth-child(2)');
        $I->wait(1);

        $I->selectOption('form select[name=vendor_id]', '--Please Select--');
        $I->fillField('#referral-level-name', '');
        $I->wait(1);
        $I->fillField('#referrer-award-points', '');
        $I->wait(1);
        $I->fillField('#referree-award-points', '');
        $I->wait(1);


        $I->BuzzyDoc_validations('Required validation verified for vendor','#vendor-id','required','true','Required validation verified for vendor');

        $I->selectOption('form select[name=vendor_id]', 'Venasaur');

        $I->click('#check_submit');

        $I->BuzzyDoc_validations('Required validation verified for referral-level-name','#referral-level-name','required','true','Required validation verified for referral-level-name');

        $I->fillField('#referral-level-name', 'Level negative');

        $I->click('#check_submit');

        $I->BuzzyDoc_validations('Required validation verified for referrer-award-points','#referrer-award-points','required','true','Required validation verified for referrer-award-points');

        $I->BuzzyDoc_validations('Number validation verified for referrer-award-points','#referrer-award-points','type','number','Required validation verified for referrer-award-points');

        $I->BuzzyDoc_validations('Min value validation verified for referrer-award-points','#referrer-award-points','min','0','Required validation verified for referrer-award-points');

        $I->fillField('#referrer-award-points', '10');

        $I->click('#check_submit');

        $I->BuzzyDoc_validations('Required validation verified for referree-award-points','#referree-award-points','required','true','Required validation verified for referree-award-points');

        $I->BuzzyDoc_validations('Number validation verified for referree-award-points','#referree-award-points','type','number','Required validation verified for referree-award-points');

        $I->BuzzyDoc_validations('Min value validation verified for referree-award-points','#referree-award-points','min','0','Required validation verified for referree-award-points');

         $I->fillField('#referree-award-points', '15');

        $I->click('#check_cancel');

        $I->wait(3);

        $I->see('Vendor Referral Settings');
        $I->seeInCurrentUrl('vendor-referral-settings');

        $I->click('tbody tr:nth-child(1) td:last-child a:last-child');
        $I->seeInPopup('Are you sure you want to delete');
        $I->wait(3);
        $I->cancelPopup();
        $I->wait(3);
        /*$I->amOnPage('/vendor-referral-settings');

        $I->Logout();*/
        

    }

    public function referralstemplates_negative(BuzzyUiTester $I)
    {

        $I->Login('admin','12345678');

        $I->click('Referrals');
        $I->wait(3);
        $I->click('Referral Templates');
        $I->wait(3);
        $I->see('Referral Templates');
        $I->click('Add New Template');
        $I->seeInCurrentUrl('referral-templates/add');
        $I->wait(1);

        $I->click('Submit');

        $I->BuzzyDoc_validations('Required validation verified for vendor-id','#vendor-id','required','true','Required validation verified for vendor-id');

        $I->selectOption('form select[name=vendor_id]', 'Venasaur');

        $I->click('Submit');

        $I->BuzzyDoc_validations('Required validation verified for vendor-id','#vendor-id','required','true','Required validation verified for vendor-id');

        $I->click('Submit');

        $I->BuzzyDoc_validations('Required validation verified for subject','#subject','required','true','Required validation verified for subject');


        $I->fillField('#subject', 'Test subject');
        $I->wait(1);

        $I->click('Submit');

       // $I->BuzzyDoc_validations('Required validation verified for description','#tinymce','required','true','Required validation verified for description');

        $I->fillField('#tinymce', 'Test description');
        $I->wait(1);
        $I->click('Cancel');

        $I->amGoingTo('Edit a referral template');

        $I->click('Referrals');
        $I->wait(3);
        //$I->click('.active li:first-child');
        //$I->wait(3);
        $I->see('Referral Templates');
       // $I->seeInCurrentUrl('referral-templates');
        $I->wait(1);


        $I->click('tbody tr td:last-child a:nth-child(2)');
        $I->wait(1);

        $I->selectOption('form select[name=vendor_id]', 'admin');
        $I->fillField('#subject', '');
        $I->wait(1);
        $I->fillField('#description', '');
        $I->wait(1);

        $I->click('Submit');

        $I->BuzzyDoc_validations('Required validation verified for vendor-id','#vendor-id','required','true','Required validation verified for vendor-id');

        $I->selectOption('form select[name=vendor_id]', 'Venasaur');

        $I->click('Submit');

        $I->BuzzyDoc_validations('Required validation verified for vendor-id','#vendor-id','required','true','Required validation verified for vendor-id');

        $I->click('Submit');

        $I->BuzzyDoc_validations('Required validation verified for subject','#subject','required','true','Required validation verified for subject');


        $I->fillField('#subject', 'Test subject');
        $I->wait(1);

        $I->click('Cancel');
        $I->wait(1);
        $I->seeInCurrentUrl('referral-templates');
        $I->wait(3);

        $I->click('tbody tr td:last-child a:last-child');
        $I->seeInPopup('Are you sure you want to delete');
        $I->wait(3);
        $I->cancelPopup();
        $I->wait(3);

        $I->Logout();

    }

     public function referrals_negative(BuzzyUiTester $I)
    {

        $I->Login('admin','123456');

        $I->click('Referrals');
        $I->wait(3);
        $I->click('Referred Peoples');
        $I->wait(3);
        $I->see('Referrals');
        $I->seeInCurrentUrl('referrals');
        $I->wait(1);
        $I->click('Referral Form');
        $I->seeInCurrentUrl('referrals/add');
        $I->wait(3);
        $I->click('#check_submit');

        $I->BuzzyDoc_validations('Required validation verified for vendor-id','#vendor-id','required','true','Required validation verified for vendor-id');

        $I->fillField('#vendor-id','Venasaur');

        $I->click('#check_submit');

        $I->BuzzyDoc_validations('Required validation verified for email','#email','required','true','Required validation verified for email');

        $I->BuzzyDoc_validations('type validation verified for email','#email','type','email','type validation verified for email');

        $I->fillField('#email','abc@def.com');

        $I->click('#check_submit');

        $I->BuzzyDoc_validations('Required validation verified for phone','#phone','required','true','Required validation verified for phone');

        $I->BuzzyDoc_validations('type validation verified for phone','#phone','type','tel','type validation verified for phone');

        $I->fillField('#phone','9878945566');

        $I->click('#check_submit');

        $I->BuzzyDoc_validations('Required validation verified for preferred-talking-time','#preferred-talking-time','required','true','Required validation verified for preferred-talking-time');
        $I->selectOption('form select[name=preferred_talking_time]', '6PM - 8PM');
        $I->click('#check_submit');

        $I->BuzzyDoc_validations('required validation verified for check_status','#check_status','required','true','required validation verified for check_status');
        $I->checkOption('#check_status');

        $I->click('Cancel');
        $I->amOnPage('referrals');

        //$I->moveBack();
        //$I->moveBack();
        //$I->wait(3);

        //$I->Logout();
    }




    public function referralLead_negative(BuzzyUiTester $I)
    {

        $I->Login('admin','123456');

        $I->click('Referrals');
        $I->wait(3);
        $I->click('Referred Peoples');
        $I->wait(3);
        $I->see('Referrals');
        $I->seeInCurrentUrl('referrals');
        $I->wait(1);
        $I->click('tbody tr td:last-child a:first-child');
        //$I->see('Referrals');
        $I->wait(3);
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div/div[2]/div/dl/dd[10]/a');
        $I->wait(3);
        $I->see('Hello! You are being referred');
        $I->click('Submit');
        $I->fillField('#name','');
        $I->fillField('#email','');
        $I->fillField('#phone','');

        $I->click('Submit');

        $I->BuzzyDoc_validations('Required validation verified for name','#name','required','true','Required validation verified for name');

        $I->fillField('#name','Daniel');

        $I->click('Submit');

        $I->BuzzyDoc_validations('Required validation verified for email','#email','required','true','Required validation verified for email');

        $I->BuzzyDoc_validations('type validation verified for email','#email','type','email','type validation verified for email');

        $I->fillField('#email','abc@def.com');

        $I->click('Submit');

        $I->BuzzyDoc_validations('Required validation verified for phone','#phone','required','true','Required validation verified for phone');

        $I->BuzzyDoc_validations('type validation verified for phone','#phone','type','tel','type validation verified for phone');

        $I->fillField('#phone','9878945566');

        $I->click('Submit');

        $I->BuzzyDoc_validations('Required validation verified for preferred-talking-time','#preferred-talking-time','required','true','Required validation verified for preferred-talking-time');
        $I->selectOption('form select[name=preferred_talking_time]', '6PM - 8PM');
        $I->click('Submit');

        $I->BuzzyDoc_validations('required validation verified for check_status','#check_status','required','true','required validation verified for check_status');
        $I->checkOption('#check_status');

        $I->click('Cancel');
        $I->amOnPage('referrals');

        //$I->moveBack();
        //$I->moveBack();
        //$I->wait(3);

        //$I->Logout();
    }

    public function modal(BuzzyUiTester $I)
    {

            $I->Login('user','123456789');
            $I->click('tbody tr td:last-child a:nth-child(2)');
          // $I->click('#changePasswordButton');
            $I->executeJS('$("#changePasswordButton").click()');
                // get dynamic name of iframe
    // $iframe = $I->findElement("//iframe");
    // $name   = $iframe->getAttribute("name");

    // switch to iframe
    //$I->switchToIframe($name);
             $I->waitForElementVisible('#old_pwd',5);
          // $I->wait(20); // waiting it to show
            //$I->seeElement('#changePasswordModal');
            $I->fillField('#old_pwd','123456789'); // there is form inside modal
            $I->wait(5);
           // $I->see('Are you sure?', '#modal'); // text inside modal
            //$I->click('Ok', '#modal'); // clicking ok insode modal
//Object[a#newid.btn.btn-primary #changePasswordModal]




    }

public function Search_psitive(BuzzyUiTester $I)
    {
        $I->Login('user','123456789');
        $I->Search('9878943381','test','1','0');//Searcg those phone numbers who are not registered on people hub yet.
        $I->Search('@gmail.com','test','1','0');
        $I->Search('TestDg','test','1','0');


        $I->Search('9878943381','#attrTypePhone','0','0');
        $I->Search('@gmail.com','#attrTypeEmail','0','0');
        $I->Search('TestDg','#attrTypeCard','0','0');


//Submit button
        $I->Login('user','123456789');
        $I->Search('9878943381','test','1','1');//Searcg those phone numbers who are not registered on people hub yet.
        $I->Search('@gmail.com','test','1','1');
        $I->Search('TestDg','test','1','1');


        $I->Search('9878943381','#attrTypePhone','0','1');
        $I->Search('@gmail.com','#attrTypeEmail','0','1');
        $I->Search('TestDg','#attrTypeCard','0','1');

        $I->Search_negative('','#attrTypePhone','0','1');
        $I->Search_negative('','test','1','0');




    }


    public function cc_setup(BuzzyUiTester $I)
    {
        $I->Login('admin','12345678');
        $I->cc_positive('4444333322221111', '1128','123','Test','User','United States of America','123456','M-1404 apt-09','Test','Test','9878943312');
        $I->cc_edit('11/19','9878987678');
        $I->cc_delete();
    }

public function vendor_templates(BuzzyUiTester $I)
{
    $I->Login('admin','12345678');
    $I->maximizeWindow();
    $I->add_template('Orthodontics', '20', '10', '50', '60','30','40','45','Level 1','20','30','Level 2','50','60');




}


public function instant_redemption(BuzzyUiTester $I){
        $I->login('divya', 'divya@123');
       // $I->register_new_patient('divya', 'divya1', 'vishakha.chaudhary@twinspark.co','9876543210', '12345678','0','Instant Redemption','Award Points');
        $I->Search('divya','test','1','0');
        $I->click(Locator::elementAt('//table/tbody/tr', 1));
        /*$I->click('Instant Redeem');
        $I->wait(3);
        $I->see('Redeemed Successfully');
        $I->click(Locator::find('button' ,['class' =>'confirm']));
        $I->wait(4);*/

        $I->click('Instant Gift Credit');
        $I->see('Enter Amount');
        $I->click('Enter Amount');
        



    }


/*public function goodplan_redemptions(BuzzyUiTester $I)
{
    $I->Login('divya','divya@123');
   // $I->maximizeWindow();
     $I->Search('aarti','test','1','0');




}*/

public function history(BuzzyUiTester $I){
        $I->login('bestvendor1', '123456789');
        $I->Search('divya','#attrTypeEmail','1','0');
        $I->click(Locator::elementAt('//table/tbody/tr', 1));
        $I->activityhistory('3');



       // $I->manual_points();
    }
public function staff_history(BuzzyUiTester $I)
{
    $I->login('bestvendor1', '123456789');
    $I->staffhistory('11/11/2016','11/19/2016','Tier Award','Promotion Award');
    $I->wait(5);
}
    
    public function compliance_survey(BuzzyUiTester $I)
{
    $I->login('divyagupta.dg2+fin@gmail.com', '123456789');
    $I->Search('divya','#attrTypeEmail','1','0');
    $I->click(Locator::elementAt('//table/tbody/tr', 1));
    $I->survey();

}

public function vendorsurvey(BuzzyUiTester $I)
{
    $I->login('bestvendor', '123456789');
    $I->vendor_survey();

}


public function vendorsurvey_crud(BuzzyUiTester $I)
{
    $I->login('admin', '12345678');
    $I->survey_questions_crud_add('Test question for codeception','Boolean',1,25);
    $I->survey_questions_crud_view('Test question for codeception',25);
    $I->survey_questions_crud_edit('New test question for codeception',45);
    $I->survey_questions_crud_delete('New test question for codeception');

}

public function vendorsurvey_crud_negative(BuzzyUiTester $I)
{
    $I->login('admin', '12345678');
    $I->survey_questions_crud_add_negative('Test question for codeception','Boolean',1,25);
    $I->survey_questions_crud_edit_negative('New test question for codeception',4,45);
    $I->survey_questions_crud_delete_negative('Choose an answer 2 for survey 3? ');

}

}

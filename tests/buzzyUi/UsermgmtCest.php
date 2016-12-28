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
    

   

public function All_functions(BuzzyUITester $I)
    {

        //Login Function
        $I->login('admin','123456');

        //Issue gift coupon(Gift coupon id from database)
        $I->gift_coupon_redemption(73);
        //gift coupon redemption
        $I->gift_coupon_redemption();
        //gift coupon issue negative
        $I->gift_coupon_issue_neg(73);
        //gift coupon redemption negative
        $I->gift_coupon_redemption_neg();
        // tiers----positive
        $I->positive_case_for_add_view_tiers('Tier 4', 6500, 2.5, '$25 Gift Certificate', 50);
        $I->positive_case_for_edit_delete_tiers('tier4', 5500, 1.5, '$50 Gift Certificate', 50);
        //tier perks----positive
        $I->positive_case_for_add_view_tier_perk('Tier 1', 'blabla 1', 50);
        $I->positive_case_for_edit_delete_tier_perk('Tier 2', 'blabla 2', 50);  

        //tiers----negative
         $I->negative_case_for_add_tiers('Tier5', 6500, 2.5, '$25 Gift Certificate', 50);
         $I->negative_case_for_edit_delete_tiers('Tier 5', 8000, 3, '$50 Gift Certificate', 50);

         //tier perks----negative
         $I->negative_case_for_add_tier_perks('Tier 2', 'blabla2', 50);
         $I->negative_case_for_edit_delete_tier_perks('Tier 1', 'blabla 1', 50); 
    
        //welcome email
        $I->send_welcome_email();
        //register new patient
        $I->register_new_patient('kshitiz12345', 'Aarti1234', 'kshitiz555@twinspark.co','test22','9987654300','james.kukreja755@twinspark.co', '9978653200', 'Instant Redemption','Award Points', '1', '1');
        // Marketing Flow
        $I->marketing_promotions();
        //Wallet credit redemption using amazon tango
        $I->amazon_tango();
        //Request a review
        $I->review_rating('1', 'james', '0');

        //vendor promotions---positive

        $I->positive_case_for_add_view_promotions('promotion8', 'description8', 56, 8, 50);
        $I->positive_case_for_edit_delete_promotions(45, 50);
        $I->positive_vendor_promotions_checkboxChecked_edit(28);
        //Vendor Promotions---negative
        $I->negative_case_for_add_view_promotions('testPromotion', 'testdescription', 30, 7, 50);
        $I->negative_case_for_edit_delete_vendor_promotions(45, 50); 


        //cc setup

        $I->add_creditCardCharge('4444 2222 1111 3333', '0719', '789', 'Damon', 'Damon', 'United States of America', '201010', 'b-4, DamonVilla', 'blabla', 'asdfgh', '9876543212');
        $I->edit_credictCardSetUp('765', '9876543356');

        //search 

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

        //Activity History(Argument passed is the plan id)
        $I->activityhistory('3');

        //Staff history(Start date, end date, find value in search box,dont see on the page)
        $I->staffhistory('11/11/2016','11/19/2016','Tier Award','Promotion Award');

        //vendor survey questions
        $I->vendor_survey_questions();

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Super admin functions
        // questions CRUD
        $I->questions_crud_add('Test question for codeception','Boolean',1,25);
        $I->questions_crud_view('Test question for codeception',25);
        $I->questions_crud_edit('New test question for codeception',45);
        $I->uestions_crud_delete('New test question for codeception');
        //Questions CRUD Negative 
        $I->questions_crud_add_negative('Test question for codeception','Boolean',1,25);
        $I->questions_crud_edit_negative('New test question for codeception',4,45);
        $I->questions_crud_delete_negative('Choose an answer 2 for survey 3? ');

        //Logout Function
        $I->logout();


    }
//Test case for staff history
public function staff_history(BuzzyUiTester $I)
    {
         $I->login('divyagupta.dg2+nexus@twinspark.co','12345678');
         $I->staffhistory('11/11/2016','11/19/2016','Tier Award','Promotion Award');
         $I->wait(5);
         


    }
// Activity history
    public function activity_history(BuzzyUiTester $I)
    {
        $I->login('bestvendor1', '123456789');
        $I->Search('divya','#attrTypeEmail','1','0');
        $I->click(Locator::elementAt('//table/tbody/tr', 1));
        $I->activityhistory('3');//plan id
        $I->wait(3);


    }

    // Vendor survey questions----vendor
    public function vendor_survey_questions(BuzzyUiTester $I)
    {
        $I->login('bestvendor1', '123456789');
        $I->vendor_survey_questions();
        $I->wait(3);


    }

    // Questions CRUD Super admin----positive
    public function questions_CRUD_positive(BuzzyUiTester $I)
    {
        $I->login('admin', '12345678');
        $I->survey_questions_crud_add('Test question for codeception','Boolean',1,25);
        $I->survey_questions_crud_view('Test question for codeception',25);
        $I->survey_questions_crud_edit('New test question for codeception',45);
        $I->survey_questions_crud_delete('New test question for codeception');
        $I->wait(3);


    }

     // Questions CRUD Super admin----negative
    public function questions_CRUD_negative(BuzzyUiTester $I)
    {
        $I->login('admin', '12345678');
        $I->survey_questions_crud_add_negative('Test question for codeception','Boolean',1,25);
        $I->survey_questions_crud_edit_negative('New test question for codeception',4,45);
        $I->survey_questions_crud_delete_negative('Choose an answer 2 for survey 3? ');

        $I->wait(3);


    }

    // Search----positive
    public function search_positive(BuzzyUiTester $I)
    {
        $I->login('divyagupta.dg2+nexus@twinspark.co', '12345678');
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

        $I->wait(3);


    }

    // Search----negative
    public function search_negative(BuzzyUiTester $I)
    {
        $I->login('divyagupta.dg2+nexus@twinspark.co', '12345678');
        $I->Search_negative('','#attrTypePhone','0','1');
        $I->Search_negative('','test','1','0');
        $I->wait(3);


    }
    // Credit card management
    public function Credit_card_setup(BuzzyUiTester $I)
    {
        $I->login('divyagupta.dg2+nexus@twinspark.co', '12345678');
        $I->add_creditCardCharge('4444 2222 1111 3333', '0719', '789', 'Damon', 'Damon', 'United States of America', '201010', 'b-4, DamonVilla', 'blabla', 'asdfgh', '9876543212');
        $I->edit_credictCardSetUp('765', '9876543356');
        $I->wait(3);
    }
    //vendor promotions-----positive
    public function vendor_promotions_positive(BuzzyUiTester $I)
    {
        $I->login('divyagupta.dg2+nexus@twinspark.co', '12345678');
        $I->positive_case_for_add_view_promotions('promotion8', 'description8', 56, 8, 50);
        $I->positive_case_for_edit_delete_promotions(45, 50);
        $I->positive_vendor_promotions_checkboxChecked_edit(28);
        $I->wait(3);


    }

    //vendor promotions-----negative
    public function vendor_promotions_negative(BuzzyUiTester $I)
    {
        $I->login('divyagupta.dg2+nexus@twinspark.co', '12345678');
        $I->negative_case_for_add_view_promotions('testPromotion', 'testdescription', 30, 7, 50);
        $I->click('Settings');
        $I->negative_case_for_edit_delete_vendor_promotions(45, 50); 
        $I->wait(3);


    }

    //send welcome email
    public function welcome_email(BuzzyUiTester $I)
    {
        $I->login('divyagupta.dg2+nexus@twinspark.co', '12345678');
        $I->Search('divya','#attrTypeEmail','1','0');
        $I->click(Locator::elementAt('//table/tbody/tr', 3));
        $I->send_welcome_email();
        $I->wait(3);


    }

//register new patient
    public function register_patient(BuzzyUiTester $I)
    {
        $I->login('divyagupta.dg2+nexus@twinspark.co', '12345678');
        $I->register_new_patient('kshitiz12345', 'Aarti1234', 'kshitiz555@twinspark.co','test22','9987654300','james.kukreja755@twinspark.co', '9978653200', 'Instant Redemption','Award Points', '1', '1');
        $I->wait(3);
    }

    //marketing promotions
    public function marketing_flow(BuzzyUiTester $I)
    {
        $I->login('divyagupta.dg2+nexus@twinspark.co', '12345678');
        $I->Search('divya','#attrTypeEmail','1','0');
        $I->click(Locator::elementAt('//table/tbody/tr', 3));
        $I->marketing_promotions();
        $I->wait(3);
    }

    //wallet credit redemption----amazon_tango_redemptions
    public function amazon_tango_redemption(BuzzyUiTester $I)
    {
        $I->login('divyagupta.dg2+nexus@twinspark.co', '12345678');
        $I->Search('divya','#attrTypeEmail','1','0');
        $I->click(Locator::elementAt('//table/tbody/tr', 3));
        $I->amazon_tango();
        $I->wait(3);
    }

    //request review
    public function request_review(BuzzyUiTester $I)
    {
        $I->login('divyagupta.dg2+nexus@twinspark.co', '12345678');
        $I->Search('divya','#attrTypeEmail','1','0');
        $I->click(Locator::elementAt('//table/tbody/tr', 3));
        $I->review_rating('1', 'james', '0');
        $I->wait(3);
    }


// tiers----positive
    public function tiers_positive(BuzzyUiTester $I)
    {
        $I->login('divyagupta.dg2+nexus@twinspark.co', '12345678');
        $I->positive_case_for_add_view_tiers('Tier 4', 6500, 2.5, '$25 Gift Certificate', 50);
        $I->click('Settings');
        $I->positive_case_for_edit_delete_tiers('tier4', 5500, 1.5, '$50 Gift Certificate', 50);
        $I->wait(3);
    }

    // tier perks------positive
    public function tier_perks_positive(BuzzyUiTester $I)
    {
        $I->login('divyagupta.dg2+nexus@twinspark.co', '12345678');
        $I->positive_case_for_add_view_tier_perk('Tier 1', 'blabla 1', 50);
        $I->click('Settings');
        $I->positive_case_for_edit_delete_tier_perk('Tier 2', 'blabla 2', 50);  
        $I->wait(3);
    }

    // tiers----negative
    public function tiers_negative(BuzzyUiTester $I)
    {
        $I->login('divyagupta.dg2+nexus@twinspark.co', '12345678');
        $I->negative_case_for_add_tiers('Tier5', 6500, 2.5, '$25 Gift Certificate', 50);
        $I->click('Settings');
        $I->negative_case_for_edit_delete_tiers('Tier 5', 8000, 3, '$50 Gift Certificate', 50);
        $I->wait(3);
    }

    // tier perks------negative
    public function tier_perks_negative(BuzzyUiTester $I)
    {
        $I->login('divyagupta.dg2+nexus@twinspark.co', '12345678');
        $I->negative_case_for_add_tier_perks('Tier 2', 'blabla2', 50);
        $I->click('Settings');
        $I->negative_case_for_edit_delete_tier_perks('Tier 1', 'blabla 1', 50); 
        $I->wait(3);
    }

    //gift coupon issue positive
    public function gift_coupon_issue(BuzzyUiTester $I)
    {
    $I->login('divyagupta.dg2+nexus@twinspark.co', '12345678');
    $I->Search('divya','#attrTypeEmail','1','0');
    $I->click(Locator::elementAt('//table/tbody/tr', 1));
    $I->gift_coupon_redemption(73);
    $I->wait(3);

}

//gift coupon redemption positive
    public function gift_coupon_redemption(BuzzyUiTester $I)
{
    $I->login('divyagupta.dg2+nexus@twinspark.co', '12345678');
    $I->Search('divya','#attrTypeEmail','1','0');
    $I->click(Locator::elementAt('//table/tbody/tr', 1));
    $I->gift_coupon_redemption();
    $I->wait(3);

}


public function gift_coupon_issue_negative(BuzzyUiTester $I)
{
    $I->login('divyagupta.dg2+nexus@twinspark.co', '12345678');
    $I->Search('divya','#attrTypeEmail','1','0');
    $I->click(Locator::elementAt('//table/tbody/tr', 1));
    $I->gift_coupon_issue_neg(73);
    $I->wait(3);

}

public function gift_coupon_redemption_neg(BuzzyUiTester $I)
{
    $I->login('divyagupta.dg2+nexus@twinspark.co', '12345678');
    $I->Search('divya','#attrTypeEmail','1','0');
    $I->click(Locator::elementAt('//table/tbody/tr', 1));
    $I->gift_coupon_redemption_neg();
    $I->wait(3);

}


public function positive_case_for_gift_coupans(TierTester $I)
    {
        $I->login('damon', '12345678');
        $I->positive_case_for_add_view_gift_coupons('$80 giftcoupan', 25, 7, 50);
        $I->click('Settings');
        $I->positive_case_for_edit_delete_gift_coupons('$120 giftcoupon', 50, 10, 50);
    }

   public function negative_case_for_gift_coupons(TierTester $I)
    {
        $I->login('damon', '12345678');
        $I->negative_case_for_add_gift_coupons('$80 giftcoupon', 34, 10, 50);
        $I->click('Settings');
        $I->negative_case_for_edit_delete_gift_coupons('$120 giftcoupon', 22, 7, 50);

    } 

   
}

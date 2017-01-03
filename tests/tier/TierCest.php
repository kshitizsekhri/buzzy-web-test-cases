<?php
use \Codeception\Util\Locator;

class TierCest
{
    public function _before(TierTester $I)
    {
    }

    public function _after(TierTester $I)
    {
    }

    // tests
    public function tryToTest(TierTester $I)
    {
    }

    // public function positive_case_for_tiers_program(TierTester $I)
    // {
    //     $I->login('damon', '12345678');
    //     $I->positive_case_for_add_view_tiers('Tier 4', 6500, 2.5, '$25 Gift Certificate', 50);
    //     $I->positive_case_for_edit_delete_tiers('tier4', 5500, 1.5, '$50 Gift Certificate', 50);
    //     $I->positive_case_for_add_view_tier_perk('Tier 1', 'blabla 1', 50);
    //     $I->positive_case_for_edit_delete_tier_perk('Tier 2', 'blabla 2', 50);   
    // }

    // public function negative_case_for_tiers_programs(TierTester $I)
    // {
    //     $I->login('damon', '12345678');
    //     $I->negative_case_for_add_tiers('Tier5', 6500, 2.5, '$25 Gift Certificate', 50);
    //     $I->negative_case_for_edit_delete_tiers('Tier 5', 8000, 3, '$50 Gift Certificate', 50);
    //     $I->negative_case_for_add_tier_perks('Tier 2', 'blabla2', 50);
    //     $I->negative_case_for_edit_delete_tier_perks('Tier 1', 'blabla 1', 50); 
    // }

    // public function positive_case_for_gift_coupans(TierTester $I)
    // {
    //     $I->login('damon', '12345678');
    //     $I->positive_case_for_add_view_gift_coupons('$80 giftcoupan', 25, 7, 50);
    //     $I->click('Settings');
    //     $I->positive_case_for_edit_delete_gift_coupons('$120 giftcoupon', 50, 10, 50);
    // }

    // public function negative_case_for_gift_coupons(TierTester $I)
    // {
    //     $I->login('damon', '12345678');
    //     $I->negative_case_for_add_gift_coupons('$80 giftcoupon', 34, 10, 50);
    //     $I->click('Settings');
    //     $I->negative_case_for_edit_delete_gift_coupons('$120 giftcoupon', 22, 7, 50);

    // }


    // Tier rewards

    public function tier_rewards(TierTester $I, TierTester $heading)
    {
        $I->login('damon', '12345678');
        $I->Search('vish','vish','1','0');
        $heading = $I->grabTextFrom(Locator::find('div', ['class' => 'alert alert-success ng-binding']));
        if($heading=='0 results found')
        {
            $I->wait(4);
            $I->register_new_patient('vish', 'vish', 'vishakha.chaudhary@twinspark.co','','','', '9978653200', 'Instant Redemption','Award Points', '0', '1');
        }
        else{
          $I->wait(4);
          $I->click(Locator::elementAt('//table/tbody/tr', 1));
          $I->wait(4);
      }
        $I->case_for_tier_rewards(500);
    }

    //Manual Points

    public function manual_points_award(TierTester $I, TierTester $heading)
    {
        $I->login('damon', '12345678');
        $I->Search('vish','vish','1','0');
        $heading = $I->grabTextFrom(Locator::find('div', ['class' => 'alert alert-success ng-binding']));
        if($heading=='0 results found')
        {
            $I->wait(4);
            $I->register_new_patient('vish', 'vish', 'vishakha.chaudhary@twinspark.co','','','', '9978653200', 'Instant Redemption','Award Points', '0', '1');
        }
        else{
          $I->wait(4);
          $I->click(Locator::elementAt('//table/tbody/tr', 1));
          $I->wait(4);
      }
        $I->case_for_manual_points(50, 'award manual points');
    }

    // public function award_redeem_gift_coupons(TierTester $I, TierTester $heading)
    // {   
    //     $I->login('vishakha', '12345678');
    //     $I->Search('vishakha','vishakha','1','0');
    //     $heading = $I->grabTextFrom(Locator::find('div', ['class' => 'alert alert-success ng-binding']));
    //     codecept_debug($heading);
    //     if($heading=='0 results found')
    //     {
    //         $I->wait(4);
    //         $I->register_new_patient('vish', 'vishakha', 'vishakha.chaudhary@twinspark.co','1234567890', '12345678','1','Instant Redemption','Award Points');
    //     }
    //     else{
    //       $I->wait(4);
    //       $I->click(Locator::elementAt('//table/tbody/tr', 1));
    //       $I->wait(4);
    //   }
    //     $I->case_for_award_redeem_gift_coupons();
    // }


}

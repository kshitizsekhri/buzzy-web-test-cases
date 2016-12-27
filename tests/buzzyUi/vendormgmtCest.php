<?php
require_once('/home/divya/codeception/peoplehub/vendor/fzaninotto/faker/src/autoload.php');
use Codeception\Util\Locator;

class vendormgmtCest
{

    public function _before(BuzzyUiTester $I)
    {

    }

    public function _after(BuzzyUiTester $I)
    {
    }

    // tests
    public function tryToTest(BuzzyUiTester $I)
    {



    }

    /*public function loginAsAdminWithBlankFields(BuzzyUiTester $I)
    {

        $I->amGoingTo('log in to SuperAdmin Dashboard with blank fields');
        $I->amOnPage('users/login');
        $I->wait(3);
        $I->click('html body.gray-bg div.loginColumns.animated.fadeInDown div.row div.col-md-6 button.btn.btn-primary.block.full-width.m-b');
        $e= $I->grabAttributeFrom('#username', 'required');
        codecept_debug($e);
        $I->assertNull($e=null);
        $I->see('Our patients love the rewards program.');
        $I->seeInCurrentUrl('/users/login');
        

    }

    public function loginAsAdminWithBlankUsername(BuzzyUiTester $I)
    {
        $I->amGoingTo('log in to SuperAdmin Dashboard with blank username');
        $I->amOnPage('users/login');
        $I->wait(3);
        $I->fillField('#password', '123456');
        $I->click('html body.gray-bg div.loginColumns.animated.fadeInDown div.row div.col-md-6 button.btn.btn-primary.block.full-width.m-b');
        $e= $I->grabAttributeFrom('#username', 'required');
        codecept_debug($e);
        $I->assertNull($e=null);
        $I->see('Our patients love the rewards program.');
        $I->seeInCurrentUrl('/users/login');
    }

    public function loginAsAdminWithBlankpassword(BuzzyUiTester $I)
    {

        $I->amGoingTo('log in to SuperAdmin Dashboard with blank password');
        $I->amOnPage('users/login');
        $I->wait(3);
        $I->fillField('#username', 'admin');
        $I->click('html body.gray-bg div.loginColumns.animated.fadeInDown div.row div.col-md-6 button.btn.btn-primary.block.full-width.m-b');
        $e= $I->grabAttributeFrom('#password', 'required');
        codecept_debug($e);
        $I->assertNull($e=null);
        $I->see('Our patients love the rewards program.');
        $I->seeInCurrentUrl('/users/login');
    }

    public function loginAsAdminWithinvalidUsername(BuzzyUiTester $I)
    {
        $I->amGoingTo('log in to SuperAdmin Dashboard with invalid username');
        $I->amOnPage('users/login');
        $I->wait(3);
        $I->fillField('#username', 'admin@admin');
        $I->fillField('#password', '123456');
        $I->click('html body.gray-bg div.loginColumns.animated.fadeInDown div.row div.col-md-6 button.btn.btn-primary.block.full-width.m-b');
        $I->see('Unable to identify You.');
        $I->seeInCurrentUrl('/users/login');
    }



    public function loginAsAdminWithinvalidpassword(BuzzyUiTester $I)
    {
        $I->amGoingTo('log in to SuperAdmin Dashboard with invalid password');
        $I->amOnPage('users/login');
        $I->wait(3);
        $I->fillField('#username', 'admin');
        $I->fillField('#password', '1236');
        $I->click('html body.gray-bg div.loginColumns.animated.fadeInDown div.row div.col-md-6 button.btn.btn-primary.block.full-width.m-b');
        $I->see('Unable to identify You.');
        $I->seeInCurrentUrl('/users/login');
    }
*/
public function addVendor_Negative(BuzzyUiTester $I)
    {
        $I->amGoingTo('log in to SuperAdmin Dashboard to and perform negative test cases for add vendor');
        $I->login('admin','123456');
        
        $I->amGoingTo('Add a vendor');
        $I->click('/html/body/div[2]/nav/div/ul/li[3]/a');
        $I->wait(2);
        
        $I->click('/html/body/div[2]/nav/div/ul/li[3]/ul/li[2]/a');
        $I->wait(3);
        $I->see('Add Vendor');
        $I->seeInCurrentUrl('vendors/add');
        $I->wait(3);
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[27]/div/a');//Cancel button
        $I->wait(3);
        $I->see('Admin Dashboard');
        $I->seeInCurrentUrl('admin');
        $I->click('/html/body/div[2]/nav/div/ul/li[3]/a');
        $I->wait(2);
        
        $I->click('/html/body/div[2]/nav/div/ul/li[3]/ul/li[2]/a');
        $I->wait(3);
        $I->see('Add Vendor');
        $I->seeInCurrentUrl('vendors/add');

        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[27]/div/button');//submit button


        $I->BuzzyDoc_validations('required validation verified for organisation name','#org-name','required','true','required validation verified for organisation name');

        $I->fillField('#org-name', 'Test 1');


        $I->BuzzyDoc_validations('required validation verified for min deposit','#min-deposit','required','true','required validation verified for min deposit');

        $I->fillField('#min-deposit', '2000');

        $I->BuzzyDoc_validations('number validation verified for min deposit','#min-deposit','type','number','number validation verified for min deposit');

        $I->BuzzyDoc_validations('negative number validation verified for min deposit','#min-deposit','min','0','negative number validation verified for min deposit');

        

        //Validation for Reward template
        $r= $I->grabAttributeFrom('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[4]/div/select', 'required');
        codecept_debug($r);

        

        $I->BuzzyDoc_validations('number validation verified for threshold value','#threshold-value','type','number','number validation verified for threshold value');

        $I->fillField('#threshold-value', '500');



        $I->BuzzyDoc_validations('negative number validation verified for threshold value','#threshold-value','min','0','Negative number validation verified for threshold value');


        $I->BuzzyDoc_validations('required validation verified for last name','#user-last-name','required','true','Required validation verified for last name');

        $I->fillField('#user-last-name', 'test');



        $I->BuzzyDoc_validations('required validation verified for first name','#user-first-name','required','true','Required validation verified for first name');

        $I->fillField('#user-first-name', 'user');


       

       /* bug$I->BuzzyDoc_Add_Vendor_validations('required validation verified for email','#user-email','required','true','Required validation verified for email');*/


        $I->BuzzyDoc_validations('email validation verified for email','#user-email','type','email','email validation verified for email');

        $I->fillField('#user-email', 'ad@ax.com');




        
        $I->BuzzyDoc_validations('required validation verified for username','#user-username','required','true','required validation verified for username');

         

        $I->BuzzyDoc_validations('text validation verified for username','#user-username','type','text','text validation verified for username');

        $I->fillField('#user-username', 'username@123');


        

        $I->BuzzyDoc_validations('required validation verified for password','#user-password','required','true','required validation verified for password');

        

        $I->BuzzyDoc_validations('type validation verified for password','#user-password','type','password','type validation verified for password');

        $I->BuzzyDoc_validations('type validation verified for password','#user-password','data-minlength','8','length validation verified for password');

        $I->fillField('#user-password', '12345678');


        
        /* doubt$I->BuzzyDoc_Add_Vendor_validations('required validation verified for phone','#user-phone','required','true','required validation verified for phone');*/

        

        $I->BuzzyDoc_validations('tel validation verified for phone','#user-phone','type','tel','tel validation verified for phone');

        $I->fillField('#user-phone', '98786357263276');


        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[27]/div/button');//submit button
        $I->wait(3);
        $I->see('provide valid data');
       //// $I->fillField('#org-name', 'Test 1');
      ////  $I->fillField('#min-deposit', '2000');
      //  $I->fillField('##threshold-value', '200');
      //  $I->fillField('#user-last-name', 'test');
//$I->fillField('#user-first-name', 'user');
      //  $I->fillField('#user-email', 'ad@ax.com');
        $I->fillField('#user-username', 'username1234');
       // $I->fillField('#user-password', '12345678');
        $I->fillField('#user-phone', '1(800)345-1237');

        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[27]/div/button');//submit button
        $I->wait(3);
        $I->see('provide valid data');
       /* $I->fillField('#user-email', 'ad@axe.com');
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[27]/div/button');//submit button
        $I->wait(3);
        $I->see('provide valid data');*/
       // $I->fillField('#user-username', 'username@12345');
         /*$I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[27]/div/a');//Cancel button
        $I->wait(3);
        $I->see('Vendors');
        $I->seeInCurrentUrl('vendors');*/


$I->amGoingTo('log in to SuperAdmi edit vendor vendor');
        
        $I->amGoingTo('edit a vendor');
        $I->click('/html/body/div[2]/nav/div/ul/li[3]/a');// vendor menu item
        $I->wait(2);
        
        $I->click('/html/body/div[2]/nav/div/ul/li[3]/ul/li[1]/a');// view all menu item
        $I->wait(3);
        $I->see('Vendors');
        $I->seeInCurrentUrl('vendors');
        $I->wait(3);
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/table/tbody/tr[5]/td[8]/a[2]'); //edit button

        $I->wait(3);
        $I->see('Edit Vendor');
      //  $I->seeInCurrentUrl('vendors');
        $I->wait(3);
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[14]/div/a');//Cancel button
        $I->wait(3);
        $I->see('Vendors');
        $I->seeInCurrentUrl('vendors');

        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/table/tbody/tr[5]/td[8]/a[2]'); //edit button

        

        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[14]/div/button');//submit button


        $I->BuzzyDoc_validations('required validation verified for organisation name','#org-name','required','true','required validation verified for organisation name');


        $I->BuzzyDoc_validations('required validation verified for min deposit','#min-deposit','required','true','required validation verified for min deposit');

        $I->BuzzyDoc_validations('number validation verified for min deposit','#min-deposit','type','number','number validation verified for min deposit');

        $I->BuzzyDoc_validations('negative number validation verified for min deposit','#min-deposit','min','0','negative number validation verified for min deposit');

        

        //Validation for Reward template
        $r= $I->grabAttributeFrom('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[4]/div/select', 'required');
        codecept_debug($r);

        

        $I->BuzzyDoc_validations('number validation verified for threshold value','#threshold-value','type','number','number validation verified for threshold value');



        $I->BuzzyDoc_validations('negative number validation verified for threshold value','#threshold-value','min','0','Negative number validation verified for threshold value');

        /*$I->fillField('#org-name', 'Test 1 edited');
        $I->fillField('#min-deposit', '20000');
        $I->fillField('#threshold-value', '2000');*/

        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[14]/div/a');//Cancel button
        $I->wait(3);
        $I->see('Vendors');
        $I->seeInCurrentUrl('vendors');

        $I->click('/html/body/div[2]/div/div[1]/nav/ul/li/a');//logout button
        $I->wait(3);
        $I->see('Our patients love the rewards program. ');
        $I->seeInCurrentUrl('users/login');

}

public function addUser_Negative(BuzzyUiTester $I)
    {

        $I->amGoingTo('log in to SuperAdmin Dashboard and perform negative test cases for User management');
        $I->login('admin','123456');
        
        $I->amGoingTo('Add a user');
        $I->click('/html/body/div[2]/nav/div/ul/li[4]/a');
        $I->wait(2);
        
        $I->click('/html/body/div[2]/nav/div/ul/li[4]/ul/li[2]/a');
        $I->wait(3);
        $I->see('Users');
        $I->seeInCurrentUrl('users/add');
        $I->wait(3);
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[20]/div/a');//Cancel button
        $I->wait(3);
        $I->see('Admin Dashboard');
        $I->seeInCurrentUrl('admin');
        $I->click('/html/body/div[2]/nav/div/ul/li[4]/a');
        $I->wait(2);
        
        $I->click('/html/body/div[2]/nav/div/ul/li[4]/ul/li[2]/a');
        $I->wait(3);
        $I->see('Add User');
        $I->seeInCurrentUrl('users/add');

        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[20]/div/button');//submit button


        $I->BuzzyDoc_validations('required validation verified for vendor id ','#vendor-id','required','true','required validation verified for vendor id');

        $I->BuzzyDoc_validations('required validation verified for user role ','#role-id','required','true','required validation verified for role id');


        $I->BuzzyDoc_validations('required validation verified for first name','#first-name','required','true','required validation verified for first name');

        $I->BuzzyDoc_validations('type validation verified for first name','#first-name','type','text','type validation verified for first name');

        $I->BuzzyDoc_validations('required validation verified for last name','#last-name','required','true','required validation verified for last name');

        $I->BuzzyDoc_validations('type validation verified for last name','#last-name','type','text','type validation verified for last name');

        $I->BuzzyDoc_validations('required validation verified for email','#email','required','true','Required validation verified for email');


        $I->BuzzyDoc_validations('email validation verified for email','#email','type','email','email validation verified for email');

        /*$I->BuzzyDoc_validations('required validation verified for phone','#phone','required','true','required validation verified for phone');*/

        $I->BuzzyDoc_validations('tel validation verified for phone','#phone','type','tel','tel validation verified for phone');
       

        $I->BuzzyDoc_validations('required validation verified for username','#username','required','true','required validation verified for username');

         

        $I->BuzzyDoc_validations('text validation verified for username','#username','type','text','text validation verified for username');

        

        $I->BuzzyDoc_validations('required validation verified for password','#password','required','true','required validation verified for password');

        $I->BuzzyDoc_validations('type validation verified for password','#password','data-minlength','8','length validation verified for password');

        

        $I->BuzzyDoc_validations('type validation verified for password','#password','type','password','type validation verified for password');

        //$faker = Faker\Factory::create();

        $I->fillField('#last-name', '$faker->name');
        $I->fillField('#first-name', 'user');
        $I->fillField('#email', '$faker->email');
        $I->fillField('#username', 'username1234');
        $I->fillField('#password', '12345678');
        $I->fillField('#phone', '47887483749376');

        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[20]/div/button');//submit button
        $I->wait(3);
        $I->see('provide valid data');
        $I->fillField('#phone', '1(800)789-3456');
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[20]/div/button');//submit button
        $I->wait(3);
        $I->see('provide valid data');


        /*$I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[18]/div/a');//Cancel button
        $I->wait(3);
        $I->see('Admin Dashboard');
        $I->seeInCurrentUrl('admin');
*/
        /*$I->click('/html/body/div[2]/div/div[1]/nav/ul/li/a');//logout button
        $I->wait(3);
        $I->see('Our patients love the rewards program. ');
        $I->seeInCurrentUrl('users/login');*/

$I->amGoingTo('log in to SuperAdmin to edit user');
        
        $I->amGoingTo('edit a user');
        $I->click('/html/body/div[2]/nav/div/ul/li[4]/a');// user menu item
        $I->wait(2);
        
        $I->click('/html/body/div[2]/nav/div/ul/li[4]/ul/li[1]/a');// view all users menu item
        $I->wait(3);
        $I->see('Users');
        $I->seeInCurrentUrl('users');
        $I->wait(3);
        $I->click('/html/body/div[2]/div/div[3]/div[1]/div/div/div/div[2]/table/tbody/tr[2]/td[9]/a[2]'); //edit button

        $I->wait(3);
        $I->see('Edit User');
      //  $I->seeInCurrentUrl('vendors');
        $I->wait(3);
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[20]/div/a');//Cancel button
        $I->wait(3);
        $I->see('Users');
        $I->seeInCurrentUrl('users');

        $I->click('/html/body/div[2]/div/div[3]/div[1]/div/div/div/div[2]/table/tbody/tr[2]/td[9]/a[2]'); //edit button

        

        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[20]/div/button');//submit button


        $I->BuzzyDoc_validations('required validation verified for vendor-id','#vendor-id','required','true','required validation verified for vendor-id');


        $I->BuzzyDoc_validations('required validation verified for role-id','#role-id','required','true','required validation verified for min deposit');

    

        $I->BuzzyDoc_validations('negative number validation verified for first-name','#first-name','required','true','required validation verified for first-name');


        $I->BuzzyDoc_validations('type validation verified for first-name','#first-name','type','text','type validation verified for threshold value');



        $I->BuzzyDoc_validations('required number validation verified for last-name','#last-name','required','true','required validation verified for last-name');

        $I->BuzzyDoc_validations('type validation verified for last name','#last-name','type','text','type validation verified for last name');

        $I->BuzzyDoc_validations('required validation verified for email','#email','required','true','Required validation verified for email');


        $I->BuzzyDoc_validations('email validation verified for email','#email','type','email','email validation verified for email');

        /*$I->BuzzyDoc_validations('required validation verified for phone','#phone','required','true','required validation verified for phone');*/

        $I->BuzzyDoc_validations('tel validation verified for phone','#phone','type','tel','tel validation verified for phone');
       

        $I->BuzzyDoc_validations('required validation verified for username','#username','required','true','required validation verified for username');

         

        $I->BuzzyDoc_validations('text validation verified for username','#username','type','text','text validation verified for username');

        

        $I->BuzzyDoc_validations('required validation verified for password','#password','required','true','required validation verified for password');

        

        $I->BuzzyDoc_validations('type validation verified for password','#password','type','password','type validation verified for password');
        $I->BuzzyDoc_validations('type validation verified for password','#password','data-minlength','8','length validation verified for password');

        $I->fillField('#username', 'username1234');
        $I->fillField('#phone', '47887483749376');
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[20]/div/button');//submit button
        $I->wait(3);
        $I->see('provide valid data');
        $I->fillField('phone', '1(800)345-3456');
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[20]/div/button');//submit button
        $I->wait(3);
        $I->see('provide valid data');






        /*$I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[18]/div/a');//Cancel button
        $I->wait(3);
        $I->see('Users');
        $I->seeInCurrentUrl('users');*/

        $I->click('/html/body/div[2]/div/div[1]/nav/ul/li/a');//logout button
        $I->wait(3);
        $I->see('Our patients love the rewards program. ');
        $I->seeInCurrentUrl('users/login');


}


public function addPromotions_Negative(BuzzyUiTester $I)
    {

        $I->amGoingTo('log in to SuperAdmin Dashboard and perform negative test cases for Promotions');
        $I->login('admin','123456');
        
        $I->amGoingTo('Add a promotion');
        $I->click('/html/body/div[2]/nav/div/ul/li[7]/a');
        $I->wait(2);
        
        $I->click('/html/body/div[2]/nav/div/ul/li[7]/ul/li[2]/a');
        $I->wait(3);
        $I->see('Add Promotion');
        $I->seeInCurrentUrl('promotions/add');
        $I->wait(3);
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[10]/div/a');//Cancel button
        $I->wait(3);
        $I->see('Admin Dashboard');
        $I->seeInCurrentUrl('admin');
        $I->click('/html/body/div[2]/nav/div/ul/li[7]/a');
        $I->wait(2);
        
        $I->click('/html/body/div[2]/nav/div/ul/li[7]/ul/li[2]/a');
        $I->wait(3);
        $I->see('Add Promotion');
        $I->seeInCurrentUrl('promotions/add');

        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[10]/div/button');//submit button

        $I->BuzzyDoc_validations('required validation verified for name ','#name','required','true','required validation verified for name');

        $I->BuzzyDoc_validations('type validation verified for name ','#name','type','text','type validation verified for name');


        $I->BuzzyDoc_validations('required validation verified for description','#description','required','true','required validation verified for first description');

        $I->BuzzyDoc_validations('required validation verified for points','#points','required','true','required validation verified for points');

        $I->BuzzyDoc_validations('type validation verified for points','#points','type','number','type validation verified for points');

        $I->BuzzyDoc_validations('min validation verified for points','#points','min','1','min validation verified for points');

        $I->fillField('#name', 'test 123');
        $I->fillField('#description', 'test description');
        $I->fillField('#points', '56.99');

        $I->wait(3);

        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[10]/div/a');//Cancel
        $I->wait(3);
        /*$I->see('Admin Dashboard');
        $I->seeInCurrentUrl('admin');*/

        $I->amGoingTo('edit a promotion');
        $I->click('/html/body/div[2]/nav/div/ul/li[7]/a');
        $I->wait(2);
        $I->click('/html/body/div[2]/nav/div/ul/li[7]/ul/li[1]/a');


        $I->wait(3);
        $I->see('Promotions');
        $I->seeInCurrentUrl('promotions');
        $I->wait(3);
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[3]/table/tbody/tr[6]/td[7]/a[2]'); //edit button

        $I->wait(3);
        $I->see(' Edit');
      //  $I->seeInCurrentUrl('vendors');
        $I->wait(3);
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[12]/div/a');//Cancel button
        $I->wait(3);
        $I->see('Promotions');
        $I->seeInCurrentUrl('promotions');

        $I->wait(3);
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[3]/table/tbody/tr[6]/td[7]/a[2]'); //edit button

        $I->wait(3);
        $I->see(' Edit');
      //  $I->seeInCurrentUrl('vendors');
        $I->wait(3);

        $I->BuzzyDoc_validations('required validation verified for name ','#name','required','true','required validation verified for name');

        $I->BuzzyDoc_validations('type validation verified for name ','#name','type','text','type validation verified for name');


        $I->BuzzyDoc_validations('required validation verified for description','#description','required','true','required validation verified for first description');

        $I->BuzzyDoc_validations('required validation verified for points','#points','required','true','required validation verified for points');

        $I->BuzzyDoc_validations('type validation verified for points','#points','type','number','type validation verified for points');

        $I->BuzzyDoc_validations('min validation verified for points','#points','min','1','min validation verified for points');
        $I->fillField('#name', 'test 123');
        $I->fillField('#description', 'test description');
        $I->fillField('#points', '56.99');

        $I->wait(3);
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[12]/div/a');//Cancel button
        $I->wait(3);
        $I->see('Promotions');
        $I->seeInCurrentUrl('promotions');

        //Delete

        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[3]/table/tbody/tr[2]/td[5]/a[3]');//delete button
        $I->wait(3);
        $I->seeInPopup('Are you sure you want to delete');
        $I->cancelPopup();

        $I->click('/html/body/div[2]/div/div[1]/nav/ul/li/a');//logout button
        $I->wait(5);
        $I->see('Our patients love the rewards program. ');
        $I->seeInCurrentUrl('users/login');


        }


        public function addLegacyRewards_Negative(BuzzyUiTester $I)
    {

        $I->amGoingTo('log in to SuperAdmin Dashboard and perform negative test cases for Legacy Rewards');
        $I->login('admin','123456');
        
        $I->amGoingTo('Add a Legacy reward');
        $I->click('/html/body/div[2]/nav/div/ul/li[5]/a');
        $I->wait(2);
        
        $I->click('/html/body/div[2]/nav/div/ul/li[5]/ul/li[2]/a');
        $I->wait(3);
        //$I->see('Add Legacy reward');
        $I->seeInCurrentUrl('legacy-rewards/add');
        $I->wait(3);
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[16]/div/a');//Cancel button
        $I->wait(3);
        $I->see('Admin Dashboard');
        $I->seeInCurrentUrl('admin');
        $I->click('/html/body/div[2]/nav/div/ul/li[5]/a');
        $I->wait(2);
        
        $I->click('/html/body/div[2]/nav/div/ul/li[5]/ul/li[2]/a');
        $I->wait(3);
      //  $I->see('Add Legacy Reward');
        $I->seeInCurrentUrl('legacy-rewards/add');

        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[16]/div/button');//submit button

        $I->BuzzyDoc_validations('required validation verified for name ','#name','required','true','required validation verified for name');

        $I->BuzzyDoc_validations('type validation verified for name ','#name','type','text','type validation verified for name');


        $I->BuzzyDoc_validations('required validation verified for vendor-id','#vendor-id','required','true','required validation verified for vendor-id');

        $I->BuzzyDoc_validations('required validation verified for reward-category-id','#reward-category-id','required','true','required validation verified for reward-category-id');

        $I->BuzzyDoc_validations('required validation verified for product-type-id','#product-type-id','required','true','required validation verified for product-type-id');

        $I->BuzzyDoc_validations('required validation verified for image','#imgChange','required','true','required validation verified for imgChange');

        $I->BuzzyDoc_validations('type validation verified for image','#imgChange','type','file','type validation verified for imgChange');

        $I->BuzzyDoc_validations('required validation verified for points','#input-points','required','true','required validation verified for points');

        $I->BuzzyDoc_validations('type validation verified for points','#input-points','type','number','type validation verified for points');

        $I->BuzzyDoc_validations('min validation verified for points','#input-points','min','1','min validation verified for points');

        $I->fillField('#name', 'test 123');
        $I->fillField('#input-points', '56.99');

        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[16]/div/a');//Cancel 

        $I->wait(3);
        $I->see('Admin Dashboard');
        $I->seeInCurrentUrl('admin');

        $I->amGoingTo('edit a Legacy Reward');
        $I->click('/html/body/div[2]/nav/div/ul/li[5]/a');
        $I->wait(2);
        $I->click('/html/body/div[2]/nav/div/ul/li[5]/ul/li[1]/a');


        $I->wait(3);
        $I->see('Legacy Rewards');
        $I->seeInCurrentUrl('legacy-rewards');
        $I->wait(3);
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/table/tbody/tr[1]/td[10]/a[2]'); //edit button

        $I->wait(3);
   //     $I->see(' Edit Legacy Rewards');
      //  $I->seeInCurrentUrl('vendors');
        $I->wait(3);
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[16]/div/a');//Cancel button
        $I->wait(3);
        $I->see('Legacy Rewards');
        $I->seeInCurrentUrl('legacy-rewards');

        $I->wait(3);
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/table/tbody/tr[1]/td[10]/a[2]'); //edit button

        $I->wait(3);
        $I->see(' Edit');
      //  $I->seeInCurrentUrl('vendors');
        $I->wait(3);



        $I->BuzzyDoc_validations('required validation verified for name ','#name','required','true','required validation verified for name');

        $I->BuzzyDoc_validations('type validation verified for name ','#name','type','text','type validation verified for name');


        $I->BuzzyDoc_validations('required validation verified for vendor-id','#vendor-id','required','true','required validation verified for vendor-id');

        $I->BuzzyDoc_validations('required validation verified for reward-category-id','#reward-category-id','required','true','required validation verified for reward-category-id');

        $I->BuzzyDoc_validations('required validation verified for product-type-id','#product-type-id','required','true','required validation verified for product-type-id');

        /*$I->BuzzyDoc_validations('required validation verified for image','#imgChange','required','true','required validation verified for imgChange');*/

        $I->BuzzyDoc_validations('type validation verified for image','#imgChange','type','file','type validation verified for imgChange');

        $I->BuzzyDoc_validations('required validation verified for points','#input-points','required','true','required validation verified for points');

        $I->BuzzyDoc_validations('type validation verified for points','#input-points','type','number','type validation verified for points');

        $I->BuzzyDoc_validations('min validation verified for points','#input-points','min','1','min validation verified for points');
        $I->fillField('#name', 'test 123');
        $I->fillField('#input-points', '56.99');


        $I->wait(3);
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[16]/div/a');//Cancel button
        $I->wait(3);
        $I->see('Legacy Rewards');
        $I->seeInCurrentUrl('legacy-rewards');

        //Delete

        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/table/tbody/tr[1]/td[10]/a[3]');//delete button
        $I->wait(3);
        $I->seeInPopup('Are you sure you want to delete');
        $I->cancelPopup();

        $I->click('/html/body/div[2]/div/div[1]/nav/ul/li/a');//logout button
        $I->wait(5);
        $I->see('Our patients love the rewards program. ');
        $I->seeInCurrentUrl('users/login');


        }

public function Legacy_Redemptions_Negative(BuzzyUiTester $I)
    {

        $I->amGoingTo('log in to SuperAdmin Dashboard and perform negative test cases for Legacy Redemptions');
        $I->login('admin','123456');
        
        $I->amGoingTo('Update the status of a legacy redemptions');
        $I->click('/html/body/div[2]/nav/div/ul/li[6]/a');
        $I->wait(2);
        
        $I->see('Legacy Redemptions');
        $I->seeInCurrentUrl('legacy-redemptions');
        $I->wait(3);
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/table/tbody/tr[1]/td[9]/a');//edit button
        $I->wait(3);
        $I->see('Edit Legacy Redemption');
      //  $I->seeInCurrentUrl('admin');
        $I->click('/html/body/div[2]/div/div[3]/div[1]/div/div/div[2]/form/div[2]/div[14]/div/a');//cancel button
        $I->wait(2);
        
        $I->click('#bulk_update_button');
        $I->wait(3);
        $I->see('In Office');
        $I->see('Ordered/Shipped');
        $I->see('In Office');
        $I->see('Redeemed');
        $I->see('Redeemed');
        

        $I->click('/html/body/div[2]/div/div[1]/nav/ul/li/a');//logout button
        $I->wait(5);
        $I->see('Our patients love the rewards program. ');
        $I->seeInCurrentUrl('users/login');


        }
         public function LegacyRewardsCreate(BuzzyUiTester $I)
    {
        $I->login('admin','123456');
        $I->amOnPage('admin');
        $I->click('/html/body/div[2]/nav/div/ul/li[5]/a'); //Legacy Rewards
        $I->wait(3);
        $I->click('/html/body/div[2]/nav/div/ul/li[5]/ul/li[2]/a'); //Add Legacy Rewards
        $I->wait(3);
        $I->see('Legacy Rewards');
        $I->seeInCurrentUrl('legacy-rewards/add');
        $I->wait(3);
        $I->fillField('#name', 'kshitiz');
        $I->wait(1);
      //  $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[4]/div/div/select/option[4]');
        $I->wait(1);
      //  $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[6]/div/div/select/option[2]');
        $I->wait(1);
     //   $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[8]/div/div/select/option[3]');
        $I->fillField('#input-points', '312');//points
        $I->wait(1);
        $I->attachFile('input[type="file"]', 'admins.csv');
    


        //$I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[12]/div/div[2]/input');
        // $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[12]/div/div[2]/input');
        // $I->attachFile('input[name=photo]', 'water_PNG3290');
      //  $I->uncheckOption('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[10]/div/label/input[2]');
      //  $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[10]/div/button');
        $I->wait(8);

       ////// $I->see('shwqdwfqascaswas');
      //  $I->seeInCurrentUrl('promotions');
      //  $I->wait(3);
        $I->click('/html/body/div[2]/div/div[3]/div/div/div/div[2]/form/div[16]/div/button');
        $I->wait(5);
        $I->see('Our patients love the rewards program.');
        $I->seeInCurrntUrl('users/login');
    }
public function User_view(BuzzyUiTester $I) 
    {
        $I->login('admin','123456');
        $I->click('/html/body/div[2]/nav/div/ul/li[4]/a'); //Users
        //$I->click('#Users');
        $I->wait(3);
        //$I->click('/html/body/div[2]/nav/div/ul/li[4]/ul/li[1]/a');//View All Users
      //  $I->click('#View All');
        $I->see('Users');
        $I->seeInCurrentUrl('users');
        $I->wait(3);
       // $I->click('view',Locator::elementAt('tbody tr:nth-child(2) a .fa-pencil'));//click on view button in Users
        $I->click('tbody tr:nth-child(2) a .fa-eye');//click on view button in Users
        $I->wait(3);
      // $I->see($vendor);
        $I->wait(3);
     //   $I->see($email);
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



}

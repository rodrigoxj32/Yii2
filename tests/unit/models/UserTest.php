<?php

namespace tests\models;

use app\models\anteriorUser2;

class UserTest extends \Codeception\Test\Unit
{
    public function testFindUserById()
    {
        expect_that($user = anteriorUser2::findIdentity(100));
        expect($user->username)->equals('admin');

        expect_not(anteriorUser2::findIdentity(999));
    }

    public function testFindUserByAccessToken()
    {
        expect_that($user = anteriorUser2::findIdentityByAccessToken('100-token'));
        expect($user->username)->equals('admin');

        expect_not(anteriorUser2::findIdentityByAccessToken('non-existing'));
    }

    public function testFindUserByUsername()
    {
        expect_that($user = anteriorUser2::findByUsername('admin'));
        expect_not(anteriorUser2::findByUsername('not-admin'));
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser($user)
    {
        $user = anteriorUser2::findByUsername('admin');
        expect_that($user->validateAuthKey('test100key'));
        expect_not($user->validateAuthKey('test102key'));

        expect_that($user->validatePassword('admin'));
        expect_not($user->validatePassword('123456'));        
    }

}

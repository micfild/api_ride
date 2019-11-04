<?php

namespace App\Tests\Entity;

use App\Entity\User;
use App\Entity\BikeType;
use PHPUnit\Framework\TestCase;
use stdClass;
use TypeError;

class UserTest extends TestCase
{
    /**
     * @param string $name
     *
     * @dataProvider getNameTests
     */
    public function testGetSetFirstName(string $name)
    {
        $user = new User();

        $this->assertNull($user->getFirstName());

        $user->setFirstName($name);
        $this->assertSame($name, $user->getFirstName());

        $this->expectException(TypeError::class);
        $user->setFirstName(new stdClass());
    }

    /**
     * @param string $name
     *
     * @dataProvider getNameTests
     */
    public function testGetSetLastName(string $name)
    {
        $user = new User();

        $this->assertNull($user->getLastName());

        $user->setLastName($name);
        $this->assertSame($name, $user->getLastName());

        $this->expectException(TypeError::class);
        $user->setLastName(new stdClass());
    }

    /**
     * @param BikeType $bikeType
     *
     * @dataProvider getTypeTests
     */
    public function testGetSetBikeType(BikeType $bikeType)
    {
        $user = new User();
        $this->assertInstanceOf(User::class, $user);

        $this->assertTrue(!$user->getBikeType()->contains($bikeType));

        $user->addBikeType($bikeType);

        $this->assertTrue($user->getBikeType()->contains($bikeType));

        $user->removeBikeType($bikeType);

        $this->assertTrue(!$user->getBikeType()->contains($bikeType));
    }

    public function testToString()
    {
        $user = new User();
        $user->setFirstName('bool')
             ->setLastName('et un');

        $this->assertSame('bool et un' , (string) $user);
    }

    public function getNameTests()
    {
        return [
            ['foo'],
            ['bar'],
            ['titi'],
            ['FOObar'],
        ];
    }

    public function getTypeTests()
    {
        return [
            [new BikeType()],
        ];
    }

}

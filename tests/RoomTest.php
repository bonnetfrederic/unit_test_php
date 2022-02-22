<?php

namespace Campus;

use PHPUnit\Framework\TestCase;
use Faker\Factory as Faker;
use Campus\UnitTest\Models\Room;

class RoomTest extends TestCase
{
    private \Faker\Generator $faker;
    private string $name;
    private string $description;
    private Room $room;

  // fonction qui initialise en pre-launch des tests
    public function setup(): void
    {
        $this->faker = Faker::create('fr_FR');

        $this->name = $this->faker->name();
        $this->description =  $this->faker->words(4, true);
        $this->room = new Room(
            $this->name,
            $this->description
        );
    }

    public function testCreateRoom()
    {
        $this->assertEquals(ucfirst(strtolower($this->name)), $this->room->getName());
        $this->assertEquals($this->description, $this->room->getDescription());
        $this->assertEquals(60, $this->room->getDuration());
    }

    public function testHowManyEnigma()
    {
        $levels = [Room::EASY_LEVEL, Room::NORMAL_LEVEL, Room::DIFFICULT_LEVEL];

        foreach ($levels as $level) {
            $this->room->setNiveau($level);
            $number_enigma = $this->room->getNbEnigma();
            if ($this->room->getNiveau() == Room::EASY_LEVEL) {
                $expected_enigma = 5;
            } elseif ($this->room->getNiveau() == Room::NORMAL_LEVEL) {
                $expected_enigma = 10;
            } elseif ($this->room->getNiveau() == Room::DIFFICULT_LEVEL) {
                $expected_enigma = 20;
            }
            $this->assertEquals($expected_enigma, $number_enigma);
        }
    }

    public function testPushAndPop()
    {
        $stack = [];
        $this->assertSame(0, count($stack));

        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack) - 1]);
        $this->assertSame(1, count($stack));

        $this->assertSame('foo', array_pop($stack));
        $this->assertSame(0, count($stack));
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //create new object of the Movie entity
        $movie = new Movie();
        $movie->setTitle("The dark knight");
        $movie->setReleaseYear(2008);
        $movie->setDescription("This is description of this movie");
        $movie->setImagePath('https://cdn.pixabay.com/photo/2023/03/14/21/53/sculpture-7853242_1280.jpg');

        //add data to pivot table
        $movie->addActor($this->getReference('actor_1'));
        $movie->addActor($this->getReference('actor_2'));

        $manager->persist($movie);

        $movie2 = new Movie();
        $movie2->setTitle("The Joker");
        $movie2->setReleaseYear(2021);
        $movie2->setDescription("This is description of this movie");
        $movie2->setImagePath('https://cdn.pixabay.com/photo/2023/02/24/05/43/joker-7810248_1280.jpg');

        $movie2->addActor($this->getReference('actor_3'));
        $movie2->addActor($this->getReference('actor_4'));

        $manager->persist($movie2);

        $manager->flush();
    }
}

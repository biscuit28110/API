<?php

namespace App\DataFixtures;

use App\Entity\Adherent;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    private $manager;
    private $faker;
    public function __construct()
    {

        $this->faker=Factory::create("fr_FR");
        
    }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);


        $this->manager=$manager;
        $this->loadAdherent();
        $this->loadPret();

        $manager->flush();

    }

    /**
     * 
     * creation des adhérents
     *
     * @return void
     */
    public function loadAdherent(){

        $genre=['male','female'];
        $commune = [
            "78003", "78005", "78006", "78007", "78009", "78010", "78013", "78015", "78020", "78029",
            "78030", "78031", "78033", "78034", "78036", "78043", "78048", "78049", "78050", "78053", "78057",
            "78062", "78068", "78070", "78071", "78072", "78073", "78076", "78077", "78082", "78084", "78087",
            "78089", "78090", "78092", "78096", "78104", "78107", "78108", "78113", "78117", "78118"
        ];
        for($i=0;$i=25;$i++){

            $adherent= new Adherent();
            $adherent->setNom($this->faker->lastName())
                     ->setPrenom($this->faker->firstName($genre[mt_rand(0,1)]))
                     ->setAdresse($this->faker->streetAddress())
                     ->setCp($commune[mt_rand(0,sizeof($commune)-1)])
                     ->setPassword($adherent->getNom())
                     ->setTel($this->faker->phoneNumber())
                     ->setMail(strtolower($adherent->getNom())."@gmail.com");
            $this->addReference("adherent0".$i,$adherent);
            $this->manager->persist($adherent);
        }

        $adherent= new Adherent();
        $adherent->setNom("Talamaku")
                 ->setPrenom("Traviss")
                 ->setMail("admin@gmail.com")
                 ->setPassword("Talamaku");
        $this->manager->persist($adherent);


        $this->manager->flush();

    }

    /**
     * 
     * creation des prets
     *
     * @return void
     */
    public function loadPret(){


    }


}

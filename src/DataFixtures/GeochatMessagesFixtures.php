<?php

namespace App\DataFixtures;

use App\Entity\Message;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GeochatMessagesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $messages = [
            [44.8451032, -0.573892, 'Super la #foire place des quinconces!'],
            [44.7913014, -0.6116024, 'Un bonjour du département #iutinformatique'],
            [44.8289202, -0.704792, "Je viens d'arriver à #aeoroportDeBordeaux, j'arrive en ville!"],
            [44.8942553, -0.5684104, "Bientôt le #BordeauxGeekFest, venez nombreux!"],
            [44.8293753, -0.6020268, "Prenez soin de vous et des autres, donnez votre sang"]
        ];

        foreach ($messages as list($lat, $lng, $text)) {
            $message = new Message;
            $message
                ->setText($text)
                ->setLongitude($lng)
                ->setLatitude($lat);
            $manager->persist($message);
        }

        $manager->flush();
    }
}

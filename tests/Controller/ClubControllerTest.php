<?php

namespace App\Test\Controller;

use App\Entity\Club;
use App\Repository\ClubRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClubControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private ClubRepository $repository;
    private string $path = '/club/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(Club::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Club index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'club[name]' => 'Testing',
            'club[arabicName]' => 'Testing',
            'club[abreviation]' => 'Testing',
            'club[address]' => 'Testing',
            'club[phone]' => 'Testing',
            'club[fax]' => 'Testing',
            'club[para]' => 'Testing',
            'club[zipCode]' => 'Testing',
            'club[autorisationCode]' => 'Testing',
            'club[fondationYear]' => 'Testing',
            'club[coachName]' => 'Testing',
            'club[coachPhone]' => 'Testing',
            'club[presidentName]' => 'Testing',
            'club[presidentPhone]' => 'Testing',
            'club[secretaryName]' => 'Testing',
            'club[treasurerPhone]' => 'Testing',
            'club[secretaryPhone]' => 'Testing',
            'club[treasurerName]' => 'Testing',
            'club[createdAt]' => 'Testing',
            'club[updatedAt]' => 'Testing',
            'club[email]' => 'Testing',
            'club[municipality]' => 'Testing',
            'club[season]' => 'Testing',
            'club[members]' => 'Testing',
            'club[governorate]' => 'Testing',
            'club[typeClub]' => 'Testing',
        ]);

        self::assertResponseRedirects('/club/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Club();
        $fixture->setName('My Title');
        $fixture->setArabicName('My Title');
        $fixture->setAbreviation('My Title');
        $fixture->setAddress('My Title');
        $fixture->setPhone('My Title');
        $fixture->setFax('My Title');
        $fixture->setPara('My Title');
        $fixture->setZipCode('My Title');
        $fixture->setAutorisationCode('My Title');
        $fixture->setFondationYear('My Title');
        $fixture->setCoachName('My Title');
        $fixture->setCoachPhone('My Title');
        $fixture->setPresidentName('My Title');
        $fixture->setPresidentPhone('My Title');
        $fixture->setSecretaryName('My Title');
        $fixture->setTreasurerPhone('My Title');
        $fixture->setSecretaryPhone('My Title');
        $fixture->setTreasurerName('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setEmail('My Title');
        $fixture->setMunicipality('My Title');
        $fixture->setSeason('My Title');
        $fixture->setMembers('My Title');
        $fixture->setGovernorate('My Title');
        $fixture->setTypeClub('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Club');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Club();
        $fixture->setName('My Title');
        $fixture->setArabicName('My Title');
        $fixture->setAbreviation('My Title');
        $fixture->setAddress('My Title');
        $fixture->setPhone('My Title');
        $fixture->setFax('My Title');
        $fixture->setPara('My Title');
        $fixture->setZipCode('My Title');
        $fixture->setAutorisationCode('My Title');
        $fixture->setFondationYear('My Title');
        $fixture->setCoachName('My Title');
        $fixture->setCoachPhone('My Title');
        $fixture->setPresidentName('My Title');
        $fixture->setPresidentPhone('My Title');
        $fixture->setSecretaryName('My Title');
        $fixture->setTreasurerPhone('My Title');
        $fixture->setSecretaryPhone('My Title');
        $fixture->setTreasurerName('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setEmail('My Title');
        $fixture->setMunicipality('My Title');
        $fixture->setSeason('My Title');
        $fixture->setMembers('My Title');
        $fixture->setGovernorate('My Title');
        $fixture->setTypeClub('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'club[name]' => 'Something New',
            'club[arabicName]' => 'Something New',
            'club[abreviation]' => 'Something New',
            'club[address]' => 'Something New',
            'club[phone]' => 'Something New',
            'club[fax]' => 'Something New',
            'club[para]' => 'Something New',
            'club[zipCode]' => 'Something New',
            'club[autorisationCode]' => 'Something New',
            'club[fondationYear]' => 'Something New',
            'club[coachName]' => 'Something New',
            'club[coachPhone]' => 'Something New',
            'club[presidentName]' => 'Something New',
            'club[presidentPhone]' => 'Something New',
            'club[secretaryName]' => 'Something New',
            'club[treasurerPhone]' => 'Something New',
            'club[secretaryPhone]' => 'Something New',
            'club[treasurerName]' => 'Something New',
            'club[createdAt]' => 'Something New',
            'club[updatedAt]' => 'Something New',
            'club[email]' => 'Something New',
            'club[municipality]' => 'Something New',
            'club[season]' => 'Something New',
            'club[members]' => 'Something New',
            'club[governorate]' => 'Something New',
            'club[typeClub]' => 'Something New',
        ]);

        self::assertResponseRedirects('/club/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getName());
        self::assertSame('Something New', $fixture[0]->getArabicName());
        self::assertSame('Something New', $fixture[0]->getAbreviation());
        self::assertSame('Something New', $fixture[0]->getAddress());
        self::assertSame('Something New', $fixture[0]->getPhone());
        self::assertSame('Something New', $fixture[0]->getFax());
        self::assertSame('Something New', $fixture[0]->getPara());
        self::assertSame('Something New', $fixture[0]->getZipCode());
        self::assertSame('Something New', $fixture[0]->getAutorisationCode());
        self::assertSame('Something New', $fixture[0]->getFondationYear());
        self::assertSame('Something New', $fixture[0]->getCoachName());
        self::assertSame('Something New', $fixture[0]->getCoachPhone());
        self::assertSame('Something New', $fixture[0]->getPresidentName());
        self::assertSame('Something New', $fixture[0]->getPresidentPhone());
        self::assertSame('Something New', $fixture[0]->getSecretaryName());
        self::assertSame('Something New', $fixture[0]->getTreasurerPhone());
        self::assertSame('Something New', $fixture[0]->getSecretaryPhone());
        self::assertSame('Something New', $fixture[0]->getTreasurerName());
        self::assertSame('Something New', $fixture[0]->getCreatedAt());
        self::assertSame('Something New', $fixture[0]->getUpdatedAt());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getMunicipality());
        self::assertSame('Something New', $fixture[0]->getSeason());
        self::assertSame('Something New', $fixture[0]->getMembers());
        self::assertSame('Something New', $fixture[0]->getGovernorate());
        self::assertSame('Something New', $fixture[0]->getTypeClub());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Club();
        $fixture->setName('My Title');
        $fixture->setArabicName('My Title');
        $fixture->setAbreviation('My Title');
        $fixture->setAddress('My Title');
        $fixture->setPhone('My Title');
        $fixture->setFax('My Title');
        $fixture->setPara('My Title');
        $fixture->setZipCode('My Title');
        $fixture->setAutorisationCode('My Title');
        $fixture->setFondationYear('My Title');
        $fixture->setCoachName('My Title');
        $fixture->setCoachPhone('My Title');
        $fixture->setPresidentName('My Title');
        $fixture->setPresidentPhone('My Title');
        $fixture->setSecretaryName('My Title');
        $fixture->setTreasurerPhone('My Title');
        $fixture->setSecretaryPhone('My Title');
        $fixture->setTreasurerName('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setEmail('My Title');
        $fixture->setMunicipality('My Title');
        $fixture->setSeason('My Title');
        $fixture->setMembers('My Title');
        $fixture->setGovernorate('My Title');
        $fixture->setTypeClub('My Title');

        $this->repository->add($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/club/');
    }
}

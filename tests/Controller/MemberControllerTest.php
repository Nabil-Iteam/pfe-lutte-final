<?php

namespace App\Test\Controller;

use App\Entity\Member;
use App\Repository\MemberRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MemberControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private MemberRepository $repository;
    private string $path = '/member/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(Member::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Member index');

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
            'member[image]' => 'Testing',
            'member[firstName]' => 'Testing',
            'member[lastName]' => 'Testing',
            'member[birthDay]' => 'Testing',
            'member[gender]' => 'Testing',
            'member[email]' => 'Testing',
            'member[phone]' => 'Testing',
            'member[address]' => 'Testing',
            'member[cin]' => 'Testing',
            'member[numActBirth]' => 'Testing',
            'member[arabicName]' => 'Testing',
            'member[createdAt]' => 'Testing',
            'member[updatedAt]' => 'Testing',
            'member[club]' => 'Testing',
            'member[beltGrade]' => 'Testing',
            'member[coachGrade]' => 'Testing',
            'member[dirigeantType]' => 'Testing',
            'member[municipality]' => 'Testing',
            'member[refreeGrade]' => 'Testing',
            'member[season]' => 'Testing',
            'member[athletCategory]' => 'Testing',
        ]);

        self::assertResponseRedirects('/member/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Member();
        $fixture->setImage('My Title');
        $fixture->setFirstName('My Title');
        $fixture->setLastName('My Title');
        $fixture->setBirthDay('My Title');
        $fixture->setGender('My Title');
        $fixture->setEmail('My Title');
        $fixture->setPhone('My Title');
        $fixture->setAddress('My Title');
        $fixture->setCin('My Title');
        $fixture->setNumActBirth('My Title');
        $fixture->setArabicName('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setClub('My Title');
        $fixture->setBeltGrade('My Title');
        $fixture->setCoachGrade('My Title');
        $fixture->setDirigeantType('My Title');
        $fixture->setMunicipality('My Title');
        $fixture->setRefreeGrade('My Title');
        $fixture->setSeason('My Title');
        $fixture->setAthletCategory('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Member');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Member();
        $fixture->setImage('My Title');
        $fixture->setFirstName('My Title');
        $fixture->setLastName('My Title');
        $fixture->setBirthDay('My Title');
        $fixture->setGender('My Title');
        $fixture->setEmail('My Title');
        $fixture->setPhone('My Title');
        $fixture->setAddress('My Title');
        $fixture->setCin('My Title');
        $fixture->setNumActBirth('My Title');
        $fixture->setArabicName('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setClub('My Title');
        $fixture->setBeltGrade('My Title');
        $fixture->setCoachGrade('My Title');
        $fixture->setDirigeantType('My Title');
        $fixture->setMunicipality('My Title');
        $fixture->setRefreeGrade('My Title');
        $fixture->setSeason('My Title');
        $fixture->setAthletCategory('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'member[image]' => 'Something New',
            'member[firstName]' => 'Something New',
            'member[lastName]' => 'Something New',
            'member[birthDay]' => 'Something New',
            'member[gender]' => 'Something New',
            'member[email]' => 'Something New',
            'member[phone]' => 'Something New',
            'member[address]' => 'Something New',
            'member[cin]' => 'Something New',
            'member[numActBirth]' => 'Something New',
            'member[arabicName]' => 'Something New',
            'member[createdAt]' => 'Something New',
            'member[updatedAt]' => 'Something New',
            'member[club]' => 'Something New',
            'member[beltGrade]' => 'Something New',
            'member[coachGrade]' => 'Something New',
            'member[dirigeantType]' => 'Something New',
            'member[municipality]' => 'Something New',
            'member[refreeGrade]' => 'Something New',
            'member[season]' => 'Something New',
            'member[athletCategory]' => 'Something New',
        ]);

        self::assertResponseRedirects('/member/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getImage());
        self::assertSame('Something New', $fixture[0]->getFirstName());
        self::assertSame('Something New', $fixture[0]->getLastName());
        self::assertSame('Something New', $fixture[0]->getBirthDay());
        self::assertSame('Something New', $fixture[0]->getGender());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getPhone());
        self::assertSame('Something New', $fixture[0]->getAddress());
        self::assertSame('Something New', $fixture[0]->getCin());
        self::assertSame('Something New', $fixture[0]->getNumActBirth());
        self::assertSame('Something New', $fixture[0]->getArabicName());
        self::assertSame('Something New', $fixture[0]->getCreatedAt());
        self::assertSame('Something New', $fixture[0]->getUpdatedAt());
        self::assertSame('Something New', $fixture[0]->getClub());
        self::assertSame('Something New', $fixture[0]->getBeltGrade());
        self::assertSame('Something New', $fixture[0]->getCoachGrade());
        self::assertSame('Something New', $fixture[0]->getDirigeantType());
        self::assertSame('Something New', $fixture[0]->getMunicipality());
        self::assertSame('Something New', $fixture[0]->getRefreeGrade());
        self::assertSame('Something New', $fixture[0]->getSeason());
        self::assertSame('Something New', $fixture[0]->getAthletCategory());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Member();
        $fixture->setImage('My Title');
        $fixture->setFirstName('My Title');
        $fixture->setLastName('My Title');
        $fixture->setBirthDay('My Title');
        $fixture->setGender('My Title');
        $fixture->setEmail('My Title');
        $fixture->setPhone('My Title');
        $fixture->setAddress('My Title');
        $fixture->setCin('My Title');
        $fixture->setNumActBirth('My Title');
        $fixture->setArabicName('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setClub('My Title');
        $fixture->setBeltGrade('My Title');
        $fixture->setCoachGrade('My Title');
        $fixture->setDirigeantType('My Title');
        $fixture->setMunicipality('My Title');
        $fixture->setRefreeGrade('My Title');
        $fixture->setSeason('My Title');
        $fixture->setAthletCategory('My Title');

        $this->repository->add($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/member/');
    }
}

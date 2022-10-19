<?php

namespace App\DataFixtures;

use App\Enum\ProgramName;
use App\Entity\Academy;
use App\Entity\Program;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AcademyProgramFixture extends AbstractAcademyFixture implements DependentFixtureInterface
{
    public const ACADEMY_PROGRAM_REFERENCE_1 = 'academy_program_reference_1';
    public const ACADEMY_PROGRAM_REFERENCE_2 = 'academy_program_reference_2';
    public const ACADEMY_PROGRAM_REFERENCE_3 = 'academy_program_reference_3';
    public const ACADEMY_PROGRAM_REFERENCE_4 = 'academy_program_reference_4';
    public const ACADEMY_PROGRAM_REFERENCE_5 = 'academy_program_reference_5';
    public const ACADEMY_PROGRAM_REFERENCE_6 = 'academy_program_reference_6';
    public const ACADEMY_PROGRAM_REFERENCE_7 = 'academy_program_reference_7';
    public const ACADEMY_PROGRAM_REFERENCE_8 = 'academy_program_reference_8';
    public const ACADEMY_PROGRAM_REFERENCE_9 = 'academy_program_reference_9';

    public function load(ObjectManager $manager): void
    {
        /** @var Academy $academy1 */
        $academy1 = $this->getReference(AcademyFixture::VILNIUS_CODING_SCHOOL_REFERENCE_1);

        $academy1program1 = new Program($academy1);
        $academy1program1->setTitle('Web design');
        $academy1program1->setCity('Vilnius');
        $academy1program1->setPrice('500');
        $academy1program1->setProgramCategory(ProgramName::DESIGN);
        $academy1program1->setStartsAt(new \DateTimeImmutable());
        $academy1program1->setDescription('Kam skirti šie mokymai?
Šie mokymai skirti dirbantiems žmonėms, tiek nesusidūrusiems su internetinių svetainių dizaino kūrimu ir norintiems įgyti pagrindines žinias, tiek truputį pažengusiems ir norintiems toliau gilintis į darbo su skaitmeniniais produktais principus, susipažinti su naujausiais rinkoje naudojamais įrankiais ir taikomomis praktikomis.');
        $manager->persist($academy1program1);

        $academy1program2 = new Program($academy1);
        $academy1program2->setTitle('QA');
        $academy1program2->setCity('Klaipeda');
        $academy1program2->setPrice('350');
        $academy1program2->setProgramCategory(ProgramName::TESTING);
        $academy1program2->setStartsAt(new \DateTimeImmutable());
        $academy1program2->setDescription('Kam skirti šie mokymai? 
Programuotojai yra svarbūs, nes kuria reikalingą programinę įrangą, o testuotojai – nepakeičiami, kadangi būtent jų kompetencijos užtikrina sklandų įrangos veikimą. Rankinio testavimo mokymai skirti norintiems pradėti savo karjerą IT srityje kitose nei programuotojo pozicijose. Mokymų metu Jūs įgysite stiprius rankinio testavimo pagrindus, suprasite esminius testavimo principus, bei gebėsite pritaikyti juos  darbinėje veikloje. Pabaigę šiuos mokymus Jūs galėsite pradėti savo karjerą rankinio testuotojo pozicijoje.');
        $manager->persist($academy1program2);

        $academy1program3 = new Program($academy1);
        $academy1program3->setTitle('SEO');
        $academy1program3->setCity('Online');
        $academy1program3->setPrice('450');
        $academy1program3->setProgramCategory(ProgramName::OTHER);
        $academy1program3->setStartsAt(new \DateTimeImmutable());
        $academy1program3->setDescription('Skaitmeninė rinkodara – neatsiejama sėkmingo verslo dalis ir vienas esminių įrankių, padedančių verslą auginti. Skaitmeninė rinkodara apima produktų ar paslaugų reklamavimo ir pardavimo skaitmeninėje erdvėje – internete – procesus, įgyvendinamus naudojantis tinkamai sudėliotomis strategijomis ir pagal jas parinktais skaitmeninės rinkodaros kanalais. Teisingi skaitmeninės rinkodaros sprendimai leidžia pasiekti reikiamą auditoriją, plėsti pardavimų apimtis, formuoti reikiamą įvaizdį ir didinti žinomumą. Šiandien skaitmeninės rinkodaros žinios būtinos tiek rinkodaros specialistams, tiek projektų vadovams ar net programuotojams.');
        $manager->persist($academy1program3);

        /** @var Academy $academy2 */
        $academy2 = $this->getReference(AcademyFixture::CODE_ACADEMY_REFERENCE_2);

        $academy2program1 = new Program($academy2);
        $academy2program1->setTitle('Full-stack');
        $academy2program1->setCity('Kaunas');
        $academy2program1->setPrice('900');
        $academy2program1->setProgramCategory(ProgramName::PROGRAMMING);
        $academy2program1->setStartsAt(new \DateTimeImmutable());
        $academy2program1->setDescription('Kam skirti šie mokymai?
Šie vakariniai mokymai subalansuoti dirbantiems, tačiau tinka visiems žmonėms,
norintiems suprasti ir išmokti kaip kuriami WEB produktai (interneto svetainės ar vidinės įmonių valdymo sistemos paremtos WEB technologijomis). Kursas taip pat
tinka visiems savo tolimesnę karjerą ketinantiems sieti su programavimu.');
        $manager->persist($academy2program1);

        $academy2program2 = new Program($academy2);
        $academy2program2->setTitle('Testing');
        $academy2program2->setCity('Online');
        $academy2program2->setPrice('800');
        $academy2program2->setProgramCategory(ProgramName::TESTING);
        $academy2program2->setStartsAt(new \DateTimeImmutable());
        $manager->persist($academy2program2);

        $academy2program3 = new Program($academy2);
        $academy2program3->setTitle('Cyber security');
        $academy2program3->setCity('Vilnius');
        $academy2program3->setPrice('1500');
        $academy2program3->setProgramCategory(ProgramName::OTHER);
        $academy2program3->setStartsAt(new \DateTimeImmutable());
        $manager->persist($academy2program3);

        /** @var Academy $academy3 */
        $academy3 = $this->getReference(AcademyFixture::TURING_COLLEGE_REFERENCE_3);

        $academy3program1 = new Program($academy1);
        $academy3program1->setTitle('UX/UI');
        $academy3program1->setCity('Online');
        $academy3program1->setPrice('550');
        $academy3program1->setProgramCategory(ProgramName::DESIGN);
        $academy3program1->setStartsAt(new \DateTimeImmutable());
        $manager->persist($academy3program1);

        $academy3program2 = new Program($academy1);
        $academy3program2->setTitle('C+');
        $academy3program2->setCity('Klaipeda');
        $academy3program2->setPrice('750');
        $academy3program2->setProgramCategory(ProgramName::PROGRAMMING);
        $academy3program2->setStartsAt(new \DateTimeImmutable());
        $manager->persist($academy3program2);

        $academy3program3 = new Program($academy1);
        $academy3program3->setTitle('Java');
        $academy3program3->setCity('Kaunas');
        $academy3program3->setPrice('975');
        $academy3program3->setProgramCategory(ProgramName::PROGRAMMING);
        $academy3program3->setStartsAt(new \DateTimeImmutable());
        $manager->persist($academy3program3);

        $this->addReference(self::ACADEMY_PROGRAM_REFERENCE_1, $academy1program1);
        $this->addReference(self::ACADEMY_PROGRAM_REFERENCE_2, $academy1program2);
        $this->addReference(self::ACADEMY_PROGRAM_REFERENCE_3, $academy1program3);
        $this->addReference(self::ACADEMY_PROGRAM_REFERENCE_4, $academy2program1);
        $this->addReference(self::ACADEMY_PROGRAM_REFERENCE_5, $academy2program2);
        $this->addReference(self::ACADEMY_PROGRAM_REFERENCE_6, $academy2program3);
        $this->addReference(self::ACADEMY_PROGRAM_REFERENCE_7, $academy3program1);
        $this->addReference(self::ACADEMY_PROGRAM_REFERENCE_8, $academy3program2);
        $this->addReference(self::ACADEMY_PROGRAM_REFERENCE_9, $academy3program3);

        $manager->flush();
    }

    /**
     * @return string[]
     */
    public function getDependencies(): array
    {
        return [
            AcademyFixture::class,
        ];
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\Academy;
use Doctrine\Persistence\ObjectManager;

class AcademyFixture extends AbstractAcademyFixture
{
    public const VILNIUS_CODING_SCHOOL_REFERENCE_1 = 'vilnius_coding_school_reference_1';
    public const CODE_ACADEMY_REFERENCE_2 = 'code_academy_reference_2';
    public const TURING_COLLEGE_REFERENCE_3 = 'turing_college_reference_3';

    public function load(ObjectManager $manager): void
    {
        $academy1 = new Academy();
        $academy1->setTitle('Vilnius Coding School');
        $academy1->setAcademyUrl('https://www.vilniuscoding.lt');
        $academy1->setAcademyImageUrl('https://www.vilniuscoding.lt/wp-content/themes/vcs/assets/img/logo-01.svg');
        $academy1->setSlug('vcs');
        $academy1->setDescription('KODĖL MOKOME PROGRAMUOTI?
„Coding School“ komanda tiki, kad dirbti mylimą ir mėgstamą darbą – viena didžiausių vertybių mūsų gyvenime.
Mūsų komandoje dirba tik tie žmonės, kuriems teko keisti karjerą, todėl vykdome misiją, kuria tikime ir patys – padedame tiems, kas studijavo kitokią specialybę arba nėra patenkinti dabartiniu savo karjeros pasirinkimu, susieti ir adaptuoti savo buvusią patirtį su IT sritimi ir joje įsitvirtinti!
Mes čia tam, kad dirbtume prasmingą darbą ir padėtume tiems, kas ieško naujų galimybių.');
        $manager->persist($academy1);

        $academy2 = new Academy();
        $academy2->setTitle('Code academy');
        $academy2->setAcademyUrl('https://codeacademy.lt/');
        $academy2->setAcademyImageUrl('https://codeacademy.lt/wp-content/themes/codeacademy/dist/images/codeacademy-black.svg');
        $academy2->setSlug('ca');
        $academy2->setDescription('Nuo 2016 metų, kai atvėrėme savo duris, augame taip pat sparčiai kaip ir visas Tech sektorius Lietuvoje 📈, o vis didėjant IT specialistų poreikiui mes suteikiame šiuolaikines ir industrijos patikrintas programas ateities darbo rinkai.');
        $manager->persist($academy2);

        $academy3 = new Academy();
        $academy3->setTitle('Turing College');
        $academy3->setAcademyUrl('https://www.turingcollege.com/');
        $academy3->setAcademyImageUrl('https://uploads-ssl.webflow.com/5ec8088c0a860f39fe6e8b83/5efb4c74ac8fe59746031cca_tc_logo.svg');
        $academy3->setSlug('tc');
        $academy3->setDescription('Our story
Hi, Lukas, Benas, and Tomas here, the Turing College co-founders. We are building a career school that ensures our alumni are work-ready on day one of their new data science position.
When the three of us entered university, we were taken back by the outdated teaching methods. We still smile when we remember learning Excel via a whiteboard! While studying, we were also running an IT and education consulting business that had an accounting return rate (ARR) of $0.6M and was expanding fast. This quickly taught us that the way developers are educated is not aligned with the hiring and onboarding processes of the tech companies looking to hire them.
We saw this issue from both sides of the hiring process. As students, we were learning subjects that didn’t prepare us practically to deliver results for companies from day one. As employers, we were frustrated when hiring students based only on their educational credentials, as these weren’t a good guide to future performance. So, we decided to change that, and so the Turing College concept was born.');
        $manager->persist($academy3);

        $this->addReference(self::VILNIUS_CODING_SCHOOL_REFERENCE_1, $academy1);
        $this->addReference(self::CODE_ACADEMY_REFERENCE_2, $academy2);
        $this->addReference(self::TURING_COLLEGE_REFERENCE_3, $academy3);

        $manager->flush();
    }
}

<?php

namespace App\Controller\Admin;

use App\Entity\AthletCategory;
use App\Entity\BeltGrade;
use App\Entity\Club;
use App\Entity\CoachGrade;
use App\Entity\TypeClub;
use App\Entity\DirigeantType;
use App\Entity\Governorate;
use App\Entity\Member;
use App\Entity\MemberType;
use App\Entity\Municipality;
use App\Entity\RefreeGrade;
use App\Entity\Season;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Lutte App');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('BeltGrade', 'fas fa-list', BeltGrade::class);
        yield MenuItem::linkToCrud('AthletCategory', 'fas fa-list', AthletCategory::class);
        yield MenuItem::linkToCrud('Club', 'fas fa-list', Club::class);
        yield MenuItem::linkToCrud('DirigeantType', 'fas fa-list', DirigeantType::class);
        yield MenuItem::linkToCrud('CoachGrade', 'fas fa-list', CoachGrade::class);
        yield MenuItem::linkToCrud('Governorate', 'fas fa-list', Governorate::class);
        yield MenuItem::linkToCrud('Member', 'fas fa-list', Member::class);
        yield MenuItem::linkToCrud('MemberType', 'fas fa-list', MemberType::class);
        yield MenuItem::linkToCrud('Municipality', 'fas fa-list', Municipality::class);
        yield MenuItem::linkToCrud('RefreeGrade', 'fas fa-list', RefreeGrade::class);
        yield MenuItem::linkToCrud('Season', 'fas fa-list', Season::class);
        yield MenuItem::linkToCrud('TypeClub', 'fas fa-list', TypeClub::class);


    }
}

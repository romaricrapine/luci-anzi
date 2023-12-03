<?php

namespace App\Controller\Admin;

use App\Entity\UberAccountSale;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UberAccountSaleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UberAccountSale::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('dateCreation')
                ->setLabel('Date de Création'),
            TextField::new('mail')
                ->setLabel('E-Mail'),
            TextField::new('password')
                ->setLabel('Mot de passe'),
        ];
    }

    public function configureCrud(Crud|\EasyCorp\Bundle\EasyAdminBundle\Config\Crud $crud): \EasyCorp\Bundle\EasyAdminBundle\Config\Crud
    {
        return $crud
            ->setPageTitle('index', 'Liste des Comptes')
            ->setPageTitle('new', 'Ajouter un Compte')
            ->setPageTitle('edit', 'Modifier un Compte')
            ->showEntityActionsInlined();
    }


}

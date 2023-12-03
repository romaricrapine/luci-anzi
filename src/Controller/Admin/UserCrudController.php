<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('email')
                ->setLabel('Email')
                ->setHelp('<p>Ceci n\'est pas obligatoire pour la création d\'un Utilisateurs.</p>'),
            TextField::new('username')
                ->setLabel('Pseudo Discord')
                ->setHelp('<p>Ceci n\'est pas obligatoire pour la création d\'un Utilisateurs.</p>'),
            TextField::new('discord_id')
                ->setLabel('Discord ID')
                ->setHelp('<p style="color: red;text-transform: uppercase">Ceci est obligatoire pour la création d\'un Utilisateurs.</p>'),
            TextField::new('access_token')
                ->setLabel('Access Token')
                ->setHelp('<p>Ceci n\'est pas obligatoire pour la création d\'un Utilisateurs.</p>'),
        ];
    }

    public function configureCrud(Crud|\EasyCorp\Bundle\EasyAdminBundle\Config\Crud $crud): \EasyCorp\Bundle\EasyAdminBundle\Config\Crud
    {
        return $crud
            ->setPageTitle('index', 'Liste des Cuistots')
            ->setPageTitle('new', 'Ajouter un Cuistot')
            ->setPageTitle('edit', 'Modifier un Cuistot')
            ->showEntityActionsInlined();
    }

}

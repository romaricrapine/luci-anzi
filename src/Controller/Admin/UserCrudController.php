<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
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
            TextField::new('username')
                ->setLabel('Pseudo Discord')
                ->setHelp('<p>Ceci n\'est pas obligatoire pour la création d\'un Utilisateurs.</p>'),
            TextField::new('discord_id')
                ->setLabel('Discord ID')
                ->setHelp('<p style="color: red;text-transform: uppercase">Ceci est obligatoire pour la création d\'un Utilisateurs.</p>'),
            ArrayField::new('roles')
                ->setHelp('
                    <p style="color: red">Ajouter ROLE_ADMIN sous AUCUN PRETEXTE.</p>
                    <p style="color: #95ff99">Ajouter ROLE_UBER pour les Cuistots Uber.</p>
                    <p style="color: #95ff99">Ajouter ROLE_DELIVEROO pour les Cuistots Deli.</p>
                    <p style="color: red">Ne pas toucher au ROLE_USER</p>
                ')
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

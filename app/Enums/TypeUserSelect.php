<?php

namespace App\Enums;

enum TypeUserSelect: string
{
    case Parent = 'parent';
    case Adulte = 'adulte';
    case Professeur = 'professeur';
    case Admin = 'admin';
    case Webmaster = 'webmaster';

}

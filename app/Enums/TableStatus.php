<?php 

namespace app\Enums;

enum TableStatus: String
{
    case Pending = 'pending';
    case Avaliable = 'avaliable';
    case Unavaliable = 'unavaliable';
}
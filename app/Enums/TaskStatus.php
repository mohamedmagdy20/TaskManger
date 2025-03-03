<?php

namespace App\Enums;

enum TaskStatus : string{
 case Pending = 'pending';
 case Inprogress  = 'in-progress';   
 case Completed = 'completed';
}
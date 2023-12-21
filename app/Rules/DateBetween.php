<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Carbon;

class DateBetween implements Rule
{
   /**
    * Determine if the validation rule passes.
    *
    * @param string $attribute
    * @param mixed $value
    * @return bool
    */
   public function passes($attribute, $value)
   {
       $picupDate = Carbon::parse($value);
       $lastDate = Carbon::now()->addWeek();

       return $value >= now () && $value <= $lastDate;
   }

   /**
    * Get the validation error message.
    *
    * @return string
    */
   public function message()
   {
       return 'The Date must be between now and a week from now.';
   }
}


<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Carbon;

class TimeBetween implements Rule
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
       $pickupDate = Carbon::parse($value);
       $pickupTime = Carbon::createFromTime($pickupDate->hour,$pickupDate->minute, $pickupDate->second);
       //open time
       $earlistTime = Carbon::createFromTimeString('10:00:00');
       $lastTime = Carbon::createFromTimeString('14:00:00');

       return $pickupTime->between($earlistTime, $lastTime) ? true : false;
   }

   /**
    * Get the validation error message.
    *
    * @return string
    */
   public function message()
   {
       return 'The time must be between 10:00 - 14:00.';
   }
}

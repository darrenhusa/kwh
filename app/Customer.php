<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Customer extends Model
{
  use SearchableTrait;

      /**
       * Searchable rules.
       *
       * @var array
       */
      protected $searchable = [
          /**
           * Columns and their priority in search results.
           * Columns with higher values are more important.
           * Columns with equal values have equal importance.
           *
           * @var array
           */
          'columns' => [
              'customers.first_name' => 10,
              'customers.last_name' => 10,
          ],
      ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}

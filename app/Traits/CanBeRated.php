<?php

namespace App\Traits;

trait CanBeRated{

    public function qualifiers(string $model = null){

        $modelClass = $model ? (new $model)->getMorphClass() : $this->getMorphClass();

        return $this->morphToMany($modelClass, 'rateable', 'ratings', 'rateable_id', 'qualifier_id')
            ->withPivot('qualifier_type', 'score')
            ->wherePivot('qualifier_type', $modelClass)
            ->wherePivot('rateable_type', $this->getMorphClass());

    }

    public function averageRating(string $model = null){
        return $this->qualifiers($model)->avg('score') ? : 0.0;
    }
}
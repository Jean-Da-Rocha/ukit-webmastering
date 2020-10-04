<?php

namespace App\Traits\Livewire\Tables;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany, HasOneOrMany};

trait Yajra
{
    public function relationship($attribute)
    {
        $parts = explode('.', $attribute);

        return (object)[
            'attribute' => array_pop($parts),
            'name' => implode('.', $parts),
        ];
    }

    public function attribute(Builder $query, $relationships, $attribute)
    {
        $table = '';
        $lastQuery = $query;

        foreach (explode('.', $relationships) as $each_relationship) {
            $model = $lastQuery->getRelation($each_relationship);

            switch (true) {
                case $model instanceof BelongsToMany:
                    $pivot = $model->getTable();
                    $pivotPK = $model->getExistenceCompareKey();
                    $pivotFK = $model->getQualifiedParentKeyName();
                    $query->leftJoin($pivot, $pivotPK, $pivotFK);

                    $related = $model->getRelated();
                    $table = $related->getTable();
                    $tablePK = $related->getForeignKey();
                    $foreign = $pivot . '.' . $tablePK;
                    $other = $related->getQualifiedKeyName();

                    $lastQuery->addSelect($table . '.' . $attribute);
                    $query->leftJoin($table, $foreign, $other);
                    break;

                case $model instanceof HasOneOrMany:
                    $table = $model->getRelated()->getTable();
                    $foreign = $model->getQualifiedForeignKeyName();
                    $other = $model->getQualifiedParentKeyName();
                    break;

                case $model instanceof BelongsTo:
                    $table = $model->getRelated()->getTable();
                    $foreign = $model->getQualifiedForeignKeyName();
                    $other = $model->getQualifiedOwnerKeyName();
                    break;

                default:
                    return $attribute;
            }

            $query->leftJoin($table, $foreign, $other);
            $lastQuery = $model->getQuery();
        }

        return $table . '.' . $attribute;
    }

    protected function getColumnByAttribute($attribute)
    {
        foreach ($this->columns() as $column) {
            if ($column->getAttribute() === $attribute) {
                return $column;
            }
        }

        return false;
    }
}

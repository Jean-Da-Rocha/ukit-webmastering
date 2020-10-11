<?php

namespace App\Traits\Livewire\Tables;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany, HasOneOrMany};

trait Yajra
{
    /**
     * Get the parts and name of the relationship
     * withing the attribute, if there is any.
     *
     * @param  string  $attribute
     * @return object
     */
    public function relationship(string $attribute)
    {
        $parts = explode('.', $attribute);

        return (object) [
            'attribute' => array_pop($parts),
            'name' => implode('.', $parts),
        ];
    }

    /**
     * Get the column's attribute whether there is a relationship or not.
     *
     * @param  Builder  $query
     * @param  string  $relationships
     * @param  string  $attribute
     * @return mixed
     */
    public function attribute(Builder $query, string $relationships, string $attribute)
    {
        $table = '';
        $lastQuery = $query;

        foreach (explode('.', $relationships) as $eachRelationship) {
            $model = $lastQuery->getRelation($eachRelationship);

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

    /**
     * Get the column by its attribute.
     *
     * @param  string  $attribute
     * @return mixed
     */
    protected function getColumnByAttribute(string $attribute)
    {
        foreach ($this->columns() as $column) {
            if ($column->getAttribute() === $attribute) {
                return $column;
            }
        }

        return false;
    }
}

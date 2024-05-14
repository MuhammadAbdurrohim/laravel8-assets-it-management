<?php

namespace App\Models;

use App\Models\Traits\Searchable;
use App\Presenters\Presentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Watson\Validating\ValidatingTrait;

class Depreciation extends SnipeModel
{
    use HasFactory;

    protected $presenter = \App\Presenters\DepreciationPresenter::class;
    use Presentable;
    // Declare the rules for the form validation
    protected $rules = [
        'name' => 'required|min:3|max:255|unique:depreciations,name',
        'months' => 'required|max:3600|integer|gt:0',
    ];

    /**
     * Whether the model should inject it's identifier to the unique
     * validation rules before attempting validation. If this property
     * is not set in the model it will default to true.
     *
     * @var bool
     */
    protected $injectUniqueIdentifier = true;
    use ValidatingTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'months'];

    use Searchable;

    /**
     * The attributes that should be included when searching the model.
     *
     * @var array
     */
    protected $searchableAttributes = ['name', 'months'];

    /**
     * The relations and their attributes that should be included when searching the model.
     *
     * @var array
     */
    protected $searchableRelations = [];

    /**
     * Establishes the depreciation -> models relationship
     *
     * @author A. Gianotto <snipe@snipe.net>
     * @since [v5.0]
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function models()
    {
        return $this->hasMany(\App\Models\AssetModel::class, 'depreciation_id');
    }

    /**
     * Establishes the depreciation -> licenses relationship
     *
     * @author A. Gianotto <snipe@snipe.net>
     * @since [v5.0]
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function licenses()
    {
        return $this->hasMany(\App\Models\License::class, 'depreciation_id');
    }
}

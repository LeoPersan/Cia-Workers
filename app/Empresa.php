<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'nome', 'email', 'logo', 'website'];

    public function setNomeAttribute($value)
    {
    	$this->attributes['nome'] = $value;
    	$this->attributes['slug'] = str_slug($value);
    }

    public function setLogoAttribute($logo)
    {
    	$this->attributes['logo'] = 'logo.'.$logo->getClientOriginalExtension();
    	$logo->storeAs('logos/'.$this->slug, $this->logo, 'public');
    }

    public function getLogoPathAttribute()
    {
    	return 'storage?filename=logos/'.$this->slug.'/'.$this->logo;
    }

    /**
     * Empresa has many Funcionarios.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function funcionarios()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = empresa_id, localKey = id)
        return $this->hasMany(Funcionario::class);
    }

    public function rules($type)
    {
    	switch ($type) {
    		case 'create':
    			return [
    				'nome' => 'required|min:3|unique:empresas',
    				'email' => 'required|email',
    				'logo' => 'image',
    				'website' => 'min:3',
    			];
    			break;
    		case 'update':
    			return [
    				'nome' => 'min:3|unique:empresas,nome,'.$this->id,
    				'email' => 'email',
    				'logo' => 'image',
    				'website' => 'min:3',
    			];
    			break;
    	}
    }
}

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
    	$logo->storeAs('logos/'.$this->slug, $this->logo, 'public_path');
    }

    public function getLogoPathAttribute()
    {
    	return 'logos/'.$this->slug.'/'.$this->logo;
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

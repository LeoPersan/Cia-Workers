<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['empresa_id', 'nome', 'email', 'cpf'];

    public function setNomeAttribute($value)
    {
    	$this->attributes['nome'] = $value;
    	$this->attributes['slug'] = str_slug($value);
    }

    public function getTelefoneAttribute()
    {
        return preg_replace('/([\d]{2})([\d]{4,5})([\d]{4})/', '($1) $2-$3', $this->attributes['telefone']);
    }

    public function getCpfAttribute()
    {
        return preg_replace('/([\d]{3})([\d]{3})([\d]{3})([\d]{2})/', '$1.$2.$3-$4', $this->attributes['cpf']);
    }

    public function rules($type)
    {
    	switch ($type) {
    		case 'create':
    			return [
    				'empresa_id' => 'required|existis:id',
    				'nome' => 'required|min:3|unique:empresas',
    				'email' => 'required|email',
    				'cpf' => 'required|min:11|max:14',
    			];
    			break;
    		case 'update':
    			return [
    				'empresa_id' => 'existis:id',
    				'nome' => 'min:3|unique:empresas,nome,'.$this->id,
    				'email' => 'email',
    				'cpf' => 'min:11|max:14',
    			];
    			break;
    	}
    }
}

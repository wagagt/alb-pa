<?php

namespace App\Libraries\Repositories;


use App\Models\Estados;
use Illuminate\Support\Facades\Schema;

class EstadosRepository
{

	/**
	 * Returns all Estados
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Estados::all();
	}

	public function search($input)
    {
        $query = Estados::query();

        $columns = Schema::getColumnListing('estados');
        $attributes = array();

        foreach($columns as $attribute){
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] =  $input[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        return [$query->get(), $attributes];

    }

	/**
	 * Stores Estados into database
	 *
	 * @param array $input
	 *
	 * @return Estados
	 */
	public function store($input)
	{
		return Estados::create($input);
	}

	/**
	 * Find Estados by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Estados
	 */
	public function findEstadosById($id)
	{
		return Estados::find($id);
	}

	/**
	 * Updates Estados into database
	 *
	 * @param Estados $estados
	 * @param array $input
	 *
	 * @return Estados
	 */
	public function update($estados, $input)
	{
		$estados->fill($input);
		$estados->save();

		return $estados;
	}
	
	/**
	 * Return list of Estados to fill option
	 * @return array list
	 */
	public function optionList()
	{
		return Estados::lists('descripcion', 'id');
	}
	
}
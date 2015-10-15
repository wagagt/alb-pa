<?php

namespace App\Libraries\Repositories;


use App\Models\Roles;
use Illuminate\Support\Facades\Schema;

class RolesRepository
{

	/**
	 * Returns all Roles
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Roles::all();
	}

	public function search($input)
    {
        $query = Roles::query();

        $columns = Schema::getColumnListing('roles');
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
	 * Stores Roles into database
	 *
	 * @param array $input
	 *
	 * @return Roles
	 */
	public function store($input)
	{
		return Roles::create($input);
	}

	/**
	 * Find Roles by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Roles
	 */
	public function findRolesById($id)
	{
		return Roles::find($id);
	}

	/**
	 * Updates Roles into database
	 *
	 * @param Roles $roles
	 * @param array $input
	 *
	 * @return Roles
	 */
	public function update($roles, $input)
	{
		$roles->fill($input);
		$roles->save();

		return $roles;
	}
}
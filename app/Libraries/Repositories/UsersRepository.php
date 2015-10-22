<?php

namespace App\Libraries\Repositories;


use App\Models\Users;
use Illuminate\Support\Facades\Schema;

class UsersRepository
{

	/**
	 * Returns all Users
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Users::all();
	}

	public function search($input)
    {
        $query = Users::query();
        
        $columns = Schema::getColumnListing('users');

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
	 * Stores Users into database
	 *
	 * @param array $input
	 *
	 * @return Users
	 */
	public function store($input)
	{
		$hashPass = \Hash::make($input['password']);
		$input['password'] = $hashPass;
		$input['password_confirmation'] = $hashPass;
		return Users::create($input);
	}

	/**
	 * Find Users by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Users
	 */
	public function findUsersById($id)
	{
		return Users::find($id);
	}

	/**
	 * Updates Users into database
	 *
	 * @param Users $Users
	 * @param array $input
	 *
	 * @return Users
	 */
	public function update($Users, $input)
	{	
		$hashPass = \Hash::make($input['password']);
		$input['password'] = $hashPass;
		$input['password_confirmation'] = $hashPass;
		$Users->fill($input);
		$Users->save();

		return $Users;
	}
}
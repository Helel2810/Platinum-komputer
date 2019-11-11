<?php

namespace App\Repositories;

use App\Models\AdminRole;
use App\Repositories\BaseRepository;

/**
 * Class AdminRoleRepository
 * @package App\Repositories
 * @version August 17, 2019, 5:25 am UTC
*/

class AdminRoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'admin_role'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AdminRole::class;
    }
}

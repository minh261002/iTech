<?php
namespace App\Services;
use App\Models\Permission;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Services\Interfaces\PermissionServiceInterface;
use Illuminate\Http\Request;

class PermissionService implements PermissionServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;

    protected $repository;

    public function __construct(PermissionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {
        if (empty($request['module_id'])) {
            $request['module_id'] = null;
        }
        $this->data = $request->validated();
        return Permission::create($this->data);
    }

    public function update(Request $request)
    {
        if (empty($request['module_id'])) {
            $request['module_id'] = null;
        }
        $this->data = $request->validated();

        return $this->repository->update($this->data['id'], $this->data);

    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

}
<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Createstatus_comentsRequest;
use App\Http\Requests\Updatestatus_comentsRequest;
use App\Repositories\status_comentsRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class status_comentsController extends AppBaseController
{
    /** @var  status_comentsRepository */
    private $statusComentsRepository;

    public function __construct(status_comentsRepository $statusComentsRepo)
    {
        $this->statusComentsRepository = $statusComentsRepo;
    }

    /**
     * Display a listing of the status_coments.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->statusComentsRepository->pushCriteria(new RequestCriteria($request));
        $statusComents = $this->statusComentsRepository->all();

        return view('statusComents.index')
            ->with('statusComents', $statusComents);
    }

    /**
     * Show the form for creating a new status_coments.
     *
     * @return Response
     */
    public function create()
    {
        return view('statusComents.create');
    }

    /**
     * Store a newly created status_coments in storage.
     *
     * @param Createstatus_comentsRequest $request
     *
     * @return Response
     */
    public function store(Createstatus_comentsRequest $request)
    {
        $input = $request->all();

        $statusComents = $this->statusComentsRepository->create($input);

        Flash::success('status_coments saved successfully.');

        return redirect(route('statusComents.index'));
    }

    /**
     * Display the specified status_coments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $statusComents = $this->statusComentsRepository->findWithoutFail($id);

        if (empty($statusComents)) {
            Flash::error('status_coments not found');

            return redirect(route('statusComents.index'));
        }

        return view('statusComents.show')->with('statusComents', $statusComents);
    }

    /**
     * Show the form for editing the specified status_coments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $statusComents = $this->statusComentsRepository->findWithoutFail($id);

        if (empty($statusComents)) {
            Flash::error('status_coments not found');

            return redirect(route('statusComents.index'));
        }

        return view('statusComents.edit')->with('statusComents', $statusComents);
    }

    /**
     * Update the specified status_coments in storage.
     *
     * @param  int              $id
     * @param Updatestatus_comentsRequest $request
     *
     * @return Response
     */
    public function update($id, Updatestatus_comentsRequest $request)
    {
        $statusComents = $this->statusComentsRepository->findWithoutFail($id);

        if (empty($statusComents)) {
            Flash::error('status_coments not found');

            return redirect(route('statusComents.index'));
        }

        $statusComents = $this->statusComentsRepository->update($request->all(), $id);

        Flash::success('status_coments updated successfully.');

        return redirect(route('statusComents.index'));
    }

    /**
     * Remove the specified status_coments from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $statusComents = $this->statusComentsRepository->findWithoutFail($id);

        if (empty($statusComents)) {
            Flash::error('status_coments not found');

            return redirect(route('statusComents.index'));
        }

        $this->statusComentsRepository->delete($id);

        Flash::success('status_coments deleted successfully.');

        return redirect(route('statusComents.index'));
    }
}

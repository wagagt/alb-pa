<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatenotificaionesChatRequest;
use App\Http\Requests\UpdatenotificaionesChatRequest;
use App\Repositories\notificaionesChatRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class notificaionesChatController extends AppBaseController
{
    /** @var  notificaionesChatRepository */
    private $notificaionesChatRepository;

    public function __construct(notificaionesChatRepository $notificaionesChatRepo)
    {
        $this->notificaionesChatRepository = $notificaionesChatRepo;
    }

    /**
     * Display a listing of the notificaionesChat.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->notificaionesChatRepository->pushCriteria(new RequestCriteria($request));
        $notificaionesChats = $this->notificaionesChatRepository->all();

        return view('notificaionesChats.index')
            ->with('notificaionesChats', $notificaionesChats);
    }

    /**
     * Show the form for creating a new notificaionesChat.
     *
     * @return Response
     */
    public function create()
    {
        return view('notificaionesChats.create');
    }

    /**
     * Store a newly created notificaionesChat in storage.
     *
     * @param CreatenotificaionesChatRequest $request
     *
     * @return Response
     */
    public function store(CreatenotificaionesChatRequest $request)
    {
        $input = $request->all();

        $notificaionesChat = $this->notificaionesChatRepository->create($input);

        Flash::success('notificaionesChat saved successfully.');

        return redirect(route('notificaionesChats.index'));
    }

    /**
     * Display the specified notificaionesChat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $notificaionesChat = $this->notificaionesChatRepository->findWithoutFail($id);

        if (empty($notificaionesChat)) {
            Flash::error('notificaionesChat not found');

            return redirect(route('notificaionesChats.index'));
        }

        return view('notificaionesChats.show')->with('notificaionesChat', $notificaionesChat);
    }

    /**
     * Show the form for editing the specified notificaionesChat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $notificaionesChat = $this->notificaionesChatRepository->findWithoutFail($id);

        if (empty($notificaionesChat)) {
            Flash::error('notificaionesChat not found');

            return redirect(route('notificaionesChats.index'));
        }

        return view('notificaionesChats.edit')->with('notificaionesChat', $notificaionesChat);
    }

    /**
     * Update the specified notificaionesChat in storage.
     *
     * @param  int              $id
     * @param UpdatenotificaionesChatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatenotificaionesChatRequest $request)
    {
        $notificaionesChat = $this->notificaionesChatRepository->findWithoutFail($id);

        if (empty($notificaionesChat)) {
            Flash::error('notificaionesChat not found');

            return redirect(route('notificaionesChats.index'));
        }

        $notificaionesChat = $this->notificaionesChatRepository->update($request->all(), $id);

        Flash::success('notificaionesChat updated successfully.');

        return redirect(route('notificaionesChats.index'));
    }

    /**
     * Remove the specified notificaionesChat from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $notificaionesChat = $this->notificaionesChatRepository->findWithoutFail($id);

        if (empty($notificaionesChat)) {
            Flash::error('notificaionesChat not found');

            return redirect(route('notificaionesChats.index'));
        }

        $this->notificaionesChatRepository->delete($id);

        Flash::success('notificaionesChat deleted successfully.');

        return redirect(route('notificaionesChats.index'));
    }
}

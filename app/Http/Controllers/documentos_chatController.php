<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Createdocumentos_chatRequest;
use App\Http\Requests\Updatedocumentos_chatRequest;
use App\Repositories\documentos_chatRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class documentos_chatController extends AppBaseController
{
    /** @var  documentos_chatRepository */
    private $documentosChatRepository;

    public function __construct(documentos_chatRepository $documentosChatRepo)
    {
        $this->documentosChatRepository = $documentosChatRepo;
    }

    /**
     * Display a listing of the documentos_chat.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->documentosChatRepository->pushCriteria(new RequestCriteria($request));
        $documentosChats = $this->documentosChatRepository->all();

        return view('documentosChats.index')
            ->with('documentosChats', $documentosChats);
    }

    /**
     * Show the form for creating a new documentos_chat.
     *
     * @return Response
     */
    public function create()
    {
        return view('documentosChats.create');
    }

    /**
     * Store a newly created documentos_chat in storage.
     *
     * @param Createdocumentos_chatRequest $request
     *
     * @return Response
     */
    public function store(Createdocumentos_chatRequest $request)
    {
        $input = $request->all();

        $documentosChat = $this->documentosChatRepository->create($input);

        Flash::success('documentos_chat saved successfully.');

        return redirect(route('documentosChats.index'));
    }

    /**
     * Display the specified documentos_chat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $documentosChat = $this->documentosChatRepository->findWithoutFail($id);

        if (empty($documentosChat)) {
            Flash::error('documentos_chat not found');

            return redirect(route('documentosChats.index'));
        }

        return view('documentosChats.show')->with('documentosChat', $documentosChat);
    }

    /**
     * Show the form for editing the specified documentos_chat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $documentosChat = $this->documentosChatRepository->findWithoutFail($id);

        if (empty($documentosChat)) {
            Flash::error('documentos_chat not found');

            return redirect(route('documentosChats.index'));
        }

        return view('documentosChats.edit')->with('documentosChat', $documentosChat);
    }

    /**
     * Update the specified documentos_chat in storage.
     *
     * @param  int              $id
     * @param Updatedocumentos_chatRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedocumentos_chatRequest $request)
    {
        $documentosChat = $this->documentosChatRepository->findWithoutFail($id);

        if (empty($documentosChat)) {
            Flash::error('documentos_chat not found');

            return redirect(route('documentosChats.index'));
        }

        $documentosChat = $this->documentosChatRepository->update($request->all(), $id);

        Flash::success('documentos_chat updated successfully.');

        return redirect(route('documentosChats.index'));
    }

    /**
     * Remove the specified documentos_chat from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $documentosChat = $this->documentosChatRepository->findWithoutFail($id);

        if (empty($documentosChat)) {
            Flash::error('documentos_chat not found');

            return redirect(route('documentosChats.index'));
        }

        $this->documentosChatRepository->delete($id);

        Flash::success('documentos_chat deleted successfully.');

        return redirect(route('documentosChats.index'));
    }
}

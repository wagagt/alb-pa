<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createchat_doctsRequest;
use App\Http\Requests\Updatechat_doctsRequest;
use App\Repositories\chat_doctsRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Carbon\Carbon;

class chat_doctsController extends Controller {
	/** @var  chat_doctsRepository */
	private $chatDoctsRepository;

	public function __construct(chat_doctsRepository $chatDoctsRepo) {
		$this->chatDoctsRepository = $chatDoctsRepo;
	}

	/**
	 * Display a listing of the chat_docts.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function index(Request $request) {
		$this->chatDoctsRepository->pushCriteria(new RequestCriteria($request));
		$chatDocts = $this->chatDoctsRepository->all();

		return view('archivos_documento.index')
			->with('chatDocts', $chatDocts);
	}

	/**
	 * Show the form for creating a new chat_docts.
	 *
	 * @return Response
	 */
	public function create() {
		return view('chatDocts.create');
	}

	/**
	 * Store a newly created chat_docts in storage.
	 *
	 * @param Createchat_doctsRequest $request
	 *
	 * @return Response
	 */
	public function store(Createchat_doctsRequest $request) {
		$input = $request->all();

		$chatDocts = $this->chatDoctsRepository->create($input);

		Flash::success('chat_docts saved successfully.');

		return redirect(route('chatDocts.index'));
	}

	/**
	 * Display the specified chat_docts.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id) {
		$chatDocts = $this->chatDoctsRepository->findWithoutFail($id);

		if (empty($chatDocts)) {
			Flash::error('chat_docts not found');

			return redirect(route('chatDocts.index'));
		}

		return view('chatDocts.show')->with('chatDocts', $chatDocts);
	}

	/**
	 * Show the form for editing the specified chat_docts.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id) {
		$chatDocts = $this->chatDoctsRepository->findWithoutFail($id);

		if (empty($chatDocts)) {
			Flash::error('chat_docts not found');

			return redirect(route('chatDocts.index'));
		}

		return view('chatDocts.edit')->with('chatDocts', $chatDocts);
	}

	/**
	 * Update the specified chat_docts in storage.
	 *
	 * @param  int              $id
	 * @param Updatechat_doctsRequest $request
	 *
	 * @return Response
	 */
	public function update($id, Updatechat_doctsRequest $request) {
		$chatDocts = $this->chatDoctsRepository->findWithoutFail($id);

		if (empty($chatDocts)) {
			Flash::error('chat_docts not found');

			return redirect(route('chatDocts.index'));
		}

		$chatDocts = $this->chatDoctsRepository->update($request->all(), $id);

		Flash::success('chat_docts updated successfully.');

		return redirect(route('chatDocts.index'));
	}

	/**
	 * Remove the specified chat_docts from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id) {
		$chatDocts = $this->chatDoctsRepository->findWithoutFail($id);

		if (empty($chatDocts)) {
			Flash::error('chat_docts not found');

			return redirect(route('chatDocts.index'));
		}

		$this->chatDoctsRepository->delete($id);

		Flash::success('chat_docts deleted successfully.');

		return redirect(route('chatDocts.index'));
	}
}

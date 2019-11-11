<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsCommentRequest;
use App\Http\Requests\UpdateNewsCommentRequest;
use App\Repositories\NewsCommentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class NewsCommentController extends AppBaseController
{
    /** @var  NewsCommentRepository */
    private $newsCommentRepository;

    public function __construct(NewsCommentRepository $newsCommentRepo)
    {
        $this->newsCommentRepository = $newsCommentRepo;
    }

    /**
     * Display a listing of the NewsComment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $newsComments = $this->newsCommentRepository->all();

        return view('news_comments.index')
            ->with('newsComments', $newsComments);
    }

    /**
     * Show the form for creating a new NewsComment.
     *
     * @return Response
     */
    public function create()
    {
        return view('news_comments.create');
    }

    /**
     * Store a newly created NewsComment in storage.
     *
     * @param CreateNewsCommentRequest $request
     *
     * @return Response
     */
    public function store(CreateNewsCommentRequest $request)
    {
        $input = $request->all();

        $newsComment = $this->newsCommentRepository->create($input);

        Flash::success('News Comment saved successfully.');

        return redirect(route('newsComments.index'));
    }

    /**
     * Display the specified NewsComment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $newsComment = $this->newsCommentRepository->find($id);

        if (empty($newsComment)) {
            Flash::error('News Comment not found');

            return redirect(route('newsComments.index'));
        }

        return view('news_comments.show')->with('newsComment', $newsComment);
    }

    /**
     * Show the form for editing the specified NewsComment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $newsComment = $this->newsCommentRepository->find($id);

        if (empty($newsComment)) {
            Flash::error('News Comment not found');

            return redirect(route('newsComments.index'));
        }

        return view('news_comments.edit')->with('newsComment', $newsComment);
    }

    /**
     * Update the specified NewsComment in storage.
     *
     * @param int $id
     * @param UpdateNewsCommentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNewsCommentRequest $request)
    {
        $newsComment = $this->newsCommentRepository->find($id);

        if (empty($newsComment)) {
            Flash::error('News Comment not found');

            return redirect(route('newsComments.index'));
        }

        $newsComment = $this->newsCommentRepository->update($request->all(), $id);

        Flash::success('News Comment updated successfully.');

        return redirect(route('newsComments.index'));
    }

    /**
     * Remove the specified NewsComment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $newsComment = $this->newsCommentRepository->find($id);

        if (empty($newsComment)) {
            Flash::error('News Comment not found');

            return redirect(route('newsComments.index'));
        }

        $this->newsCommentRepository->delete($id);

        Flash::success('News Comment deleted successfully.');

        return redirect(route('newsComments.index'));
    }
}

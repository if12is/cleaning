<?php

namespace App\Http\Controllers;

use App\Services\CommonQuestionsService;
use Illuminate\Http\Request;

class CommonQuestionsController extends Controller
{

    private $commonQuestionsService;

    public function __construct(CommonQuestionsService $commonQuestionsService)
    {
        $this->commonQuestionsService = $commonQuestionsService;
    }
    public function index()
    {
        $commonQuestions = $this->commonQuestionsService->getAllCommonQuestions();
        return view('admin.commonQuestions', compact('commonQuestions'));
    }
    public function welcome()
    {
        $commonQuestions = $this->commonQuestionsService->getAllCommonQuestions();
        return view('welcome', compact('commonQuestions'));
    }

    public function updateCommonQuestions(Request $request)
    {
        $this->commonQuestionsService->updateCommonQuestions($request);
        return redirect()->back()->with('success', 'تم تعديل السؤال بنجاح');
    }
}

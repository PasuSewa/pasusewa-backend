<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;

class FeedbackController extends Controller
{
    public function index()
    {
        $suggestions = Feedback::where('feedback_type', 'suggestion')->where('is_published', true)->get();

        $ratings = Feedback::where('feedback_type', 'rating')->where('is_published', true)->get();

        return response()->json([
            'feedback' => [
                'suggestions' => $suggestions,
                'ratings' => $ratings
            ]
        ], 200);
    }

    public function create(Request $request, $feedbackType)
    {
        if ($feedbackType !== 'suggestion' && $feedbackType !== 'rating') {
            return response()->json([
                'status' => 400,
                'message' => __('api_responses.error.parameter_was_incorrect')
            ], 400);
        }

        $data = $request->only('userName', 'body', 'rating', 'email');

        $rules = ['required', 'string', 'min:10', 'max:190'];

        $validation = Validator::make($data, [
            'userName' => $rules,
            'body' => $rules,
            'rating' => [Rule::requiredIf($feedbackType === 'rating'), 'integer', 'min:1', 'max:10'],
            'email' => ['required', 'email', 'exists:users,email']
        ]);

        if ($validation->fails()) {
            return response()->json([
                'message' => __('api_messages.error.validation'),
                'errors' => $validation->errors()
            ], 400);
        }

        Feedback::create([
            'user_name' => $data['userName'],
            'body' => $data['body'],
            'rating' => $feedbackType === 'rating' ? 'rating' : null,
            'feedback_type' => $feedbackType,
        ]);

        return response()->json([
            'message' => __('api_messages.success.feedback.received'),
        ], 200);
    }

    //coinbase

    // public function testPost(Request $request)
    // {
    //     $event = $request->all();

    //     $edit = User::find(1);

    //     // this is the important part to get the code of the charge
    //     $edit->email = $event['event']['data']['code'];

    //     $edit->save();

    //     return response()->json(['testing' => $event['event']['data']], 200);
    // }
}

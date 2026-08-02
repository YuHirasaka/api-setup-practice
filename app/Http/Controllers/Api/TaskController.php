<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * タスク一覧を取得
     */
    public function index()
    {
        // user_id = 1 のタスクを取得
        $tasks = Task::where('user_id', 1)->get();

        return response()->json([
            'data' => $tasks
        ], 200);
    }

    /**
     * タスクを作成
     */
    public function store(Request $request)
    {
        //　バリデーション
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        // タスクを作成
        $data = array_merge($validated, [
            'user_id' => 1,
            'status' => 'pending',
        ]);

        $task = Task::create($data);

        return response()->json([
            'message' => 'タスクを作成しました',
            'data' => $task
        ], 201);
    }

    /**
     * タスク詳細を取得
     */
    public function show(string $id)
    {
        //　タスクを取得
        $task = Task::where('user_id', 1)->find($id);

        // タスクが見つからない場合
        if (!$task) {
            return response()->json([
                'message' => 'タスクが見つかりません',
            ], 404);
        }

        return response()->json([
            'data' => $task
        ], 200);
    }

    /**
     * タスクを更新
     */
    public function update(Request $request, string $id)
    {
        // タスクを取得
        $task = Task::where('user_id', 1)->find($id);

        // タスクが見つからない場合
        if (!$task) {
            return response()->json([
                'message' => 'タスクが見つかりません'
            ], 404);
        }

        //　バリデーション
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
        ]);

        // タスクを更新
        $task->update($validated);

        return response()->json([
            'message' => 'タスクを更新しました'
        ], 200);
    }

    /**
     * タスクを削除
     */
    public function destroy(string $id)
    {
        //　タスクを取得
        $task = Task::where('user_id', 1)->find($id);

        // タスクが見つからない場合
        if (!$task) {
            return response()->json([
                'message' => 'タスクが見つかりません'
            ], 404);
        }

        // タスクを削除
        $task->delete();

        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Publication;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Publication $publication)
            {
                $request->validate([
                    'content' => 'required',
                ]);

                $parent_id = $request->input('parent_id');

                $comment = new Comment([
                    'content' => $request->input('content'),
                    'user_id' => auth()->id(),
                    'publication_id' => $publication->id,
                    'parent_id' => $parent_id, 
                ]);

                $comment->save();

                return redirect()->route('publication.index', ['publication' => $publication->id])
                    ->with('success', 'Comment added successfully.');
            }


            public function destroy(Comment $comment)
                {
                    // verifie user  autorisé pour supprimer  ou non
                    if ($comment->user_id == auth()->id()) {
                        // Supprim le commentaire
                        $comment->delete();
                        return back()->with('success', 'Comment successfully deleted.');
                    } else {
                        return back()->with('error', 'You do not have permission to delete this comment.');
                    }
                }

                public function update(Request $request, Comment $comment)
                    {
                        // si l'utilisateur est connect
                        if ($comment->user_id == auth()->id()) {
                            // validate donnees
                            $request->validate([
                                'content' => 'required|string',
                            ]);

                            // modifie lcommentaire
                            $comment->update(['content' => $request->input('content')]);

                            return back()->with('success', 'Comment successfully updated.');
                        } else {
                            return back()->with('error', 'You are not allowed to edit this comment');
                        }
                    }

                    public function show($id)
                        {
                            $comment = Comment::findOrFail($id);
                            $parsedContent = $comment->parseContent();

                            return view('comments.comment', compact('comment', 'parsedContent'));
                        }

            

}

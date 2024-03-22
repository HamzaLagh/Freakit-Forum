<!-- Incluez le script twemoji -->
<script src="https://cdn.jsdelivr.net/npm/twemoji@13.1.0/dist/twemoji.min.js"></script>

<div class="comment emoji mb-5  @if($comment->parent_id) reply @endif" style="border-bottom: 1px solid purple; background-color: rgb(198, 200, 203); padding: 10px"> 




    {{-- Afficher le texte du commentaire --}}
    <div class="row emoji comment-text">
        <div class="">
                        {{-- <p style="background-color: blueviolet"> --}}
            <div class="row border-bottom">
                <div class="col-9">
                    @if ($comment->parent_id)
                    {{ $comment->user->name }} a répondu à {{ $comment->parent->user->name }} :            
                    @else
                    <a href="{{route('profile.show',$comment->user->id)}}"  style="text-decoration: none;cursor: pointer;">{{ $comment->user->name }} </a>commented :   
                    @endif
                </div>
                <div class="col">
                    <p class="" style="font-size: 14px;font-weight: 700">{{ $comment->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
            {{-- contenu dyal commentaire --}}
            <div class="row " style="font-size: 14px;font-weight: 700">
                <div class="col-10">
                        {{-- Vérification de comemnt  si il y'a un lien vers  image --}}
                        @if (preg_match('/(https?:\/\/.*\.(?:png|jpg|jpeg|gif|bmp|svg))/i', $comment->content, $matches))
                        {{-- Affiche l'image ila kan lien d'image --}}
                        <img class="w-25" src="{{ $matches[0] }}" alt="Image du commentaire" width="50" height="auto">
                        @endif

                        {{-- Vérification si le commentaire contient un lien --}}
                        @if (preg_match('/\bhttps?:\/\/\S+\b/', $comment->content, $matches))
                        {{-- aff. lien dans une balise <a> --}}
                        <a href="{{ $matches[0] }}" target="_blank">{{ $matches[0] }}</a>
                        @endif

                        @if (isset($matches[0]))
                        <p>{{ str_replace($matches[0],'',$comment->content,) }}</p> 
                        @else
                            <p>{{ $comment->content }}</p>
                        @endif
                        <form id="editCommentForm{{ $comment->id }}" action="{{ route('comments.update', ['comment' => $comment->id]) }}" method="post" style="display: none;">
                            @csrf
                            @method('PUT')
                            <textarea name="content" cols="20" rows="1">{{ $comment->content }}</textarea>
                            <button class="btn-sm btn-success" style="font-size: 10px" type="submit">save</button>
                        </form>
                </div>

                <div class="col-1 ">
                                {{-- //supprimer --}}
                            @auth
                            @if($comment->user_id == Auth::id())
                                <form action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn" onclick="return confirm('Do you want to delete this comment?')" type="submit"><i class="bi bi-trash3-fill" style="font-size: 20px;color: red"></i></button>
                                </form>
                            @endif
                        @endauth
                    </div>

                    <div class="col-1 p-0 ">
                            {{-- modifie --}}
                                @auth
                                @if($comment->user_id == Auth::id())
                                    <button type="button" class="btn" onclick="editComment({{ $comment->id }})"><i class="bi bi-pencil-square" style="font-size: 20px;color: blue"></i></button>

                                    <script>
                                        function editComment(commentId) {
                                            // Masquer tous les formulaires d'édition
                                            document.querySelectorAll('[id^="editCommentForm"]').forEach(form => {
                                                form.style.display = 'none';
                                            });

                                            // Afficher le formulaire d'édition du commentaire spécifique
                                            document.getElementById(`editCommentForm${commentId}`).style.display = 'block';
                                        }
                                    </script>
                                @endif
                                @endauth
                </div>

            </div>
    
    </div>
</div>

    <!-- Formulaire pour répondre à ce commentaire -->
    @if (!$comment->parent_id) <!-- Ajout de cette condition pour afficher le formulaire uniquement pour les commentaires principaux -->
        @auth
            <form class="border-top pt-1" action="{{ route('comments.store', ['publication' => $publication->id]) }}" method="post">
                @csrf
                <div class="row w-50 ms-2" >
                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                {{-- <lab el for="reply">Répondre à ce commentaire :</label> --}}
                {{-- <textarea name="content" id="reply" cols="30" rows="3"></textarea> --}}
                <textarea style="font-size: 10px"  name="content" id="reply" class="form-control" cols="10" rows="1" placeholder="Leave a reply here" id="floatingTextarea"></textarea>
                {{-- <label for="floatingTextarea">Comments</label> --}}
            
              <button style="font-size: 10px" type="submit" class="btn-sm btn-primary w-25">Reply</button>
                </div>
            </form>
        @endauth
    @endif

    <!-- Afficher les réponses imbriquées -->
    {{-- @if ($comment->replies->count() > 0)
        <div class="replies">
            @foreach ($comment->replies as $reply)
                @include('comments.comment', ['comment' => $reply])
            @endforeach
        </div>
    @endif --}}
</div>







<style>
    /* Dans votre fichier CSS */
.emoji img.emoji {
    width: 1em;
    height: 1em;
}
</style>


<!-- Incluez le fichier JavaScript personnalisé -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const emojiElements = document.querySelectorAll('.emoji');
    
    emojiElements.forEach(function (element) {
        twemoji.parse(element, {
            folder: 'svg',
            ext: '.svg',
        });
    });
});
</script>


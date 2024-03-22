
// emoji.js


document.addEventListener('DOMContentLoaded', function () {
    const commentContent = document.querySelector('.comment');
    if (commentContent) {
        twemoji.parse(commentContent, {
            folder: 'svg',
            ext: '.svg',
        });
    }
});
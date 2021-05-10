//animation btn share
$(".btnShare").click(function(){
    $(".social.twitter").toggleClass("clicked");
    $(".social.facebook").toggleClass("clicked");
    $(".social.google").toggleClass("clicked");
    $(".social.youtube").toggleClass("clicked");
});

/**
 * Sending article
 */
let sendArticleButn = document.getElementById('sendArticle');
sendArticleButn.addEventListener('click', function(e) {
    e.preventDefault();
    const xhr = new XMLHttpRequest();
    xhr.onload = function () {
        // On vérifie si un message d'erreur est present.
        if(xhr.responseText) {
            const error = JSON.parse(xhr.responseText);
            alert(error);
        }

    };

    const data = {
        'article': document.querySelector('#artclToSend').value
    }

    xhr.open('POST', '/api/article.php');
    xhr.send(JSON.stringify(data));
});


/**
 *  all messages enter in DB by registered users
 */
function getArticles() {
    const xhr = new XMLHttpRequest();
    xhr.onload = function () {
        // Fonction appelée quand tout est reçu.
        const articles = JSON.parse(xhr.responseText);
        const allArticles = document.querySelector('.article');
        allArticles.innerHTML = '';

        for(let artcl of articles) {
            allArticles.innerHTML += `
                <div class="article-wrapper" >
                     <span class="italic bold"> ${artcl.user}</span>
                    <span class="italic"> ${artcl.date}</span> 
                    <span>${artcl.title}</span>
                    <p class="contentArticle"> ${artcl.content}</p> 
                </div>
            `
        }
    };

    // La récupération se fait en get
    xhr.open('GET', '/api/article.php');
    xhr.send();

    // Load messages at 5 second intervals
    setTimeout( getArticles, 5000);
}

getArticles();

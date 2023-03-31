<?php
//GLOBAL VARIABLES
$featuredPosts = array();
//GLOBAL FUNCTIONS


//Constants
define('ROOT_URL', 'http://localhost/My Blog/');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'my_blog');


function addFeaturedPost($id)
{

    global $featuredPosts;
    $featuredPosts[0] = 0;

    if (array_search($id, $featuredPosts) === false) {
        array_unshift($featuredPosts, $id);
        if (sizeof($featuredPosts) > 3) {
            $oldFeatured = array_pop($featuredPosts);
            // set is_featured of the last featured posts to 0 if isFeatured for this post is 1
            $zeroIsFeaturedQuery = "UPDATE posts SET is_featured=0 WHERE id = $oldFeatured";
            $zeroIsFeaturedResult = mysqli_query(new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME), $zeroIsFeaturedQuery);
            //use um array para armazenas os 3 posts em destaque, quando um novo post em destaque for adicionado, remova o mais velho com o array.pop e adicione o novo ao array com o array.unshift
            //use o comando "SELECT title FROM posts WHERE is_featured=1 ORDER BY date_time DESC LIMIT 3") para pegar todos os posts em destaque;
            //se um post que era destaque e estava no array for definido como não destaque use o array_search para busca-lo e unset para remove-lo do array
            //crie uma lógica que adapta a sessão dos posts em destaque para ser compativel com menos de 3 posts                
            //O ID do post em destaque só pode ser adicionado uma vez
        }
    }
}

function removeFeaturedPost($id)
{
    global $featuredPosts;
    if (($key = array_search($id, $featuredPosts)) !== false) {
        unset($featuredPosts[$key]);
    }
}


//Start a Session
define('SESSION_START', session_start());

let nomeLivros = document.querySelectorAll('.nomeLivro');
let img = document.querySelectorAll('.capaLivro');
let palavraBusca ;
let apiUrl;
const apiKey = 'AIzaSyCOzoYUgiMC6CLqYOSHyBfw-oy6X_MGnxU';

nomeLivros.forEach(function(nome, indice){
    palavraBusca = nome.innerHTML;
    apiUrl = `https://www.googleapis.com/books/v1/volumes?q=${encodeURIComponent(palavraBusca)}&key=${apiKey}`;
    fetch(apiUrl)
        .then(resposta => {
            if (!resposta.ok) {
            throw new Error(`Erro na solicitação: ${resposta.status}`);
            }
            return resposta.json();
        })
        .then(dados => {
            // Aqui, você pode trabalhar com os dados retornados pela API
            let livro = dados.items[0];
            let imagemLivro = livro.volumeInfo.imageLinks;
            
            if (imagemLivro && imagemLivro.smallThumbnail){
                img[indice].src = imagemLivro.smallThumbnail;
            }
            else{
                img[indice].src = '../img/livros.webp'
            };

        })
        .catch(erro => {
            // Lida com erros
            console.log(erro);
        });
});


document.getElementById("title").addEventListener('keyup', slugChange);

function slugChange() {

    title = document.getElementById("title").value;
    document.getElementById("slug").value = slug(title);

}

function slug(str) {
    var $slug = '';
    var trimmed = str.trim(str);
    $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
        replace(/-+/g, '-').
        replace(/^-|-$/g, '');
    return $slug.toLowerCase();
}


//Cambiar imagen
document.getElementById("file").addEventListener('change', cambiarImagen);

function cambiarImagen(event) {
    var file = event.target.files[0];

    var reader = new FileReader();
    reader.onload = (event) => {
        document.getElementById("picture").setAttribute('src', event.target.result);
    };

    reader.readAsDataURL(file);
}

document.getElementById("img").addEventListener('change', cambioImg);

function cambioImg(event) {
    var img = event.target.files[0];

    var asa = new FileReader();
    asa.onload = (event) => {
        document.getElementById("portada").setAttribute('src', event.target.result);
    };

    asa.readAsDataURL(img);
}
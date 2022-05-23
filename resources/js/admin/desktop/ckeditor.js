import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export let renderCkeditor = () => {

    document.addEventListener("renderFormModules",( event =>{
        renderCkeditor();
    }), {once: true});

    window.ckeditors = [];

    let ckeditors = document.querySelectorAll('.ckeditor');

    ckeditors.forEach(ckeditor => {
        ClassicEditor
        .create(ckeditor)
        .then( classicEditor => {
            ckeditors[ckeditor.name] = classicEditor;
        })
        .catch( error => {
            console.error(error);
        } );
    });
};
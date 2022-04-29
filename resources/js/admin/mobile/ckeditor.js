import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export let renderCkeditor = () => {

    let ckeditors = document.querySelectorAll('.ckeditor');

    ckeditors.forEach(ckeditor => {
        ClassicEditor
        .create(ckeditor)
        .catch( error => {
            console.error( error );
        } );
    });
};
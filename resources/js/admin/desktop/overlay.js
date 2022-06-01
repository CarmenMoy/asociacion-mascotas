export let renderOverlay = () => {

    let overlay = document.querySelector('.overlay');

    document.addEventListener("startOverlay",( event =>{
        
        overlay.classList.add('active');
    }), {once: true});


    document.addEventListener("stopOverlay",( event =>{
        
        overlay.classList.remove('active');
    }), {once: true});
}
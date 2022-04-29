export let renderTabs = () => {

    let tabs = document.querySelectorAll('.tabs-item');
    let contents = document.querySelectorAll('.content-item');

    tabs.forEach( tab => {

        tab.addEventListener("click", () => {
            
            tabs.forEach(tab => {
                tab.classList.remove("active");
            });

            contents.forEach(content => {
                content.classList.remove("active");

                if(tab.dataset.tab == content.dataset.content){
                    tab.classList.add("active");
                    content.classList.add("active");
                };
            });
        });
    });
}
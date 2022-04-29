<div class="home">
    <div class="slider">
        <img src="{{Storage::url('adopta.jpg')}}" alt="adopta animal">
    </div>

    <div class="subtitulo">
        <h2>TE AYUDAMOS A ELEGIR A TU PEQUEÑÍN, Y COMPAÑERO DE VIDA</h2>
    </div>

    <div class="animales">
        <div class="animal">
            <div class="animal-imagen">
                <img src="{{Storage::url('senior.jpg')}}" alt="gato senior">
            </div>
            <div class="animal-titulo">
                <h3>SENIOR</h3>
            </div>
            <div class="animal-descripcion">
                <p>Son de los más abandonados que requieren de tu mayor cuidado y cariño.</p>
            </div>
        </div>
        <div class="animal">
            <div class="animal-imagen">
                <img src="{{Storage::url('adulto.jpg')}}" alt="gato adulto">
            </div>
            <div class="animal-titulo">
                <h3>JUNIOR</h3>
            </div>
            <div class="animal-descripcion">
                <p>En la flor de la vida, llenos de diversión y curiosidad. Ideal para una vida llena de juegos.</p>
            </div>
        </div>
        <div class="animal">
            <div class="animal-imagen">
                <img src="{{Storage::url('bebe.jpg')}}" alt="gato bebe">
            </div>
            <div class="animal-titulo">
                <h3>BABY</h3>
            </div>
            <div class="animal-descripcion">
                <p>Gatitos que necesitan de mucho cuidado pero que te despertará ternura de por vida.</p>
            </div>
        </div>
        <div class="animal">
            <div class="animal-imagen">
                <img src="{{Storage::url('interrogante.jpg')}}" alt="interrogante">
            </div>
            <div class="animal-titulo">
                <h3>¿ ?</h3>
            </div>
            <div class="animal-descripcion">
                <p>Si no sabes qué hacer, pregúntanos. Te ayudaremos en todo lo que necesites para adoptar a tu amigo felino ideal.</p>
            </div>
        </div>
    </div>

    <div class="contact">
        <div class="contact-form">
            <div class="contact-description">
                <p>Si eres una asociación o quieres formar parte de nuestro voluntariado, ponte en contacto con nosotros. Nuestros peludos lo agradecerán.</p>
            </div>                    
            <form class="contact-suscription-form" action="/users/create" autocomplete="off"> 
                <div class="contact__form-element">
                    <div class="contact__form-label">
                        <label for="name">Nombre</label>
                    </div>

                    <div class="contact__form-input">
                        <input type="text" name="name">
                    </div>
                </div>

                <div class="contact__form-element">
                    <button class="contact__store-button">Guardar</button>
                </div>
            </form>
        </div>
        <div class="contact-image">
            <img src="{{Storage::url('politicuchos.jpg')}}" alt="politicuchos">
        </div>
    </div>
</div>

<div class="ficha">
    <div class="desktop-dos-columnas">
        <div class="columna">
            <div class="foto-ficha">
                <img src="{{Storage::url('orco.jpg')}}" alt="gato senior">
            </div>
            <div class="subfotos-ficha">
                <div class="subfoto-imagen">
                    <img src="{{Storage::url('orco1.jpg')}}" alt="gato senior">
                </div>

                <div class="subfoto-imagen">
                    <img src="{{Storage::url('orco2.jpg')}}" alt="gato senior">
                </div>

                <div class="subfoto-imagen">
                    <img src="{{Storage::url('orco3.jpg')}}" alt="gato senior">
                </div>

                <div class="subfoto-imagen">
                    <img src="{{Storage::url('orco4.jpg')}}" alt="gato senior">
                </div>

                <div class="subfoto-imagen">
                    <img src="{{Storage::url('orco5.jpg')}}" alt="gato senior">
                </div>
            </div>
        </div>

        <div class="columna">
            <div class="subtitulo">
                <h2>ORCO</h2>
            </div>

            <div class="coste">
                <h3>55 €</h3>
                <span>Incluye: vacunación, chip y trámite de gestión en adopción. </span>
            </div>

            <div class="descripcion">
                <ul class="tabs" id="tabs">
                    <li class="tabs-item active" data-tab="descripcion">Descripción</li>
                    <li class="tabs-item" data-tab="video">Vídeo</li>
                    <li class="tabs-item" data-tab="acogida">Casa acogida</li>
                </ul> 

                <div class="content">
                    <div class="content-item active" data-content="descripcion">
                        <p>Orco fué rescatado de un pozo en el que había sido lanzado junto a sus dos hermanos, que afortunadamente ya han sido adoptados. Por lo que Orco, ahora espera su oportunidad. Si quiere averiguar las 10 razones por la que debes adoptarlo, pincha en la siguiente pestaña del video adjunto.</p>
                    </div>

                    <div class="content-item" data-content="video">
                        <iframe width="350" height="200" src="https://www.youtube.com/embed/cNE1ZHIylkY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>

                    <div class="content-item" data-content="acogida">
                        <p>La acogida también puede ser una opción, ya que cumple una función esencial ya que nuestros peludos necesitan cariño y compañía y un hogar cálido hasta encontrar a su familia definitiva.</p>
                    </div>
                </div>
            </div>

            <div class="cantidad">
                <div class="descripcion-cantidad">
                    <span>*También tienes la opción de ser casa de acogida, por lo que en cuyo caso tienes la opción de elegir los días de dicha acogida y nos pondremos en contacto contigo.</span>
                </div>

                <div class="cantidad-acogida">
                    <div class="titulo-cantidad-acogida">
                        <p>Días de acogida (máximo 20 días):</p>
                    </div>

                    <div class="botones-cantidad">
                        <div class="btn-group mas-menos  " role="group">
                            <button type="button" id="menos" data-boton="menos">-</button>
                            <input id="cantidad" type="number" value="1" data-max="20" autocomplete="off" onKeyDown="return false">
                            <button type="button" id="mas" data-boton="mas">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="botones-adopcion-acogida">
                <div class="boton-acogida">
                    <button class="button-acogida">ACOGIDA</button>
                </div>

                <div class="boton-adopcion">
                    <button class="button-acogida"><a href="cesta.html">ADOPTAR</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
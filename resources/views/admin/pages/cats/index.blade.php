@extends('admin.layout.table_form')

@section('table')
    @if(isset($cats))
        @foreach($cats as $cat_element)
            <div class="table-row swipe-element">
                <div class="table-field-container swipe-front">
                    <div class="table-field"><p><span>Id GATO:</span>{{$cat_element->id}}</p></div>
                    <div class="table-field"><p><span>Nombre:</span> {{$cat_element->name}}</p></div>
                    <div class="table-field"><p><span>Categoría:</span> {{$cat_element->category}}</p></div>
                    <div class="table-field"><p><span>Creado el:</span>{{$cat_element->created_at}}</p></div>
                </div>

                <div class="table-icons-container swipe-back">
                    <div class="table-icons edit-button right-swipe" data-url="{{route('cats_edit', ['cat' => $cat_element->id])}}">
                        <svg viewBox="0 0 24 24">
                            <path d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                        </svg>
                    </div>

                    <div class="table-icons delete-button left-swipe" data-url="{{route('cats_destroy', ['cat' => $cat_element->id])}}">
                        <svg viewBox="0 0 24 24">
                            <path d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                        </svg>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
            
@section('form')
    @if(isset($cat))
        <div class="tabs-container">
            <ul class="tabs" id="tabs">
                <li class="tabs-item active" data-tab="contenido">Contenido</li>
                <li class="tabs-item" data-tab="imagenes">Imágenes</li>
                <li class="tabs-item" data-tab="description">SEO</li>
            </ul> 

            <div class="icons">
                <div class="store-button">
                    <svg viewBox="0 0 24 24">
                        <path d="M17,7V3H7V7H17M14,17A3,3 0 0,0 17,14A3,3 0 0,0 14,11A3,3 0 0,0 11,14A3,3 0 0,0 14,17M19,1L23,5V17A2,2 0 0,1 21,19H7C5.89,19 5,18.1 5,17V3A2,2 0 0,1 7,1H19M1,7H3V21H17V23H3A2,2 0 0,1 1,21V7Z" />
                    </svg>
                </div>
            
                <div class="create-button" data-url="{{route('cats_create')}}">
                    <svg viewBox="0 0 24 24">
                        <path d="M19.36,2.72L20.78,4.14L15.06,9.85C16.13,11.39 16.28,13.24 15.38,14.44L9.06,8.12C10.26,7.22 12.11,7.37 13.65,8.44L19.36,2.72M5.93,17.57C3.92,15.56 2.69,13.16 2.35,10.92L7.23,8.83L14.67,16.27L12.58,21.15C10.34,20.81 7.94,19.58 5.93,17.57Z" />
                    </svg>
                </div>

                <div class="switch-button">
                    <input type="checkbox" id="switch">
                    <label for="switch" id="switch-label">Toggle</label>
                </div>
            </div>
        </div>

        <div class="content">

            <div class="content-item active" data-content="contenido">

                <form class="form-contact admin-form" action="{{route('cats_store')}}" id="contact-form">

                    <input type="hidden" name="id" value="{{isset($cat->id) ? $cat->id : ''}}">

                    <div class="desktop-dos-columnas">
                        <div class="columna">
                            <div class="contact-form-element">
                                <div class="contact-form-label">
                                    <label for="name">Nombre:</label>
                                </div>
        
                                <div class="contact-form-input">
                                    <input type="text" name="name" value="{{isset($cat->name) ? $cat->name : ''}}">
                                </div>
                            </div>
                        </div>

                        <div class="columna">
                            <div class="contact-form-element">
                                <div class="contact-form-label">
                                    <label for="sex">Sexo:</label>
                                </div>

                                <div class="contact-form-input">
                                    <input type="text" name="sex" value="{{isset($cat->sex) ? $cat->sex : ''}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="desktop-dos-columnas">
                        <div class="columna">
                            <div class="contact-form-element">
                                <div class="contact-form-label">
                                    <label for="category">Categoría:</label>
                                </div>

                                <div class="contact-form-input">
                                    <input type="text" name="category" value="{{isset($cat->category) ? $cat->category : ''}}">
                                </div>
                            </div>
                        </div>

                        <div class="columna">
                            <div class="contact-form-element">
                                <div class="contact-form-label">
                                    <label for="years">Años:</label>
                                </div>

                                <div class="contact-form-input">
                                    <input type="years" name="years" value="{{isset($cat->years) ? $cat->years : ''}}">
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="desktop-dos-columnas">
                        <div class="columna">
                            <div class="contact-form-element">
                                <div class="contact-form-label">
                                    <label for="vaccinated">Vacunado:</label>
                                </div>
        
                                <div class="contact-form-input">
                                    <input type="text" name="vaccinated" value="{{isset($cat->vaccinated) ? $cat->vaccinated : ''}}">
                                </div>
                            </div>
                        </div>

                        <div class="columna">
                            <div class="contact-form-element">
                                <div class="contact-form-label">
                                    <label for="sterilized">Esterilizado:</label>
                                </div>

                                <div class="contact-form-input">
                                    <input type="text" name="sterilized" value="{{isset($cat->sterilized) ? $cat->sterilized : ''}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columna">
                        <div class="contact-form-element">
                            <div class="contact-form-label">
                                <label for="description">Descripción:</label>
                            </div>

                            <div class="contact-form-input">
                                <input type="text" name="description" value="{{isset($cat->description) ? $cat->description : ''}}">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="content-item" data-content="imagenes">
                <textarea name="imagenes" class="ckeditor"></textarea>
            </div>

            <div class="content-item" data-content="seo">
                <textarea name="seo" class="ckeditor"></textarea>
            </div>
        </div>
    @endif
@endsection
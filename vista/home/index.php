<?php
    include_once '../../configuracion.php';
    $sesion = new session;
    $objUsuario = $sesion->getObjUsuario();
    if($sesion->activa()){
        include_once '../estructura/cabeceraSegura.php'; 
        
    }else{
        include_once '../estructura/cabecera.php'; 
    }
?>
<header class="masthead"  >
            <div class="container">
                <div class="masthead-subheading">Bienvenido a Piedras, Cristales y Cactus</div>
               
                <a class="btn btn-primary btn-xl text-uppercase" href="../ejercicios/mostrarProductos.php">CONOCE NUESTROS PRODUCTOS</a>
            </div>
</header>
   
        <!-- Navigation-->
        
        <!-- Masthead-->
      
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="proximosEventos">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Proximos Eventos</h2>
                    <h3 class="section-subheading text-muted">
                        Estos son algunos de los eventos que se aproximan en la zona.
                    </h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus-square"></i></div>
                                </div>
                                <img class="img-fluid" src="../assets/img/proximosEventos/1.jpeg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Talleres Municipales</div>
                                <div class="portfolio-caption-subheading text-muted">Segunda Edicion</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 2-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus-square"></i></i></div>
                                </div>
                                <img class="img-fluid" src="../assets/img/proximosEventos/2.jpeg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Feria Municipal</div>
                                <div class="portfolio-caption-subheading text-muted">Paseo de Diseño</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 3-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus-square"></i></i></div>
                                </div>
                                <img class="img-fluid" src="../assets/img/proximosEventos/3.jpeg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Neuquen Emprende</div>
                                <div class="portfolio-caption-subheading text-muted">Punto de recreatividad</div>
                            </div>
                        </div>
                    </div>
                    
        </section>
        <!-- About-->
        <section class="page-section" id="quienesSomos">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">¿Quienes Somos?</h2>
                    <h3 class="section-subheading text-muted">Somos Nora Lorenzo y José Luis Saddi, quienes desde hace 9 años nos dedicamos a ofrecerte nuestro asesoramiento sobre la energía de los cristales, ofreciéndotelos presentados de diferentes maneras para que lleguen a vos:</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="../assets/img/about/1.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            
                            <div class="timeline-body"><p class="text-muted">
                            Hablar de nosotros, siempre se nos hizo muy difícil, ambos somos profesionales de la educación que nos hemos jubilado recientemente, también hemos desarrollado otras actividades en el campo de la capacitación, comunicación, sanación, terapias holísticas, pero en este espacio solo haremos pie exclusivamente en nuestra conexión con los cristales y su vibración para que puedas descubrirlos y conectarte con su magia energética
                            </p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="../assets/img/about/2.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-body"><p class="text-muted">
                            Comenzamos hace nueve años primero al conocernos y contarnos sobre la pasión que a cada uno le generaba el uso de los cristales. Nuestras charlas se profundizaban en diferentes dimensiones de aplicación: energética, sanación, belleza, propiedades e incluso su uso doméstico e industrial.
                            </p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="../assets/img/about/3.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-body"><p class="text-muted">
                            Si bien nos agradan todos aquellos que nos ofrece la naturaleza inicialmente nos centramos en la búsqueda de la obsidiana, luego de un año de transitar diferentes caminos dimos con ella y nos atrapó:
                            </p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="../assets/img/about/4.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-body"><p class="text-muted">
                            Establecimos una conexión particular con su belleza, simpleza, misterio, historia y poderosa energía, ella nos guio en el camino, nos brindó su abundancia y conocimiento a través de sus usos milenarios, ancestrales, medicinales y terapéuticos usados por los diferentes pueblos originarios de Latinoamérica que nos hizo conocer e internalizar para poder hablar con propiedad de ella
                            </p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Somos parte
                                <br />
                                del mundo
                                <br />
                                y sus energias!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
      
      
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contactenos</h2>
                    <h3 class="section-subheading text-muted">Esperamos poder ayudarlos!</h3>
                </div>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" id="name" type="text" placeholder="Su Nombre *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">Su nombre es requerido.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" id="email" type="email" placeholder="Su email *" data-sb-validations="required,email" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">Su casilla de correo.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">El formato de su casilla no es valido.</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control" id="phone" type="tel" placeholder="Su telefono celular *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">Su telefono de contacto.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control" id="message" placeholder="El motivo de consulta *" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">El motivo de su consulta es requerido!.</div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Tu mensaje ha sido enviado correctamente</div>
                            Esto es solo a modo desmostrativo hasta que el sitio entre en produccion
                            <br />
                          <!--   <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>-->
                        </div>
                    </div>
                    
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                  
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Enviar Mensaje</button></div>
                </form>
            </div>
        </section>
         <!-- Portfolio item 3 modal popup-->
         <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="../assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Feria Neuquen Emprende</h2>
                                    <p class="item-intro text-muted">Veni y disfruta de la feria en Neuquen</p>
                                    <img class="img-fluid d-block mx-auto" src="../assets/img/proximosEventos/3.jpeg" alt="..." />
                                    <p>
                                    "Neuquén Emprende” se trata de una iniciativa impulsada por la Legislatura de Neuquén en conjunto con los municipios de Neuquén capital, Zapala y San Martín de los Andes, cuenta con el apoyo del BPN, y tiene como objetivo seguir impulsando el desarrollo de los emprendedores de la provincia. Estas capacitaciones se suman a los diversos espacios de comercialización de productos, actividades y encuentros que se vienen llevando adelante, lo que permite acercar nuevas instancias de formación gratuitas y acompañamiento de calidad. 
                                    </p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Desarrolla:</strong>
                                            Municipalidad de Neuquen
                                        </li>
                                        <li>
                                            <strong>Categoria:</strong>
                                            Emprendedurismo
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-times me-1"></i>
                                        Cerrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="../assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Talleres Culturales</h2>
                                    <p class="item-intro text-muted">Segunda Etapa</p>
                                    <img class="img-fluid d-block mx-auto" src="../assets/img/proximosEventos/1.jpeg" alt="..." />
                                    <p>Mediante los talleres culturales barriales la Municipalidad de Neuquén contribuye a  descentralizar la propuesta cultural de la ciudad, garantizar el desarrollo artístico, favorecer la equidad territorial y  la ampliación del acceso de bienes y servicios artísticos y culturales a la mayor cantidad de habitantes de la ciudad, respetando y haciendo valer el derecho que toda persona tiene de formar parte libremente de la vida cultural de su comunidad.
                                        Para más información: Teodoro Planas 155/  tel 4491216 – Mail: talleresculturales@muninqn.gov.ar</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Desarrolla:</strong>
                                            Municipalidad de Neuquen
                                        </li>
                                        <li>
                                            <strong>Categoria:</strong>
                                            Emprendedurismo
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-times me-1"></i>
                                        Cerrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 2 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="../assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Feria Municipal</h2>
                                    <p class="item-intro text-muted">Veni al paseo de diseño y difruta de un dia unico.</p>
                                    <img class="img-fluid d-block mx-auto" src="../assets/img/proximosEventos/2.jpeg" alt="..." />
                                    <p>
                                    Este sábado de 9 a 14hs podés visitar tu feria de proximidad respetando todos los protocolos sanitarios⁣
                                    • Parque Central⁣
                                    Sarmiento y Vecinalistas Neuquinos⁣⁣⁣
                                    ⁣
                                    •Villa Ceferino⁣⁣⁣
                                    Combate de San Lorenzo y Pedro Moreno⁣
                                    ⁣
                                    • Unión de Mayo⁣
                                    Dr. Ramón, Cancha de Boca⁣
                                    ⁣
                                    • Novella y Racedo⁣.
                                    𝐅𝐞𝐫𝐢𝐚 𝐝𝐞 𝐀𝐫𝐜𝐨𝐬 𝐑𝐨𝐦𝐚𝐧𝐨𝐬
                                    Sábado de 9 a 14hs
                                    Sarmiento y San Luis
                                    Recordá utilizar correctamente el barbijo y respetar la distancia social.
                                    ¡Vení a conocer los productos que elaboran nuestros emprendedores!
                                    3
                                    Actividades Relacionadas
                                    Municipalidad de Neuquén
                                    Avda. Argentina y Roca

                                    + 54 0299 449 1200

                                    ciudadano@muninqn.gov.ar
                                    </p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Desarrolla:</strong>
                                            Municipalidad de Neuquen
                                        </li>
                                        <li>
                                            <strong>Categoria:</strong>
                                            Cultura - Feria - Desarrollo 
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-times me-1"></i>
                                        Cerrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <!-- Footer-->
        <?php
    include_once '../estructura/footer.php'; 
?>
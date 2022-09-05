@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Bienvenido al Sistema Web para Gestión de Solicitudes</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>AGRADECIMIENTO</h4>
                    <p align = "justify">
En esta oportunidad quiero agradecer principalmente a mi familia, la cual estuvo presente en cada momento de mi vida, apoyándome en cada examen, en cada decisión, en cada instante. Sin ellos nada de esto hubiese sido posible. Quiero agradecer también a la Facultad Tecnológica por brindarme las herramientas necesarias para llevar a cabo este proyecto y permitirme formar parte de la familia UTN, al igual que al Profesor de la materia el Ing. Sergio Rodríguez, el cual me fue orientando día a día desde el inicio hasta la aprobación y conclusión del proyecto. Y su paciencia. Sin olvidarme también mis compañeros de facultad y docentes de la carrera quienes ante cualquier inconveniente estuvieron dispuestos a dar consultas extras o juntarse para reforzar conocimientos en las cuales pude adquirir conocimiento de los problemas de cada uno en tema estudio con tiempos de ocio y allí guiarme paso a paso de proyecto para que sea de mayor utilidad.
</p>

                  <h4>INTRODUCCIÓN</h4>
                  <p align = "justify">
El propósito de este proyecto es documentar las distintas actividades, herramientas, metodología,  modelado, diagramas y prototipos que permitieron llevar a cabo el desarrollo de un sistema web, destinado a la gestión de requerimiento y equipo laboral de las distintas áreas de la Dirección de Estadísticas de la Provincia. El producto final de este proyecto, permitirá tanto al responsable como al equipo que debe coordinar realizar un trabajo más eficiente, mejorar su comunicación y controlar mejor las diferentes tareas que deben realizar.
Si bien este proyecto tomo más impulso debido a la pandemia, la necesidad de una herramienta de apoyo para la gestión de requerimientos, era ya bastante evidente… en un mundo con tanto avance tecnológico, el trabajo online, almacenamiento en la nube y conexión remota, ¿cómo vamos a seguir usando papel?.
</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

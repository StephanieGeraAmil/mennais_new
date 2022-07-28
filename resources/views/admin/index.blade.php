@extends('layouts.admintemplate')
@section('title')
Admin Panel
@endsection
@section('custom_style')
<style>
.dt-button {
    background-color: #9ca3af; 
    border: 2px solid white;
    color: #fff;
    padding: 10px;
    border-radius: 10px  
  }
  .dt-button:hover {
    background-color: #68696a; 
  }
  .dt-buttons {
    width: 25%;
    display: inline-block;
  }
  .dataTables_filter,.dt-buttons{
      margin:10px
  }
  </style>
@endsection
@section('container_body')
<!--Container-->
<div class="container w-full mx-auto pt-20">    
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">        
        <!--Console Content-->        
        <div class="flex flex-wrap">
            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <!--Metric Card-->
                <div class="bg-white border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded p-3 bg-gray-400"><i class="fas fa-user fa-2x fa-fw fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-400">Inscriptos</h5>
                            <h3 class="font-bold text-3xl text-gray-600">{{$registered_users_quantity}}</h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <!--Metric Card-->
                <div class="bg-white border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded p-3 bg-gray-400"><i class="fas fa-user-friends fa-2x fa-fw fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-400">Directivo / Docente</h5>
                            {{-- <h3 class="font-bold text-3xl text-gray-600">{{$functions[0]}} / {{$functions[1]}}</h3> --}}
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>                
            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <!--Metric Card-->
                <div class="bg-white border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded p-3 bg-gray-400"><i class="fas fa-tasks fa-2x fa-fw fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-400">Acreditaciones</h5>
                            <h3 class="font-bold text-3xl text-gray-600">{{$accreditations}}</h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>                
        </div>
        
        <!--Divider-->
        <hr class="border-b-2 border-gray-600 my-8 mx-4">
        
        <div class="flex flex-row flex-wrap flex-grow mt-2">
            
            <div class="w-full p-3">
                <!--Table Card-->                
                <div class="bg-white border rounded shadow">
                    <div class="border-b p-3">
                        <h5 class="font-bold uppercase text-gray-600">Inscripciones</h5>
                    </div>                    
                    <div class="w-full overflow-hidden shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="min-w-full leading-normal" id="inscriptionList">
                                <thead>
                                    <tr>                                        
                                        <th class="px-5 py-3 border-b-2 bg-gray-400 text-left text-xs font-semibold text-white uppercase tracking-wider">Nombre</th>
                                        <th class="px-5 py-3 border-b-2 bg-gray-400 text-left text-xs font-semibold text-white uppercase tracking-wider">E-mail</th>
                                        <th class="px-5 py-3 border-b-2 bg-gray-400 text-left text-xs font-semibold text-white uppercase tracking-wider">Documento</th>
                                        <th class="px-5 py-3 border-b-2 bg-gray-400 text-left text-xs font-semibold text-white uppercase tracking-wider">Institución</th>
                                        <th class="px-5 py-3 border-b-2 bg-gray-400 text-left text-xs font-semibold text-white uppercase tracking-wider">Workshop 1</th>
                                        <th class="px-5 py-3 border-b-2 bg-gray-400 text-left text-xs font-semibold text-white uppercase tracking-wider">Workshop 2</th>
                                        <th class="px-5 py-3 border-b-2 bg-gray-400 text-left text-xs font-semibold text-white uppercase tracking-wider">Pag.</th>
                                        <th class="px-5 py-3 border-b-2 bg-gray-400 text-left text-xs font-semibold text-white uppercase tracking-wider">Acred.</th>
                                        <th class="px-5 py-3 border-b-2 bg-gray-400 text-left text-xs font-semibold text-white uppercase tracking-wider">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @forelse ($registered_users as $registered_user)   
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">{{$registered_user->userData->name}} {{$registered_user->userData->lastname}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$registered_user->userData->email}}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$registered_user->userData->document}}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$registered_user->institution->institution}}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$registered_user->firstWorkshopGroup->getString()}}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$registered_user->secondWorkshopGroup->getString()}}
                                            </p>
                                        </td>                                        
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            {!!($registered_user->payment_id == 0)?"<span
                                            class=\"relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight\">
                                            <span aria-hidden
                                            class=\"absolute inset-0 bg-orange-200 opacity-50 rounded-full\"></span>
                                            <span class=\"relative\">No Paid</span>
                                        </span>":"<a target=_Blank href='".$registered_user->payment->url_payment."'><span
                                            class=\"relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight\">
                                            <span aria-hidden
                                            class=\"absolute inset-0 bg-green-200 opacity-50 rounded-full\"></span>
                                            <span class=\"relative\">Paid</span></a>"!!}
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{$registered_user->attendances->count()}}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap"><a href="/admin/inscription/{{$registered_user->id}}">Ver</a></p>
                                        </td>
                                    </tr>                                    
                                    @empty
                                    <tr>
                                        <td colspan="3">
                                            No hay usuarios registrados.
                                        </td>
                                    </tr>
                                    @endforelse    
                                </tbody>
                            </table>                                                                    
                        </div>
                    </div>
                    
                </div>
                <!--/table Card-->
            </div>
            
            
        </div>
        
        <!--/ Console Content-->
        
    </div>
    
    
</div> 
<!--/container-->
<script type="text/javascript">
    var inscTable;
    $(function () {
        
        
        inscTable =  $('#inscriptionList').DataTable( {
            "language": {
                "lengthMenu": "_MENU_ registros por página.",
                "zeroRecords": "UPS!!! no hay registros",
                "info": "Mostrando pág. _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrando de un total de _MAX_ records)",
                "search": "Buscar",
                "paginate": {
                    "first":      "Primer",
                    "last":       "Último",
                    "next":       "Siguiente",
                    "previous":   "Previo"
                },
            },
            dom: 'Bfrtip',
            buttons: [
            'csv', 'excel', 'pdf'
            ],
            
        } );
        
        if(window.screen.width < 768){
            $("#accordionSidebar").addClass("toggled")
            inscTable.column(0).visible(false);
            inscTable.column(3).visible(false);
            inscTable.column(4).visible(false);
            inscTable.column(5).visible(false);
            inscTable.column(6).visible(false);
        }
        
        $('a.toggle-vis').on( 'click', function (e) {
            e.preventDefault();
            
            // Get the column API object
            var column = inscTable.column( $(this).attr('data-column') );
            
            // Toggle the visibility
            column.visible( ! column.visible() );
        } );
        inscTable.buttons().each(function(value, index){
            $(value).addClass('myclass');
        });
    } );
</script>
@endsection
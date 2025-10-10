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
                                        <th class="px-5 py-3 border-b-2 bg-gray-400 text-left text-xs font-semibold text-white uppercase tracking-wider">Teléfono</th>
                                        <th class="px-5 py-3 border-b-2 bg-gray-400 text-left text-xs font-semibold text-white uppercase tracking-wider">Institución</th>
                                        <th class="px-5 py-3 border-b-2 bg-gray-400 text-left text-xs font-semibold text-white uppercase tracking-wider">Inv Completas Tot/Disp</th>
                                        <th class="px-5 py-3 border-b-2 bg-gray-400 text-left text-xs font-semibold text-white uppercase tracking-wider">Inv Virtuales Tot/Disp</th>
                                        <th class="px-5 py-3 border-b-2 bg-gray-400 text-left text-xs font-semibold text-white uppercase tracking-wider">Codigo Inv.Completas</th>
                                        <th class="px-5 py-3 border-b-2 bg-gray-400 text-left text-xs font-semibold text-white uppercase tracking-wider">Codigo Inv.Virtuales</th>               
                                        <th class="px-5 py-3 border-b-2 bg-gray-400 text-left text-xs font-semibold text-white uppercase tracking-wider">Pago.</th>
                                        {{-- <th class="px-5 py-3 border-b-2 bg-gray-400 text-left text-xs font-semibold text-white uppercase tracking-wider">Accred.</th>
                                        <th class="px-5 py-3 border-b-2 bg-gray-400 text-left text-xs font-semibold text-white uppercase tracking-wider">Acción</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @forelse ($group_inscriptions as $gr_inscription)   
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">{{$gr_inscription->name}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{$gr_inscription->email}}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{$gr_inscription->phone}}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{$gr_inscription->institution_name}}</p>
                                        </td>
                                        {{-- <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{$gr_inscription->quantity_hybrid }}/{{$gr_inscription->usedCodes()}}</p>
                                        </td> --}}
                                         <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{$gr_inscription->quantity_hybrid }}/{{$gr_inscription->quantity_hybrid_avaiable}}</p>
                                        </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{$gr_inscription->quantity_remote }}/{{$gr_inscription->quantity_remote_avaiable}}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <a target="_blank" href="{{$gr_inscription->getUrl()}}">{{$gr_inscription->code_hybrid}}</a>
                                        </td>
                                           <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <a target="_blank" href="{{$gr_inscription->getUrl()}}">{{$gr_inscription->code_remote}}</a>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            {!!($gr_inscription->payment_id == 0)?"<span
                                            class=\"relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight\">
                                            <span aria-hidden
                                            class=\"absolute inset-0 bg-orange-200 opacity-50 rounded-full\"></span>
                                            <span class=\"relative\">No Paid</span>
                                        </span>":"<a target=_Blank href='".$gr_inscription->payment->url_payment."'><span
                                            class=\"relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight\">
                                            <span aria-hidden
                                            class=\"absolute inset-0 bg-green-200 opacity-50 rounded-full\"></span>
                                            <span class=\"relative\">Paid</span></a>"!!}
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

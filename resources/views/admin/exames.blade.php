@extends('layout.template')

@section('title', 'Exames')


@section('content')

<div class="section__content section__content--p30">
    <div class="container-fluid">

        @if($errors->any())
              
                         @foreach($errors->all() as $erro)
                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                <span class="badge badge-pill badge-danger">Erro</span>
                                {{$erro}} 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach            
                    

                 @endif  

                 @if(isset($sms))

                 <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                     <span class="badge badge-pill badge-success">Success</span>
                     {{$sms}}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
 
                 @endif


        <div class="row mb-3">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h2 class="title-1">Exames</h2>
                    <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#registarusuarioModal" >
                        <i class="zmdi zmdi-plus"></i>Registar</button>
                </div>
            </div>
        </div>
        <div class="myresponsivetable table-responsive table-responsive-data3 ">
        <table class="table" id="datatable">
            <thead class="table-dark">
           
                <tr>
                        <th>Id</th>
                        <th>Descrição</th>
                        <th>Acções</th>
                    </tr>
                
            </thead>
            <tbody>
                

               
          

                  @php 
                  //  formatando o valor que vem da BD no formato de dinheiro
                 
    
                    @endphp
                <tr>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td> 
                        <button class="mb-2 btn btn-md btn-outline-primary editar" id="">
                            <a class="bnEditar" href="{{url("")}}">Alterar</a>
                        </button>

                        <button class="btn btn-md btn btn-danger eliminar" id=""  data-toggle="modal"   data-target="#smallmodal">
                            <ion-icon name="trash-outline"></ion-icon> Eliminar
                         </button>
                    </td>
                   

                </tr>
               
            </tbody>
          </table>
        </div>
    </div>
</div>




<!-- modal registar Exames -->
<div class="modal fade" id="registarusuarioModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Registar Exames</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{url('')}}" method="Post" novalidate="novalidate">
                                    @csrf

                                    <div class="row">
                                        
                                        <div class="col-12">
                                            <label for="nome" class="control-label mb-1">Descrição</label>
                                            <div class="input-group">
                                                <input id="descricao" name="descricao" type="text" class="form-control"  required>
                                                <small class="vermelho"  id="erro-nome"></small>
                                            </div>
                                        </div>

                                
                                    </div>   
                                    <div class="text-right mt-3">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" onclick="validar()" class="btn btn-primary">Confirmar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- end modal medium -->







<!-- modal small -->
<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="smallmodalLabel">Atenção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-3">
                    Tem certeza que deseja eliminar este registo?
                </p>
                <form action="{{url("")}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" value="" name="cliente_id" id="cliente_id">
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                        <button type="submit" class="btn btn-primary">Sim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal small -->

<script>
    $(document).ready(function(){
        //mascaras com jmask
        $('#preco').mask('#.##0,00',{reverse: true});
    });

    
    $(document).on('click','.editar',function(){
        //$('#alterarServicoModal').modal('show');
    });   
    
    
    $(document).ready(function(){
        //codigo para inicializar a data table
     //  var table=$('#datatable').DataTable();
     
            
        });

        function retornaid(id){
            $('#cliente_id').val(id);
    }

    function validar(){
        
       // var nome= document.getElementById('nome2').value;
        var nome=document.getElementById('nome2').value
        
        if(nome==""){
            alert('tes');
            document.getElementById('erro-nome').innerHtml="ops, preencha o campo nome";
            return false;
        }

        
    }
</script>

@endsection
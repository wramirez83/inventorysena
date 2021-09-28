@extends('layout.ppal')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Nuevo Item</h1>
    </div>

    <div class="container-fluid">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <form action="{{Route('saveItem')}}" method="post">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @csrf
            <div>
                <label for="item" class="form-label">Nombre de Item</label>
                <input type="text" class="form-control" id="item" name="item" placeholder="">
            </div>
            <div>
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="">
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <label for="stock_min" class="form-label">Stock Minimo</label>
                    <input type="number" class="form-control" id="stock_min" name="stock_min" placeholder="">
                </div>
                <div class="col-md-4 col-sm-12">
                    <label for="stock_max" class="form-label">Stock Maximo</label>
                    <input type="number" class="form-control" id="stock_max" name="stock_max" placeholder="">
                </div>
                <div class="col-md-4 col-sm-12">
                    <label for="reference" class="form-label">Referencia</label>
                    <input type="text" class="form-control" id="reference" name="reference" placeholder="">
                </div>

            </div>
           
            <div class="mt-3 text-center">
                <button type="submit" class=" col-12 btn btn-primary block">Guardar</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table ">
                <thead>
                    <th>Id</th>
                    <th>Item</th>
                    <th>Descripción</th>
                    <th>Referencia</th>
                    <th>Stock Min</th>
                    <th>Stock Max</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->item}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->reference}}</td>
                            <td>{{$item->stock_min}}</td>
                            <td>{{$item->stock_max}}</td>
                            <td>
                                <button class="btn btn-danger" onclick="del({{$item->id}})">
                                    <i class="fa fa-trash" style="font-size:18px;"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function del(id){
            if(confirm('Are you sure you want to delete this')){
                alert(`Borrando ${id}`);
            }

        }
    </script>

@endsection

<template>
    <div class="panel panel-inverse mb-3" id="filtro" style=" display: none;">
        <div class="row">
            <div class="form-group col-sm-2">
                <label>Data Início:</label>
                <input type="date" class="form-control" name="data_inicio" id="data_inicio" />
            </div>

            <div class="form-group col-sm-2">
                <label>Data Fim:</label>
                <input type="date" class="form-control" name="data_fim" id="data_fim" />
            </div>
            <div class="form-group col-sm-4">
                <label>Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" />
            </div>
            <div class="form-group col-sm-4">
                <label>Tensão:</label>
                <input type="text" class="form-control" name="tensao" id="tensao" />
            </div>
            <div class="form-group col-sm-4">
                <label>Descrição:</label>
                <input type="text" class="form-control" name="descricao" id="descricao" />
            </div>
            <div class="form-group col-sm-4">
                <label>Marca:</label>
                <input type="text" class="form-control" name="marca" id="marca" />
            </div>
        </div>
    </div>
</template>
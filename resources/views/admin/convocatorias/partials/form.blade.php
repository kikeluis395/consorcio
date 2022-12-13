<div class="form-group">
    <div class="row">
        @if (Request::is('admin/convocatorias/create'))
        <div class="col-sm-4 mb-2">
            {!! Form::label('region_id', 'Region') !!}
            {!! Form::select('region_id', $regiones , null,  ['class' => ' form-control' . ($errors->has('region') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona una región']) !!}
            @error('region_id')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-sm-4 mb-2">
            {!! Form::label('titulo', 'Título') !!}
            {!! Form::text('titulo', null, ['class' => ' form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo de convocatoria']) !!}
            @error('titulo')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-4 mb-2">
            {!! Form::label('cantidad', 'Vacantes') !!}
            {!! Form::number('cantidad', null, ['class' => ' form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'cantidad de vacantes']) !!}
            @error('cantidad')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-4 mb-2">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class' => ' form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) !!}
            @error('email')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-4 mb-2">
            {!! Form::label('estado', 'Estado') !!}
            {!! Form::select('estado', ['Abierto' => 'Abierto', 'En proceso' => 'En proceso', 'Cerrado' => 'Cerrado'], null,  ['class' => ' form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un estado']) !!}
            @error('estado')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        @if (Request::is('admin/convocatorias/*/edit'))

            @if($convocatoria->estado == "Abierto")
            <div class="col-sm-4 mb-2">
                {!! Form::label('adjudicado', 'Adjudicado') !!}
                {!! Form::select('adjudicado', $empresas, null,  ['class' => ' form-control' . ($errors->has('adjudicado') ? ' is-invalid' : '') ,'placeholder' => 'Selecciona un adjudicado']) !!}
                @error('adjudicado')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            @else
            <div class="col-sm-4 mb-2">
                {!! Form::label('adjudicado', 'Adjudicado') !!}
                {!! Form::text('adjudicado', null, ['class' => ' form-control' . ($errors->has('adjudicado') ? ' is-invalid' : ''), 'placeholder' => 'Adjudicado']) !!}
            </div>
            @endif
        @endif
        <div class="col-sm-4 mb-2">
            {!! Form::label('fecha_inicio', 'Fecha de confirmación de participación') !!}
            {!! Form::date('fecha_inicio', null, ['class' => ' form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de inicio']) !!}
            @error('fecha_inicio')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-4 mb-2">
            {!! Form::label('fecha_bases', 'Envío de Bases y anexos a los preseleccionados:') !!}
            {!! Form::date('fecha_bases', null, ['class' => ' form-control' . ($errors->has('fecha_bases') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de bases']) !!}
            @error('fecha_bases')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-4 mb-2">
            {!! Form::label('fecha_consulta', 'Respuesta a consultas:') !!}
            {!! Form::date('fecha_consulta', null, ['class' => ' form-control' . ($errors->has('fecha_consulta') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de consulta']) !!}
            @error('fecha_consulta')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-4 mb-2">
            {!! Form::label('fecha_propuestas', 'Fecha de entrega de propuestas y de requisitos de preselección:') !!}
            {!! Form::date('fecha_propuestas', null, ['class' => ' form-control' . ($errors->has('fecha_propuestas') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de propuestas']) !!}
            @error('fecha_propuestas')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-4 mb-2">
            {!! Form::label('fecha_fin', 'Fin del proceso de licitación:') !!}
            {!! Form::date('fecha_fin', null, ['class' => ' form-control' . ($errors->has('fecha_fin') ? ' is-invalid' : ''), 'placeholder' => 'Fecha fin']) !!}
            @error('fecha_fin')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-4 mb-2">
            {!! Form::label('tdr_url', 'TDR') !!}
            {!! Form::text('tdr_url', null, ['class' => ' form-control' . ($errors->has('tdr_url') ? ' is-invalid' : ''), 'placeholder' => 'tdr_url']) !!}
            @error('tdr_url')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-4 mb-2">
            {!! Form::label('proceso_url', 'Evaluación') !!}
            {!! Form::text('proceso_url', null, ['class' => ' form-control' . ($errors->has('proceso_url') ? ' is-invalid' : ''), 'placeholder' => 'proceso_url']) !!}
            @error('proceso_url')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-4 mb-2">
            {!! Form::label('resultado_url', 'Resultados') !!}
            {!! Form::text('resultado_url', null, ['class' => ' form-control' . ($errors->has('resultado_url') ? ' is-invalid' : ''), 'placeholder' => 'resultado_url']) !!}
            @error('resultado_url')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-12">
            {!! Form::label('alcance', 'Alcance') !!}
            {!! Form::textarea('alcance', null, ['class' => 'ckeditor form-control' . ($errors->has('alcance') ? ' is-invalid' : ''), 'placeholder' => 'Alcance',  'rows'  => 3,]) !!}
            @error('alcance')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

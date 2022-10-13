<body style="font-family: 'Jost', sans-serif;">
<div>
        <div class="card card-info card-borderless">
            <div class="card-header">
                <h3 class="card-title"><i class="fa-solid fa-scissors"></i>
                    <i class="fa-solid fa-rug"></i> Calculadora de costos de vinilo
                </h3>
                <div class="ribbon-wrapper ribbon-lg">
                    <div class="ribbon bg-info text-lg">
                        Cavila
                    </div>
                </div>

                <!-- <h3 style="text-align: right;">Cavila</h3> -->
            </div>
            <form class="form-horizontal box">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="Alto" class="col-sm-2 col-form-label">Tipo de vinilo</label>
                        <div class="col-sm-10">
                            <select name="tipo" id="tipovinilo" class="custom-select form-control-border">
                                <option value="textil">Textil comun</option>
                                <option value="autoadhesivo">Autoadhesivo</option>
                                <option value="especial">Oro - Plata - Holo</option>
                                <option value="fluo">Fluo - Metalizado</option>
                                <option value="reflec">Reflex</option>
                                <option value="holografico">Holográfico</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Alto" class="col-sm-2 col-form-label">Alto</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alto" placeholder="Alto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ancho" class="col-sm-2 col-form-label">Ancho</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ancho" placeholder="Ancho">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <input type="button" class="btn btn-info" onclick="calcular()" value="Calcular" i="">
                </div>
            </form>
        </div>
        <div class="card card-info card-borderless" id="resultado" style="display:none;">
            <div class="card-body">
                <div class="mb-4">
                    <h1 class="text-info text-center" id="resultado1"></h1>
                </div>
                <div class="d-flex justify-content-between mt-6">
                    <p class="text-info text-center mb-4" id="resultado2"></p>
                    <p class="text-info text-right">Precio actualizado el 19/09/2022</p>
                </div </div>
            </div>
        </div>
        <!-- REQUIRED SCRIPTS -->
        <script src="../js/calcular.js"></script>
        <script src="../js/sweetalert2.all.min.js"></script>

</body>


















</html>
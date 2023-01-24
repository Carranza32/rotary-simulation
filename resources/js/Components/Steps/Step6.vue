<template>
    <div>
        <h4>PROYECTO HUMANITARIO</h4>

        <p class="fw-bold">¿Dónde se llevará a cabo el proyecto?</p>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label">Ciudad o localidad</label>
                    <input type="text" name="project_name" class="form-control" id="name">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label">Estado, provincia o departamento (optativo)</label>
                    <input type="text" name="project_name" class="form-control" id="name">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">País</label>
            <select class="form-select" aria-label="Default select example">
                <option value="1">España</option>
                <option value="1">España</option>
                <option value="1">España</option>
                <option value="1">España</option>
            </select>
        </div>

        <p class="fw-bold">Cúando se llevará a cabo el proyecto?</p>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label">Fecha de inicio</label>
                    <input type="date" placeholder="dd/mm/yyyy" name="project_name" class="form-control" id="name">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label">Fecha de conclusión</label>
                    <input type="date" placeholder="dd/mm/yyyy" name="project_name" class="form-control" id="name">
                </div>
            </div>
        </div>
    </div>
</template>

new Vue({
    el: '#app',
    data: {
        editarIdSubcategoria : null,
        editSubcategoria : null,
    },
    methods: {
        editarSubcategoria: function (idSubcategoria, idCategoria, subcategoria) {

            //var ruta = "http://localhost:8000";
            var ruta = "http://jordysantamaria.com";

            this.editarIdSubcategoria = idSubcategoria;
            $(".categoria option[value='"+idCategoria+"']").attr("selected", true);
            this.editSubcategoria = subcategoria;

            $('.img_previa_editar').attr('src', ruta + '/img/subcategorias/' + idSubcategoria + '.jpg');

        },
        cambiarImagen: function (event) {
            var input = event.target;

            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {

                    $('.img_previa').attr('src', e.target.result);

                }

                reader.readAsDataURL(input.files[0]);

            }
        },
        imagenPostEditar: function (event) {
            var input = event.target;

            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {

                    $('.img_previa_editar').attr('src', e.target.result);

                }

                reader.readAsDataURL(input.files[0]);

            }
        }
    }
});
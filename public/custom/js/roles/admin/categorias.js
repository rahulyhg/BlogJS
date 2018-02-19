new Vue({
    el: '#app',
    data: {
        editarIdCategoria: null,
        editCategoria: null,
    },
    methods: {
        editarCategoria: function (id, categoria) {

            //var ruta = "http://localhost:8000";
            var ruta = "http://jordysantamaria.com";

            this.editarIdCategoria = id;
            this.editCategoria = categoria;
            $('.img_previa_editar').attr('src', ruta + '/img/categorias/' + id + '.jpg');

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
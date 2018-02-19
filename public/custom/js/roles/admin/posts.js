new Vue({
    el: '#app',
    data: {
        editarIdPost : '',
        editarTitulo : '',
        editarDescripcionFoto : '',
        editarBreveDescripcion : '',
        editarEtiquetas : ''
    },
    methods: {
        editarPost: function (id_post, id_subcategoria, titulo, descripcion_foto, breve_desc, descripcion, etiquetas) {

            this.editarIdPost = id_post;
            $(".subcategoria_e option[value='"+id_subcategoria+"']").attr("selected", true);
            this.editarTitulo = titulo;
            this.editarDescripcionFoto = descripcion_foto;
            this.editarBreveDescripcion = breve_desc;
            CKEDITOR.instances['editor2'].setData(descripcion);
            this.editarEtiquetas = JSON.parse(etiquetas);
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
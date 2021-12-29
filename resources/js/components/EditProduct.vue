<template>
    <div>
        <h3 class="text-center">Editar Product</h3>
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <form @submit.prevent="updateProduct">
                    <div class="form-group">
                        <label class="mb-2">Nome</label>
                        <input type="text" class="form-control mb-2" v-model="product.name">
                    </div>
                    <div class="form-group">
                        <label class="mb-2">Detalhes</label>
                        <input type="text" class="form-control mb-2" v-model="product.detail">
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-2">Preço</label>
                        <input type="number" step="0.01" class="form-control mb-2" v-model="product.price">
                    </div>
                    <button type="submit" class="btn btn-primary border-0 rounded-0">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                product: {}
            }
        },
        created() {
            this.axios.get(`http://localhost:8000/api/products/${this.$route.params.id}`).then((res) => {
                this.product = res.data;
            });
        },
        methods: {
            updateProduct() {
                this.axios.patch(`http://localhost:8000/api/products/${this.$route.params.id}`, this.product).then((
                    res) => {
                        this.$router.push({
                            name: 'home'
                        });
                    });
            }
        }
    }

</script>

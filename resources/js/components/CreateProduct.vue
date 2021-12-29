<template>
    <div>
        <h3 class="text-center">Registrar Novo Produto</h3>
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <form @submit.prevent="addProduct">
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
                    <button type="submit" class="btn btn-primary rounded-0">Salvar</button>
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
        methods: {
            addProduct() {
                this.axios.post('http://localhost:8000/api/products', this.product).then(response => (this.$router
                .push({
                        name: 'home'
                    })))
                    .catch(err => console.log(err))
                    .finally(() => this.loadin = false)
            }
        }
    }

</script>

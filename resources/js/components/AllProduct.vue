<template>
    <div v-if="products.length > 0">
        <h2 class="text-center">Lista de Produtos</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Detalhes</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products">
                    <td>{{product.id}}</td>
                    <td>{{product.name}}</td>
                    <td>{{product.detail}}</td>
                    <td>{{product.price}}</td>
                    <td>
                        <div role="group">
                            <router-link :to="{name: 'edit', params: {id: product.id}}" class="btn btn-success border-0 rounded-0">Editar
                            </router-link>
                            <button class="btn btn-danger ms-2 border-0 rounded-0" @click="deleteProduct(product.id)">Excluir</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div v-else>
        <h2 class="text-center">Nenhum produto encontrado!</h2>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                products: []
            }
        },
        created() {
            this.axios.get('http://localhost:8000/api/products/').then(response => {
                this.products = response.data;
            });
        },
        methods: {
            deleteProduct(id) {
                this.axios.delete(`http://localhost:8000/api/products/${id}`).then(response => {
                    let i = this.products.map(data => data.id).indexOf(id);
                    this.products.splice(i, 1)
                });
            }
        }
    }

</script>

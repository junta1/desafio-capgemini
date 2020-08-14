<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Tela para efetuar um saque</div>

                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="value">Valor do Saque</label>
                                <input type="number" v-model="value" class="form-control" id="value"
                                       aria-describedby="withdrawHelp" placeholder="Enter email">
                                <small id="withdrawHelp" class="form-text text-muted">Efetue um saque.</small>
                            </div>
                            <button type="submit" @click.prevent="withdrawSave" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Todas as contas</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Agencia</th>
                                <th scope="col">Conta</th>
                                <th scope="col">Saldo</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            value: ''
        }
    },
    methods: {
        withdrawSave() {
            axios.post('saque', {
                value: this.value
            })
                .then(response => console.log(response));
        }
    }
}
</script>

<style scoped>

</style>

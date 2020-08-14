<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Saque</div>

                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="value">Valor do Saque</label>
                                <input type="number" v-model="value" class="form-control" id="value"
                                       aria-describedby="withdrawHelp" placeholder="Enter email">
                            </div>
                            <button type="submit" @click.prevent="withdrawSave" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Depósito</div>

                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="valueDeposito">Valor do Depósito</label>
                                <input type="number" v-model="valueDeposit" class="form-control" id="valueDeposito"
                                       aria-describedby="withdrawHelp" placeholder="Enter email">
                            </div>
                            <button type="submit" @click.prevent="depositSave" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
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
                                <th scope="col">Cliente</th>
                                <th scope="col">Banco</th>
                                <th scope="col">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(account,index) in accounts.data" :key="account.idAccount">
                                <th scope="row">{{ index + 1 }}</th>
                                <td>{{ account.agency }}</td>
                                <td>{{ account.account }}</td>
                                <td>{{ account.balance }}</td>
                                <td>{{ account.client }}</td>
                                <td>{{ account.bank }}</td>
                                <td>
                                    <button type="button" @click.prevent="accountView" class="btn btn-primary">
                                        Ver
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <pagination :data="accounts" @pagination-change-page="getResults"></pagination>
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
            accounts: {},
            value: '',
            valueDeposit: '',
        }
    },
    mounted() {
        this.getResults();
    },
    methods: {
        withdrawSave() {
            axios.post('saque', {
                value: this.value
            })
                .then(response => {
                    this.value = '';
                    this.getResults();
                });
        },
        getResults(page = 1) {
            axios.get('account?page=' + page)
                .then(response => {
                    console.log(response);
                    this.accounts = response;
                });
        },
        depositSave() {
            axios.post('deposito', {
                value: this.valueDeposit
            })
                .then(response => {
                    this.valueDeposit = '';
                    this.getResults();
                });
        },

    }
}
</script>

<style scoped>

</style>

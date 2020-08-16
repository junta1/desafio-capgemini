<template>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
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
                                    <button type="button" @click.prevent="accountFind(account.idAccount)"
                                            class="btn btn-primary" data-toggle="modal" data-target="#modalAccount">
                                        Ver
                                    </button>

                                    <button type="button" @click.prevent="accountFind(account.idAccount)"
                                            class="btn btn-primary" data-toggle="modal" data-target="#modalWithdraw">
                                        Sacar
                                    </button>

                                    <button type="button" @click.prevent="accountFind(account.idAccount)"
                                            class="btn btn-primary" data-toggle="modal" data-target="#modalDeposit">
                                        Depositar
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

        <!-- Modal Account-->
        <div class="modal fade" id="modalAccount" tabindex="-1" role="dialog" aria-labelledby="modalAccountLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAccountLabel">Conta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Agencia</th>
                                <th scope="col">Conta</th>
                                <th scope="col">Saldo</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Banco</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ account.idAccount }}</td>
                                <td>{{ account.agency }}</td>
                                <td>{{ account.account }}</td>
                                <td>{{ account.balance }}</td>
                                <td>{{ account.client }}</td>
                                <td>{{ account.bank }}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Withdraw -->
        <div class="modal fade" ref="myModalRef" id="modalWithdraw" tabindex="-1" role="dialog"
             aria-labelledby="modalWithdrawLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalWithdrawLabel">Saque</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="value">Valor do Saque</label>
                                    <input type="number" v-model="valueWithdraw" class="form-control" id="value"
                                           aria-describedby="withdrawHelp" placeholder="Digite o valor para sacar!">

                                    <input TYPE="hidden" v-model="codAccount" class="form-control">
                                </div>
                                <button type="submit" @click.prevent="withdrawSave" class="btn btn-primary">Enviar
                                </button>
                            </form>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Saldo</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ account.balance }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Deposit -->
        <div class="modal fade" id="modalDeposit" tabindex="-1" role="dialog" aria-labelledby="modalDepositLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDepositLabel">Saque</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="valueDeposito">Valor do Depósito</label>
                                    <input type="number" v-model="valueDeposit" class="form-control" id="valueDeposito"
                                           aria-describedby="withdrawHelp" placeholder="Digite o valor para depositar!">

                                    <input TYPE="hidden" v-model="codAccount" class="form-control">
                                </div>
                                <button type="submit" @click.prevent="depositSave" class="btn btn-primary">Enviar
                                </button>
                            </form>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Saldo</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ account.balance }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            account: {},
            valueWithdraw: '',
            valueDeposit: '',
            codAccount: '',
        }
    },
    mounted() {
        this.getResults();
    },
    methods: {
        withdrawSave() {
            axios.post('withdraw', {
                value: this.valueWithdraw,
                codAccount: this.codAccount
            })
                .then(response => {
                    this.valueWithdraw = '';
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
            axios.post('deposit', {
                value: this.valueDeposit,
                codAccount: this.codAccount
            })
                .then(response => {
                    this.valueDeposit = '';
                    this.getResults();
                });
        },
        accountFind(id) {
            axios.get('account/' + id)
                .then(response => {
                    console.log(response.data);
                    this.account = response.data;
                    this.codAccount = response.data.idAccount;
                });
        },
    }
}
</script>

<style scoped>

</style>

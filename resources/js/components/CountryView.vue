<template>
    <div>
        <Navbar></Navbar>
        <div class="container">
            <b-card :header="result_data.name" class="customize text-center">
                <div>
                    <div>
                        <b-card-group deck>
                            <b-card bg-variant="primary" text-variant="white" header="Cases" class="text-center">
                                <b-card-text> {{new Intl.NumberFormat().format(result_data.cases)}}</b-card-text>
                            </b-card>

                            <b-card bg-variant="secondary" text-variant="white" header="Today Cases" class="text-center">
                                <b-card-text>{{new Intl.NumberFormat().format(result_data.todayCases)}}</b-card-text>
                            </b-card>

                            <b-card bg-variant="success" text-variant="white" header="Recovered" class="text-center">
                                <b-card-text>{{new Intl.NumberFormat().format(result_data.recovered)}}</b-card-text>
                            </b-card>
                        </b-card-group>
                    </div>
                    <div class="mt-3">
                        <b-card-group deck>
                            <b-card bg-variant="info" text-variant="white" header="Active" class="text-center">
                                <b-card-text>{{new Intl.NumberFormat().format(result_data.active)}}</b-card-text>
                            </b-card>

                            <b-card bg-variant="warning" text-variant="white" header="Today Deaths" class="text-center">
                                <b-card-text>{{new Intl.NumberFormat().format(result_data.todayDeaths)}}</b-card-text>
                            </b-card>

                            <b-card bg-variant="danger" text-variant="white" header="Deaths" class="text-center">
                                <b-card-text>{{new Intl.NumberFormat().format(result_data.deaths)}}</b-card-text>
                            </b-card>
                        </b-card-group>
                    </div>
                    <div class="mt-3">
                        <b-card-group deck>
                            <b-card bg-variant="light" header="Cases Per One Million" class="text-center">
                                <b-card-text>{{new Intl.NumberFormat().format(result_data.casesPerOneMillion)}}</b-card-text>
                            </b-card>

                            <b-card bg-variant="dark" header="Critical" text-variant="white" class="text-center">
                                <b-card-text>{{new Intl.NumberFormat().format(result_data.critical)}}</b-card-text>
                            </b-card>

                            <b-card header="Deaths Per One Million" class="text-center">
                                <b-card-text>{{new Intl.NumberFormat().format(result_data.deathsPerOneMillion)}}</b-card-text>
                            </b-card>
                        </b-card-group>
                    </div>

                    <div class="mt-3">
                        <b-card-group deck>
                            <b-card bg-variant="light" header="Total Tests" class="text-center">
                                <b-card-text>{{new Intl.NumberFormat().format(result_data.totalTests)}}</b-card-text>
                            </b-card>

                            <b-card header="Tests Per One Million" class="text-center">
                                <b-card-text>{{new Intl.NumberFormat().format(result_data.testsPerOneMillion)}}</b-card-text>
                            </b-card>
                        </b-card-group>
                    </div>
                </div>

            </b-card>

        </div>

    </div>
</template>

<script>
import Navbar from "./Navbar";

export default {
    name: 'CountryView',
    components: {
        Navbar
    },
    created() {
        this.fetchCountryData(this.$route.params.id);
    },
    data() {
        return {
            result_data: '',

        };
    },
    methods: {
        fetchCountryData(id) {
            axios.get(`/api/country/${id}`)
                .then(response => {
                    this.result_data = response.data;
                })
        },
    },
}
</script>

<style scoped>
.customize {
    color: #5c5c3d;
    font-weight: bold;
    display: block;
    font-size: 18px;
}
</style>

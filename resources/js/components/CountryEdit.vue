<template>
    <div>
        <Navbar></Navbar>
        <div class="container">
            <form @submit.prevent="EditCountriesData">
                <!-- Grid row -->
                <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-6">
                        <label for="country">Country</label>
                        <input  v-model="result_data.name" type="text" class="form-control" id="country" required>
                    </div>
                    <!-- Default input -->
                    <div class="form-group col-md-6">
                        <label for="cases">Cases</label>
                        <input v-model="result_data.cases" type="text" class="form-control" id="cases" required>
                    </div>
                </div>

                <!-- Grid row -->
                <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-6">
                        <label for="todayCases">Today Cases</label>
                        <input v-model="result_data.todayCases" type="text" class="form-control" id="todayCases" required>
                    </div>
                    <!-- Default input -->
                    <div class="form-group col-md-6">
                        <label for="deaths">Deaths</label>
                        <input v-model="result_data.deaths" type="text" class="form-control" id="deaths" required>
                    </div>
                </div>

                <!-- Grid row -->
                <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-6">
                        <label for="todayDeaths">Today Deaths</label>
                        <input v-model="result_data.todayDeaths" type="text" class="form-control" id="todayDeaths" required>
                    </div>
                    <!-- Default input -->
                    <div class="form-group col-md-6">
                        <label for="recovered">Recovered</label>
                        <input v-model="result_data.recovered" type="text" class="form-control" id="recovered" required>
                    </div>
                </div>

                <!-- Grid row -->
                <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-6">
                        <label for="active">Active</label>
                        <input v-model="result_data.active" type="text" class="form-control" id="active" required>
                    </div>
                    <!-- Default input -->
                    <div class="form-group col-md-6">
                        <label for="critical">Critical</label>
                        <input v-model="result_data.critical" type="text" class="form-control" id="critical" required>
                    </div>
                </div>

                <!-- Grid row -->
                <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-6">
                        <label for="casesPerOneMillion">Cases Per One Million</label>
                        <input v-model="result_data.casesPerOneMillion" type="text" class="form-control" id="casesPerOneMillion" required>
                    </div>
                    <!-- Default input -->
                    <div class="form-group col-md-6">
                        <label for="deathsPerOneMillion">Deaths Per One Million</label>
                        <input v-model="result_data.deathsPerOneMillion" type="text" class="form-control" id="deathsPerOneMillion" required>
                    </div>
                </div>

                <!-- Grid row -->
                <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-6">
                        <label for="totalTests">Total Tests</label>
                        <input v-model="result_data.totalTests" type="text" class="form-control" id="totalTests" required>
                    </div>
                    <!-- Default input -->
                    <div class="form-group col-md-6">
                        <label for="testsPerOneMillion">Tests Per One Million</label>
                        <input v-model="result_data.testsPerOneMillion" type="text" class="form-control" id="testsPerOneMillion" required>
                    </div>
                </div>


                <!-- Grid row -->
                <button type="submit" class="btn btn-light btn-block">Save</button>
            </form>
        </div>

    </div>
</template>
<script>
import Navbar from "./Navbar";

export default {
    name: 'CountryEdit',
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
        EditCountriesData(){
            let id = this.$route.params.id
            axios.put(`/api/country/${id}`,{
                country:this.result_data.name,
                cases:this.result_data.cases,
                todayCases:this.result_data.todayCases,
                deaths: this.result_data.deaths,
                todayDeaths: this.result_data.todayDeaths,
                recovered: this.result_data.recovered,
                active:this.result_data.active,
                critical:this.result_data.critical,
                casesPerOneMillion:this.result_data.casesPerOneMillion,
                deathsPerOneMillion:this.result_data.deathsPerOneMillion,
                totalTests:this.result_data.totalTests,
                testsPerOneMillion:this.result_data.testsPerOneMillion
            })
                .then(response => {
                    alert('Country Data Updated');
                    this.$router.push('/');
                })

        }
    },
}
</script>

<style scoped>
label {
    color: #5c5c3d;
    font-weight: bold;
    display: block;
}
</style>

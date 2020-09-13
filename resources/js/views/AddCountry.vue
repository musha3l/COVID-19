<template>
    <div>
        <Navbar></Navbar>
        <div class="container">
            <h5>
                Choose Country
            </h5>
            <b-form-select @change="onChange($event)" v-model="selected" :options="countries"></b-form-select>
<!--            <div class="mt-3">Selected: <strong>{{ selected }}</strong></div>-->

            <div v-if="is_exist === true" class="container">
                <!-- Extended default form grid -->
                <form @submit.prevent="AddCountriesData">
                    <!-- Grid row -->
                    <div class="form-row">
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="country">Country</label>
                            <input disabled=true v-model="result_data.country" type="text" class="form-control" id="country">
                        </div>
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="cases">Cases</label>
                            <input disabled=true v-model="result_data.cases" type="text" class="form-control" id="cases" >
                        </div>
                    </div>

                    <!-- Grid row -->
                    <div class="form-row">
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="todayCases">Today Cases</label>
                            <input disabled=true v-model="result_data.todayCases" type="text" class="form-control" id="todayCases" >
                        </div>
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="deaths">Deaths</label>
                            <input disabled=true v-model="result_data.deaths" type="text" class="form-control" id="deaths">
                        </div>
                    </div>

                    <!-- Grid row -->
                    <div class="form-row">
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="todayDeaths">Today Deaths</label>
                            <input disabled=true v-model="result_data.todayDeaths" type="text" class="form-control" id="todayDeaths" >
                        </div>
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="recovered">Recovered</label>
                            <input disabled=true v-model="result_data.recovered" type="text" class="form-control" id="recovered">
                        </div>
                    </div>

                    <!-- Grid row -->
                    <div class="form-row">
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="active">Active</label>
                            <input disabled=true v-model="result_data.active" type="text" class="form-control" id="active" >
                        </div>
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="critical">Critical</label>
                            <input disabled=true v-model="result_data.critical" type="text" class="form-control" id="critical">
                        </div>
                    </div>

                    <!-- Grid row -->
                    <div class="form-row">
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="casesPerOneMillion">Cases Per One Million</label>
                            <input disabled=true v-model="result_data.casesPerOneMillion" type="text" class="form-control" id="casesPerOneMillion" >
                        </div>
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="deathsPerOneMillion">Deaths Per One Million</label>
                            <input disabled=true v-model="result_data.deathsPerOneMillion" type="text" class="form-control" id="deathsPerOneMillion">
                        </div>
                    </div>

                    <!-- Grid row -->
                    <div class="form-row">
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="totalTests">Total Tests</label>
                            <input disabled=true v-model="result_data.totalTests" type="text" class="form-control" id="totalTests" >
                        </div>
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                            <label for="testsPerOneMillion">Tests Per One Million</label>
                            <input disabled=true v-model="result_data.testsPerOneMillion" type="text" class="form-control" id="testsPerOneMillion">
                        </div>
                    </div>


                    <!-- Grid row -->
                    <button type="submit" class="btn btn-light btn-block">Save</button>
                </form>
                <!-- Extended default form grid -->
            </div>
        </div>

    </div>
</template>

<script>
import CountryList from "../components/CountryList";
import Navbar from "../components/Navbar";

export default {
    name: 'Home',
    components: {
        Navbar

    },
    data() {
        return {
            countries: [],
            country: {
                id: '',
                name: '',
                code: ''
            },
            result_data: '',
            country_id: '',
            selected: null,
            is_exist: false
        };
    },
    created() {
        this.fetchCountries();
    },
    methods : {
        fetchCountries() {
            let page_url = '/api/countries';
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    var factoriesSelectList = []

                    res.forEach((factory, index, mechanicsArray) => {
                        var selectListOption = {
                            value: factory,
                            text:  factory.name
                        }

                        factoriesSelectList.push(selectListOption)
                    })
                    this.countries = factoriesSelectList;
                })
                .catch(err => console.log(err));
        },
        onChange(event) {

            axios.post("/api/fill_data",{
                chosen_country: this.selected.name
            })
                .then(response => {
                    if (response.data) {
                        this.is_exist = true;
                        this.result_data = response.data;
                    }
                    else {
                        this.is_exist = false;
                        alert('Sorry, there is no data for the selected country!');
                    }
                })

        },
        AddCountriesData(){
            axios.post("/api/country",{
                country:this.result_data.country,
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
                    alert('Country Data Added');
                    this.$router.push('/');
                })

        }

    },
    mounted() {

    }
}
</script>

<style scoped>
label {
    color: #5c5c3d;
    font-weight: bold;
    display: block;
}
</style>

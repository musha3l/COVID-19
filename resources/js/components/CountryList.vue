<template>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Country Name</th>
                        <th scope="col">Cases</th>
                        <th scope="col">Active</th>
                        <th scope="col">Recovered</th>
                        <th scope="col">Deaths</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-bind:key="country.name" v-for="country in countries_data">
                        <th>
                            <router-link :to="{name: 'CountryView', params: {id: country.id}}">
                                {{ country.name }}
                            </router-link>
                        </th>
                        <td>{{ country.cases }}</td>
                        <td>{{ country.active }}</td>
                        <td>{{ country.recovered }}</td>
                        <td>{{ country.deaths }}</td>
                        <td>

                            <router-link :to="{name: 'CountryEdit', params: {id: country.id}}">
                                <button type="button" class="btn btn-primary btn-sm"><i class="far fa-eye">Edit</i></button>
                            </router-link>
                            <button @click="deleteCountriesData(country.id)" type="button" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i>Delete</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: 'CountryList',
    data() {
        return {
            countries_data:'',
        }
    },
    created() {
        this.fetchCountriesData();
    },
    methods: {
        fetchCountriesData() {
            axios.get("/api")
                .then(response => {
                    this.countries_data = response.data;
                })

        },
        deleteCountriesData (id) {
            axios.delete(`/api/country/${id}`)
                .then(response => {
                    console.log(response.data);
                    this.fetchCountriesData();
                })

        },
    }
}

</script>

<style>

.container {
    padding: 2rem 0rem;
}

h4 {
    margin: 2rem 0rem 1rem;
}

th{
    color: #5c5c3d;
}

tbody th  {
    color: #083d8d;
    text-decoration: underline;
    font-weight: normal;
}

table {
    text-align: center;
}

/*.table-image {*/
/*td, th {*/
/*    vertical-align: middle;*/
/*}*/
/*}*/

</style>

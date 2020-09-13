<template>
    <div>
        <Navbar></Navbar>
        <CountryList></CountryList>
    </div>
</template>

<script>

import CountryList from '../components/CountryList'
import Navbar from '../components/Navbar'


export default {
    name: 'Home',
    components: {
        CountryList,
        Navbar

    },
}
</script>

<template>
    <header class="header">
        <h1>Covid19</h1>
        <div id="nav">
            <router-link to="/">Home</router-link> |
            <router-link to="/add">Add Country</router-link>
        </div>
    </header>
</template>

<script>
export default {
}
</script>

<style scoped>
.header {
    background: #333;
    color: #fff;
    text-align: center;
    padding: 10px;
}

.header a {
    color: #fff;
    padding-right: 5px;
    text-decoration: none;
}
</style>



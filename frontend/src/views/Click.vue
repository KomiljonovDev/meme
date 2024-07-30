<template>
    <h1>Assalomu alaykum</h1>
    <br>
    <button @click="test++"> {{test}}</button>
</template>
<script>
export default {
    name: "Click",
    data(){
        return {
            test:0
        }
    },
}
</script>

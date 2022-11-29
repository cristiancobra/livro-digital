<template>

    <div class="sidebar" id="sidebar">

                <button type="button" class="btn btn-light mt-4">
                    <font-awesome-icon icon="fa-solid fa-glasses" />
                </button>


                <button type="button" class="btn btn-light mt-2">
                    <font-awesome-icon icon="fa-solid fa-book" />
                </button>

    </div>

</template>

<script>
    export default {
        name: 'SideBar',
    }
</script>

<style scoped>
.sidebar {
    margin-top: -62px;
    position: fixed;
    background-color: #d6c0b5;
    height: 100vh;
    width: 60px;
}
.btn-light {
    background-color: #d6c0b5;
    color: white;
    font-size: 32px;;
    border: none;
}
.btn-light:hover {
    background-color: #eee8e8;
}
</style>
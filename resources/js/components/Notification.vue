<template>
    <li class="nav-item mynav ml-auto d-none d-block">
        <div class="dropdown nav-item ml-auto d-none d-block">
            <div class="dropdown-toggle lead nav-link ml-auto" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <h3><a href="#"> <i class="far fa-bell"></i></a></h3>
            </div>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a href="#">
                <li v-for="notification in notifications">
                        hello
                </li>
                    </a>
            </ul>
        </div>
    </li>
</template>

<script>
export default {
    props:['notifications']
}
</script>

<style scoped>

</style>

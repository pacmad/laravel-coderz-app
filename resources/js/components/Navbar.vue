<template>
<nav class="navbar navbar-expand-md navbar-light bg-color text-white border-bottom border-white">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="">
            Coderz
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item">
                    <img src="https://raw.githubusercontent.com/JennerPalacios/SimpleSpoofNinja/master/img/Ninja.png" width="40" height="40">
                </li>
                <li class="nav-item">
                    <a id="navbarDropdown" class="nav-link text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        User1
                    </a>
                </li>
                <li>
                    <a class="text-white nav-link" href="">
                      Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</template>

<script>
export default {}
</script>

<style lang="css" scoped>
</style>

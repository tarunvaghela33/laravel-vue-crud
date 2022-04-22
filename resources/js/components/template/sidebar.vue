<template>
    <div id="sidebar" class='active'>
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                Admin
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class='sidebar-title'>Main Menu</li>
                    <router-link to="*" v-slot="{ href,navigate, isActive, isExactActive }" custom>
                        <li class="sidebar-item" :class="[isActive && 'active', isExactActive && '']">
                        <a :href="href" @click="navigate" class='sidebar-link'>
                            <i data-feather="user" width="20"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    </router-link>
                    <li class='sidebar-title'>Master</li>
                    <router-link to="/users" v-slot="{ href,navigate, isActive, isExactActive }" custom>
                        <li class="sidebar-item" :class="[isActive && 'active', isExactActive && '']">
                        <a :href="href" @click="navigate" class='sidebar-link'>
                            <i data-feather="users" width="20"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    </router-link>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
</template>

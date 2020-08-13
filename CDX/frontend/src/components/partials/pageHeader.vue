<template>
    <div>
        <div class="page-title-alt-bg"></div>

        <div class="page-title-box">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active">{{ $route.meta.title }}</li>
            </ol>
            <h4 class="page-title">{{ $route.meta.title }}</h4>
        </div>
    </div>
</template>

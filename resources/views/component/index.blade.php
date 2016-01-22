<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/app.css') !!}">

</head>
<body>
<div class="container">
    <tasks></tasks>
</div>
<template id="tasks-template">
    <h1>My Tasks</h1>
    <ul class="list-group">
        <li class="list-group-item" v-for="task in list">
            @{{task.body}}
            <strong @click="deleteTask(task)">X</strong>
        </li>
    </ul>
</template>
</body>
<script src="{!! asset('js/app.js') !!}"></script>
</html>

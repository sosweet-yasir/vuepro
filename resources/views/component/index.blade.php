<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/app.css') !!}">
    {{--<style href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"></style>--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">--}}
</head>
<body>

<div class="container">
        <div class="col-md-11 col-md-offset-0">
            <div class="panel panel-default">
                <div id="name" class="row">
                    <div class="form-group col-md-9 col-md-offset-1" >
                        <h1> @{{ fullName }}</h1>
                        <input v-model="first" class="form-control">
                        <input v-model="last" class="form-control">

                    </div>
                </div>

                <span id="skill">
                <div class="row">
                    <div class="form-group col-md-9 col-md-offset-1" >
                        <h1>Skill: @{{ skill }}</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-9 col-md-offset-1" >
                        <input v-model="points" class="form-control">
                    </div>
                </div>
                    </span>
                {{--div bind with vue model via id app--}}
                <div id="app" class="form-group">

                    <div class="row">
                        <div class="form-group col-md-9 col-md-offset-1" >
                            <p v-show="!subject">please enter subject</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-9 col-md-offset-1" >
                            {{-- v-if also remove element like it remove <p> tag --}}
                            <p v-if="!message">please enter message</p>
                        </div>
                    </div>

                <form @submit.prevent ="handleIt" method="post" action="{!! route('component.store') !!}">
                    <input value="{!! csrf_token() !!}" name="_token" hidden>
                    <div class="row">
                        <div class="form-group col-md-9 col-md-offset-1" >
                            <label for="subject">Enter Subject</label>
                            <input v-model="subject" name="subject" class="form-control" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-9 col-md-offset-1" >
                            <label for="message">Enter Message</label>
                            <textarea v-model="message" name="message" rows="5" class="form-control"></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class=" col-lg-offset-10">
                            <button class="btn btn-primary btn-block" type="submit">Send message</button>
                            <a @click="increment" class="btn btn-primary btn-block">
                                increment value @{{ count }}
                            </a>
                            <counter subject="Likes"></counter>
                            <counter subject="Dislikes"></counter>
                        </div>
                    </div>

                </form>
                </div>
            </div>
        </div>
</div>

<template id="counter-template">
    <h1>@{{subject}}</h1>
    <a @click='count++' class="btn btn-primary btn-block">@{{ count }} </a>
</template>

<script src="{!! asset('js/app.js') !!}"></script>
<script>


    Vue.component('counter', {
        template: '#counter-template',
        props:['subject'],
        data:function(){
            return {count : 0}
        }
    });
//global component tag creating
    var data={
        subject:'new message',
        message:'this is your message',
        count : 0
    }
    new Vue({
        el: '#app',
        data: data,
        methods:{
            handleIt: function() {
                alert("handeled");
            },
            increment:function (){
                this.count++;
            }
        }

    });

    new Vue({
        el:'#skill',
        data:{points : 500},
        computed:{
            skill:function(){
                if (this.points<=100)
                    return 'Beginner';
                else
                    return 'Advance';
            }
        }
    })

    new Vue({
        el:'#name',
        data:{
            first:'Yasir',
            last: 'Rasool'
        },
        computed:{
            fullName: function (){
            return this.first+' '+this.last;
            }
        }
    })
</script>
</body>
</html>
